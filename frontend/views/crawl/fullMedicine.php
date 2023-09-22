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
            <?php if(isset($medicines) && $medicines): ?>
                <?php foreach($medicines as $item): ?>
                    <div class="col-md-3">
                        <div class="provinces_content">
                            <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['crawl/medicine', 'slug' => $item->slug]) ?>">
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