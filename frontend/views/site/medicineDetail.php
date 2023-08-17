<?php

function create_slug5($string)
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

?>

<section id="content_main" class="clearfix jl_spost">
    <div class="container">
        <div class="row main_content">
            <div class="col-md-8 loop-large-post" id="content">
                <div class="widget_container content_page">
                    <!-- start post -->
                    <div class="post-2838 post type-post status-publish format-standard has-post-thumbnail hentry category-sports tag-gaming" id="post-2838">
                        <div class="single_section_content box blog_large_post_style">
                            <div class="ml-5">
                                <div class="jl_single_style2">
                                    <div class="single_post_entry_content single_bellow_left_align jl_top_single_title jl_top_title_feature">
                                        <h1 class="single_post_title_main">
                                            <?= $detail->name ?>
                                        </h1>
                                    </div>
                                    <div class="single_content_header jl_single_feature_below">
                                    </div>
                                </div>
                                <div class="post_content_w">
                                    <div class="post_content jl_content">
                                        <?php foreach ($detail->content as $content) : ?>
                                            <img src="<?= $content['img'] ?>" />
                                            <div class="mt-3">
                                                <?= isset($content['value1']) && $content['value1'] ? $content['value1'] : '' ?>
                                            </div>
                                            <div class="mt-3">
                                                <?= isset($content['value2']) && $content['value2'] ? $content['value2'] : '' ?>
                                            </div>
                                            <div class="mt-3">
                                                <?= isset($content['value3']) && $content['value3'] ? $content['value3'] : '' ?>
                                            </div>
                                            <div class="mt-3">
                                                <?= isset($content['value4']) && $content['value4'] ? $content['value4'] : '' ?>
                                            </div>
                                            <div class="mt-3">
                                                <?= isset($content['value5']) && $content['value5'] ? $content['value5'] : '' ?>
                                            </div>
                                            <div class="mt-3">
                                                <?= isset($content['content6']) && $content['content6'] ? $content['content6'] : '' ?>
                                            </div>
                                            <h3 class="mt-3">
                                                <?= isset($content['content7']) && $content['content7'] ? $content['content7'] : '' ?>
                                            </h3>
                                            <div class="mt-3">
                                                <?= isset($content['content8']) && $content['content8'] ? $content['content8'] : '' ?>
                                            </div>
                                            <div class="mt-3">
                                                <?= isset($content['content9']) && $content['content9'] ? $content['content9'] : '' ?>
                                            </div>
                                            <div class="mt-3">
                                                <?= isset($content['content10']) && $content['content10'] ? $content['content10'] : '' ?>
                                            </div>
                                            <div class="mt-3">
                                                <?= isset($content['content11']) && $content['content11'] ? $content['content11'] : '' ?>
                                            </div>
                                            <div class="mt-3">
                                                <?= isset($content['content12']) && $content['content12'] ? $content['content12'] : '' ?>
                                            </div>
                                            <div class="mt-3">
                                                <?= isset($content['content13']) && $content['content13'] ? $content['content13'] : '' ?>
                                            </div>
                                            <div class="mt-3">
                                                <?= isset($content['content14']) && $content['content14'] ? $content['content14'] : '' ?>
                                            </div>
                                            <div class="mt-3">
                                                <?= isset($content['content15']) && $content['content15'] ? $content['content15'] : '' ?>
                                            </div>
                                            <div class="mt-3">
                                                <?= isset($content['content16']) && $content['content16'] ? $content['content16'] : '' ?>
                                            </div>
                                            <div class="mt-3">
                                                <?= isset($content['content17']) && $content['content17'] ? $content['content17'] : '' ?>
                                            </div>
                                            <div class="mt-3">
                                                <?= isset($content['content18']) && $content['content18'] ? $content['content18'] : '' ?>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>





                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <!-- end post -->
                        <div class="brack_space"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4" id="sidebar">
                <div class="jl_sidebar_w">
                    <div id="sprasa_recent_post_text_widget-9" class="widget post_list_widget">
                        <div class="widget_jl_wrapper">
                            <div class="ettitle">
                                <div class="widget-title">
                                    <h2 class="jl_title_c"><?= $detail->category?></h2>
                                </div>
                            </div>
                            <div class="bt_post_widget">
                              
                                    <?php foreach ($categories as $item) : ?>
                                        <div class="jl_m_right jl_sm_list jl_ml jl_clear_at">
                                            <div class="jl_m_right_w">
                                                <div class="jl_m_right_img jl_radus_e">
                                                    <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/medicine-detail', 'slug' => $item->slug ]) ?>"><img width="120" height="120" src="<?= $item->img ?>" class="attachment-sprasa_small_feature size-sprasa_small_feature wp-post-image" alt="<?= $item->name ?>" loading="lazy" /></a>
                                                </div>
                                                <div class="jl_m_right_content">
                                                    <h2 class="entry-title">
                                                        <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/medicine-detail', 'slug' => $item->slug]) ?>" tabindex="-1"><?= $item->name ?></a>
                                                    </h2>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
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