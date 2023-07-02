<?php
namespace console\controllers;

use common\models\Category;
use common\models\User;
use yii\console\Controller;
use yii\web\Request;

class SiteController extends Controller {
    public function actionIndex() {
        $update = Category::find()->all();
        foreach($update as $item) {
            $item->status = 1;
            $item->save();
        }
    }
}
?>