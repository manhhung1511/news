<?php

use common\helper\Tools;
use yii\widgets\LinkPager;
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
    
</style>
<div class="main_new">
    <div class="container">
        <div class="sick_title">
            <h1>Danh sách nhà thuốc tại <?= $name_category ?></h1>
        </div>
        <div class="address hidden"><?= $name_category ?></div>
        <div class="row">
            <?php if(isset($drugstore) && $drugstore): ?>
                <?php foreach($drugstore as $item): ?>
                    <div class="col-md-3">
                        <div class="hospital_item">
                            <div class="hospital_link">
                                <a title="" href="<?= Yii::$app->urlManager->createAbsoluteUrl(['crawl/drug-store-detail', 'slug' => $item->slug,'slug-category' => $item->slug_category]) ?>"> <?= $item->name ?> </a>
                            </div>
                            <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['crawl/drug-store-detail', 'slug' => $item->slug, 'slug-category' => $item->slug_category]) ?>">
                                <img src="https://storage.songxanh24h.vn/images/2023/09/15/hospitalwebp.webp" alt="<?= $item->name ?>">
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
            <div class="data7">
            </div>
            <div class="data8">
            </div>
        </div>

        <button class="load-data">
            <svg style="width: 20px;height: 16px;" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M18.9516 10.4793C19.2944 10.8392 19.2806 11.4088 18.9207 11.7517L12.6201 17.7533C12.2725 18.0844 11.7262 18.0844 11.3786 17.7533L5.07808 11.7517C4.71818 11.4088 4.70433 10.8392 5.04716 10.4793C5.38999 10.1193 5.95967 10.1055 6.31958 10.4483L11.9994 15.8586L17.6792 10.4483C18.0391 10.1055 18.6088 10.1193 18.9516 10.4793ZM18.9516 5.67926C19.2944 6.03916 19.2806 6.60884 18.9207 6.95167L12.6201 12.9533C12.2725 13.2844 11.7262 13.2844 11.3786 12.9533L5.07808 6.95167C4.71818 6.60884 4.70433 6.03916 5.04716 5.67926C5.38999 5.31935 5.95967 5.3055 6.31958 5.64833L11.9994 11.0586L17.6792 5.64833C18.0391 5.30551 18.6088 5.31935 18.9516 5.67926Z" fill="currentColor"></path></svg>
                <span>Xem thêm</span>
            </button>
            <button class="load-end-data hidden" style="font-size: 16px;">Bạn đã xem hết sản phẩm</button>
    </div>
</div>

<script>
$(document).ready(function() {
    let offset = 0;
    let click = 0;
    $('.load-data').click(function() {
        let name_category = $('.address').text();
        offset += 20;
        click++;

        $.ajax({
            url: '/ajax/drugstore',
            type: 'POST',
            dataType: 'text',
            _csrf: yii.getCsrfToken(),
            data: {
                offset,
                name_category
            },
            success: function (result) {
            if(result) {
                $(`.data${click}`).html(result);
            } else {
                $('.load-end-data').removeClass('hidden');
                $('.load-data').addClass('hidden');
            }
            }
        });
    });
});
    
</script>
