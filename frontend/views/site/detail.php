<?php
function create_slug4($string)
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
                  <div
                    class="post-2838 post type-post status-publish format-standard has-post-thumbnail hentry category-sports tag-gaming"
                    id="post-2838"
                  >
                    <div
                      class="single_section_content box blog_large_post_style"
                    >
                      <div class="jl_single_style2">
                        <div
                          class="single_post_entry_content single_bellow_left_align jl_top_single_title jl_top_title_feature"
                        >
                          <span class="meta-category-small single_meta_category"
                            ><a
                              class="post-category-color-text"
                              style="background: #62ce5c"
                              href="#">
                              <?= $detail->category?>
                              </a
                            ></span
                          >
                          <h1 class="single_post_title_main">
                             <?= $detail->title?>
                          </h1>
                          <span class="jl_post_meta"
                            ><span class="jl_author_img_w"
                              ><i class="jli-user"></i
                              ><a href="#" title="Posts by Spraya" rel="author"
                                ></a
                              ></span
                            ><span class="post-date"
                              ><i class="jli-pen"></i><?= DateTime::createFromFormat('Y-m-d H:i:s',$detail->created_at)->format('d/m/Y') ?></span
                            ><span class="post-read-time"
                              ><i class="jli-watch-2"></i>2 Mins read</span
                            ><span class="meta-comment"
                              ><i class="jli-comments"></i
                              ><a href="#">0 Comment</a></span
                            ></span
                          >
                        </div>
                        <div
                          class="single_content_header jl_single_feature_below"
                        >
                        </div>
                      </div>
                      <div class="post_content_w">
                        <div class="post_sw">
                          <div class="post_s">
                            <div class="jl_single_share_wrapper jl_clear_at">
                              <ul class="single_post_share_icon_post">
                                <li class="single_post_share_facebook">
                                  <a href="#" target="_blank"
                                    ><i class="jli-facebook"></i
                                  ></a>
                                </li>
                                <li class="single_post_share_twitter">
                                  <a href="#" target="_blank"
                                    ><i class="jli-twitter"></i
                                  ></a>
                                </li>
                                <li class="single_post_share_pinterest">
                                  <a href="#" target="_blank"
                                    ><i class="jli-pinterest"></i
                                  ></a>
                                </li>
                                <li class="single_post_share_linkedin">
                                  <a href="#" target="_blank"
                                    ><i class="jli-linkedin"></i
                                  ></a>
                                </li>
                              </ul>
                            </div>
                            <span class="single-post-meta-wrapper jl_sfoot"
                              ><a
                                href="#"
                                class="jm-post-like liked"
                                data-post_id="2838"
                                title="Unlike"
                                ><i class="jli-love-full"></i><span>2</span></a
                              ><span class="view_options"
                                ><i class="jli-view-o"></i
                                ><span>531</span></span
                              ></span
                            >
                          </div>
                        </div>
                        <div class="post_content jl_content">
                          <p>
                            <?= $detail->content ?>
                          </p>
                        </div>
                      </div>
                      <div class="clearfix"></div>
                      <div class="related-posts">
                        <h4>Bài viết liên quan</h4>
                        <div class="single_related_post">
                          <?php if(isset($relate) && $relate): ?>
                            <?php foreach($relate as $item):?>
                          <div class="jl_m_right jl_m_list jl_m_img">
                            <div class="jl_m_right_w">
                              <div class="jl_m_right_img jl_radus_e">
                                <span class="jl_post_type_icon"
                                  ><i class="jli-gallery"></i></span
                                ><a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/detail','id'=>(string)$item->_id, 'slug'=>create_slug4($item->title)]) ?>"
                                  ><img
                                    width="500"
                                    height="350"
                                    src="<?= $item->image?>"
                                    class="attachment-sprasa_slider_grid_small size-sprasa_slider_grid_small wp-post-image"
                                    alt=""
                                    loading="lazy"
                                /></a>
                              </div>
                              <div class="jl_m_right_content">
                                <span class="jl_f_cat"
                                  ><a
                                    class="post-category-color-text"
                                    style="background: #62ce5c"
                                    href="#"
                                    ><?= $item->category ?></a
                                  ></span
                                >
                                <h2 class="entry-title">
                                  <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/detail','id'=>(string)$item->_id, 'slug'=>create_slug4($item->title)]) ?>" tabindex="-1"
                                    ><?= $item->title ?></a
                                  >
                                </h2>
                                <span class="jl_post_meta"
                                  ><span class="jl_author_img_w"
                                    ><i class="jli-user"></i
                                    ><a
                                      href="#"
                                      title="Posts by Spraya"
                                      rel="author"
                                      ></a
                                    ></span
                                  ><span class="post-date"
                                    ><i class="jli-pen"></i><?= DateTime::createFromFormat('Y-m-d H:i:s',$item->created_at)->format('d/m/Y') ?></span
                                  ><span class="post-read-time"
                                    ><i class="jli-watch-2"></i>2 Mins
                                    read</span
                                  ></span
                                >
                                <p>
                                  Mauris mattis auctor cursus. Phasellus tellus
                                  tellus, imperdiet ut imperdiet eu, iaculis a
                                  sem Donec vehicula luctus nunc...
                                </p>
                              </div>
                            </div>
                          </div>
                          <?php endforeach; ?>
                          <?php endif; ?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- end post -->
                  <div class="brack_space"></div>
                </div>
              </div>
              <!-- <div class="col-md-4" id="sidebar">
                <div class="jl_sidebar_w">
                  <div
                    id="sprasa_widget_social_counter_c-2"
                    class="widget jl-widget-social-counter"
                  >
       
                  <div
                    id="sprasa_recent_post_text_widget-9"
                    class="widget post_list_widget"
                  >
                  </div>
                  <div
                    id="sprasa_ads300x250_widget-2"
                    class="widget jellywp_ads300x250_widget"
                  >
                  </div>
                </div>
              </div> -->
            </div>
          </div>
        </section>