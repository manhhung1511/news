<?php

/** @var \yii\web\View $this */
/** @var string $content */

use yii\helpers\Html;
use frontend\assets\AppAsset;
use yii\helpers\Url;
AppAsset::register($this);

$currentUrl = Url::current([], true);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
  <meta charset="<?= Yii::$app->charset ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="robots" content="noindex"/>
  <meta name="title" content="<?= $this->title ?>">
  <meta name="description" content="<?=isset(Yii::$app->params['description']) ? Yii::$app->params['description'] :''?>">
  <link rel="canonical" href="<?= $currentUrl ?>" />
  <?php $this->registerCsrfMetaTags() ?>
  <title><?= Html::encode($this->title) ?></title>
  <link rel="icon" type="image/png" href="/img/logo2.png">
  <?php $this->head() ?>
</head>

<?= $this->render('header'); ?>

<body class="d-flex flex-column h-100">
  <?php $this->beginBody() ?>
  <main role="main" class="flex-shrink-0">
    <?= $content ?>
  </main>
  <div class="mobile_menu_overlay"></div>
  <div id="content_nav" class="jl_mobile_nav_wrapper">
    <div id="nav" class="jl_mobile_nav_inner">
      <div class="menu_mobile_icons mobile_close_icons closed_menu">
        <span class="jl_close_wapper"><span class="jl_close_1"></span><span class="jl_close_2"></span></span>
      </div>
      <ul id="mobile_menu_slide" class="menu_moble_slide">

        <?php if (isset($this->params['paramName']) && $this->params['paramName']) : ?>
          <?php foreach ($this->params['paramName'] as $item) : ?>
            <?php if (isset($item->category_child[0]) && $item->category_child[0]) : ?>
              <li class="menu-item menu-item-has-children">
                <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/category','slug'=>create_slug($item['name'])]) ?>">
                  <?= $item->name ?> <span class="border-menu"></span>
                  <span class="jl_menu_lb" style="
                              background: #ffe500 !important;
                              color: red !important;
                            "><span class="jl_lb_ar" style="border-top: 3px solid #ffe500 !important"></span>Hot</span>
                </a>
                <ul class="sub-menu">
                  <?php foreach ($item->category_child as $item) : ?>
                    <li class="menu-item">
                      <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/category-child','slug'=>create_slug($item)]) ?>"><?= $item ?><span class="border-menu"></span></a>
                    </li>
                  <?php endforeach; ?>
                </ul>
              </li>
            <?php else : ?>
              <li class="menu-item current-menu-item current_page_item">
                <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/category', 'slug' => create_slug($item['name'])]) ?>"><?= $item->name ?><span class="border-menu"></span></a>
              </li>
            <?php endif; ?>
          <?php endforeach; ?>
        <?php endif; ?>

      </ul>
      <div id="sprasa_about_us_widget-3" class="widget jellywp_about_us_widget">
        <div class="widget_jl_wrapper about_widget_content">
          <div class="jellywp_about_us_widget_wrapper">
            <div class="social_icons_widget">
              <ul class="social-icons-list-widget icons_about_widget_display">
                <li>
                  <a href="#" class="facebook" target="_blank"><i class="jli-facebook"></i></a>
                </li>
                <li>
                  <a href="#" class="behance" target="_blank"><i class="jli-behance"></i></a>
                </li>
                <li>
                  <a href="#" class="vimeo" target="_blank"><i class="jli-vimeo"></i></a>
                </li>
                <li>
                  <a href="#" class="youtube" target="_blank"><i class="jli-youtube"></i></a>
                </li>
                <li>
                  <a href="#" class="instagram" target="_blank"><i class="jli-instagram"></i></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer id="footer-container" class="jl_footer_act enable_footer_columns_dark">
    <div class="footer-columns">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div id="sprasa_about_us_widget-2" class="widget jellywp_about_us_widget">
              <div class="widget_jl_wrapper about_widget_content">
                <div class="jellywp_about_us_widget_wrapper">
                  <img class="footer_logo_about" src="/img/logo1.png" alt="logo" />
                  <p>
                    Báo tiếng Việt nhiều người xem nhất
                  </p>
                  <div class="social_icons_widget">
                    <ul class="social-icons-list-widget icons_about_widget_display"></ul>
                  </div>
                </div>
              </div>
            </div>
            <div id="sprasa_about_us_widget-4" class="widget jellywp_about_us_widget">
              <div class="widget_jl_wrapper about_widget_content">
                <div class="jellywp_about_us_widget_wrapper">

                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div id="sprasa_recent_post_text_widget-8" class="widget post_list_widget">
              <div class="widget_jl_wrapper">
                <div class="ettitle">
                  <div class="widget-title">
                    <h2 class="jl_title_c">Liên hệ với chúng tôi</h2>
                  </div>
                </div>
                <div class="social_icons_widget">
                  <ul class="social-icons-list-widget icons_about_widget_display">
                    <li>
                      <a href="#" class="facebook" target="_blank"><i class="jli-facebook"></i></a>
                    </li>
                    <li>
                      <a href="#" class="behance" target="_blank"><i class="jli-behance"></i></a>
                    </li>
                    <li>
                      <a href="#" class="telegram" target="_blank"><i class="jli-telegram"></i></a>
                    </li>
                    <li>
                      <a href="#" class="vimeo" target="_blank"><i class="jli-vimeo"></i></a>
                    </li>
                    <li>
                      <a href="#" class="youtube" target="_blank"><i class="jli-youtube"></i></a>
                    </li>
                    <li>
                      <a href="#" class="tumblr" target="_blank"><i class="jli-tumblr"></i></a>
                    </li>
                    <li>
                      <a href="#" class="instagram" target="_blank"><i class="jli-instagram"></i></a>
                    </li>
                    <li>
                      <a href="#" class="linkedin" target="_blank"><i class="jli-linkedin"></i></a>
                    </li>
                    <li>
                      <a href="#" class="pinterest" target="_blank"><i class="jli-pinterest"></i></a>
                    </li>
                    <li>
                      <a href="#" class="twitter" target="_blank"><i class="jli-twitter"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom enable_footer_copyright_dark">
      <div class="container">
        <div class="row bottom_footer_menu_text">
          <div class="col-md-12">
            <div class="jl_ft_w">
              © 1997-2023. Toàn bộ bản quyền thuộc Songxanh24h.vn
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <div id="go-top">
    <a href="#go-top"><i class="jli-up-chevron"></i></a>
  </div>
  </div>
  </div>
  <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage();
