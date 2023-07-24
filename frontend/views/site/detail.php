<?php
use common\helper\Tools;
$this->title = $detail->title;
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

if(isset($detail->category_child) && $detail->category_child) {
  $slug = $detail->category_child;
  $category_child = str_replace("-", " ", $slug);
}

?>

<style>
  /* Style the menu */
  #menu {
    background-color: #f1f1f1;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin: 0 100px;
  }

  @media only screen and (max-width: 600px) {
    #menu {
      margin: 0 0;
    }
  }

  /* Style the links in the menu */
  #menu a {
    display: inline-block;
    margin-left: 10px;
    padding: 5px;
    text-decoration: none;
    color: #333;
  }

  /* Style the active link in the menu */
  #menu a.active {
    background-color: #ddd;
    border-radius: 3px;
  }

  #menu li {
    list-style: none;
  }

  /* Style the different levels of headings in the menu */
  /* #menu li.level1 {
			margin-left: 0;
			font-weight: 600;
		} */

  #menu li.level2 {
    margin-left: 20px;
    font-weight: 600;
  }

  #menu li.level3 {
    margin-left: 40px;
  }

  #menu li.level4 {
    margin-left: 60px;
  }

  #menu li.level5 {
    margin-left: 80px;
  }

  #menu li.level6 {
    margin-left: 100px;
  }

  .ql-font-IRANSans {
    font-family: IRANSans !important;
  }

  .ql-font-roboto {
    font-family: roboto !important;
  }

  .ql-font-cursive {
    font-family: cursive !important;
  }

  .ql-font-fantasy {
    font-family: fantasy !important;
  }

  .ql-font-monospace {
    font-family: monospace !important;
  }

  .ql-font-arial {
    font-family: arial !important;
  }
  .options_dark_skin #menu {
    background-color: #121416 !important;
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
              <div class="jl_single_style2">
                <div class="single_post_entry_content single_bellow_left_align jl_top_single_title jl_top_title_feature">
                  <span class="meta-category-small single_meta_category"><a class="post-category-color-text" style="background: #62ce5c" href="#">
                      <?= $detail->name_category_child ? $detail->name_category_child : $detail->category ?>
                    </a></span>
                  <h1 class="single_post_title_main">
                    <?= $detail->title ?>
                  </h1>
                </div>
                <div class="single_content_header jl_single_feature_below">
                </div>
              </div>
              <div class="post_content_w">
                <div class="post_content jl_content">
                  <p>
                    <?= $detail->content ?>
                  </p>
                </div>
              </div>

              <div class="postnav_w">
                        <div class="postnav_left">
                          <div class="single_post_arrow_content">
                            <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/detail','slug' => create_slug4($random[0]->title)]) ?>" id="prepost">
                              <span class="jl_cpost_nav">
                                <span class="jl_post_nav_link"
                                  ><i class="jli-left-arrow"></i>Previous
                                  post</span
                                ><span class="jl_cpost_title"
                                  ><?= Tools::subTitle($random[0]->title) ?></span
                                ></span
                              ></a
                            >
                          </div>
                        </div>
                        <div class="postnav_right">
                          <div class="single_post_arrow_content">
                            <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/detail','slug' => create_slug4($random[1]->title)]) ?>" id="nextpost">
                              <span class="jl_cpost_nav">
                                <span class="jl_post_nav_link"
                                  >Next post<i
                                    class="jli-right-arrow"
                                  ></i></span
                                ><span class="jl_cpost_title"
                                  ><?= Tools::subTitle($random[1]->title) ?></span
                                ></span
                              ></a
                            >
                          </div>
                        </div>
                      </div>
              <div class="clearfix"></div>
              <div class="related-posts">
                <h4>Dành cho bạn</h4>
                <div class="single_related_post">
                  <?php if (isset($relate) && $relate) : ?>
                    <?php foreach ($relate as $item) : ?>
                      <div class="jl_m_right jl_m_list jl_m_img">
                        <div class="jl_m_right_w">
                          <div class="jl_m_right_img jl_radus_e">
                            <span class="jl_post_type_icon"><i class="jli-gallery"></i></span><a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/detail', 'id' => (string)$item->_id, 'slug' => create_slug4($item->title)]) ?>"><img width="500" height="350" src="<?= str_contains($item->image, 'http') ? $item->image : 'https://storage.songxanh24h.vn/images'.$item->image ?>" class="attachment-sprasa_slider_grid_small size-sprasa_slider_grid_small wp-post-image" alt="<?= $item->title ?>" title="<?= $item->title ?>" loading="lazy" /></a>
                          </div>
                          <div class="jl_m_right_content">
                            <span class="jl_f_cat"><a class="post-category-color-text" style="background: #62ce5c" href="#"><?= $item->category ?></a></span>
                            <h2 class="entry-title short_text">
                              <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/detail','slug' => create_slug4($item->title)]) ?>" tabindex="-1"><?= $item->title ?></a>
                            </h2>
                            <p class="short_text">
                              <?= Tools::subWord(strip_tags($item->content))?>
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
      <div class="col-md-4" id="sidebar">
                <div class="jl_sidebar_w">
                  <div
                    id="sprasa_recent_post_text_widget-9"
                    class="widget post_list_widget"
                  >
                    <div class="widget_jl_wrapper">
                      <div class="ettitle">
                        <div class="widget-title">
                          <h2 class="jl_title_c">Xem nhiều</h2>
                        </div>
                      </div>
                      <div class="bt_post_widget">
                      <?php if (isset($views) && $views) : ?>
                    <?php foreach ($views as $item) : ?>
                        <div class="jl_m_right jl_sm_list jl_ml jl_clear_at">
                          <div class="jl_m_right_w">
                            <div class="jl_m_right_img jl_radus_e">
                              <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/detail','slug' => create_slug4($item->title)]) ?>"
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
                                <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/detail','slug' => create_slug4($item->title)]) ?>" tabindex="-1"
                                  ><?= $item->title ?></a
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
</section>

