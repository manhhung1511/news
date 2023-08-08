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
use common\helper\Tools;
use common\models\Auth;
use yii\data\Pagination;
use Google\Service\Blogger;
use Google\Service\Blogger\Post;
use Google_Client;

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
        $category = Category::find()->where(['status' => 1])->limit(7)->all();
        $views = News::find()->where(['status' => 1])->andWhere(['>=','view', 1])->orderBy(['created_at' => SORT_ASC])->limit(4)->all();
        Yii::$app->view->params['paramName'] = $category;
        Yii::$app->view->params['views'] = $views;
    }

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
        $id = (string) $category->_id;
        $model = News::find()->where(['category_id' => $id, 'status' => 1, 'category_child' => '']);
    
        if(isset($model->category_child[0]) && $model->category_child[0]) {
            return $this->render('empty');
        }
        $pages= new Pagination(['totalCount' => $model->count(),'pageSize' => '6']);

        $news = News::find()->where(['category_id' => $id, 'status'=> 1, 'category_child' => ''])->orderBy(['created_at' => SORT_ASC])->offset($pages->offset)->limit($pages->limit)->all();
    
        return $this->render('category', [
            'news' => $news,
            'pages' => $pages
        ]);
    }

    public function actionCategoryChild() {
        $slug = Yii::$app->request->get('slug');

        $model = News::find()->where(['category_child' => $slug, 'status' => 1]);
        
        $pages= new Pagination(['totalCount' => $model->count(),'pageSize' => '6']);

        $news = News::find()->where(['category_child' => $slug, 'status'=> 1])->orderBy(['created_at' => SORT_ASC])->offset($pages->offset)->limit($pages->limit)->all();
    
        return $this->render('category', [
            'news' => $news,
            'pages' => $pages
        ]);
    }

    public function actionDetail()
    {
        $slug = Yii::$app->request->get('slug');
        $id = Yii::$app->request->get('id');
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
        $random = News::find()->orderBy(['rand()' => 1])
                              ->limit(2)
                               ->all();

        $views = News::find()->where(['status' => 1])->andWhere(['>=','view', 1])->orderBy(['created_at' => SORT_ASC])->limit(6)->all();
      
        return $this->render('detail', [
            'detail' => $detail,
            'relate' => $relate,
            'random' => $random,
            'views' => $views
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

    public function actionBlogger() {
        $authToken = 'ya29.a0AfB_byBTjZkxE6wwId2P8zSud27ew3JWyCfLfZ945iV3GZhCEYBGs2WguqoroC9nsUkw-pVz4mpKjd5CDWrrhTVBZFifd29Tus1smgF4aoz3xf0gzsJmfh8bkdWJGBrja9t8iVokYqA3wne410108I734SQNfSYaCgYKAfwSARISFQHsvYlsPHTUanlG3YxnMPtSFWqvYA0166';
        $blogID = '2638507688997638382';
       // The data to send to the API
    $postData = array(
        'kind' => 'blogger#post',
        'blog' => array(
            'id' => $blogID
        ) ,
        'title' => 'This is the Post Title - ',
        'content' => 'Content of the Article goes here'
    );
    // Setup cURL
    $ch = curl_init('https://www.googleapis.com/blogger/v3/blogs/' . $blogID . '/posts/');
    curl_setopt_array($ch, array(
        CURLOPT_POST => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer ' . $authToken,
            'Content-Type: application/json'
        ) ,
        CURLOPT_POSTFIELDS => json_encode($postData)
    ));
    // Send the request
    $response = curl_exec($ch);
    // Check for errors
    if ($response === false)
    {
        die(curl_error($ch));
    }
    echo ($response);
    // Decode the response
    $responseData = json_decode($response, true);
    var_dump($responseData);
    // Print the date from the response
    // echo $responseData['published'];
    }

    public function actionTest() {
        // $code = '4/0Adeu5BU4w2SSvZf0VzPsmaZC61OyOx2eWZqn2b-LBuo9HBSJHkTsyyGfYiTgK8Wd8N1cYg';
        // $client_id = '850065321278-2mpf2cht8p57ld2gg88jj0jmm8io318t.apps.googleusercontent.com';
        // $client_secret = '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';
        // $redirect_uri = 'https://songxanh24h.com';
        
        // $url = 'https://oauth2.googleapis.com/token';
        // $data = array(
        //     'code' => $code,
        //     'client_id' => $client_id,
        //     'client_secret' => $client_secret,
        //     'redirect_uri' => $redirect_uri,
        //     'grant_type' => 'authorization_code'
        // );
        
        // $ch = curl_init($url);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        
        // $response = curl_exec($ch);
        // curl_close($ch);
        
        // $tokens = json_decode($response, true);
        $access_token = 'ya29.a0AfB_byAl1QoAWUsUUVpf6JQci2SoFUmqIbiATkR450l2w9WQiv9F-q7y3l1AnZOqRCjrCVBJHHX55-Q7uAt7hSADOchqxxcOp1iz7nGT20JRWedClt-NDvYwYFWy2zs5qRl2Pty7YPez4Myk4hCGbO_c3zR5aCgYKAcwSARISFQHsvYls9ehxOEThmGodfbwfEStECA0163';
        $refresh_token = '1//0esIKMJaVIh3UCgYIARAAGA4SNwF-L9IrcfsCtkUiOOrj5dK4ryNpOx_psbXvN9qNtJtqNoDAXLujyWp3_7XnZ3oqB4zOjmoGFkM';
        
        $auth = new Auth();
        $auth->access_token = $access_token;
        $auth->refresh_token = $refresh_token;
        $auth->type= "blogger";
        $auth->status = 1;
        $auth->created_at = date('Y-m-d');
        $auth->updated_at = date('Y-m-d');
        $auth->save();
    }
}

