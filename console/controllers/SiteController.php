<?php
namespace console\controllers;

use common\models\Category;
use common\models\User;
use Yii;
use yii\console\Controller;
use yii\web\Request;

class SiteController extends Controller {
    public function actionIndex() {
       $a  = Yii::getAlias('@app/web/img/');
       var_dump($a);
    }
}
?>