<script>
  // Add an event listener to the window object to detect when the page has finished loading
  window.addEventListener('load', function() {
    // Get all of the headings in the document
    var check = document.querySelector('.post_content');
    check.style.position = 'relative';
    var headings = check.querySelectorAll('h2, h3, h4, h5, h6');

    // Create a new unordered list element to hold the menu
    var menu = document.createElement('ul');
    menu.id = 'menu';

    // Loop through the headings and create a new list item for each one

    for (var i = 0; i < headings.length; i++) {
      var heading = headings[i];
      heading.setAttribute('id', `my-element-${i}`);
      // Create a new list item element
      var li = document.createElement('li');

      // Add a class to the list item element based on the level of the heading
      li.classList.add('level' + heading.tagName.slice(1));

      // Create a new link element
      var a = document.createElement('a');
      a.href = '#' + heading.id;
      a.textContent = heading.textContent;

      // Add an event listener to the link element to highlight the active heading and scroll to the section
      a.addEventListener('click', function(event) {
        // Prevent the default behavior of the link
        event.preventDefault();

        // Remove the 'active' class from all links in the menu
        var links = document.querySelectorAll('#menu a');
        for (var j = 0; j < links.length; j++) {
          links[j].classList.remove('active');
        }

        // Add the 'active' class to the clicked link
        event.target.classList.add('active');

        // Scroll to the section
        var section = document.querySelector(event.target.hash);
        section.style.scrollMarginTop = '180px';
        section.scrollIntoView({
          behavior: 'smooth'
        });
      });
      
      li.appendChild(a);

      // Append the list item element to the menu
      menu.appendChild(li);
    }

    let content = document.querySelector('.single_content_header');
    // // Append the menu to the body element
    content.insertBefore(menu, content.firstChild);
  });
</script>