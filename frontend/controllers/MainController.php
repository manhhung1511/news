<?php

namespace frontend\controllers;

use common\models\Category;
use Yii;
use yii\web\Controller;
use common\models\News;
use common\models\CategoryMedicine;
use common\models\Province;
use common\models\Sick;

class MainController extends Controller
{
    public function init() {
        parent::init();
        $category = Category::find()->where(['status' => 1])->limit(7)->all();
        $views = News::find()->where(['status' => 1])->andWhere(['>=','view', 1])->orderBy(['created_at' => SORT_ASC])->limit(4)->all();
        $medicine_category = CategoryMedicine::find()->limit(15)->all();
        $province = Province::find()->limit(15)->all();
        $sicks = Sick::find()->where(['type'=>'1'])->limit(16)->all();
        $drugs = Sick::find()->where(['type'=>'2'])->limit(16)->all();
        $active = Sick::find()->where(['type'=>'3'])->limit(15)->all();
        Yii::$app->view->params['medicine'] = $medicine_category;
        Yii::$app->view->params['paramName'] = $category;
        Yii::$app->view->params['views'] = $views;
        Yii::$app->view->params['province'] = $province;
        Yii::$app->view->params['sicks'] = $sicks;
        Yii::$app->view->params['drug'] = $drugs;
        Yii::$app->view->params['active'] = $active;


        $response = Yii::$app->response;
        // Check if the request returns a 404 status code
        if ($response->statusCode === 404) {
        // Redirect to the home page
            Yii::$app->getResponse()->redirect(Yii::$app->urlManager->createAbsoluteUrl('site/index'));
        }
    }
}

?>