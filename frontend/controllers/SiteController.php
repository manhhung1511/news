<?php

namespace frontend\controllers;

use common\models\Category;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use common\models\LoginForm;
use common\models\News;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use MongoDb\BSON\ObjectId;
use yii\data\Pagination;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
            ],
            'captcha' => [
                'class' => \yii\captcha\CaptchaAction::class,
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */

    public function init() {
        parent::init();
        $category = Category::find()->all();
        Yii::$app->view->params['paramName'] = $category;
    }

    public function actionIndex()
    {
        $news = News::findAll(['status' => 1]);
        $new4 = News::find()->where(['status' => 1])->orderBy(['created_at' => SORT_DESC])->limit(5)->all();
        $business = News::find()->where(['status' => 1, 'category' => 'Kinh doanh'])->orderBy(['created_at' => SORT_DESC])->limit(3)->all();
        $entertainment = News::find()->where(['status' => 1, 'category' => 'Giải trí'])->orderBy(['created_at' => SORT_DESC])->limit(5)->all();
        $land = News::find()->where(['status' => 1, 'category' => 'Bất động sản'])->orderBy(['created_at' => SORT_DESC])->limit(4)->all();
        $views = News::find()->where(['status' => 1])->andWhere(['>=','view', 1])->orderBy(['created_at' => SORT_ASC])->limit(3)->all();
        $new8 = News::find()->where(['status' => 1])->orderBy(['created_at' => SORT_DESC])->limit(7)->all();
        $today = News::find()->where(['status' => 1])->andWhere(['>=','created_at',date('Y-m-d').' 00:00:00'])->andWhere(['<=','created_at',date('Y-m-d').'23:59:59'])->orderBy(['created_at' => SORT_DESC])->limit(8)->all();
        return $this->render('index',[
            'news' => $news,
            'new4' => $new4,
            'business' => $business,
            'entertainment' => $entertainment,
            'land' => $land,
            'views' => $views,
            'new8' => $new8,
            'today' => $today
        ]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionCategory()
    {
        $slug = Yii::$app->request->get('slug');
        $category = Category::findOne(['slug' => $slug]);
        $id = (string) $category->_id;

        $model = News::find()->where(['category_id' => $id, 'status' => 1]);
     
        $pages= new Pagination(['totalCount' => $model->count(),'pageSize' => '2']);

        $news = News::find()->where(['category_id' => $id, 'status'=> 1])->orderBy(['created_at' => SORT_ASC])->offset($pages->offset)->limit($pages->limit)->all();;
    
        return $this->render('category', [
            'news' => $news,
            'pages' => $pages
        ]);
    }

    public function actionDetail()
    {
        $id = Yii::$app->request->get('id');
        $detail = News::findOne(['_id' => new ObjectId($id)]);
        $category = $detail->category;
        $relate = News::find()->where(['status' => 1, 'category' => $category])->orderBy(['created_at' => SORT_ASC])->limit(5)->all();
        $view = 0;
        $detail->view = $detail->view ? $detail->view + 1 : $view + 1;
        $detail->save();
        return $this->render('detail', [
            'detail' => $detail,
            'relate' => $relate
        ]);
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            }

            Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if (($user = $model->verifyEmail()) && Yii::$app->user->login($user)) {
            Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
            return $this->goHome();
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }
}
