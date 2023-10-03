<?php

use common\helper\Tools;

$title = $contents->name.' | Songxanh24h.vn';
$this->title = $title;

$this->registerMetaTag([
    'name' => 'description',
    'content' => $contents->name.' dược tính, công dụng, liều dùng, các bài thuốc chữa bệnh và những lưu ý đặc biệt khi bào chế.'
], 'description');
?>

<section id="content_main" class="clearfix jl_spost">
    <div class="container">
        <div class="row main_content">
            <div class="col-md-8 loop-large-post" id="content">
                <div class="widget_container content_page">
                    <!-- start post -->
                    <div class="post-2838 post type-post status-publish format-standard has-post-thumbnail hentry category-sports tag-gaming" id="post-2838">
                        <div class="single_section_content box blog_large_post_style">
                            <div class="">
                                <div class="post_content_w">
                                    <div class="post_content jl_content">
                                        <?= $contents->content[0]['detail1'] ?>
                                        <?= $contents->content[0]['detail2'] ?>
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
            <div class="col-md-4">
                <div class="jl_sidebar_w">
                    <div id="sprasa_recent_post_text_widget-9" class="widget post_list_widget">
                        <div class="widget_jl_wrapper">
                            <div class="ettitle">
                                <div class="widget-title">
                                    <h2 class="jl_title_c">Bài viết liên quan</h2>
                                </div>
                            </div>
                            <div class="bt_post_widget">
                              
                                    <?php foreach ($categories as $item) : ?>
                                        <div class="jl_m_right jl_sm_list jl_ml jl_clear_at">
                                            <div class="jl_m_right_w">
                                                <div class="jl_m_right_content">
                                                    <h2 class="entry-title">
                                                        <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['crawl/active-detail', 'slug' => $item->slug]) ?>" tabindex="-1"><?= $item->name ?></a>
                                                    </h2>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                            </div>


                            <div class="ettitle">
                        <div class="widget-title title_content">
                          <h2 class="jl_title_c jl_title_content">Thuốc</h2>
                          <a class="link_content-full"href="<?= Yii::$app->urlManager->createAbsoluteUrl(['crawl/full-medicine']) ?>">Xem tất cả</a> 
                        </div>
                      </div>
                      <div class="bt_post_widget">
                      <?php if (isset($medicine) && $medicine) : ?>
                        <?php foreach ($medicine as $item) : ?>
                        <div class="jl_m_right jl_sm_list jl_ml jl_clear_at">
                          <div class="jl_m_right_w">
                            <div class="jl_m_right_img jl_radus_e">
                              <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['crawl/medicine-detail', 'slug' => Tools::create_slug($item->name)]) ?>"
                                ><img
                                  width="120"
                                  height="120"
                                  src="https://storage.songxanh24h.vn/images/thuoc2/<?= $item->img ?>"
                                  class="attachment-sprasa_small_feature size-sprasa_small_feature wp-post-image"
                                  alt="<?= $item->name ?>"
                                  loading="lazy"
                              /></a>
                            </div>
                            <div class="jl_m_right_content">
                              <h2 class="entry-title">
                                <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['crawl/medicine-detail', 'slug' => Tools::create_slug($item->name)]) ?>" tabindex="-1"
                                  ><?= $item->name ?></a
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
        </div>
    </div>
    </div>
    </div>
</section>

