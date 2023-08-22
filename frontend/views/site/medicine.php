<?php

use yii\widgets\LinkPager;

$this->title = $name.' Songxanh24h - Chuyên trang sức khỏe, dinh dưỡng, làm đẹp';

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

<style>
    body {
        background: #f6f9fc;
        margin-top: 20px;
    }

    /* booking */

    .bg-light-blue {
        color: #3184ae;
        padding: 7px 18px;
        border-radius: 4px;
    }

    .bg-light-green {
        background-color: rgba(40, 167, 69, 0.2) !important;
        padding: 7px 18px;
        border-radius: 4px;
        color: #28a745 !important;
    }

    .buttons-to-right {
        position: absolute;
        right: 0;
        top: 40%;
    }

    .btn-gray {
        color: #666;
        background-color: #eee;
        padding: 7px 18px;
        border-radius: 4px;
    }

    .booking:hover .buttons-to-right .btn-gray {
        opacity: 1;
        transition: .3s;
    }

    .buttons-to-right .btn-gray {
        opacity: 0;
        transition: .3s;
    }

    .btn-gray:hover {
        background-color: #36a3f5;
        color: #fff;
    }

    .booking {
        margin-bottom: 30px;
        border-bottom: 1px solid #eee;
        padding-bottom: 30px;
    }

    .booking:last-child {
        margin-bottom: 0px;
        border-bottom: none;
        padding-bottom: 0px;
    }

    @media screen and (max-width: 575px) {
        .buttons-to-right {
            top: 10%;
        }

        .buttons-to-right a {
            display: block;
            margin-bottom: 20px;
        }

        .buttons-to-right a:last-child {
            margin-bottom: 0px;
        }

        .bg-light-blue,
        .bg-light-green,
        .btn-gray {
            padding: 7px;
        }
    }

    .card {
        margin-bottom: 20px;
        background-color: #fff;
        border-radius: 4px;
        -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
        border-radius: 4px;
        box-shadow: none;
        border: none;
        padding: 25px;
    }

    .mb-5,
    .my-5 {
        margin-bottom: 3rem !important;
    }

    .msg-img {
        margin-right: 20px;
    }

    .msg-img img {
        width: 95px;
        height: 95px;
        object-fit: cover;
    }

    img {
        max-width: 100%;
        height: auto;
    }

    .list-group-item.active {
        background-color: #4dcf8f;
        border-color: #4dcf8f;
    }

    .card-body {
        padding: 0px !important;
    }

    .position-relative {
        list-style: none;
    }

    .options_dark_skin .list-group-item:not(.active) {
        background-color: #1111;
    }

    .options_dark_skin .card {
        background-color: #1111;
    }
    #mySelect {
        padding: 6px;
    }
    .hidden {
        display: none;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <select id="mySelect" class="form-select mt-4 hidden" aria-label="Default select example">
                <option>Nhóm thuốc</option>
                <?php foreach ($categories as $item) : ?>
                        <option value="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/medicine', 'slug' => create_slug4($item->name)]) ?>">
                            <?= $item->name ?>
                        </option>
                <?php endforeach; ?>
            </select>
            <div class="list-group mt-4">
                <?php foreach ($categories as $item) : ?>
                    <h2 style="font-size: 17px;">
                        <a data-id=<?= $item->_id ?> href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/medicine', 'slug' => create_slug4($item->name)]) ?>" class="list-group-item list-group-item-action active-<?= $item->_id ?>">
                            <?= $item->name ?>
                        </a>
                    </h2>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="col-md-8">
            <div class="content-main">
                <div class="card card-white mb-5">
                    <div class="card-heading clearfix border-bottom mb-4">
                        <h1 class="card-title"><?= $name ?></h1>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <?php if (isset($medicine) && $medicine) : ?>
                                <?php foreach ($medicine as $item) : ?>
                                    <li class="position-relative booking">
                                        <div class="media">
                                            <div class="msg-img">
                                                <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/medicine-detail', 'slug' => create_slug4($item->name)]) ?>">
                                                    <img src="https://storage.songxanh24h.vn/images/thuoc2/<?= $item->img ?>" alt="<?= $item->name ?>">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <a class="name_link" href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/medicine-detail', 'slug' => create_slug4($item->name)]) ?>">
                                                    <h3 class="mb-4"><?= $item->name ?></h3>
                                                </a>
                                                <div class="mb-3">
                                                    <span class="mr-2 d-block d-sm-inline-block mb-2 mb-sm-0">Dạng bào chế:</span>
                                                    <span class="bg-light-blue"><?= $item->type ?: '' ?></span>
                                                </div>
                                                <div class="mb-3">
                                                    <span class="mr-2 d-block d-sm-inline-block mb-2 mb-sm-0">Nhà sản xuất:</span>
                                                    <span class="bg-light-blue"><?= $item->producer ?: '' ?></span>
                                                </div>
                                                <div class="mb-3">
                                                    <span class="mr-2 d-block d-sm-inline-block mb-2 mb-sm-0">Nhà đăng ký:</span>
                                                    <span class="bg-light-blue"><?= $item->subscribe ?: '' ?></span>
                                                </div>
                                                <div class="mb-3">
                                                    <span class="mr-2 d-block d-sm-inline-block mb-1 mb-sm-0">Nhà phân phối:</span>
                                                </div>
                                                <div class="mb-3">
                                                    <span class="mr-2 d-block d-sm-inline-block mb-2 mb-sm-0">Số đăng ký:</span>
                                                    <span class="bg-light-blue"><?= $item->number ?: '' ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>

                    </div>
                </div>
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
    if (window.innerWidth < 768) {
        $('.list-group').addClass("hidden");
        $('.form-select').removeClass("hidden");
    }
    $('.list-group-item').click(function() {
        let id = $(this).attr('data-id');
        $(`.active-${id}`).addClass('active');
    });

    document.getElementById("mySelect").addEventListener("change", function() {
        var selectedOption = this.options[this.selectedIndex];
        var url = selectedOption.value;
        if (url) {
            window.location.href = url;
        }
    });
</script>