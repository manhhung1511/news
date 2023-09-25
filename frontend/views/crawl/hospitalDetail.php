<?php

use common\helper\Tools;

$title = $detail->name.'dịch vụ tốt nhất với chi phí hợp lý | Songxanh24h.vn';
$this->title = $title;

$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Songxanh24h hỗ trợ tìm kiếm tất cả các bệnh viện, trung tâm y tế, phòng khám bệnh, trung tâm thẩm mỹ tại '.$detail->name
], 'description');
?>
<style>
.col-location {
    margin-left: 20px;
}
.note_box {
    display: flex;
}
</style>
<section id="content_main" class="clearfix jl_spost">
    <div class="container">
        <div class="row main_content">
            <div class="col-md-8 loop-large-post" id="content">
                <div class="widget_container content_page">
                    <!-- start post -->
                    <div class="post-2838 post type-post status-publish format-standard has-post-thumbnail hentry category-sports tag-gaming" id="post-2838">
                        <div class="single_section_content box blog_large_post_style">
                            <div class="ml-5">
                                <div class="post_content_w">
                                    <div class="post_content jl_content">
                                        <?php foreach ($detail->content as $content) : ?>
                                            <?= (!is_array($content))? $content : ''?>
                                            <div class="mt-3">
                                                <?= isset($content['content0']) && $content['content0'] ? $content['content0'] : '' ?>
                                            </div>
                                            <div class="mt-3">
                                                <?= isset($content['content1']) && $content['content1'] ? $content['content1'] : '' ?>
                                            </div>
                                            <div class="mt-3">
                                                <?= isset($content['content2']) && $content['content2'] ? $content['content2'] : '' ?>
                                            </div>

                                            <div class="mt-3">
                                                <?= isset($content['content3']) && $content['content3'] ? $content['content3'] : '' ?>
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
                                    <h2 class="jl_title_c"><?= $detail->address?></h2>
                                </div>
                            </div>
                            <div class="bt_post_widget">
                              
                                    <?php foreach ($categories as $item) : ?>
                                        <div class="jl_m_right jl_sm_list jl_ml jl_clear_at">
                                            <div class="jl_m_right_w">
                                                <div class="jl_m_right_img jl_radus_e">
                                                    <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['crawl/hospital-detail', 'slug' => $item->slug, 'slug-category' => $item->slug_category]) ?>"><img width="120" height="120" src="https://storage.songxanh24h.vn/images/hospital1/<?= $item->img ?>" class="attachment-sprasa_small_feature size-sprasa_small_feature wp-post-image" alt="<?= $item->name ?>" loading="lazy" /></a>
                                                </div>
                                                <div class="jl_m_right_content">
                                                    <h2 class="entry-title">
                                                        <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['crawl/hospital-detail', 'slug' => $item->slug, 'slug-category' => $item->slug_category]) ?>" tabindex="-1"><?= $item->name ?></a>
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

