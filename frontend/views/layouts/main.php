<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\helper\Tools;
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
  <meta name="robots" content="index, follow">
  <meta name="title" content="<?= $this->title ?>">
  <meta name="description" content="<?=isset(Yii::$app->params['description']) ? Yii::$app->params['description'] :(isset(Yii::$app->params['category']) ? Yii::$app->params['category'] :'Tận tâm chăm sóc sức khỏe, Thông tin sức khỏe, dinh dưỡng, hỗ trợ tư vấn điều trị bệnh, thông tin thuốc, chăm sóc làm đẹp tin cậy cho người Việt')?>">
  <meta name="google-site-verification" content="_ZUx7P0qUS7RGBkYQZ9UfLTX9ADw3Gmy9TbBHO1_GKQ" />
  <link rel="canonical" href="<?= $currentUrl ?>" />
  <?php $this->registerCsrfMetaTags() ?>
  <title><?= Html::encode($this->title) ?></title>
  <link rel="icon" type="image/png" href="/img/logo2.png">
  <?php $this->head() ?>

  <script type="application/ld+json">
    {
      "@context": "https://schema.org/",
      "@type": "WebSite",
      "name": "songxanh24h",
      "url": "https://songxanh24h.vn/",
      "potentialAction": {
        "@type": "SearchAction",
        "target": "https://songxanh24h.vn/{search_term_string}",
        "query-input": "required name=search_term_string"
      }
    }
</script>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-K4QN75X9');</script>
<!-- End Google Tag Manager -->

</head>

<?= $this->render('header'); ?>

<body class="d-flex flex-column h-100 mobile_nav_class jl-has-sidebar">
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
                  <?php foreach ($item->category_child as $item_child) : ?>
                    <li class="menu-item">
                      <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/category-child','parent'=>create_slug($item['name']),'slug'=>create_slug($item_child)]) ?>"><?= $item_child ?><span class="border-menu"></span></a>
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
      <div
              id="sprasa_recent_post_text_widget-11"
              class="widget post_list_widget"
            >
              <div class="widget_jl_wrapper">
                <div class="ettitle">
                  <div class="widget-title">
                    <h2 class="jl_title_c">Được xem nhiều</h2>
                  </div>
                </div>
                <div class="bt_post_widget">
                  <?php if(isset(Yii::$app->view->params['views']) && Yii::$app->view->params['views']): ?>
                  <?php foreach(Yii::$app->view->params['views'] as $item): ?>
    
                    <div class="jl_m_right jl_sm_list jl_ml jl_clear_at">
                    <div class="jl_m_right_w">
                      <div class="jl_m_right_img jl_radus_e">
                        <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/detail', 'slug'=>create_slug($item->title)]) ?>"
                          ><img
                            width="120"
                            height="120"
                            src="<?= str_contains($item->image, 'http') ? $item->image : 'https://storage.songxanh24h.vn/images'.$item->image ?>"
                            class="attachment-sprasa_small_feature size-sprasa_small_feature wp-post-image"
                            alt="<?= $item->title ?>"
                            loading="lazy"
                        /></a>
                      </div>
                      <div class="jl_m_right_content">
                        <h2 class="entry-title">
                          <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/detail', 'slug'=>create_slug($item->title)]) ?>" tabindex="-1"
                            ><?= Tools::subTitle($item->title) ?></a
                          >
                        </h2>
                      </div>
                    </div>
                  </div>
                  <?php endforeach; ?>
                  <?php endif; ?>
                </div>
              </div>
            </div>
    </div>
  </div>
  <footer id="footer-container" class="jl_footer_act enable_footer_columns_dark">
    <div class="footer-columns">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div id="sprasa_about_us_widget-2" class="widget jellywp_about_us_widget">
              <div class="widget_jl_wrapper about_widget_content">
                <div class="jellywp_about_us_widget_wrapper">
                  <img width="200px" height="45px" class="footer_logo_about" src="/img/logo1.png" alt="logo" />
                  <p class="mt-1">
                     Songxanh24h.com - Tận tâm chăm sóc sức khỏe 
                  </p>
                  <p class="mt-1">
                     Email: bientap@songxanh24.com
                   </p>
                   <p class="mt-1">
                      Số điện thoại: 0987283077 
                   </p>
                    <p class="mt-1">
                      Địa chỉ: Trần Hữu Dực, Nam Từ Liêm, Hà Nội
                    </p>
                     <p class="mt-1">
                      Thông tin trên website này chỉ mang tính chất tham khảo, website đang chạy thử nghiệm chờ cấp phép
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
          <div class="col-md-4">
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
                      <a href="#" class="youtube" target="_blank"><i class="jli-youtube"></i></a>
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
