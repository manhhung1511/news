<?php
$this->title = $name_category .' - Chuyên trang sức khỏe, dinh dưỡng, làm đẹp';
use yii\widgets\LinkPager;
use common\helper\Tools;

$this->registerMetaTag([
    'name' => 'description',
    'content' => $name_category.' Songxanh24h.vn - Tận tâm chăm sóc sức khỏe, Thông tin sức khỏe, dinh dưỡng, hỗ trợ tư vấn điều trị bệnh, thông tin thuốc, chăm sóc làm đẹp tin cậy cho người Việt'
], 'description');
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
                                            <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/detail','slug' => Tools::create_slug($news[count($news) - 1]->title)]) ?>" class="jl_f_img_link"></a>
                                            <span class="jl_post_type_icon"><i class="jli-quote-2"></i></span>
                                        </div>
                                        <div class="text-box">
                                            <h1 class="jl_f_cat"><a class="post-category-color-text" style="background: #4dcf8f" href="#"><?= $news[count($news) - 1]->name_category_child ?: $news[count($news) - 1]->category  ?></a></h1>
                                            <h3 class="entry-title short_text">
                                                <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/detail','slug' => Tools::create_slug($news[count($news) - 1]->title)]) ?>" tabindex="-1"><?= $news[count($news) - 1]->title ?></a>
                                            </h3>
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
                                        <span>Dành riêng cho bạn</span>
                                    </h2>
                                    <div class="name_category hidden">
                                        <?= $name_category ?>
                                    </div>
                                </div>
                                <?php if (isset($news) && $news) : ?>
                                    <div class="row">
                                        <?php foreach ($news as $value) : ?>
                                            <div class="jl-grid-cols">
                                                <div class="p-wraper post-2959">
                                                    <div class="jl_grid_w">
                                                        <div class="jl_img_box jl_radus_e">
                                                            <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/detail','slug' => Tools::create_slug($value->title)]) ?>">
                                                                <span class="jl_post_type_icon"><i class="jli-gallery"></i></span><img width="500" height="350" src="<?= str_contains($value->image, 'http') ? $value->image : 'https://storage.songxanh24h.vn/images'.$value->image ?>" class="attachment-sprasa_slider_grid_small size-sprasa_slider_grid_small wp-post-image" alt="<?= $value->title ?>" title="<?= $value->title ?>" loading="lazy" /></a>
                                                        </div>
                                                        <div class="text-box">
                                                            <h4 class="short_text">
                                                                <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/detail','slug' => Tools::create_slug($value->title)]) ?>"><?= $value->title ?></a>
                                                            </h4>
                                                            <p class="short_text">
                                                                <?= Tools::subWord(strip_tags($value->content)) ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>

                                        <div class="data1">
                                        </div>
                                        <div class="data2">
                                        </div>
                                        <div class="data3">
                                        </div>
                                        <div class="data4">
                                        </div>
                                        <div class="data5">
                                        </div>
                                        <div class="data6">
                                        </div>
                                         </div>
                                <?php endif; ?>
                            </div>

                            <button class="load-data">
                                <svg style="width: 20px;height: 16px;" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M18.9516 10.4793C19.2944 10.8392 19.2806 11.4088 18.9207 11.7517L12.6201 17.7533C12.2725 18.0844 11.7262 18.0844 11.3786 17.7533L5.07808 11.7517C4.71818 11.4088 4.70433 10.8392 5.04716 10.4793C5.38999 10.1193 5.95967 10.1055 6.31958 10.4483L11.9994 15.8586L17.6792 10.4483C18.0391 10.1055 18.6088 10.1193 18.9516 10.4793ZM18.9516 5.67926C19.2944 6.03916 19.2806 6.60884 18.9207 6.95167L12.6201 12.9533C12.2725 13.2844 11.7262 13.2844 11.3786 12.9533L5.07808 6.95167C4.71818 6.60884 4.70433 6.03916 5.04716 5.67926C5.38999 5.31935 5.95967 5.3055 6.31958 5.64833L11.9994 11.0586L17.6792 5.64833C18.0391 5.30551 18.6088 5.31935 18.9516 5.67926Z" fill="currentColor"></path></svg>
                                    <span>Xem thêm</span>
                                </button>
                            <button class="load-end-data hidden" style="font-size: 16px;">Bạn đã xem hết</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="home_section5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="blockid_84d79c5" class="block-section jl-main-block">
                        <div class="jl_grid_wrap_f jl_clear_at g_4col">
                            <div class="jl-roww content-inner jl-col3 jl-col-row">
                                <div class="jl_sec_title">
                                    <h3 class="jl_title_c"><span>Bài được quan tâm</span></h3>
                                </div>
                                <?php if(isset($views) && $views): ?>
                                    <?php foreach($views as $item): ?>
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
    </div>

<?php endif; ?>

<script>
$(document).ready(function() {
    let offset = 0;
    let click = 0;
    $('.load-data').click(function() {
        let name_category = $('.name_category').text();
        offset += 6;
        click++;

        $.ajax({
            url: '/ajax/category',
            type: 'POST',
            dataType: 'text',
            _csrf: yii.getCsrfToken(),
            data: {
                offset,
                name_category
            },
            success: function (result) {
                if(result.trim() == 1) {
                    $('.load-end-data').removeClass('hidden');
                    $('.load-data').addClass('hidden');
                } else {
                    $(`.data${click}`).html(result);
                }
            }
        });
    });
});
    
</script>