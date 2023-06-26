<?php
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
                      <?= $detail->category_child ? $detail->category_child : $detail->category ?>
                    </a></span>
                  <h1 class="single_post_title_main">
                    <?= $detail->title ?>
                  </h1>
                  <span class="jl_post_meta"><span class="jl_author_img_w"><i class="jli-user"></i><a href="#" title="<?= $detail->author ?>" rel="author"><?= $detail->author ?></a></span><span class="post-date"><i class="jli-pen"></i><?= DateTime::createFromFormat('Y-m-d H:i:s', $detail->created_at)->format('d/m/Y') ?></span><span class="post-read-time"><i class="jli-watch-2"></i>2 Mins read</span><span class="meta-comment"><i class="jli-comments"></i><a href="#">0 Comment</a></span></span>
                </div>
                <div class="single_content_header jl_single_feature_below">
                </div>
              </div>
              <div class="post_content_w">
                <div class="post_sw">
                  <div class="post_s">
                    <div class="jl_single_share_wrapper jl_clear_at">
                      <ul class="single_post_share_icon_post">
                        <li class="single_post_share_facebook">
                          <a href="#" target="_blank"><i class="jli-facebook"></i></a>
                        </li>
                        <li class="single_post_share_twitter">
                          <a href="#" target="_blank"><i class="jli-twitter"></i></a>
                        </li>
                        <li class="single_post_share_pinterest">
                          <a href="#" target="_blank"><i class="jli-pinterest"></i></a>
                        </li>
                        <li class="single_post_share_linkedin">
                          <a href="#" target="_blank"><i class="jli-linkedin"></i></a>
                        </li>
                      </ul>
                    </div>
                    <span class="single-post-meta-wrapper jl_sfoot"><a href="#" class="jm-post-like liked" data-post_id="2838" title="Unlike"><i class="jli-love-full"></i><span>2</span></a><span class="view_options"><i class="jli-view-o"></i><span>531</span></span></span>
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
                  <?php if (isset($relate) && $relate) : ?>
                    <?php foreach ($relate as $item) : ?>
                      <div class="jl_m_right jl_m_list jl_m_img">
                        <div class="jl_m_right_w">
                          <div class="jl_m_right_img jl_radus_e">
                            <span class="jl_post_type_icon"><i class="jli-gallery"></i></span><a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/detail', 'id' => (string)$item->_id, 'slug' => create_slug4($item->title)]) ?>"><img width="500" height="350" src="<?= $item->image ?>" class="attachment-sprasa_slider_grid_small size-sprasa_slider_grid_small wp-post-image" alt="<?= $item->title ?>" title="<?= $item->title ?>" loading="lazy" /></a>
                          </div>
                          <div class="jl_m_right_content">
                            <span class="jl_f_cat"><a class="post-category-color-text" style="background: #62ce5c" href="#"><?= $item->category ?></a></span>
                            <h2 class="entry-title">
                              <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/detail', 'id' => (string)$item->_id, 'slug' => create_slug4($item->title)]) ?>" tabindex="-1"><?= $item->title ?></a>
                            </h2>
                            <span class="jl_post_meta"><span class="jl_author_img_w"><i class="jli-user"></i><a href="#" title="<?= $item->author ?>" rel="author"><?= $item->author ?></a></span><span class="post-date"><i class="jli-pen"></i><?= DateTime::createFromFormat('Y-m-d H:i:s', $item->created_at)->format('d/m/Y') ?></span><span class="post-read-time"><i class="jli-watch-2"></i>2 Mins
                                read</span></span>
                            <p>
                              <?= strip_tags(substr($item->content . '...', 0, 150) . '...') ?>
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