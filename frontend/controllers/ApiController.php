<?php

namespace frontend\controllers;

use common\models\Category;
use Yii;
use yii\web\Controller;
use common\models\News;
use common\models\CategoryMedicine;
use common\models\Province;
use common\models\Hospital;
use yii\web\Response;

class ApiController extends Controller
{
    public function actionProvince() {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $medicine = new Hospital();
        $medicine->name = Yii::$app->request->post()['name'];
        $medicine->img = Yii::$app->request->post()['img'];
        $medicine->description = Yii::$app->request->post()['description'];
        $medicine->type = Yii::$app->request->post()['type'];
        $medicine->slug = Yii::$app->request->post()['slug'];
        $medicine->slug_category = Yii::$app->request->post()['slug_category'];
        $medicine->branch = Yii::$app->request->post()['branch'];
        $medicine->address = Yii::$app->request->post()['address'];
        $medicine->content = Yii::$app->request->post()['content'];
        $medicine->created_at =date('Y-m-d H:i:s');
        $medicine->updated_at =date('Y-m-d H:i:s');
        
        if($medicine->save()) {
            return true;
        } else {
            return false;
        }
    }
}