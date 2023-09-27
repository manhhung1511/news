<?php

use common\helper\Tools;
use yii\widgets\LinkPager;

$title = 'Bệnh viện dịch vụ tốt nhất Songxanh24h.vn - Chuyên trang sức khỏe, dinh dưỡng, làm đẹp';
$this->title = Tools::subWord($title, 8);
?>


<style>
    .hospital_item {
        height: 100%;
        padding: 12px;
        background-color: white;
        border-radius: 12px;
        display: flex;
        flex-direction: column;
        transition: all 0.3s ease-in 0s;
        border: 1px solid white;
        display: flex;
        transition: all 0.3s ease-in;
        text-align: center;
    }
    .hospital_item:hover {
        border: 1px solid #237c50;
    }
    .hospital_item img {
        width: 150px;
        height: 140px;
        object-fit: cover;
    }
    .pagination {
        padding: 38px !important;
    }
    
    @media (max-width:767.98px) {
        .hospital_description {
            display: none;
        } 
    }
   
</style>
<div class="main_new">
    <div class="container">
        <div class="sick_title">
            <h1>Danh sách bệnh viện tại <?= $name_category ?></h1>
        </div>
        <div class="row">
            <?php if(isset($hospital) && $hospital): ?>
                <?php foreach($hospital as $item): ?>
                    <div class="col-md-3">
                        <div class="hospital_item">
                            <div class="hospital_link">
                                <a title="" href="<?= Yii::$app->urlManager->createAbsoluteUrl(['crawl/hospital-detail', 'slug' => $item->slug,'slug-category' => $item->slug_category]) ?>"> <?= $item->name ?> </a>
                            </div>
                            <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['crawl/hospital-detail', 'slug' => $item->slug, 'slug-category' => $item->slug_category]) ?>">
                                <?php if($item->img != '#'): ?>
                                    <img src="https://storage.songxanh24h.vn/images/hospital1/<?= $item->img ?>" alt="<?= $item->name ?>">
                                <?php else: ?>
                                    <img src="https://storage.songxanh24h.vn/images/2023/09/15/hospitalwebp.webp" alt="<?= $item->name ?>">
                                <?php endif; ?>
                            </a>
                            <div class="hospital_content">
                                <div class="hospital_description">
                                    <?= $item->description ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php  endforeach; ?>
            <?php else: ?>
                <h2>Dữ liệu chưa được cập nhật</h2>
            <?php endif; ?>

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