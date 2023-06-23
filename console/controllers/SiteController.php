<?php
namespace console\controllers;

use common\models\User;
use yii\console\Controller;

class SiteController extends Controller {
    public function actionIndex() {
        $a = User::findOne(['username' => 'content1']);
        $a->status = 10;
        $a->save();

        $b = User::findOne(['username' => 'content2']);
        $b->status = 10;
        $b->save();
        $c = User::findOne(['username' => 'content3']);
        $c->status = 10;
        $c->save();
        $d = User::findOne(['username' => 'content4']);
        $d->status = 10;
        $d->save();
    }
}

?>