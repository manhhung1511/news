<?php

namespace backend\controllers;

use common\models\Category;
use common\models\News;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use MongoDb\BSON\ObjectId;

/**
 * Category controller
 */
class CategoryController extends Controller
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
                        'actions' => [],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['index','create','update'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ]
        ];
    }

    public function actionIndex()
    {
        $text_search = strip_tags(Yii::$app->request->get('text_search'));
        $list_category = new ActiveDataProvider([
            'query' => Category::find()
                ->andFilterWhere([
                    'or',
                    ['like', 'name', $text_search],
                    ['like', 'url', $text_search]
                ]),
            'sort' => ['defaultOrder' => ['_id' => SORT_DESC]],
            'pagination' => [
                'pageSize' => 20
            ]
        ]);
        
        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('_search', [
                'list_category' => $list_category
            ]);
        }

        return $this->render('index', [
            'list_category' => $list_category
        ]);
    }
    
    public function actionCreate()
    {
        $model = new Category();
        $list_category  = Category::find()->all();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->name = Yii::$app->request->post()['Category']['name'];
            $model->category_child = Yii::$app->request->post()['Category']['category_child'];
            $model->slug = self::Slug(Yii::$app->request->post()['Category']['name']);
            $model->status = $model::STATUS_ACTIVE;
            $model->created_at = date('Y-m-d H:i:s');
            $model->updated_at = date('Y-m-d H:i:s');

            $model->save();
                if((isset($model->category_child[0]) && $model->category_child[0])) {
                    foreach($model->category_child as $name) {
                        $category_convert = Category::findOne(['name' => $name]);
                        //update news
                        $news = News::findAll(['category' => $name]);
                        foreach($news as $new) {
                            $new->category_child = self::Slug($name);
                            $new->save();
                        }
                        $category_convert->status = $model::STATUS_CATEGORY_CHILD;
                        $category_convert->save();
                    }
                }
            return $this->redirect(Yii::$app->urlManager->createAbsoluteUrl(['category/index']));
        }
        return $this->render('create', [
            'model' => $model,
            'list_category' => $list_category
        ]);
    }

    public function actionUpdate($id) {
        $list_category  = Category::find()->all();
        $category = Category::findOne($id);

        if((isset($category->category_child[0]) && $category->category_child[0])) {
            foreach($category->category_child as $name) {

                $category_convert = Category::findOne(['name' => $name]);
                if($category_convert->status == $category::STATUS_CATEGORY_CHILD) {
                    $category_convert->status = $category::STATUS_ACTIVE;
                    $category_convert->save();
                }

                $news = News::findAll(['category' => $name]);
                foreach($news as $new) {
                    $new->category_child = '';
                    $new->save();
                }
            }
        }

        if ($category->load(Yii::$app->request->post()) && $category->validate()) {
        $category->name = Yii::$app->request->post()['Category']['name'];
        $category->slug = self::Slug(Yii::$app->request->post()['Category']['name']);
        $category->category_child = Yii::$app->request->post()['Category']['category_child'];
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        if((isset($category->category_child[0]) && $category->category_child[0])) {
            foreach($category->category_child as $name) {

                $category_convert = Category::findOne(['name' => $name]);
                if($category_convert->status == $category::STATUS_ACTIVE) {
                    $category_convert->status = $category::STATUS_CATEGORY_CHILD;
                    $category_convert->save();
                }

                $news = News::findAll(['category' => $name]);
                foreach($news as $new) {
                    $new->category_child = self::Slug($name);
                    $new->save();
                }
            }
        }

        return $this->redirect(Yii::$app->urlManager->createAbsoluteUrl(['category/index']));
    }
        return $this->render('update', [
            'list_category' => $list_category,
            'category' => $category,
        ]);
    }

    public function actionDelete($id)
    {
        $model = Category::findOne(['_id' => new ObjectId($id)]);
        $model->delete();
        
        Yii::$app->session->setFlash('success', Yii::t('app', 'Deleted successfully'));
        return $this->redirect(Yii::$app->urlManager->createAbsoluteUrl(['category/index']));
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
}
