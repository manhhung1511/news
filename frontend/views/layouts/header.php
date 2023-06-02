<?php
function create_slug($string)
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

<header class="header-wraper jl_header_magazine_style two_header_top_style header_layout_style3_custom jl_cus_top_share">
    <div class="header_top_bar_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="jl_top_cus_social">
                        <div class="menu_mobile_share_wrapper">
                            <ul class="social_icon_header_top jl_socialcolor">
                                <li>
                                    <a class="facebook" href="#" target="_blank"><i class="jli-facebook"></i></a>
                                </li>
                                <li>
                                    <a class="vk" href="#" target="_blank"><i class="jli-vk"></i></a>
                                </li>
                                <li>
                                    <a class="telegram" href="#" target="_blank"><i class="jli-telegram"></i></a>
                                </li>
                                <li>
                                    <a class="behance" href="#" target="_blank"><i class="jli-behance"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Main menu -->
    <div class="jl_blank_nav"></div>
    <div id="menu_wrapper" class="menu_wrapper jl_menu_sticky jl_stick">
        <div class="container">
            <div class="row">
                <div class="main_menu col-md-12">
                    <div class="logo_small_wrapper_table">
                        <div class="logo_small_wrapper">
                            <!-- begin logo --><a class="logo_link" href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/index'])?>"><img class="jl_logo_n" src="img/logo_n.png" alt="sprasa" /><img class="jl_logo_w" src="img/logo_w.png" alt="sprasa" /></a><!-- end logo -->
                        </div>
                    </div>
                    <div class="menu-primary-container navigation_wrapper jl_cus_share_mnu">
                        <ul id="mainmenu" class="jl_main_menu">
                            <?php if (isset($this->params['paramName']) && $this->params['paramName']) : ?>
                                <?php foreach ($this->params['paramName'] as $item) : ?>
                                    <?php if (isset($item->category_child[0]) && $item->category_child[0]) : ?>
                                        <li class="menu-item menu-item-has-children">
                                            <a href="shop.html">
                                                <?= $item->name?> <span class="border-menu"></span>
                                                <span class="jl_menu_lb" style="
                              background: #ffe500 !important;
                              color: red !important;
                            "><span class="jl_lb_ar" style="border-top: 3px solid #ffe500 !important"></span>Hot</span>
                                            </a>
                                            <ul class="sub-menu">
                                            <?php foreach ($item->category_child as $item) : ?>
                                                <li class="menu-item">
                                                    <a href="cart.html"><?= $item ?><span class="border-menu"></span></a>
                                                </li>
                                            <?php endforeach; ?>
                                            </ul>
                                        </li>
                                    <?php else : ?>
                                        <li class="menu-item current-menu-item current_page_item">
                                            <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/category','slug'=>create_slug($item['name'])]) ?>"><?= $item->name ?><span class="border-menu"></span></a>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>