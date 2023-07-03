<?php


function create_slug3($string)
{
    $search = array(
        '#(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)#',
        '#(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)#',
        '#(ì|í|ị|ỉ|ĩ)#',
        '#(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)#',
        '#(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)#',
        '#(ỳ|ý|ỵ|ỷ|ỹ)#',
        '#(đ)#',
        '#(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)#',
        '#(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)#',
        '#(Ì|Í|Ị|Ỉ|Ĩ)#',
        '#(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)#',
        '#(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)#',
        '#(Ỳ|Ý|Ỵ|Ỷ|Ỹ)#',
        '#(Đ)#',
        "/[^a-zA-Z0-9\-\_]/",
    );
    $replace = array(
        'a',
        'e',
        'i',
        'o',
        'u',
        'y',
        'd',
        'A',
        'E',
        'I',
        'O',
        'U',
        'Y',
        'D',
        '-',
    );
    $string = preg_replace($search, $replace, $string);
    $string = preg_replace('/(-)+/', '-', $string);
    $string = strtolower($string);
    return $string;
    }
    $this->title = 'SongXanh24h';

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
                              background-image: url('<?= str_contains($news[count($news) - 1 ]->image, 'http') ? $news[count($news) - 1 ]->image : 'https://storage.songxanh24h.vn/images/'.$news[count($news) - 1 ]->image ?>');
                            " title="<?= $news[count($news) - 1 ]->title ?>" alt="<?= $news[count($news) - 1 ]->title ?>"></div>
                                    <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/detail', 'slug'=>create_slug3($news[count($news) - 1 ]->title)]) ?>" class="jl_f_img_link"></a>
                                    <span class="jl_post_type_icon"><i class="jli-gallery"></i></span>
                                    <div class="text-box">
                                        <span class="jl_f_cat"><a class="post-category-color-text" style="background: #eba845" href="#"><?= $news[count($news) - 1 ]->category ?></a></span>
                                        <h3 class="short_text_white">
                                            <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/detail', 'slug'=>create_slug3($news[count($news) - 1 ]->title)]) ?>"><?= $news[count($news) - 1 ]->title ?></a>
                                        </h3>
                                        <span class="jl_post_meta">
                                            <span class="jl_author_img_w"><i class="jli-user"></i><a href="#" title="<?= $news[count($news) - 1 ]->author ?>" rel="author"><?= $news[count($news) - 1 ]->author ?></a></span><span class="post-date"><i class="jli-pen"></i><?= DateTime::createFromFormat('Y-m-d H:i:s',$news[count($news)-1]->created_at)->format('d/m/Y') ?></span><span class="post-read-time"><i class="jli-watch-2"></i>2 Mins read</span></span>
                                    </div>
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
                                        <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/detail','slug'=>create_slug3($value->title)]) ?>"><img width="120" height="120" src="<?= str_contains($value->image, 'http') ? $value->image : Yii::$app->urlManagerBackend->baseUrl .'/'.$value->image ?>" class="attachment-sprasa_small_feature size-sprasa_small_feature wp-post-image" alt="<?= $value->title ?>" title="<?= $value->title ?>" loading="lazy" /></a>
                                    </div>
                                    <div class="jl_m_right_content">
                                        <span class="jl_f_cat"><a class="post-category-color-text" style="background: #91bd3a" href="#"><?=  $value->category?></a></span>
                                        <h3 class="entry-title short_text">
                                            <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/detail','slug'=>create_slug3($value->title)]) ?>"><?= $value->title ?></a>
                                        </h3>
                                        <span class="jl_post_meta">
                                            <span class="jl_author_img_w"><i class="jli-user"></i><a href="#" title="<?= $value->author?>" rel="author"><?= $value->author?></a></span><span class="post-date"><i class="jli-pen"></i><?= DateTime::createFromFormat('Y-m-d H:i:s',$news[count($news)-1]->created_at)->format('d/m/Y') ?></span></span>
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
                                        <span><?= $category[3]->name ?></span>
                                    </h3>
                                </div>
                                <?php if(isset($news_category3) && $news_category3): ?>
                                <?php foreach($news_category3 as $value): ?>
                                <div class="jl-grid-cols">
                                    <div class="p-wraper post-2959">
                                        <div class="jl_grid_w">
                                            <div class="jl_img_box jl_radus_e">
                                                <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/detail','slug'=>create_slug3($value->title)]) ?>">
                                                    <span class="jl_post_type_icon"><i class="jli-gallery"></i></span><img style="width: 550px; height: 358px; object-fit: cover;" width="500" height="350" src="<?= str_contains($value->image, 'http') ? $value->image : Yii::$app->urlManagerBackend->baseUrl .'/'.$value->image ?>" class="attachment-sprasa_slider_grid_small size-sprasa_slider_grid_small wp-post-image" alt="<?= $value->title ?>" title="<?= $value->title ?>" loading="lazy" /></a>
                                            </div>
                                            <div class="text-box">
                                                <h3>
                                                    <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/detail','slug'=>create_slug3($value->title)]) ?>"><?= $value->title ?></a>
                                                </h3>
                                                <span class="jl_post_meta">
                                                    <span class="jl_author_img_w"><i class="jli-user"></i><a href="#" title="<?= $value->author ?>" rel="author"><?= $value->author ?></a></span><span class="post-date"><i class="jli-pen"></i><?= DateTime::createFromFormat('Y-m-d H:i:s',$value->created_at)->format('d/m/Y') ?></span><span class="post-read-time"><i class="jli-watch-2"></i>2 Mins
                                                        read</span></span>
                                                <p class="short_text">
                                                    <?= strip_tags($value->content) ?>
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
                        <h3 class="jl_title_c"><?= $category[5]->name ?></h3>
                    </div>
                    <?php if(isset($news_category5) && $news_category5): ?>
                    <div class="jl_mg_wrapper jl_clear_at">
                        <div class="jl_mg_post jl_clear_at">
                            <div class="jl_mg_main">
                                <div class="jl_mg_main_w">
                                    <div class="jl_img_box jl_radus_e">
                                        <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/detail','slug'=>create_slug3($news_category5[0]->title)]) ?>"><img style="width: 550px; height: 358px; object-fit: cover;"width="1000" height="500" src="<?= str_contains($news_category5[0]->image, 'http') ? $news_category5[0]->image : Yii::$app->urlManagerBackend->baseUrl .'/'.$news_category5[0]->image ?>" class="attachment-sprasa_feature_large size-sprasa_feature_large wp-post-image" alt="<?= $news_category5[0]->title ?>" title="<?= $news_category5[0]->title ?>" loading="lazy" /></a>
                                    </div>
                                    <div class="text-box">
                                        <h3 class="entry-title">
                                            <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/detail','slug'=>create_slug3($news_category5[0]->title)]) ?>" tabindex="-1"><?= $news_category5[0]->title ?></a>
                                        </h3>
                                        <span class="jl_post_meta">
                                            <span class="jl_author_img_w"><i class="jli-user"></i><a href="#" title="<?= $news_category5[0]->author?>" rel="author"><?= $news_category5[0]->author?></a></span><span class="post-date"><i class="jli-pen"></i><?= DateTime::createFromFormat('Y-m-d H:i:s',$news_category5[0]->created_at)->format('d/m/Y') ?></span><span class="post-read-time"><i class="jli-watch-2"></i>2 Mins read</span></span>
                                        <p class="short_text">
                                             <?= $news_category5[0]->content ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <?php foreach($news_category5 as $key => $item): ?>
                                <?php if($key === 0) continue; ?>
                                <div class="jl_mg_sm">
                                    <div class="jl_mg_sm_w">
                                        <div class="jl_f_img jl_radus_e">
                                            <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/detail', 'slug'=>create_slug3($item->title)]) ?>"><img style="width: 255px; height: 166px; object-fit: cover;" width="1000" height="169" src="<?= str_contains($item->image, 'http') ? $item->image : Yii::$app->urlManagerBackend->baseUrl .'/'.$item->image ?>" class="attachment-sprasa_feature_large size-sprasa_feature_large wp-post-image" alt="<?= $item->title; ?>" title="<?= $item->title; ?>" loading="lazy" /></a>
                                        </div>
                                        <div class="jl_mg_content">
                                            <h3 class="entry-title">
                                                <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/detail', 'slug'=>create_slug3($item->title)]) ?>"><?= $item->title?></a>
                                            </h3>
                                            <span class="jl_post_meta">
                                                <span class="jl_author_img_w"><i class="jli-user"></i><a href="#" title="<?= $item->author?>" rel="author"><?= $item->author?></a></span><span class="post-date"><i class="jli-pen"></i><?= DateTime::createFromFormat('Y-m-d H:i:s',$item->created_at)->format('d/m/Y') ?></span></span>
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
                                        <span><?= $category[2]->name ?></span>
                                    </h3>
                                </div>
                                <?php if(isset($news_category2) && $news_category2): ?>
                                    <?php foreach($news_category2 as $item): ?>
                                        <div class="jl-grid-cols">
                                            <div class="p-wraper post-2691">
                                                <div class="jl_grid_w">
                                                    <div class="jl_img_box jl_radus_e">
                                                        <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/detail', 'slug'=>create_slug3($item->title)]) ?>"><img style="width: 255px; height: 179px; object-fit: cover;" width="500" height="350" src="<?= str_contains($item->image, 'http') ? $item->image : Yii::$app->urlManagerBackend->baseUrl .'/'.$item->image ?>" class="attachment-sprasa_slider_grid_small size-sprasa_slider_grid_small wp-post-image" alt="<?= $item->title ?>" title="<?= $item->title ?>" loading="lazy" /></a>
                                                    </div>
                                                    <div class="text-box">
                                                        <h3>
                                                            <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/detail', 'slug'=>create_slug3($item->title)]) ?>"><?= $item->title ?></a>
                                                        </h3>
                                                        <span class="jl_post_meta">
                                                            <span class="jl_author_img_w"><i class="jli-user"></i><a href="#" title="<?= $item->author ?>" rel="author"><?= $item->author ?></a></span><span class="post-date"><i class="jli-pen"></i><?= DateTime::createFromFormat('Y-m-d H:i:s',$item->created_at)->format('d/m/Y') ?></span><span class="post-read-time"><i class="jli-watch-2"></i>2 Mins
                                                                read</span></span>
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
    <section class="home_section5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="blockid_5ee403b" class="block-section jl-main-block">
                        <div class="jl_slide_wrap_f jl_clear_at">
                            <div class="jl-roww content-inner jl-col-none jl-col-row">
                                <div class="jl_sec_title">
                                    <h3 class="jl_title_c">
                                        <span>Xem nhiều trong tuần</span>
                                    </h3>
                                </div>
                                <div class="jl_ar_top">
                                    <div class="jl-w-slider jl_full_feature_w">
                                        <div class="jl-eb-slider jelly_loading_pro" data-arrows="true" data-play="true" data-effect="false" data-speed="500" data-autospeed="7000" data-loop="true" data-dots="true" data-swipe="true" data-items="1" data-xs-items="1" data-sm-items="1" data-md-items="1" data-lg-items="1" data-xl-items="1">
                                        <?php if(isset($views) && $views): ?>
                                        <?php  foreach($views as $view): ?>
                                        <div class="item-slide jl_radus_e">
                                                <div class="slide-inner">
                                                    <div class="jl_full_feature">
                                                        <div class="jl_f_img_bg" style="
                                        background-image: url('<?= str_contains($view->image, 'http') ? $view->image : Yii::$app->urlManagerBackend->baseUrl .'/'.$view->image?>');" title="<?= $view->title ?>" alt="<?= $view->title ?>"></div>
                                                        <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/detail', 'slug'=>create_slug3($view->title)]) ?>" class="jl_f_img_link"></a>
                                                        <div class="jl_f_postbox">
                                                            <span class="jl_f_cat"><a class="post-category-color-text" style="background: #4dcf8f" href="#"><?= $view->category?></a></span>
                                                            <h3 class="jl_f_title">
                                                                <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/detail', 'slug'=>create_slug3($view->title)]) ?>" tabindex="-1"><?= $view->title?></a>
                                                            </h3>
                                                            <span class="jl_post_meta"><span class="jl_author_img_w"><i class="jli-user"></i><a href="#" title="<?= $view->author?>" rel="author"><?= $view->author?></a></span><span class="post-date"><i class="jli-pen"></i><?= DateTime::createFromFormat('Y-m-d H:i:s',$view->created_at)->format('d/m/Y') ?></span><span class="post-read-time"><i class="jli-watch-2"></i>2 Mins
                                                                    read</span></span>
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
                                        <span>Bài đăng gần đây</span>
                                    </h3>
                                </div>
                                <?php if(isset($new8) && $new8): ?>
                                    <?php foreach($new8 as $key => $value): ?>
                                        <?php if($key == 0) continue; ?>
                                <div class="jl-grid-cols">
                                    <div class="p-wraper post-2959">
                                        <div class="jl_grid_w">
                                            <div class="jl_img_box jl_radus_e">
                                                <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/detail','slug'=>create_slug3($value->title)]) ?>">
                                                    <span class="jl_post_type_icon"><i class="jli-gallery"></i></span><img style="width: 550px; height: 358px; object-fit: cover;" width="500" height="350" src="<?= str_contains($value->image, 'http') ? $value->image : Yii::$app->urlManagerBackend->baseUrl .'/'.$value->image ?>" class="attachment-sprasa_slider_grid_small size-sprasa_slider_grid_small wp-post-image" alt="<?= $value->title ?>" title="<?= $value->title ?>" loading="lazy" /></a>
                                            </div>
                                            <div class="text-box">
                                                <h3>
                                                    <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/detail','slug'=>create_slug3($value->title)]) ?>"><?= $value->title ?></a>
                                                </h3>
                                                <span class="jl_post_meta">
                                                    <span class="jl_author_img_w"><i class="jli-user"></i><a href="#" title="<?= $value->author ?>" rel="author"><?= $value->author ?></a></span><span class="post-date"><i class="jli-pen"></i><?= DateTime::createFromFormat('Y-m-d H:i:s',$value->created_at)->format('d/m/Y') ?></span><span class="post-read-time"><i class="jli-watch-2"></i>2 Mins
                                                        read</span></span>
                                                <p class="short_text">
                                                     <?= strip_tags($value->content) ?>
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
    <section class="home_section7">
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
                                                        <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/detail', 'slug'=>create_slug3($item->title)]) ?>"><img width="500" height="500" src="<?= Yii::$app->urlManagerBackend->baseUrl .'/'.$item->image ?>" class="attachment-sprasa_feature_small size-sprasa_feature_small wp-post-image" alt="<?= $item->title ?>" title="<?= $item->title ?>" loading="lazy" /></a>
                                                    </div>
                                                    <div class="jl_m_right_content">
                                                        <span class="jl_f_cat"><a class="post-category-color-text" style="background: #eba845" href="#"><?= $item->category ?></a></span>
                                                        <h2 class="entry-title" meta-name="<?= $item->title ?>">
                                                            <a class="short_text" href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/detail', 'slug'=>create_slug3($item->title)]) ?>"><?= $item->title?></a>
                                                        </h2>
                                                        <span class="jl_post_meta">
                                                            <span class="jl_author_img_w"><i class="jli-user"></i><a href="#" title="Posts by Spraya" rel="author"></a></span><span class="post-date"><i class="jli-pen"></i><?= DateTime::createFromFormat('Y-m-d H:i:s',$item->created_at)->format('d/m/Y') ?></span><span class="post-read-time"><i class="jli-watch-2"></i>3 Mins
                                                                read</span></span>
                                                        <p meta-name="<?= strip_tags($item->content) ?>" class="short_text">
                                                            <?= strip_tags($item->content) ?>
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
    </section>
</div>