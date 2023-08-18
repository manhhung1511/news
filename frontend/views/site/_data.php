<?php
use yii\widgets\LinkPager;

function create_slug4($string)
{
    $search = array(
        '#(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)#',
        '#(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)#',
        '#(ì|í|ị|ỉ|ĩ)#',
        '#(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)#',
        '#(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)#',
        '#(ỳ|ý|ỵ|ỷ|ỹ)#',
        '#(đ)#',
        '#(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)#',
        '#(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)#',
        '#(Ì|Í|Ị|Ỉ|Ĩ)#',
        '#(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)#',
        '#(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)#',
        '#(Ỳ|Ý|Ỵ|Ỷ|Ỹ)#',
        '#(Đ)#',
        "/[^a-zA-Z0-9\-\_]/",
    );
    $replace = array(
        'a',
        'e',
        'i',
        'o',
        'u',
        'y',
        'd',
        'A',
        'E',
        'I',
        'O',
        'U',
        'Y',
        'D',
        '-',
    );
    $string = preg_replace($search, $replace, $string);
    $string = preg_replace('/(-)+/', '-', $string);
    $string = strtolower($string);
    return $string;
}
?>

<div class="card card-white mb-5">
                <div class="card-heading clearfix border-bottom mb-4">
                    <h4 class="card-title"><?= $name ?></h4>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        <?php if(isset($medicine) && $medicine): ?>
                            <?php  foreach($medicine as $item): ?>
                            <li class="position-relative booking">
                                <div class="media">
                                    <div class="msg-img">
                                        <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/medicine-detail','slug' => create_slug4($item->name)])?>">
                                            <img src="<?= $item->img ?>" alt="<?= $item->name ?>">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <a class="name_link" href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/medicine-detail','slug' => create_slug4($item->name)])?>">
                                            <h5 class="mb-4"><?= $item->name ?></h5>
                                        </a>
                                        <div class="mb-3">
                                            <span class="mr-2 d-block d-sm-inline-block mb-2 mb-sm-0">Dạng bào chế:</span>
                                            <span class="bg-light-blue"><?= $item->type ?: ''?></span>
                                        </div>
                                        <div class="mb-3">
                                            <span class="mr-2 d-block d-sm-inline-block mb-2 mb-sm-0">Nhà sản xuất:</span>
                                            <span class="bg-light-blue"><?= $item->producer ?: ''?></span>
                                        </div>
                                        <div class="mb-3">
                                            <span class="mr-2 d-block d-sm-inline-block mb-2 mb-sm-0">Nhà đăng ký:</span>
                                            <span class="bg-light-blue"><?= $item->subscribe ?: ''?></span>
                                        </div>
                                        <div class="mb-3">
                                            <span class="mr-2 d-block d-sm-inline-block mb-1 mb-sm-0">Nhà phân phối:</span>
                                        </div>
                                        <div class="mb-3">
                                            <span class="mr-2 d-block d-sm-inline-block mb-2 mb-sm-0">Số đăng ký:</span>
                                            <span class="bg-light-blue"><?= $item->number ?: ''?></span>
                                        </div>
                                    </div>
                                </div>
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