<?php

$title = 'Thông tin tra cứu Dược liệu dành cho mọi người | Songxanh24h.vn';
$this->title = $title;

$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Giới thiệu về các loại dược liệu, cây thuốc, dược tính, công dụng, liều dùng, các bài thuốc chữa bệnh và những lưu ý đặc biệt khi bào chế.'
], 'description');
?>

<style>
    /* .sick_alphabet */
    .sick_alphabet ul {
        display: flex;
    }

    .sick_alphabet ul li {
        list-style: none;
        background: #f6f6f6;
        color: #e9e4e4;
        float: left;
        font-size: 18px;
        height: 40px;
        line-height: 40px;
        margin-bottom: 5px;
        margin-right: 3px;
        text-align: center;
        text-transform: uppercase;
        vertical-align: middle;
        width: 35px;
    }
</style>

<div class="main">
    <div class="container">
        <div class="sick_title">
            <h1>Danh sách dược liệu</h1>
        </div>

        <div class="sick_content">
            <div class="sick_alphabet">
                <h3>Tra theo bảng chữ cái</h3>
                <ul>


                    <li>

                        <a href="#a" class="active">a</a>

                    </li>



                    <li>

                        <a href="#b" class="">b</a>

                    </li>



                    <li>

                        <a href="#c" class="">c</a>

                    </li>



                    <li>

                        <a href="#d" class="">d</a>

                    </li>



                    <li>

                        <a href="#đ" class="">đ</a>

                    </li>



                    <li>

                        e

                    </li>



                    <li>

                        f

                    </li>



                    <li>

                        <a href="#g" class="">g</a>

                    </li>



                    <li>

                        <a href="#h" class="">h</a>

                    </li>



                    <li>

                        <a href="#j" class="">i</a>

                    </li>



                    <li>

                        j

                    </li>



                    <li>

                        <a href="#k" class="">k</a>

                    </li>



                    <li>

                        <a href="#l" class="">l</a>

                    </li>



                    <li>

                        <a href="#m" class="">m</a>

                    </li>



                    <li>

                        <a href="#n" class="">n</a>

                    </li>



                    <li>

                        <a href="#o" class="">o</a>

                    </li>



                    <li>

                        <a href="#p" class="">p</a>

                    </li>



                    <li>

                        <a href="#q" class="">q</a>

                    </li>



                    <li>

                        <a href="#r" class="">r</a>

                    </li>



                    <li>

                        <a href="#s" class="">s</a>

                    </li>



                    <li>

                        <a href="#t" class="">t</a>

                    </li>



                    <li>

                        <a href="#u" class="">u</a>

                    </li>



                    <li>

                        <a href="#v">v</a>

                    </li>



                    <li>

                        w

                    </li>



                    <li>

                        <a href="#x">x</a>

                    </li>



                    <li>

                        y

                    </li>



                    <li>

                        z

                    </li>


                </ul>
            </div>

            <?php 
                $alphabet = [
                    'a',
                    'b',
                    'c',
                    'd',
                    'đ',
                    'g',
                    'h',
                    'i',
                    'k',
                    'l',
                    'm',
                    'n',
                    'o',
                    'p',
                    'q',
                    'r',
                    's',
                    't',
                    'u',
                    'v',
                    'x'
                ];
            ?>
            <?php foreach($alphabet as $alpha): ?>
                <section id="<?= $alpha ?>">
                    <div class="mobile_title collapsible">
                        <h3><?= $alpha ?></h3>
                        <span><svg style="height:20px;width:20px;" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="margin-left-sm svg-inline--fa fa-angle-right fa-lg">
                                <path fill="currentColor" d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z"></path>
                            </svg></span>
                    </div>
                    <div class="row d-mobile-none">
                        <?php
                        $item1 = $value[$alpha];
                        foreach ($item1 as $item) : ?>
                            <div class="col-md-3">
                                <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['crawl/drug-detail', 'slug' => $item->slug]) ?>">
                                    <span style="font-size: 10px;padding: 20px;"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                            <path d="M256 56c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m0-48C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 168c-44.183 0-80 35.817-80 80s35.817 80 80 80 80-35.817 80-80-35.817-80-80-80z" />
                                        </svg></span><?= $item->name ?>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </section>
            <?php endforeach; ?>
        </div>
    </div>
</div>
</div>

<script>
    $("[href^='#']").click(function(e) {
        e.preventDefault();
        let id = $(this).attr("href");

        $('html, body').animate({
            scrollTop: ($(id).offset().top - 120)
        }, 100);
    });

    if (window.matchMedia("(max-width: 767px)").matches) {
        var coll = document.getElementsByClassName("collapsible");
        var i;


        for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function() {

                var content = this.nextElementSibling;
                if (content.style.display === "block") {
                    content.style.display = "none";
                } else {
                    content.style.display = "block";
                }
            });
        }
    }
</script>