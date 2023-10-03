<?php

use common\helper\Tools;

 if (isset($news) && $news) : ?>
  <div class="row">
    <?php foreach ($news as $value) : ?>
        <div class="jl-grid-cols">
            <div class="p-wraper post-2959">
                <div class="jl_grid_w">
                    <div class="jl_img_box jl_radus_e">
                        <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/detail', 'slug' => Tools::create_slug($value->title)]) ?>">
                            <span class="jl_post_type_icon"><i class="jli-gallery"></i></span><img width="500" height="350" src="<?= str_contains($value->image, 'http') ? $value->image : 'https://storage.songxanh24h.vn/images' . $value->image ?>" class="attachment-sprasa_slider_grid_small size-sprasa_slider_grid_small wp-post-image" alt="<?= $value->title ?>" title="<?= $value->title ?>" loading="lazy" /></a>
                    </div>
                    <div class="text-box">
                        <h4 class="short_text">
                            <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/detail', 'slug' => Tools::create_slug($value->title)]) ?>"><?= $value->title ?></a>
                        </h4>
                        <p class="short_text">
                            <?= Tools::subWord(strip_tags($value->content)) ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
<?php else: ?>
    <?php echo '1'; ?>
<?php endif; ?>


