<?php 
 use common\helper\Tools;
use yii\widgets\LinkPager;

$title = 'Tìm kiếm bài viết - Songxanh24h.vn';
$this->title = $title;

$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Tận tâm chăm sóc sức khỏe, Thông tin sức khỏe, dinh dưỡng, hỗ trợ tư vấn điều trị bệnh, thông tin thuốc, chăm sóc làm đẹp tin cậy cho người Việt'
], 'description');

?>
<style>
   
</style>

<div class="main">
    <div class="container">
        <div class="sick_title">
            <h1>Tìm kiếm bài viết theo từ khóa "<?= $keyword ?>"</h1>
        </div>
        <div class="search_category">
            <ul class="search_category-list">
                <li class="search_category_item">
                    <span><strong>Danh mục: </strong></span>
                </li>
                <li class="search_category_item">
                    <a class="search_category_link" href="https://songxanh24h.vn/bai-viet/tim-kiem?s=<?=$keyword?>">
                        Bài viết (<?= $count_news ?>)
                    </a>
                </li>
                <li class="search_category_item">
                    <a class="search_category_link" href="https://songxanh24h.vn/thuoc/tim-kiem?s=<?=$keyword?>">
                        Thuốc (<?= $count_medicines ?>)
                    </a>
                </li>
                <li class="search_category_item">
                    <a class="search_category_link" href="https://songxanh24h.vn/benh-tat/tim-kiem?s=<?=$keyword?>">
                        Bệnh tật (<?= $count_sicks ?>)
                    </a>
                </li>
                <li class="search_category_item">
                    <a class="search_category_link" href="https://songxanh24h.vn/co-so-y-te/tim-kiem?s=<?=$keyword?>">
                        Cơ sở y tế (<?= $count_hospitals ?>)
                    </a>
                </li>
            </ul>
        </div>

        <div class="content_search">
            <div class="row">
                <ul class="content_search-list">
                    <?php if (isset($results) && $results) : ?>
                        <?php foreach ($results as $item) : ?>
                            <li class="content_search-item">
                                <article>
                                    <h3 style="font-size: 20px; font-weight: 500; line-height: 26px;"><a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/detail', 'slug'=>Tools::create_slug($item['title'])]) ?>"><?= $item['title'] ?></a></h3>
                                    <div class="post-meta-data"><span>
                                            Chuyên khoa: <a href="" title=""><?= $item['category'] ?></a></span></div>
                                    <div class="body">
                                         <?= Tools::subWordContent($item['content']) ?>
                                    </div>
                                </article>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
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

<script> 
$(document).ready(function() {
    let currentUrl = window.location.href;
    if(currentUrl.includes('bai-viet')) {
        let fourthElement = document.querySelectorAll(".search_category-list li a")[0];
        fourthElement.classList.add("search-active");
    }
});
</script>