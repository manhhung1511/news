<?php

$title = $contents->name.': Nguyên nhân, triệu chứng, chẩn đoán và điều trị | Songxanh24h.vn';
$this->title = $title;

$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Tổng quan Bệnh '.$contents->name.' cùng các dấu hiệu, triệu chứng, nguyên nhân, điều trị, cách phòng tránh và thông tin về các bệnh viện, phòng khám, bác sĩ chữa bệnh '.$contents->name
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
                                <div class="jl_single_style2">
                                    <div class="single_post_entry_content single_bellow_left_align jl_top_single_title jl_top_title_feature">
                                        <h1 class="single_post_title_main">
                                            <?= $contents->name ?>
                                        </h1>
                                    </div>
                                    <div class="single_content_header jl_single_feature_below">
                                    </div>
                                </div>
                                <div class="post_content_w">
                                    <div class="post_content jl_content">
                                        <?= $contents->content[0] ?>
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
                                                        <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['crawl/sick-detail', 'slug' => $item->slug]) ?>" tabindex="-1"><?= $item->name ?></a>
                                                    </h2>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                            </div>

                    <div class="ettitle">
                        <div class="widget-title title_content">
                          <h2 class="jl_title_c jl_title_content">Bệnh viện</h2>
                          <a class="link_content-full"href="<?= Yii::$app->urlManager->createAbsoluteUrl(['crawl/full-province']) ?>">Tra cứu bệnh viện</a> 
                        </div>
                      </div>
                      <div class="bt_post_widget">
                      <?php if (isset($hospital) && $hospital) : ?>
                        <?php foreach ($hospital as $item) : ?>
                        <div class="jl_m_right jl_sm_list jl_ml jl_clear_at">
                          <div class="jl_m_right_w">
                            <div class="jl_m_right_img jl_radus_e">
                                <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['crawl/hospital-detail', 'slug' => $item->slug, 'slug-category' => $item->slug_category]) ?>">
                                    <?php if($item->img != '#'): ?>
                                        <img src="https://storage.songxanh24h.vn/images/hospital1/<?= $item->img ?>" alt="<?= $item->name ?>">
                                    <?php else: ?>
                                        <img src="https://storage.songxanh24h.vn/images/2023/09/15/hospitalwebp.webp" alt="<?= $item->name ?>">
                                    <?php endif; ?>
                                </a>
                            </div>
                            <div class="jl_m_right_content">
                              <h2 class="entry-title">
                                <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['crawl/hospital-detail', 'slug' => $item->slug, 'slug-category' => $item->slug_category]) ?>" tabindex="-1"
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

