<?php

/** @var \yii\web\View $this */
/** @var string $content */

use frontend\assets\AppAsset;

AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>

    <?php $this->head() ?>
</head>

<?= $this->render('header'); ?>

<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>
<main role="main" class="flex-shrink-0">
        <?= $content ?>
</main>

<footer
          id="footer-container"
          class="jl_footer_act enable_footer_columns_dark"
        >
          <div class="footer-columns">
            <div class="container">
              <div class="row">
                <div class="col-md-6">
                  <div
                    id="sprasa_about_us_widget-2"
                    class="widget jellywp_about_us_widget"
                  >
                    <div class="widget_jl_wrapper about_widget_content">
                      <div class="jellywp_about_us_widget_wrapper">
                        <img
                          class="footer_logo_about"
                          src="img/logo_w.png"
                          alt=""
                        />
                        <p>
                        Báo tiếng Việt nhiều người xem nhất
                        </p>
                        <div class="social_icons_widget">
                          <ul
                            class="social-icons-list-widget icons_about_widget_display"
                          ></ul>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div
                    id="sprasa_about_us_widget-4"
                    class="widget jellywp_about_us_widget"
                  >
                    <div class="widget_jl_wrapper about_widget_content">
                      <div class="jellywp_about_us_widget_wrapper">
                       
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div
                    id="sprasa_recent_post_text_widget-8"
                    class="widget post_list_widget"
                  >
                    <div class="widget_jl_wrapper">
                      <div class="ettitle">
                        <div class="widget-title">
                          <h2 class="jl_title_c">Liên hệ với chúng tôi</h2>
                        </div>
                      </div>
                      <div class="social_icons_widget">
                          <ul
                            class="social-icons-list-widget icons_about_widget_display"
                          >
                            <li>
                              <a href="#" class="facebook" target="_blank"
                                ><i class="jli-facebook"></i
                              ></a>
                            </li>
                            <li>
                              <a href="#" class="behance" target="_blank"
                                ><i class="jli-behance"></i
                              ></a>
                            </li>
                            <li>
                              <a href="#" class="telegram" target="_blank"
                                ><i class="jli-telegram"></i
                              ></a>
                            </li>
                            <li>
                              <a href="#" class="vimeo" target="_blank"
                                ><i class="jli-vimeo"></i
                              ></a>
                            </li>
                            <li>
                              <a href="#" class="youtube" target="_blank"
                                ><i class="jli-youtube"></i
                              ></a>
                            </li>
                            <li>
                              <a href="#" class="tumblr" target="_blank"
                                ><i class="jli-tumblr"></i
                              ></a>
                            </li>
                            <li>
                              <a href="#" class="instagram" target="_blank"
                                ><i class="jli-instagram"></i
                              ></a>
                            </li>
                            <li>
                              <a href="#" class="linkedin" target="_blank"
                                ><i class="jli-linkedin"></i
                              ></a>
                            </li>
                            <li>
                              <a href="#" class="pinterest" target="_blank"
                                ><i class="jli-pinterest"></i
                              ></a>
                            </li>
                            <li>
                              <a href="#" class="twitter" target="_blank"
                                ><i class="jli-twitter"></i
                              ></a>
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
                  © 1997-2023. Toàn bộ bản quyền thuộc VnExpress
                  </div>
                </div>
              </div>
            </div>
          </div>
        </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
