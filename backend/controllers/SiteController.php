<?php

namespace backend\controllers;

use common\models\Category;
use common\models\LoginForm;
use common\models\News;
use frontend\models\SignupForm;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\data\ActiveDataProvider;
use MongoDb\BSON\ObjectId;
use common\helper\Tools;
use common\models\Auth;
use Google_Client;
use Google\Service\Blogger;
use Google\Service\Blogger\Post;

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
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['login', 'error', 'signup'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'create', 'update-status', 'update', 'delete', 'category-child', 'upload', 'category_update', 'blogger', 'send-blog'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
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
        ];
    }

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $keyword = strip_tags(Yii::$app->request->get('keyword'));
        $status = Yii::$app->request->get('status', '');
        $filters = [];

        if ($status) $filters['status'] = (int) $status;
        else $filters['status'] = ['$ne' => 3];

        $news = new ActiveDataProvider([
            'query' => News::find()
                ->where($filters)
                ->andFilterWhere([
                    'or',
                    ['like', 'name', $keyword],
                    ['like', 'category', $keyword],
                    ['like', 'content', $keyword]
                ]),
            'sort' => ['defaultOrder' => ['_id' => SORT_DESC]],
            'pagination' => [
                'pageSize' => 50
            ]
        ]);

        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('_search', [
                'news' => $news,
                'keyword' => $keyword,
                'status' => $status
            ]);
        }

        return $this->render('index', [
            'news' => $news,
            'keyword' => $keyword,
            'status' => $status
        ]);
    }

    public function actionCreate()
    {
        $model = new News();
        $list_category  = Category::find()->where(['status' => 1])->all();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $file = $_FILES['News'];

            $model->title = Yii::$app->request->post()['News']['title'];
            $model->slug = self::Slug(Yii::$app->request->post()['News']['title']);
            $model->category_id = Yii::$app->request->post()['News']['category'];
            $category = Category::findOne(['_id' => new ObjectId(Yii::$app->request->post()['News']['category'])]);
            $model->category = $category->name;

            $baseDirectory = '../../storage/images';
            $currentDate = date('Y/m/d');
            $folderPath = $baseDirectory . '/' . $currentDate;

            if (!is_dir($folderPath)) {
                mkdir($folderPath, 0777, true);
            }

            $name_img = 'thump-' . Tools::convertTitle($file['name']['image']) . '.webp';

            $uploadedFile = $file['tmp_name']['image'];

            $originalImageInfo = getimagesize($uploadedFile);

            $originalImageType = $originalImageInfo[2];

            if ($originalImageType === IMAGETYPE_JPEG) {
                $originalImage = imagecreatefromjpeg($uploadedFile);
            } elseif ($originalImageType === IMAGETYPE_PNG) {
                $originalImage = imagecreatefrompng($uploadedFile);
            } elseif ($originalImageType === IMAGETYPE_GIF) {
                $originalImage = imagecreatefromgif($uploadedFile);
            } elseif ($originalImageType === IMAGETYPE_WEBP) {
                $originalImage = imagecreatefromwebp($uploadedFile);
            }

            $width = imagesx($originalImage);
            $height = imagesy($originalImage);

            $croppedWidth = $width / 2;
            $croppedHeight = $height / 2;

            $newImage = imagecreatetruecolor($croppedWidth, $croppedHeight);
            imagecopyresampled($newImage, $originalImage, 0, 0, 0, 0, $croppedWidth, $croppedHeight, imagesx($originalImage), imagesy($originalImage));

            $newImagePath = '../../storage/images/' . $currentDate . '/' . $name_img;
            imagewebp($newImage, $newImagePath, 100);

            imagedestroy($originalImage);
            imagedestroy($newImage);

            $model->image = '/' . $currentDate . '/' . $name_img;
            $model->content = Yii::$app->request->post()['News']['content'];
            $model->author = Yii::$app->request->post()['News']['author'];
            $model->category_child = self::Slug(Yii::$app->request->post()['category-child']);
            $model->name_category_child = Yii::$app->request->post()['category-child'];
            $model->status = 1;
            $model->created_at = date('Y-m-d H:i:s');
            $model->updated_at = date('Y-m-d H:i:s');
            $model->save();
            return $this->redirect(Yii::$app->urlManager->createAbsoluteUrl(['site/index']));
        }

        return $this->render('create', [
            'model' => $model,
            'list_category' => $list_category
        ]);
    }

    public function actionUpdateStatus()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        if (Yii::$app->request->isAjax && Yii::$app->request->get()) {
            $id = new ObjectId(Yii::$app->request->get()['id']);
            $model = News::findOne(['_id' => $id]);
            if ($model->status == 2) $status = 1;
            else $status = 2;
            $model->status = $status;
            $model->updated_at = date('Y-m-d H:i:s');
            if ($model->save()) {
                return [
                    'err_code' => 0,
                    'message' => $status
                ];
            } else {
                return  [
                    'err_code' => 1,
                    'message' => $model->getErrors()
                ];
            }
        }
    }

    public function actionUpdate($id)
    {
        $model = News::findOne($id);
        $image = $model->image;
        $category_id = $model->category_id;
        $list_category  = Category::find()->where(['status' => 1])->all();
        $category_curr = Category::findOne(['_id' => new ObjectId($category_id)]);
        $category_child = $model->name_category_child;
        $list_curr = $category_curr->category_child;

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->title = Yii::$app->request->post()['News']['title'];
            $model->slug = self::Slug(Yii::$app->request->post()['News']['title']);
            $model->category_id = Yii::$app->request->post()['News']['category'];
            $category = Category::findOne(['_id' => new ObjectId(Yii::$app->request->post()['News']['category'])]);
            $model->category = $category->name;
            $model->category_child = self::Slug(Yii::$app->request->post()['category-child']);
            $model->name_category_child = Yii::$app->request->post()['category-child'];
            $model->image = $image;
            $file = $_FILES['News'];

            if ($file['type']['image'] !== 'text/plain') {
                $baseDirectory = '../../storage/images';
                $currentDate = date('Y/m/d');
                $folderPath = $baseDirectory . '/' . $currentDate;

                if (!is_dir($folderPath)) {
                    mkdir($folderPath, 0777, true);
                }

                $name_img = 'thump-' . Tools::convertTitle($file['name']['image']) . '.webp';

                $uploadedFile = $file['tmp_name']['image'];

                $originalImageInfo = getimagesize($uploadedFile);

                $originalImageType = $originalImageInfo[2];

                $originalImageInfo = getimagesize($uploadedFile);
                $originalImageType = $originalImageInfo[2];
                if ($originalImageType === IMAGETYPE_JPEG) {
                    $originalImage = imagecreatefromjpeg($uploadedFile);
                } elseif ($originalImageType === IMAGETYPE_PNG) {
                    $originalImage = imagecreatefrompng($uploadedFile);
                } elseif ($originalImageType === IMAGETYPE_GIF) {
                    $originalImage = imagecreatefromgif($uploadedFile);
                } elseif ($originalImageType === IMAGETYPE_WEBP) {
                    $originalImage = imagecreatefromwebp($uploadedFile);
                }

                $width = imagesx($originalImage);
                $height = imagesy($originalImage);

                $croppedWidth = $width / 2;
                $croppedHeight = $height / 2;

                $newImage = imagecreatetruecolor($croppedWidth, $croppedHeight);
                imagecopyresampled($newImage, $originalImage, 0, 0, 0, 0, $croppedWidth, $croppedHeight, imagesx($originalImage), imagesy($originalImage));

                $newImagePath = '../../storage/images/' . $currentDate . '/' . $name_img;
                imagewebp($newImage, $newImagePath, 100);

                imagedestroy($originalImage);
                imagedestroy($newImage);
                $model->image = '/' . $currentDate . '/' . $name_img;
            }

            $model->content = Yii::$app->request->post()['News']['content'];
            $model->author = Yii::$app->request->post()['News']['author'];
            $model->updated_at = date('Y-m-d H:i:s');

            if ($model->save()) {
                Yii::$app->session->setFlash('success', Yii::t('app', 'Update successfully'));
                return $this->redirect(Yii::$app->urlManager->createAbsoluteUrl(['site/index']));
            }
        }
        return $this->render('update', [
            'model' => $model,
            'list_category' => $list_category,
            'category_id' => $category_id,
            'list_curr' => $list_curr,
            'category_child' => $category_child
        ]);
    }

    public function actionUpdateCategory()
    {
    }

    public function actionDelete($id)
    {
        $model = News::findOne($id);
        $model->delete();

        Yii::$app->session->setFlash('success', Yii::t('app', 'Deleted successfully'));
        return $this->redirect(Yii::$app->urlManager->createAbsoluteUrl(['site/index']));
    }

    public function actionCategoryChild()
    {
        if (Yii::$app->request->isAjax && Yii::$app->request->post()) {
            $category_id = Yii::$app->request->post()['category_id'];
            $category = Category::findOne(['_id' => new ObjectId($category_id)]);
            $category_child = $category->category_child;
            return json_encode($category_child, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK | JSON_PRETTY_PRINT);
        }
    }

    /**
     * Login action.
     *
     * @return string|Response
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'blank';

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
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

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

    public static function Slug($string)
    {
        $search = array(
            '#(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)#',
            '#(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)#',
            '#(ì|í|ị|ỉ|ĩ)#',
            '#(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)#',
            '#(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)#',
            '#(ỳ|ý|ỵ|ỷ|ỹ)#',
            '#(đ)#',
            '#(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)#',
            '#(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)#',
            '#(Ì|Í|Ị|Ỉ|Ĩ)#',
            '#(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)#',
            '#(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)#',
            '#(Ỳ|Ý|Ỵ|Ỷ|Ỹ)#',
            '#(Đ)#',
            "/[^a-zA-Z0-9\-\_]/",
        );
        $replace = array(
            'a',
            'e',
            'i',
            'o',
            'u',
            'y',
            'd',
            'A',
            'E',
            'I',
            'O',
            'U',
            'Y',
            'D',
            '-',
        );
        $string = preg_replace($search, $replace, $string);
        $string = preg_replace('/(-)+/', '-', $string);
        $string = strtolower($string);
        return $string;
    }

    public function actionUpload()
    {
        $baseDirectory = '../../storage/images';
        $currentDate = date('Y/m/d');
        $folderPath = $baseDirectory . '/' . $currentDate;

        if (!is_dir($folderPath)) {
            mkdir($folderPath, 0777, true);
        }
        $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

        $name_img = Tools::convertTitle($_FILES['file']['name']) . '.' . $extension;

        $uploadedFile = $_FILES['file']['tmp_name'];
        $destination = '../../storage/images/' . $currentDate . '/' . $name_img;

        if (move_uploaded_file($uploadedFile, $destination)) {
            return $currentDate . '/' . $name_img;
        } else {
            echo "Failed to save image.";
        }
    }

    public function actionBlogger()
    {
        $model = new News();
        $list_news = News::find()->where(['status' => 1])->all();

        return $this->render('blogger', [
            'model' => $model,
            'list_news' => $list_news
        ]);
    }

    public function actionSendBlog()
    {
        if (Yii::$app->request->isAjax && Yii::$app->request->post()) {
            $blog = Yii::$app->request->post()['blogger'];
            $post = Yii::$app->request->post()['post'];
            $new = News::findOne(['_id' => new ObjectId($post)]);

            //post
            $auth = Auth::findOne(['type' => 'blogger']);
            $refresh_token = $auth->refresh_token;
            $client_id = '850065321278-2mpf2cht8p57ld2gg88jj0jmm8io318t.apps.googleusercontent.com';
            $client_secret = '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';

            $url = 'https://oauth2.googleapis.com/token';
            $data = array(
                'refresh_token' => $refresh_token,
                'client_id' => $client_id,
                'client_secret' => $client_secret,
                'grant_type' => 'refresh_token'
            );

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

            $response = curl_exec($ch);
            curl_close($ch);

            $tokens = json_decode($response, true);
            $access_token = $tokens['access_token'];

            $client = new Google_Client();
            $client->setAccessToken($access_token);
            // Create a new post
            $blogger = new Blogger($client);
            $post = new Post();
            $post->setTitle($new->title);
            $post->setContent($new->content);
            if($blogger->posts->insert($blog, $post)) {
                return true;
            }
            return false;
        }
    }
}
