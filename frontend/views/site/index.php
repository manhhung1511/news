<?php
use common\helper\Tools;
    $this->title = 'Songxanh24h - Sức khỏe, dinh dưỡng, làm đẹp, bệnh, thuốc tin cậy';

    $this->registerMetaTag([ 'name' => 'keywords', 'content' => 'Songxanh24h - Sức khỏe, dinh dưỡng, làm đẹp, bệnh, thuốc tin cậy', ]);
    $this->registerMetaTag([
        'name' => 'description',
        'content' => 'Tận tâm chăm sóc sức khỏe, Thông tin sức khỏe, dinh dưỡng, hỗ trợ tư vấn điều trị bệnh, thông tin thuốc, chăm sóc làm đẹp tin cậy cho người Việt'
    ], 'description');
?>

<style>

</style>
<div class="jl_home_bw">
    <section class="home_section1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="jl_mright_wrapper jl_clear_at">
                        <div class="jl_mix_post">
                            <div class="jl_m_center blog-style-one blog-small-grid">
                                <div class="jl_m_center_w jl_radus_e">
                                    <div class="jl_f_img_bg" style="
                              background-image: url('<?= str_contains($news[count($news) - 1 ]->image, 'http') ? $news[count($news) - 1 ]->image : 'https://storage.songxanh24h.vn/images'.$news[count($news) - 1 ]->image ?>');
                            " title="<?= $news[count($news) - 1 ]->title ?>" alt="<?= $news[count($news) - 1 ]->title ?>"></div>
                                    <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/detail', 'slug' => Tools::create_slug($news[count($news) - 1 ]->title)]) ?>" class="jl_f_img_link"></a>
                                </div>
                                <div class="title-main">
                                        <h3 class="short_text_white">
                                            <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/detail', 'slug' => Tools::create_slug($news[count($news) - 1 ]->title)]) ?>"><?= $news[count($news) - 1 ]->title ?></a>
                                        </h3>
                                </div>
                            </div>
                            <?php if(isset($new4) && $new4): ?>
                                <?php foreach($new4 as $key => $value): ?>
                                    <?php if($key === 0 ):?>
                                        <?php continue; ?>
                                    <?php endif; ?>
                                    <div class="jl_m_right">
                                <div class="jl_m_right_w"> 
                                    <div class="jl_m_right_img jl_radus_e">
                                        <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/detail','slug'=>Tools::create_slug($value->title)]) ?>"><img width="120" height="120" src="<?= str_contains($value->image, 'http') ? $value->image : 'https://storage.songxanh24h.vn/images'.$value->image ?>" class="attachment-sprasa_small_feature size-sprasa_small_feature wp-post-image" alt="<?= $value->title ?>" title="<?= $value->title ?>" loading="lazy" /></a>
                                    </div>
                                    <div class="jl_m_right_content">
                                        <h3 class="entry-title">
                                            <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/detail','slug'=>Tools::create_slug($value->title)]) ?>"><?= Tools::subTitle($value->title) ?></a>
                                        </h3>
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
    </section>
    <section class="home_section2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="blockid_72be465" class="block-section jl-main-block" data-blockid="blockid_72be465" data-name="jl_mgrid" data-page_max="11" data-page_current="1" data-author="none" data-order="date_post" data-posts_per_page="6" data-offset="5">
                        <div class="jl_grid_wrap_f jl_clear_at g_3col">
                            <div class="jl-roww content-inner jl-col3 jl-col-row">
                                <div class="jl_sec_title">
                                    <h3 class="jl_title_c">
                                        <a href="https://songxanh24h.vn/category/benh/<?=$category[0]->slug?>"> 
                                            <span><?= $category[0]->name ?></span>
                                        </a>
                                    </h3>
                                </div>
                                <?php if(isset($news_category3) && $news_category3): ?>
                                <?php foreach($news_category3 as $value): ?>
                                <div class="jl-grid-cols">
                                    <div class="p-wraper post-2959">
                                        <div class="jl_grid_w">
                                            <div class="jl_img_box jl_radus_e">
                                                <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/detail','slug'=>Tools::create_slug($value->title)]) ?>">
                                                    <img width="500" height="350" src="<?= str_contains($value->image, 'http') ? $value->image : 'https://storage.songxanh24h.vn/images'.$value->image ?>" class="attachment-sprasa_slider_grid_small size-sprasa_slider_grid_small wp-post-image" alt="<?= $value->title ?>" title="<?= $value->title ?>" loading="lazy" /></a>
                                            </div>
                                            <div class="text-box">
                                                <h3>
                                                    <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/detail','slug'=>Tools::create_slug($value->title)]) ?>"><?= Tools::subTitle($value->title)?></a>
                                                </h3>
                                                <p class="short_text">
                                                    <?= Tools::subWord( ($value->content))?>
                                                </p>
                                            </div>
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
        </div>
    </section>
    <section class="home_section3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="jl_sec_title">
                        <h3 class="jl_title_c">
                            <a href="https://songxanh24h.vn/category/benh/<?=$category[1]->slug?>"> 
                                <span><?= $category[1]->name ?></span>
                            </a>
                        </h3>
                    </div>
                    <?php if(isset($news_category5) && $news_category5): ?>
                    <div class="jl_mg_wrapper jl_clear_at">
                        <div class="jl_mg_post jl_clear_at">
                            <div class="jl_mg_main">
                                <div class="jl_mg_main_w">
                                    <div class="jl_img_box jl_radus_e">
                                        <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/detail','slug'=>Tools::create_slug($news_category5[0]->title)]) ?>"><img width="1000" height="500" src="<?= str_contains($news_category5[0]->image, 'http') ? $news_category5[0]->image : 'https://storage.songxanh24h.vn/images'.$news_category5[0]->image ?>" class="attachment-sprasa_feature_large size-sprasa_feature_large wp-post-image" alt="<?= $news_category5[0]->title ?>" title="<?= $news_category5[0]->title ?>" loading="lazy" /></a>
                                    </div>
                                    <div class="text-box">
                                        <h3 class="entry-title">
                                            <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/detail','slug'=>Tools::create_slug($news_category5[0]->title)]) ?>" tabindex="-1"><?=Tools::subTitle($news_category5[0]->title) ?></a>
                                        </h3>
                                        <p class="short_text">
                                             <?= Tools::subWord(strip_tags($news_category5[0]->content)) ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <?php foreach($news_category5 as $key => $item): ?>
                                <?php if($key === 0) continue; ?>
                                <div class="jl_mg_sm">
                                    <div class="jl_mg_sm_w">
                                        <div class="jl_f_img jl_radus_e">
                                            <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/detail', 'slug'=>Tools::create_slug($item->title)]) ?>"><img width="1000" height="169" src="<?= str_contains($item->image, 'http') ? $item->image : 'https://storage.songxanh24h.vn/images'.$item->image ?>" class="attachment-sprasa_feature_large size-sprasa_feature_large wp-post-image" alt="<?= $item->title; ?>" title="<?= $item->title; ?>" loading="lazy" /></a>
                                        </div>
                                        <div class="jl_mg_content">
                                            <h3 class="entry-title">
                                                <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/detail', 'slug'=>Tools::create_slug($item->title)]) ?>"><?= Tools::subWord( $item->title )?></a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <section class="home_section4">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="blockid_3f9d058" class="block-section jl-main-block">
                        <div class="jl_grid_wrap_f jl_clear_at g_4col">
                            <div class="jl-roww content-inner jl-col3 jl-col-row">
                                <div class="jl_sec_title">
                                    <h3 class="jl_title_c">
                                        <a href="https://songxanh24h.vn/category/benh/<?=$category[2]->slug?>"> 
                                            <span><?= $category[2]->name ?></span>
                                        </a>
                                    </h3>
                                </div>
                                <?php if(isset($news_category2) && $news_category2): ?>
                                    <?php foreach($news_category2 as $item): ?>
                                        <div class="jl-grid-cols">
                                            <div class="p-wraper post-2691">
                                                <div class="jl_grid_w">
                                                    <div class="jl_img_box jl_radus_e">
                                                        <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/detail', 'slug'=>Tools::create_slug($item->title)]) ?>"><img width="500" height="350" src="<?= str_contains($item->image, 'http') ? $item->image : 'https://storage.songxanh24h.vn/images'.$item->image ?>" class="attachment-sprasa_slider_grid_small size-sprasa_slider_grid_small wp-post-image mobile-img" alt="<?= $item->title ?>" title="<?= $item->title ?>" loading="lazy" /></a>
                                                    </div>
                                                    <div class="text-box">
                                                        <h3>
                                                            <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/detail', 'slug'=>Tools::create_slug($item->title)]) ?>"><?= Tools::subTitle( $item->title ) ?></a>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="home_section2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="blockid_72be465" class="block-section jl-main-block" data-blockid="blockid_72be465" data-name="jl_mgrid" data-page_max="11" data-page_current="1" data-author="none" data-order="date_post" data-posts_per_page="6" data-offset="5">
                        <div class="jl_grid_wrap_f jl_clear_at g_3col">
                            <div class="jl-roww content-inner jl-col3 jl-col-row">
                                <div class="jl_sec_title">
                                    <h1 class="jl_title_c">
                                        <span>Xem nhiều trong tuần</span>
                                    </h1>
                                </div>
                                <?php if(isset($views) && $views): ?>
                                    <?php foreach($views as $key => $value): ?>
                                <div class="jl-grid-cols">
                                    <div class="p-wraper post-2959">
                                        <div class="jl_grid_w">
                                            <div class="jl_img_box jl_radus_e">
                                                <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/detail','slug'=>Tools::create_slug($value->title)]) ?>">
                                                    <img width="500" height="350" src="<?= str_contains($value->image, 'http') ? $value->image : 'https://storage.songxanh24h.vn/images'.$value->image ?>" class="attachment-sprasa_slider_grid_small size-sprasa_slider_grid_small wp-post-image" alt="<?= $value->title ?>" title="<?= $value->title ?>" loading="lazy" /></a>
                                            </div>
                                            <div class="text-box">
                                                <h3>
                                                    <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/detail','slug'=>Tools::create_slug($value->title)]) ?>"><?= Tools::subTitle($value->title) ?></a>
                                                </h3>
                                                <p class="short_text">
                                                     <?= Tools::subWord(strip_tags($value->content)) ?>
                                                </p>
                                            </div>
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
        </div>
    </section>
    <section class="home_section5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="blockid_84d79c5" class="block-section jl-main-block">
                        <div class="jl_grid_wrap_f jl_clear_at g_4col">
                            <div class="jl-roww content-inner jl-col3 jl-col-row">
                                <div class="jl_sec_title">
                                    <h2 class="jl_title_c"><span>Bài đăng gần đây</span></h2>
                                </div>
                                <?php if(isset($new8) && $new8): ?>
                                    <?php foreach($new8 as $item): ?>
                                        <?php if($key == 0) continue; ?>
                                        <div class="jl-grid-cols">
                                            <div class="p-wraper post-2691">
                                                <div class="jl_grid_w">
                                                    <div class="jl_img_box jl_radus_e">
                                                        <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/detail', 'slug'=>Tools::create_slug($item->title)]) ?>"><img width="500" height="350" src="<?= str_contains($item->image, 'http') ? $item->image : 'https://storage.songxanh24h.vn/images'.$item->image ?>" class="attachment-sprasa_slider_grid_small size-sprasa_slider_grid_small wp-post-image mobile-img" alt="<?= $item->title ?>" title="<?= $item->title ?>" loading="lazy" /></a>
                                                    </div>
                                                    <div class="text-box">
                                                        <h3>
                                                            <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/detail', 'slug'=>Tools::create_slug($item->title)]) ?>"><?= Tools::subTitle( $item->title ) ?></a>
                                                        </h3>
                                                    </div>
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
        </div>
    </section>
  
    <!-- <section class="home_section7">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="blockid_84d79c5" class="block-section jl-main-block">
                        <div class="jl_grid_wrap_f jl_sf_grid jl_clear_at">
                            <div class="jl-roww content-inner jl-col3 jl-col-row">
                                <div class="jl_sec_title">
                                    <h3 class="jl_title_c"><span>Bài đăng hôm nay</span></h3>
                                </div>
                                <?php if(isset($today) && $today): ?>
                                    <?php foreach($today as $item): ?>
                                    <div class="jl-grid-cols">
                                        <div class="p-wraper post-1614">
                                            <div class="jl_m_right jl_sm_list jl_ml jl_clear_at">
                                                <div class="jl_m_right_w">
                                                    <div class="jl_m_right_img jl_radus_e">
                                                        <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/detail', 'slug'=>Tools::create_slug($item->title)]) ?>"><img width="500" height="500" src="<?= 'https://storage.songxanh24h.vn/images'.$item->image ?>" class="attachment-sprasa_feature_small size-sprasa_feature_small wp-post-image" alt="<?= $item->title ?>" title="<?= $item->title ?>" loading="lazy" /></a>
                                                    </div>
                                                    <div class="jl_m_right_content">
                                                        <h2 class="entry-title">
                                                            <a class="short_text" href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/detail', 'slug'=>Tools::create_slug($item->title)]) ?>"><?= $item->title?></a>
                                                        </h2>
                                                        <p class="short_text">
                                                            <?= Tools::subWord(strip_tags($item->content)) ?>
                                                        </p>
                                                    </div>
                                                </div>
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
        </div>
    </section> -->
</div>


