<?php

use common\helper\Tools;
use yii\widgets\LinkPager;

$this->title = Tools::subWord($name . ' - Chuyên trang sức khỏe, dinh dưỡng, làm đẹp', 12);

$this->registerMetaTag([
    'name' => 'description',
    'content' => $name.' Songxanh24h - Tận tâm chăm sóc sức khỏe, Thông tin sức khỏe, dinh dưỡng, hỗ trợ tư vấn điều trị bệnh, thông tin thuốc, chăm sóc làm đẹp tin cậy cho người Việt'
], 'description');
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

    .hospital_link {
        margin-bottom: 10px;
    }

    @media (max-width:767.98px) {
        .list_infor {
        display:none;
    }
    }

</style>
<div class="main_new">
    <div class="container">
        <div class="sick_title">
            <h1><?= $name ?></h1>
        </div>
        <div class="row">
            <?php if(isset($medicine) && $medicine): ?>
                <?php foreach($medicine as $item): ?>
                    <div class="col-md-3">
                        <div class="hospital_item">
                            <div class="hospital_link">
                                <a style="font-weight: 600; font-size:17px;"title="<?= $item->name ?>" href="<?= Yii::$app->urlManager->createAbsoluteUrl(['crawl/medicine-detail','slug' => Tools::create_slug($item->name)]) ?>"> <?= $item->name ?> </a>
                            </div>
                            <div class="hospital_content">
                                <div class="hospital_description">
                                <div class="card-image d-flex align-items-center justify-content-center">
                                            <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['crawl/medicine-detail', 'slug' => Tools::create_slug($item->name)]) ?>">
                                                <img src="https://storage.songxanh24h.vn/images/thuoc2/<?= $item->img ?>" alt="<?= $item->name ?>">
                                            </a>
                                        </div>
                                        <div class="ps-3 list_infor">
                                            <div class="mb-3">
                                                <span class="mr-2 d-sm-inline-block mb-2 mb-sm-0">Dạng bào chế:</span>
                                                <span class="bg-light-blue"><?= $item->type ?: '' ?></span>
                                            </div>
                                            <div class="mb-3">
                                                <span class="mr-2 d-sm-inline-block mb-2 mb-sm-0">Nhà sản xuất:</span>
                                                <span class="bg-light-blue"><?= $item->producer ?: '' ?></span>
                                            </div>
                                            <div class="mb-3">
                                                <span class="mr-2 d-sm-inline-block mb-2 mb-sm-0">Nhà đăng ký:</span>
                                                <span class="bg-light-blue"><?= $item->subscribe ?: '' ?></span>
                                            </div>
                                            <div class="mb-3">
                                                <span class="mr-2 d-sm-inline-block mb-1 mb-sm-0">Nhà phân phối:</span>
                                            </div>
                                            <div class="mb-3">
                                                <span class="mr-2 d-sm-inline-block mb-2 mb-sm-0">Số đăng ký:</span>
                                                <span class="bg-light-blue"><?= $item->number ?: '' ?></span>
                                            </div>
                                        </div>
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