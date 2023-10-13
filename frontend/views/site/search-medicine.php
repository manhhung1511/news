<?php 
 use common\helper\Tools;
use yii\widgets\LinkPager;

$title = 'Tìm kiếm Thuốc - Songxanh24h.vn';
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
                                    <?php $slug_title = Tools::create_slug($item['name']) ?>
                                    <h3 style="font-size: 20px; font-weight: 500; line-height: 26px;"><a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['crawl/medicine-detail','slug' => Tools::create_slug($item['name'])]) ?>"><?= $item['name'] ?></a></h3>
                                    <div class="post-meta-data"><span>
                                            <?php if(isset($item['content'][0])): ?>
                                                <a href="" title=""><?= $item['content'][0]['value1'] ?></a></span></div>
                                            <?php endif; ?>
                                    <div class="body">
                                        <?php if(isset($item['content'][0])): ?>
                                            <?= $item['content'][0]['value4'] ?>
                                        <?php endif; ?>
                                    </div>
                                </article>
                            </li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="no-result">
                             <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg> Không có kết quả nào. Bạn có thể thử lại với các tiêu chí khác.
                        </div>
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
    if(currentUrl.includes('thuoc')) {
        let fourthElement = document.querySelectorAll(".search_category-list li a")[1];
        fourthElement.classList.add("search-active");
        let scroll = document.querySelector('.search_category-list');
        scroll.scrollBy(100, 0);
    }
});
</script>