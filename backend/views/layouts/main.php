<?php

/** @var \yii\web\View $this */
/** @var string $content */

use backend\assets\AppAsset;
use yii\bootstrap\Html;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color:#555;">
  <a class="navbar-brand text-white" href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/index']) ?>">ADMIN</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link text-white" href="<?= Yii::$app->urlManager->createAbsoluteUrl(['category/index']) ?>">Danh Mục</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/index']) ?>">Tin Tức</a>
      </li>
    </ul>
    <span class="navbar-text text-white">
       <?php
           if (Yii::$app->user->isGuest) {
            echo Html::tag('div',Html::a('Login',['/site/login'],['class' => ['btn btn-link login text-decoration-none text-white']]),['class' => ['d-flex']]);
        } else {
            echo Html::beginForm(['/site/logout'], 'post', ['class' => 'd-flex text-white'])
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout text-decoration-none text-white']
                )
                . Html::endForm();
        }
       ?>
    </span>
  </div>
</nav>
</header>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= $content ?>
    </div>
</main>

<footer class="footer mt-auto text-muted">
    <div class="container">
        <p class="float-start">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
    </div>
</footer>
  <!-- Modal -->
  <div class="viteex-modal">
      <div class="modal fade text-left" id="viteexModal" tabindex="-1" role="dialog" aria-labelledby="viteexModalLabel1" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
          </div>
        </div>
      </div>
    </div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();


