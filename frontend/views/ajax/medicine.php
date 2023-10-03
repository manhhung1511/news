<?php

use common\helper\Tools;

?>
<?php if(isset($medicine) && $medicine): ?>
<div class="row">
                <?php foreach($medicine as $item): ?>
                    <div class="col-md-3 col-mb-6">
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
</div>
<?php endif; ?>