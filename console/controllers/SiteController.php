<?php
namespace console\controllers;

use common\models\User;
use yii\console\Controller;

class SiteController extends Controller {
    public function actionIndex() {
        $a = User::findOne(['username' => 'admin1']);
        $a->status = 10;
        $a->save();
    }
}

?>