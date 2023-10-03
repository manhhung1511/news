
<?php

use common\helper\Tools;

$this->title = 'Tỉnh / Thành phố';

$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Tỉnh thành ở Việt  Nam'
], 'description');

?>

<style>
.main_new {
    padding: 20px;
}
.provinces_content {
    box-shadow: 0 1px 0 0 #e4e8ed;
    padding-bottom: 8px;
}
.contents {
    background-color: white;
    border-radius: 0.75rem;
}
</style>

<div class="main">
    <div class="container">
        <div class="sick_title">
            <h1>Bênh viện tỉnh/thành phố</h1>
        </div>
        <div class="row">
            
            <?php if(isset($provinces) && $provinces): ?>
                <?php foreach($provinces as $item): ?>
                    <div class="col-md-3 col-mb-6">
                        <div class="provinces_content">
                            <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['crawl/hospital', 'slug' => $item->slug]) ?>">
                                <?= $item->name ?>  
                            </a> 
                        </div>
                    </div>
                <?php  endforeach; ?>
            <?php else: ?>
                <h2>Dữ liệu chưa được cập nhật</h2>
            <?php endif; ?>
        </div>
    </div>
</div>