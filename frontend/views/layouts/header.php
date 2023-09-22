<?php

use common\helper\Tools;

?>

<style>
.menu_category-item1,
.menu_category-item2,
.menu_category-item3,
.menu_category-item4,
.menu_category-item5, 
.menu_category-item6 {
    padding: 14px 0;
}

.menu_category-link1,
.menu_category-link2,
.menu_category-link3,
.menu_category-link4,
.menu_category-link5,
.menu_category-item6 {

    text-transform: initial;
    font-size: 15px;
    font-family: sans-serif;
}

.hover-background {
    background-color: #edf0f3;
}

.menu_category-item1:hover,
.menu_category-item2:hover,
.menu_category-item3:hover,
.menu_category-item4:hover,
.menu_category-item5:hover,
.menu_category-item6:hover {
    background-color: #edf0f3;
    cursor: pointer;
}
.sub_menu-item {
    border-bottom: 1px solid #d4cdcd;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.view_full a {
    cursor: pointer;
    color: #237c50;
}
.category_list1, .category_list2, .category_list3, .category_list4, .category_list5, .category_list6 {
    padding: 10px;
    margin-top: 12px;
}

</style>
<div class="options_layout_wrapper jl_clear_at jl_radius jl_none_box_styles jl_border_radiuss jl_en_day_night">
    <div class="options_layout_container full_layout_enable_front">

        <header class="header-wraper jl_header_magazine_style two_header_top_style header_layout_style3_custom jl_cus_top_share">
            <!-- Start Main menu -->
            <div class="jl_blank_nav"></div>
            <div id="menu_wrapper" class="menu_wrapper jl_menu_sticky jl_stick">
                <div class="container">
                    <div class="row">
                        <div class="main_menu col-md-12">
                            <div class="logo_small_wrapper_table">
                                <div class="logo_small_wrapper">
                                    <!-- begin logo --><a class="logo_link" href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/index']) ?>"><img class="jl_logo_n" width="200px" height="45px" src="/img/logo1.png" alt="songxanh24h" /><img width="200px" height="45px" class="jl_logo_w" src="/img/logo1.png" alt="songxanh24h" /></a><!-- end logo -->
                                </div>
                            </div>
                            <div class="search_header_menu jl_nav_mobile">
                                <div class="menu_mobile_icons">
                                    <div class="jlm_w">
                                        <span class="jlma"></span><span class="jlmb"></span><span class="jlmc"></span>
                                    </div>
                                </div>
                                <div class="jl_day_night jl_day_en">
                                    <span class="jl-night-toggle-icon">
                                        <span class="jl_moon"> <i class="jli-moon"></i> </span><span class="jl_sun"> <i class="jli-sun"></i> </span></span>
                                </div>
                            </div>
                            <div class="menu-primary-container navigation_wrapper jl_cus_share_mnu">
                                <ul id="mainmenu" class="jl_main_menu">
                                    <?php if (isset($this->params['paramName']) && $this->params['paramName']) : ?>
                                        <?php foreach ($this->params['paramName'] as $item) : ?>
                                            <?php if (isset($item->category_child[0]) && $item->category_child[0]) : ?>
                                                <li class="menu-item menu-item-has-children">
                                                    <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/category', 'slug' => Tools::create_slug($item['name'])]) ?>">
                                                        <?= $item->name ?> <span class="border-menu"></span>
                                                        <span class="jl_menu_lb" style="
                              background: #ffe500 !important;
                              color: red !important;
                            "><span class="jl_lb_ar" style="border-top: 3px solid #ffe500 !important"></span>Hot</span>
                                                    </a>
                                                    <ul class="sub-menu">
                                                        <?php foreach ($item->category_child as $item_child) : ?>
                                                            <li class="menu-item">
                                                                <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/category-child', 'parent' => Tools::create_slug($item['name']), 'slug' => Tools::create_slug($item_child)]) ?>"><?= $item_child ?><span class="border-menu"></span></a>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </li>
                                            <?php else : ?>
                                                <li class="menu-item current-menu-item current_page_item">
                                                    <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/category', 'slug' => Tools::create_slug($item['name'])]) ?>"><?= $item->name ?><span class="border-menu"></span></a>
                                                </li>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                    <li class="menu-item current-menu-item current_page_item has-navbar">
                                        <a href="javascript:void(0)">Tra cứu<span class="border-menu"></span>
                                            <span class="jl_menu_lb" style="
                              background: #ffe500 !important;
                              color: red !important;
                            "><span class="jl_lb_ar" style="border-top: 3px solid #ffe500 !important"></span>Hot</span>
                                        </a>
                                        <div class="sub_menu">
                                            <div class="row">
                                                <div class="col-menu-3">
                                                    <div class="sub_menu-list">
                                                        <div class="menu_category">
                                                            <div class="menu_category-item1">
                                                                <a class="menu_category-link1">
                                                                    Thuốc
                                                                </a>
                                                            </div>
                                                            <div class="menu_category-item2">
                                                                <a class="menu_category-link2">
                                                                    Bệnh viện
                                                                </a>
                                                            </div>
                                                           
                                                            <div class="menu_category-item4">
                                                                <a class="menu_category-link4">
                                                                    Thông tin bệnh
                                                                </a>
                                                            </div>
                                                            <div class="menu_category-item3">
                                                                <a class="menu_category-link3">
                                                                    Nhà thuốc
                                                                </a>
                                                            </div>

                                                            <div class="menu_category-item5">
                                                                <a class="menu_category-link5">
                                                                    Dược liệu
                                                                </a>
                                                            </div>

                                                            <div class="menu_category-item6">
                                                                <a class="menu_category-link6">
                                                                    Hoạt chất
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-menu-9">
                                                    <div class="category_medicine">
                                                        <div class="category_list1 hidden">
                                                             <div class="view_full">
                                                                <div class="category_title">Thuốc thông dụng</div>
                                                                <div style="width: 1.5px; color: #c1c8d1; padding: 0 11px;">|</div>
                                                                <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['crawl/full-medicine']) ?>">Xem tất cả</a> 
                                                                <svg style="width: 1em; color: #237c50;" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.25383 4.29289C8.86331 4.68342 8.86331 5.31658 9.25383 5.70711L15.5467 12L9.25383 18.2929C8.86331 18.6834 8.86331 19.3166 9.25383 19.7071C9.64436 20.0976 10.2775 20.0976 10.668 19.7071L17.668 12.7071C18.0586 12.3166 18.0586 11.6834 17.668 11.2929L10.668 4.29289C10.2775 3.90237 9.64435 3.90237 9.25383 4.29289Z" fill="currentColor"></path></svg>
                                                            </div>

                                                            <?php if(isset(Yii::$app->view->params['medicine']) && Yii::$app->view->params['medicine']): ?>
                                                                <div class="row">
                                                                    <?php foreach(Yii::$app->view->params['medicine'] as $key => $item): ?>
                                                                            <div class="col-md-4">
                                                                                <div class="sub_menu-item">
                                                                                    <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['crawl/medicine', 'slug'=>Tools::create_slug($item->name)]) ?>" class="sub_menu-link"><?= $item->name?></a>
                                                                                </div>
                                                                            </div>
                                                                    <?php endforeach; ?>
                                                                </div>
                                                             <?php endif;?>
                                                        </div>
                                                        <div class="category_list2 hidden">
                                                            <div class="view_full">
                                                                <div class="category_title">Bệnh viện lớn</div>
                                                                <div style="width: 1.5px; color: #c1c8d1; padding: 0 11px;">|</div>
                                                                <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['crawl/full-province']) ?>">Xem tất cả</a> 
                                                                <svg style="width: 1em; color: #237c50;" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.25383 4.29289C8.86331 4.68342 8.86331 5.31658 9.25383 5.70711L15.5467 12L9.25383 18.2929C8.86331 18.6834 8.86331 19.3166 9.25383 19.7071C9.64436 20.0976 10.2775 20.0976 10.668 19.7071L17.668 12.7071C18.0586 12.3166 18.0586 11.6834 17.668 11.2929L10.668 4.29289C10.2775 3.90237 9.64435 3.90237 9.25383 4.29289Z" fill="currentColor"></path></svg>
                                                            </div>
                                                            <?php if(isset(Yii::$app->view->params['province']) && Yii::$app->view->params['province']): ?>
                                                                <div class="row">
                                                                    <?php foreach(Yii::$app->view->params['province'] as $key => $item): ?>
                                                                            <div class="col-menu-3">
                                                                                <div class="sub_menu-item">
                                                                                    <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['crawl/hospital', 'slug'=>$item->slug]) ?>" class="sub_menu-link"><?= $item->name?></a>
                                                                                </div>
                                                                            </div>
                                                                    <?php endforeach; ?>
                                                                </div>
                                                             <?php endif;?>
                                                        </div>

                                                        <div class="category_list3 hidden">
                                                            <div class="view_full">
                                                                <div class="category_title">Bệnh thường gặp</div>
                                                                <div style="width: 1.5px; color: #c1c8d1; padding: 0 11px;">|</div>
                                                                <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['crawl/full-sick']) ?>">Xem tất cả</a> 
                                                                <svg style="width: 1em; color: #237c50;" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.25383 4.29289C8.86331 4.68342 8.86331 5.31658 9.25383 5.70711L15.5467 12L9.25383 18.2929C8.86331 18.6834 8.86331 19.3166 9.25383 19.7071C9.64436 20.0976 10.2775 20.0976 10.668 19.7071L17.668 12.7071C18.0586 12.3166 18.0586 11.6834 17.668 11.2929L10.668 4.29289C10.2775 3.90237 9.64435 3.90237 9.25383 4.29289Z" fill="currentColor"></path></svg>
                                                            </div>
                                                            <?php if(isset(Yii::$app->view->params['sicks']) && Yii::$app->view->params['sicks']): ?>
                                                                <div class="row">
                                                                    <?php foreach(Yii::$app->view->params['sicks'] as $key => $item): ?>
                                                                            <div class="col-menu-3">
                                                                                <div class="sub_menu-item">
                                                                                    <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['crawl/sick-detail', 'slug'=>$item->slug]) ?>" class="sub_menu-link"><?= $item->name?></a>
                                                                                </div>
                                                                            </div>
                                                                    <?php endforeach; ?>
                                                                </div>
                                                             <?php endif;?>
                                                        </div>

                                                        <div class="category_list4 hidden">
                                                            <div class="view_full">
                                                                <div class="category_title">Được tìm kiếm nhiều</div>
                                                                <div style="width: 1.5px; color: #c1c8d1; padding: 0 11px;">|</div>
                                                                <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['crawl/full-drugstore']) ?>">Xem tất cả</a> 
                                                                <svg style="width: 1em; color: #237c50;" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.25383 4.29289C8.86331 4.68342 8.86331 5.31658 9.25383 5.70711L15.5467 12L9.25383 18.2929C8.86331 18.6834 8.86331 19.3166 9.25383 19.7071C9.64436 20.0976 10.2775 20.0976 10.668 19.7071L17.668 12.7071C18.0586 12.3166 18.0586 11.6834 17.668 11.2929L10.668 4.29289C10.2775 3.90237 9.64435 3.90237 9.25383 4.29289Z" fill="currentColor"></path></svg>
                                                            </div>
                                                            <?php if(isset(Yii::$app->view->params['province']) && Yii::$app->view->params['province']): ?>
                                                                <div class="row">
                                                                    <?php foreach(Yii::$app->view->params['province'] as $key => $item): ?>
                                                                            <div class="col-menu-3">
                                                                                <div class="sub_menu-item">
                                                                                    <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['crawl/drugstore', 'slug'=>$item->slug]) ?>" class="sub_menu-link"><?= $item->name?></a>
                                                                                </div>
                                                                            </div>
                                                                    <?php endforeach; ?>
                                                                </div>
                                                             <?php endif;?>
                                                        </div>

                                                        <div class="category_list5 hidden">
                                                            <div class="view_full">
                                                                <div class="category_title">Dược liệu thông dụng</div>
                                                                <div style="width: 1.5px; color: #c1c8d1; padding: 0 11px;">|</div>
                                                                <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['crawl/full-drug']) ?>">Xem tất cả</a> 
                                                                <svg style="width: 1em; color: #237c50;" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.25383 4.29289C8.86331 4.68342 8.86331 5.31658 9.25383 5.70711L15.5467 12L9.25383 18.2929C8.86331 18.6834 8.86331 19.3166 9.25383 19.7071C9.64436 20.0976 10.2775 20.0976 10.668 19.7071L17.668 12.7071C18.0586 12.3166 18.0586 11.6834 17.668 11.2929L10.668 4.29289C10.2775 3.90237 9.64435 3.90237 9.25383 4.29289Z" fill="currentColor"></path></svg>
                                                            </div>
                                                            <?php if(isset(Yii::$app->view->params['drug']) && Yii::$app->view->params['drug']): ?>
                                                                <div class="row">
                                                                    <?php foreach(Yii::$app->view->params['drug'] as $key => $item): ?>
                                                                            <div class="col-menu-3">
                                                                                <div class="sub_menu-item">
                                                                                    <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['crawl/drug-detail', 'slug'=>$item->slug]) ?>" class="sub_menu-link"><?= $item->name?></a>
                                                                                </div>
                                                                            </div>
                                                                    <?php endforeach; ?>
                                                                </div>
                                                             <?php endif;?>
                                                        </div>

                                                        <div class="category_list6 hidden">
                                                            <div class="view_full">
                                                                <div class="category_title">Hoạt chất thông dụng</div>
                                                                <div style="width: 1.5px; color: #c1c8d1; padding: 0 11px;">|</div>
                                                                <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['crawl/full-active']) ?>">Xem tất cả</a> 
                                                                <svg style="width: 1em; color: #237c50;" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.25383 4.29289C8.86331 4.68342 8.86331 5.31658 9.25383 5.70711L15.5467 12L9.25383 18.2929C8.86331 18.6834 8.86331 19.3166 9.25383 19.7071C9.64436 20.0976 10.2775 20.0976 10.668 19.7071L17.668 12.7071C18.0586 12.3166 18.0586 11.6834 17.668 11.2929L10.668 4.29289C10.2775 3.90237 9.64435 3.90237 9.25383 4.29289Z" fill="currentColor"></path></svg>
                                                            </div>
                                                            <?php if(isset(Yii::$app->view->params['active']) && Yii::$app->view->params['active']): ?>
                                                                <div class="row">
                                                                    <?php foreach(Yii::$app->view->params['active'] as $key => $item): ?>
                                                                            <div class="col-menu-3">
                                                                                <div class="sub_menu-item">
                                                                                    <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['crawl/active-detail', 'slug'=>$item->slug]) ?>" class="sub_menu-link"><?= $item->name?></a>
                                                                                </div>
                                                                            </div>
                                                                    <?php endforeach; ?>
                                                                </div>
                                                             <?php endif;?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                               </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </header>

    <script>
        const category1 = document.querySelector(".category_list1");
        const category2 = document.querySelector(".category_list2");
        const category3 = document.querySelector(".category_list3");
        const category4 = document.querySelector(".category_list4");
        const category5 = document.querySelector(".category_list5");
        const category6 = document.querySelector(".category_list6");
        const link1 = document.querySelector(".menu_category-item1");
        const link2 = document.querySelector(".menu_category-item2");
        const link3 = document.querySelector(".menu_category-item3");
        const link4 = document.querySelector(".menu_category-item4");
        const link5 = document.querySelector(".menu_category-item5");
        const link6 = document.querySelector(".menu_category-item6");

        link1.addEventListener("mouseover", function() {
            category1.classList.add("active");
            category1.classList.remove("hidden");
            category2.classList.add("hidden");
            category3.classList.add("hidden");
            category4.classList.add("hidden");
            category5.classList.add("hidden");
            category6.classList.add("hidden");
        });

        setInterval(function() {
            if(!category1.classList.contains("hidden")) {
                link1.classList.add("hover-background");
            } else {
                link1.classList.remove("hover-background");
            }
        },1000);

        setInterval(function() {
            if(!category2.classList.contains("hidden")) {
                link2.classList.add("hover-background");
            } else {
                link2.classList.remove("hover-background");
            }
        },1000);

        setInterval(function() {
            if(!category3.classList.contains("hidden")) {
                link4.classList.add("hover-background");
            } else {
                link4.classList.remove("hover-background");
            }
        },1000);

        setInterval(function() {
            if(!category4.classList.contains("hidden")) {
                link3.classList.add("hover-background");
            } else {
                link3.classList.remove("hover-background");
            }
        },1000);


        setInterval(function() {
            if(!category5.classList.contains("hidden")) {
                link5.classList.add("hover-background");
            } else {
                link5.classList.remove("hover-background");
            }
        },1000);

        setInterval(function() {
            if(!category6.classList.contains("hidden")) {
                link6.classList.add("hover-background");
            } else {
                link6.classList.remove("hover-background");
            }
        },1000);
      
        link1.addEventListener("mouseout", function() {
            category1.classList.remove("active");
            // category1.classList.add("hidden");
        });

        link2.addEventListener("mouseover", function() {
            category2.classList.add("active");
            category2.classList.remove("hidden");
            category3.classList.add("hidden");
            category1.classList.add("hidden");
            category4.classList.add("hidden");
            category5.classList.add("hidden");
            category6.classList.add("hidden");
        });

        link2.addEventListener("mouseout", function() {
            category2.classList.remove("active");
            // category2.classList.add("hidden");
        });

        link4.addEventListener("mouseover", function() {
            category3.classList.add("active");
            category3.classList.remove("hidden");
            category1.classList.add("hidden");
            category2.classList.add("hidden");
            category4.classList.add("hidden");
            category5.classList.add("hidden");
            category6.classList.add("hidden");
        });

        link4.addEventListener("mouseout", function() {
            category3.classList.remove("active");
            // category1.classList.add("hidden");
        });


        link3.addEventListener("mouseover", function() {
            category4.classList.add("active");
            category4.classList.remove("hidden");
            category1.classList.add("hidden");
            category2.classList.add("hidden");
            category3.classList.add("hidden");
            category5.classList.add("hidden");
            category6.classList.add("hidden");
        });

        link3.addEventListener("mouseout", function() {
            category4.classList.remove("active");
            // category1.classList.add("hidden");
        });

        link5.addEventListener("mouseout", function() {
            category5.classList.remove("active");
            // category1.classList.add("hidden");
        });

        link5.addEventListener("mouseover", function() {
            category5.classList.add("active");
            category5.classList.remove("hidden");
            category1.classList.add("hidden");
            category2.classList.add("hidden");
            category3.classList.add("hidden");
            category4.classList.add("hidden");
            category6.classList.add("hidden");
        });

        link6.addEventListener("mouseout", function() {
            category6.classList.remove("active");
            // category1.classList.add("hidden");
        });

        link6.addEventListener("mouseover", function() {
            category6.classList.add("active");
            category6.classList.remove("hidden");
            category1.classList.add("hidden");
            category2.classList.add("hidden");
            category3.classList.add("hidden");
            category4.classList.add("hidden");
            category5.classList.add("hidden");
        });
    </script>