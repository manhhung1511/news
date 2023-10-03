<?php

namespace frontend\controllers;

use Yii;
use common\helper\Tools;
use common\models\Category;
use common\models\CategoryMedicine;
use common\models\Hospital;
use common\models\Medicine;
use common\models\News;
use common\models\Province;
use common\models\Sick;
use frontend\controllers\MainController;
/**
 * Ajax controller
 */
class AjaxController extends MainController
{
    public function actionCategory() {
        if(Yii::$app->request->isAjax) {
            $offset = Yii::$app->request->post()['offset'];
            $name_category = trim(Yii::$app->request->post()['name_category']);
            $news = News::find()->where(['category' => $name_category, 'status'=> 1, 'category_child' => ''])->offset($offset)->orderBy(['created_at' => SORT_ASC])->limit(3)->all();
            if(!$news) {
                $news = News::find()->where(['category_child' => Tools::create_slug($name_category), 'status'=> 1])->offset($offset)->orderBy(['created_at' => SORT_ASC])->limit(3)->all();
            }
            return $this->renderAjax('category', [
                'news' => $news
            ]);
        }
    }


    public function actionMedicine() {
        if(Yii::$app->request->isAjax) {
            $offset = Yii::$app->request->post()['offset'];
            $name_category = Yii::$app->request->post()['name_category'];
            $medicine = Medicine::find()->where(['category' => $name_category])->offset($offset)->limit(20)->all();
            return $this->renderAjax('medicine', [
                'medicine' => $medicine
            ]);
        }
    }

    public function actionHospital() {
        if(Yii::$app->request->isAjax) {
            $offset = Yii::$app->request->post()['offset'];
            $name_category = Yii::$app->request->post()['name_category'];
            $hospital = Hospital::find()->where(['slug_category' => Tools::create_slug($name_category), 'type' => '1'])->offset($offset)->limit(32)->all();
            return $this->renderAjax('hospital', [
                'hospital' => $hospital
            ]);
        }
    }

    public function actionDrugstore() {
        if(Yii::$app->request->isAjax) {
            $offset = Yii::$app->request->post()['offset'];
            $name_category = Yii::$app->request->post()['name_category'];
            $drugstore = Hospital::find()->where(['slug_category' => Tools::create_slug($name_category), 'type' => '2'])->offset($offset)->limit(20)->all();
            return $this->renderAjax('drugstore', [
                'drugstore' => $drugstore
            ]);
        }
    }
}