<?php

namespace frontend\controllers;

use common\models\Category;
use Yii;
use yii\web\Controller;
use common\models\News;
use common\models\CategoryMedicine;
use common\models\Province;
use common\models\Sick;
use yii\web\Response;

class ApiController extends Controller
{
    public function actionProvince() {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $medicine = new Province();
        $medicine->name = Yii::$app->request->post()['name'];
        $medicine->img = Yii::$app->request->post()['slug'];
        $medicine->number = Yii::$app->request->post()['number'];
        $medicine->created_at =date('Y-m-d H:i:s');
        $medicine->updated_at =date('Y-m-d H:i:s');
        
        if($medicine->save()) {
            return true;
        } else {
            return false;
        }
    }
}