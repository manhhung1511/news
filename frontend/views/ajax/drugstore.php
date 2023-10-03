        <?php if (isset($drugstore) && $drugstore) : ?>
            <div class="row">
                <?php foreach ($drugstore as $item) : ?>
                    <div class="col-md-3 col-mb-6">
                        <div class="hospital_item">
                            <div class="hospital_link">
                                <a title="" href="<?= Yii::$app->urlManager->createAbsoluteUrl(['crawl/drug-store-detail', 'slug' => $item->slug, 'slug-category' => $item->slug_category]) ?>"> <?= $item->name ?> </a>
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
                <?php endforeach; ?>
            </div>
        <?php else: ?>
        <?php echo '1'; ?>
    <?php endif; ?>