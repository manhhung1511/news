<?php

namespace backend\controllers;

use common\models\Category;
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
                        'actions' => ['index','create'],
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
                'pageSize' => 10
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
    
    public function actionCreate($id = false, $name = false, $category_child = false)
    {
        $model = new Category();
        if (Yii::$app->request->isAjax && Yii::$app->request->post()) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        
            if(!$id) {
                $model->name = Yii::$app->request->post()['Category']['name'];
                $model->category_child= explode(",",Yii::$app->request->post()['Category']['category_child']);
                $model->slug = self::Slug(Yii::$app->request->post()['Category']['name']);
                $model->created_at = date('Y-m-d H:i:s');
                $model->updated_at = date('Y-m-d H:i:s');
                $done = $model->save();
            } else {
                $category = Category::findOne(['_id' => new ObjectId($id)]);
                $category->name = Yii::$app->request->post()['Category']['name'];
                $model->slug = self::Slug(Yii::$app->request->post()['Category']['name']);
                $category->category_child= explode(",",Yii::$app->request->post()['Category']['category_child']);
                $category->updated_at = date('Y-m-d H:i:s');
                $done = $category->save();
            }
            if (!$model->validate()) {
                return [
                    'error_code' => 1,
                    'message' => $model->getErrors()
                ];
            }
    
            if ($done) {
                return [
                    'error_code' => 0
                ];
            }
        }
        return $this->renderAjax('create', [
            'model' => $model,
            'name' => $name,
            'id' => $id,
            'category_child' => $category_child
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
