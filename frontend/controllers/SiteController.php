<?php

namespace frontend\controllers;

use common\models\Category;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use common\models\LoginForm;
use common\models\News;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use common\helper\Tools;
use common\models\CategoryMedicine;
use common\models\Medicine;
use common\models\Hospital;
use common\models\Sick;
use yii\web\Response;
use frontend\controllers\MainController;
use yii\data\Pagination;
/**
 * Site controller
 */
class SiteController extends MainController
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

    public function actionIndex()
    {
        $last_7_days = date('Y-m-d', strtotime('-6 day', time()));
        $news = News::findAll(['status' => 1]);
        $new4 = News::find()->where(['status' => 1])->orderBy(['created_at' => SORT_DESC])->limit(6)->all();
        $category = Category::find()->where(['push' => 1])->limit(3)->all();
        $news_category3 = News::find()->where(['status' => 1, 'category_child' => $category[0]->slug ])->orderBy(['created_at' => SORT_DESC])->limit(3)->all();
        $news_category5 = News::find()->where(['status' => 1, 'category_child' => $category[1]->slug])->orderBy(['created_at' => SORT_DESC])->limit(5)->all();
        $news_category2 = News::find()->where(['status' => 1, 'category_child' => $category[2]->slug])->orderBy(['created_at' => SORT_DESC])->limit(4)->all();
        $views = News::find()->where(['status' => 1])->andWhere(['>=','view', 1])->orderBy(['created_at' => SORT_ASC])->limit(3)->all();
        $new8 = News::find()->where(['status' => 1])->orderBy(['created_at' => SORT_DESC])->limit(8)->all();
        // $today = News::find()->where(['status' => 1])->andWhere(['>=','created_at',date('Y-m-d').' 00:00:00'])->andWhere(['<=','created_at',date('Y-m-d').'23:59:59'])->orderBy(['created_at' => SORT_DESC])->limit(8)->all();
        return $this->render('index',[
            'news' => $news,
            'new4' => $new4,
            'news_category3' => $news_category3,
            'news_category5' => $news_category5,
            'news_category2' => $news_category2,
            'views' => $views,
            'new8' => $new8,
            // 'today' => $today,
            'category' => $category
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
        $name_category = $category->name;
        Yii::$app->params['category'] = Tools::subWord($name_category .' - Tận tâm chăm sóc sức khỏe, Thông tin sức khỏe, dinh dưỡng, hỗ trợ tư vấn điều trị bệnh, thông tin thuốc, chăm sóc làm đẹp tin cậy cho người Việt',24);
        $id = (string) $category->_id;
        $model = News::find()->where(['category_id' => $id, 'status' => 1, 'category_child' => '']);
    
        if(isset($model->category_child[0]) && $model->category_child[0]) {
            return $this->render('empty');
        }
        $views = News::find()->where(['status' => 1])->andWhere(['>','view', 1])->orderBy(['created_at' => SORT_ASC])->limit(4)->all();
        $news = News::find()->where(['category_id' => $id, 'status'=> 1, 'category_child' => ''])->orderBy(['created_at' => SORT_ASC])->limit(6)->all();
    
        return $this->render('category', [
            'news' => $news,
            'views' => $views,
            'name_category' => $name_category
        ]);
    }

    public function actionCategoryChild() {
        $slug = Yii::$app->request->get('slug');
        $category = Category::findOne(['slug' => $slug]);
        $name_category = $category->name;
        Yii::$app->params['category'] = Tools::subWord($name_category .' - Tận tâm chăm sóc sức khỏe, Thông tin sức khỏe, dinh dưỡng, hỗ trợ tư vấn điều trị bệnh, thông tin thuốc, chăm sóc làm đẹp tin cậy cho người Việt', 24);
        $news = News::find()->where(['category_child' => $slug, 'status'=> 1])->orderBy(['created_at' => SORT_ASC])->limit(6)->all();
        $views = News::find()->where(['status' => 1])->andWhere(['>','view', 1])->orderBy(['created_at' => SORT_ASC])->limit(4)->all();

        return $this->render('category', [
            'news' => $news,
            'views' => $views,
            'name_category' => $name_category
        ]);
    }

    public function actionDetail()
    {
        $slug = Yii::$app->request->get('slug');
        $detail = News::findOne(['slug' => $slug]);
        if(empty($detail->category_child)) {
            $category = $detail->category;
            $relate = News::find()->where(['status' => 1, 'category' => $category])->orderBy(['created_at' => SORT_ASC])->limit(6)->all();
        } else {
            $category_child = $detail->category_child;
            $relate = News::find()->where(['status' => 1, 'category_child' => $category_child])->orderBy(['created_at' => SORT_ASC])->limit(6)->all();
        }
        $view = 0;
        $detail->view = $detail->view ? $detail->view + 1 : $view + 1;
        $detail->save();

        Yii::$app->params['description'] = $detail->title .' '. Tools::subWord(strip_tags($detail->content));

        //random
        $random = News::find()->orderBy(['created_at' => SORT_ASC])
                              ->limit(2)
                               ->all();

        $views = News::find()->where(['status' => 1])->andWhere(['>=','view', 1])->orderBy(['created_at' => SORT_ASC])->limit(3)->all();
      
        $medicine = Medicine::find()->where(['category' => 'Thiết bị y tế'])->orderBy(['created_at' => SORT_ASC])->limit(5)->all();
        $sicks = Sick::find()->where(['type' => '3'])->orderBy(['created_at' => SORT_ASC])->limit(5)->all();
        return $this->render('detail', [
            'detail' => $detail,
            'relate' => $relate,
            'random' => $random,
            'views' => $views,
            'sicks' => $sicks,
            'medicine' => $medicine
        ]);
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionSearch()
    {
        $keyword = Yii::$app->request->get('s');
        $medicines = Medicine::find()
            ->Where(['like', 'name', $keyword])
            ->orWhere(['REGEX', 'name', $keyword])
            ->orWhere(['REGEX', 'subscribe', $keyword])
            ->orWhere(['REGEX', 'category', $keyword])->all();

        $count_medicines = count($medicines);

        $hospitals = Hospital::find()
        ->Where(['like', 'name', $keyword])
        ->orWhere(['REGEX', 'name', $keyword])
        ->andWhere(['type' => '1'])
        ->orWhere(['REGEX', 'description', $keyword])
        ->andWhere(['type' => '1'])
        ->orWhere(['REGEX', 'address', $keyword])
        ->andWhere(['type' => '1'])
        ->orWhere(['REGEX', 'branch', $keyword])
        ->andWhere(['type' => '1'])->all();

    $count_hospitals = count($hospitals);

        $sicks = Sick::find()
        ->Where(['like', 'name', $keyword])
        ->andWhere(['type' => '1'])
        ->Where(['REGEX', 'name', $keyword])
        ->andWhere(['type' => '1'])
        ->orWhere(['REGEX', 'content', $keyword])
        ->andWhere(['type' => '1'])->all();

        $count_sicks = count($sicks);

        $model = News::find()
        ->where(['like', 'title', $keyword])
        ->orWhere(['REGEX', 'content', $keyword])
        ->orWhere(['REGEX', 'title', $keyword]);
    
        $pages = new Pagination(['totalCount' => $model->count(),'pageSize' => '20']);
        $results = $model->all();
        $limits = $model->offset($pages->offset)->limit($pages->limit)->all();
        $count_news = count($results);

        return $this->render('search', [
            'keyword' => $keyword,
            'results' => $limits,
            'count_medicines' => $count_medicines,
            'count_news' => $count_news,
            'count_hospitals' => $count_hospitals,
            'count_sicks' => $count_sicks,
            'pages' => $pages
        ]);
    }

    public function actionSearchMedicine()
    {
        $keyword = Yii::$app->request->get('s');
        $news = News::find()
        ->where(['like', 'title', $keyword])
        ->orWhere(['REGEX', 'content', $keyword])
        ->orWhere(['REGEX', 'title', $keyword])->all();

        $count_news = count($news);

        $hospitals = Hospital::find()
            ->Where(['like', 'name', $keyword])
            ->orWhere(['REGEX', 'name', $keyword])
            ->andWhere(['type' => '1'])
            ->orWhere(['REGEX', 'description', $keyword])
            ->andWhere(['type' => '1'])
            ->orWhere(['REGEX', 'address', $keyword])
            ->andWhere(['type' => '1'])
            ->orWhere(['REGEX', 'branch', $keyword])
            ->andWhere(['type' => '1'])->all();

        $count_hospitals = count($hospitals);

        $sicks = Sick::find()
        ->Where(['like', 'name', $keyword])
        ->Where(['REGEX', 'name', $keyword])
        ->andWhere(['type' => '1'])
        ->orWhere(['REGEX', 'content', $keyword])
        ->andWhere(['type' => '1'])->all();

        $count_sicks = count($sicks);

        $model = Medicine::find()
        ->Where(['like', 'name', $keyword])
        ->orWhere(['REGEX', 'name', $keyword])
        ->orWhere(['REGEX', 'subscribe', $keyword])
        ->orWhere(['REGEX', 'category', $keyword]);
    
        $pages = new Pagination(['totalCount' => $model->count(),'pageSize' => '20']);
        $results = $model->all();
        $limits = $model->offset($pages->offset)->limit($pages->limit)->all();
        $count_medicines = count($results);
       
        return $this->render('search-medicine', [
            'keyword' => $keyword,
            'results' => $limits,
            'count_medicines' => $count_medicines,
            'count_news' => $count_news,
            'count_hospitals' => $count_hospitals,
            'count_sicks' => $count_sicks,
            'pages' => $pages
        ]);
    }

    public function actionSearchHospital()
    {
        $keyword = Yii::$app->request->get('s');
        $news = News::find()
        ->where(['like', 'title', $keyword])
        ->orWhere(['REGEX', 'content', $keyword])
        ->orWhere(['REGEX', 'title', $keyword])->all();

        $count_news = count($news);

        $medicines = Medicine::find()
        ->Where(['like', 'name', $keyword])
        ->orWhere(['REGEX', 'name', $keyword])
        ->orWhere(['REGEX', 'subscribe', $keyword])
        ->orWhere(['REGEX', 'category', $keyword])->all();

        $count_medicines = count($medicines);

        $sicks = Sick::find()
        ->Where(['like', 'name', $keyword])
        ->Where(['REGEX', 'name', $keyword])
        ->andWhere(['type' => '1'])
        ->orWhere(['REGEX', 'content', $keyword])
        ->andWhere(['type' => '1'])->all();

        $count_sicks = count($sicks);

        $model = Hospital::find()
            ->Where(['like', 'name', $keyword])
            ->orWhere(['REGEX', 'name', $keyword])
            ->andWhere(['type' => '1'])
            ->orWhere(['REGEX', 'description', $keyword])
            ->andWhere(['type' => '1'])
            ->orWhere(['REGEX', 'address', $keyword])
            ->andWhere(['type' => '1'])
            ->orWhere(['REGEX', 'branch', $keyword])
            ->andWhere(['type' => '1']);

        $pages = new Pagination(['totalCount' => $model->count(),'pageSize' => '20']);
        $results = $model->all();
        $limits = $model->offset($pages->offset)->limit($pages->limit)->all();
        $count_hospitals = count($results);
       
        return $this->render('search-hospital', [
            'keyword' => $keyword,
            'results' => $limits,
            'count_medicines' => $count_medicines,
            'count_news' => $count_news,
            'count_hospitals' => $count_hospitals,
            'count_sicks' => $count_sicks,
            'pages' => $pages
        ]);
    }

    public function actionSearchSick()
    {
        $keyword = Yii::$app->request->get('s');
        $news = News::find()
        ->where(['like', 'title', $keyword])
        ->orWhere(['REGEX', 'content', $keyword])
        ->orWhere(['REGEX', 'title', $keyword])->all();

        $count_news = count($news);

        $medicines = Medicine::find()
        ->Where(['like', 'name', $keyword])
        ->orWhere(['REGEX', 'name', $keyword])
        ->orWhere(['REGEX', 'subscribe', $keyword])
        ->orWhere(['REGEX', 'category', $keyword])->all();

        $count_medicines = count($medicines);

        $hospitals = Hospital::find()
        ->Where(['like', 'name', $keyword])
        ->orWhere(['REGEX', 'name', $keyword])
        ->andWhere(['type' => '1'])
        ->orWhere(['REGEX', 'description', $keyword])
        ->andWhere(['type' => '1'])
        ->orWhere(['REGEX', 'address', $keyword])
        ->andWhere(['type' => '1'])
        ->orWhere(['REGEX', 'branch', $keyword])
        ->andWhere(['type' => '1'])->all();

        $count_hospitals = count($hospitals);

        $model = Medicine::find()
        ->orWhere(['REGEX', 'name', $keyword])
        ->orWhere(['REGEX', 'subscribe', $keyword])
        ->orWhere(['REGEX', 'category', $keyword]);
    
        $model = Sick::find()
        ->Where(['like', 'name', $keyword])
        ->Where(['REGEX', 'name', $keyword])
        ->andWhere(['type' => '1'])
        ->orWhere(['REGEX', 'content', $keyword])
        ->andWhere(['type' => '1']);

        $pages = new Pagination(['totalCount' => $model->count(),'pageSize' => '20']);
        $results = $model->all();
        $limits = $model->offset($pages->offset)->limit($pages->limit)->all();
        $count_sicks = count($results);
       
        return $this->render('search-sick', [
            'keyword' => $keyword,
            'results' => $limits,
            'count_medicines' => $count_medicines,
            'count_news' => $count_news,
            'count_hospitals' => $count_hospitals,
            'count_sicks' => $count_sicks,
            'pages' => $pages
        ]);
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
    //api update from nodejs
    public function actionApiMedicine() {
        Yii::$app->response->format = Response::FORMAT_JSON;
   
        $medicine = new Medicine();
        $medicine->name = Yii::$app->request->post()['name'];
        $medicine->img = Yii::$app->request->post()['img'];
        $medicine->subscribe = Yii::$app->request->post()['subscribe'];
        $medicine->number = Yii::$app->request->post()['number'];
        $medicine->type = Yii::$app->request->post()['type'];
        $medicine->link = Yii::$app->request->post()['link'];
        $medicine->slug = Yii::$app->request->post()['slug'];
        $medicine->producer = Yii::$app->request->post()['producer'];
        $medicine->category = Yii::$app->request->post()['category'];
        $medicine->content = Yii::$app->request->post()['content'];
        $medicine->created_at =date('Y-m-d H:i:s');
        $medicine->updated_at =date('Y-m-d H:i:s');
        
        if($medicine->save()) {
            return true;
        } else {
            return false;
        }
    }

    //api update from nodejs
    public function actionApiCategoryMedicine() {
        Yii::$app->response->format = Response::FORMAT_JSON;
   
        $medicine = new CategoryMedicine();
        $medicine->name = Yii::$app->request->post()['name'];
        $medicine->slug = Yii::$app->request->post()['slug'];
        $medicine->created_at =date('Y-m-d H:i:s');
        $medicine->updated_at =date('Y-m-d H:i:s');
        
        if($medicine->save()) {
            return true;
        } else {
            return false;
        }
    }
}

