<?php

namespace frontend\controllers;

use common\models\Category;
use Yii;
use yii\web\Controller;
use common\models\News;
use common\models\CategoryMedicine;
use common\models\Province;
use common\models\Hospital;
use common\models\Sick;
use yii\web\Response;

class ApiController extends Controller
{
    public function actionProvince() {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $medicine = new Sick();
        $medicine->name = Yii::$app->request->post()['name'];
        $medicine->slug = Yii::$app->request->post()['slug'];
        $medicine->content = Yii::$app->request->post()['content'];
        $medicine->alphabet = Yii::$app->request->post()['alphabet'];
        $medicine->type = Yii::$app->request->post()['type'];
        $medicine->created_at =date('Y-m-d H:i:s');
        $medicine->updated_at =date('Y-m-d H:i:s');
        
        if($medicine->save()) {
            return true;
        } else {
            return false;
        }
    }
}