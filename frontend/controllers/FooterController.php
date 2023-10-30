<?php

namespace frontend\controllers;

use frontend\controllers\MainController;

class FooterController extends MainController {

    public function actionPrivacy() {
        return $this->render('privacy');
    }

    public function actionRules() {
        return $this->render('rules');
    }

    public function actionIntroduce() {
        return $this->render('introduce');
    }
}

?>