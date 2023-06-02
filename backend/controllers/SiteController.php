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
                        'actions' => ['login', 'error','signup'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index','create','update-status','update','delete'],
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

        if($status) $filters['status'] = (int) $status;
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
                'pageSize' => 10
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
        $list_category  = Category::find()->all();

        if($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->title = Yii::$app->request->post()['News']['title'];
            $model->category_id = Yii::$app->request->post()['News']['category'];
            $category = Category::findOne(['_id' => new ObjectId(Yii::$app->request->post()['News']['category'])]);
            $model->category = $category->name;
            $model->image = Yii::$app->request->post()['News']['image'];
            $model->content = Yii::$app->request->post()['News']['content'];
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

    public function actionUpdateStatus() {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        if (Yii::$app->request->isAjax && Yii::$app->request->get()) {
            $id = new ObjectId(Yii::$app->request->get()['id']);
            $model = News::findOne(['_id' => $id]);
            if ($model->status == 2) $status = 1;
            else $status = 2;
            $model->status = $status;
            $model->updated_at = date('Y-m-d H:i:s');
            if($model->save()) {
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
        $category_name =  $model->category_id;
        $list_category  = Category::find()->all();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                $model->title = Yii::$app->request->post()['News']['title'];
                $model->category_id = Yii::$app->request->post()['News']['category'];
                $category = Category::findOne(['_id' => new ObjectId(Yii::$app->request->post()['News']['category'])]);
                $model->category = $category->name;
                $model->image = Yii::$app->request->post()['News']['image'];
                $model->content = Yii::$app->request->post()['News']['content'];
                $model->updated_at = date('Y-m-d H:i:s');

            if ($model->save()) {
                Yii::$app->session->setFlash('success', Yii::t('app', 'Update successfully'));
                return $this->redirect(Yii::$app->urlManager->createAbsoluteUrl(['site/index']));
            }
        }
        return $this->render('update', [
            'model' => $model,
            'list_category' => $list_category,
            'category_name' => $category_name
        ]);
    }

    public function actionDelete($id)
    {
        $model = News::findOne($id);
        $model->delete();
    
        Yii::$app->session->setFlash('success', Yii::t('app', 'Deleted successfully'));
        return $this->redirect(Yii::$app->urlManager->createAbsoluteUrl(['site/index']));
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
}
