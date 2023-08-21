<?php
$this->title = $name_category .' Songxanh24h - Chuyên trang sức khỏe, dinh dưỡng, làm đẹp';
use yii\widgets\LinkPager;
use common\helper\Tools;

function create_slug2($string)
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

<?php if (isset($news) && $news) : ?>
    <div class="jl_post_loop_wrapper" id="wrapper_masonry">
        <div class="category_header_post_2col_wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="jl_cat_head jl_clear_at">
                            <div class="jl_m_below_w jl_clear_at">
                                <div class="jl_m_below">
                                    <div class="jl_m_below_c">
                                        <div class="jl_m_below_img">
                                            <div class="jl_f_img_bg jl_radus_e" style="background-image: url(<?= str_contains($news[count($news) - 1]->image, 'http') ? $news[count($news) - 1]->image : 'https://storage.songxanh24h.vn/images'.$news[count($news) - 1]->image ?>);" title="<?= $news[count($news) - 1]->title?>" alt="<?= $news[count($news) - 1]->title?>"></div>
                                            <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/detail','slug' => create_slug2($news[count($news) - 1]->title)]) ?>" class="jl_f_img_link"></a>
                                            <span class="jl_post_type_icon"><i class="jli-quote-2"></i></span>
                                        </div>
                                        <div class="text-box">
                                            <span class="jl_f_cat"><a class="post-category-color-text" style="background: #4dcf8f" href="#"><?= $news[count($news) - 1]->name_category_child ?: $news[count($news) - 1]->category  ?></a></span>
                                            <h1 class="entry-title short_text">
                                                <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/detail','slug' => create_slug2($news[count($news) - 1]->title)]) ?>" tabindex="-1"><?= $news[count($news) - 1]->title ?></a>
                                            </h1>
                                            <p class="short_text"><?=Tools::subWord(strip_tags($news[count($news) - 1]->content)) ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="blockid_72be465" class="block-section jl-main-block" data-blockid="blockid_72be465" data-name="jl_mgrid" data-page_max="11" data-page_current="1" data-author="none" data-order="date_post" data-posts_per_page="6" data-offset="5">
                        <div class="jl_grid_wrap_f jl_clear_at g_3col">
                            <div class="jl-roww content-inner jl-col3 jl-col-row" style="border-bottom: 0px;">
                                <div class="jl_sec_title">
                                    <h2 class="jl_title_c">
                                        <span>Bài đăng gần đây</span>
                                    </h2>
                                </div>
                                <?php if (isset($news) && $news) : ?>
                                    <?php foreach ($news as $value) : ?>
                                        <div class="jl-grid-cols">
                                            <div class="p-wraper post-2959">
                                                <div class="jl_grid_w">
                                                    <div class="jl_img_box jl_radus_e">
                                                        <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/detail','slug' => create_slug2($value->title)]) ?>">
                                                            <span class="jl_post_type_icon"><i class="jli-gallery"></i></span><img width="500" height="350" src="<?= str_contains($value->image, 'http') ? $value->image : 'https://storage.songxanh24h.vn/images'.$value->image ?>" class="attachment-sprasa_slider_grid_small size-sprasa_slider_grid_small wp-post-image" alt="<?= $value->title ?>" title="<?= $value->title ?>" loading="lazy" /></a>
                                                    </div>
                                                    <div class="text-box">
                                                        <h4 class="short_text">
                                                            <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/detail','slug' => create_slug2($value->title)]) ?>"><?= $value->title ?></a>
                                                        </h4>
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
                    <!-- pagination -->
                    <div class="d-flex justify-content-around mt-4 jellywp_pagination">
                        <?php
                        echo LinkPager::widget([
                            'pagination' => $pages,
                            'linkOptions' => ['class' => 'page-link'],
                            'pageCssClass' => ['class' => 'page-item'],
                            'maxButtonCount' => 5
                        ])
                        ?>
                    </div>
                </div>

            </div>
        </div>
    </div>

<?php endif; ?>