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
    //get time current
    $current_time = date("l, j/n/Y");
    
    //get weather
    $api_key = "22fd9064d39c2c9295f9e81c1eaccb73";
$city = "Hanoi";
$country_code = "vn";
$url = "https://api.openweathermap.org/data/2.5/weather?q=$city,$country_code&appid=$api_key";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

$data = json_decode($response);
$temperature_kelvin = $data->main->temp;
$temperature_celsius = $temperature_kelvin - 273.15;
?>
 <div
      class="options_layout_wrapper jl_clear_at jl_radius jl_none_box_styles jl_border_radiuss jl_en_day_night"
    >
    <div class="options_layout_container full_layout_enable_front">

<header class="header-wraper jl_header_magazine_style two_header_top_style header_layout_style3_custom jl_cus_top_share">
    <div class="header_top_bar_wrapper" style="background: white";>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-6">
                    <span style="line-height: 40px;margin-left: 12px; display: flex;"><?= $current_time ?> </span>
                </div>
                <div class="col-md-8 col-6">
                    <div class="jl_top_cus_social">
                        <div class="menu_mobile_share_wrapper">
                            <ul class="social_icon_header_top jl_socialcolor">
                                <li style="line-height: 40px;">
                                    <span>Hà Nội</span>
                                </li>
                                <li style="line-height: 40px;">
                                    <svg viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" width="35" height="35"><path d="M60.156 68.75c18.985 0 34.375-15.39 34.375-34.375S79.141 0 60.156 0C41.172 0 25.781 15.39 25.781 34.375S41.171 68.75 60.156 68.75Z" fill="#5A6164"></path><path d="M34.375 25.781C15.391 25.781 0 41.171 0 60.156a8.569 8.569 0 0 0 8.594 8.594h51.562a8.569 8.569 0 0 0 8.594-8.594c0-18.984-15.39-34.375-34.375-34.375Z" fill="#374043"></path><path d="M75 100c13.807 0 25-11.193 25-25S88.807 50 75 50 50 61.193 50 75s11.193 25 25 25Z" fill="#CFFFFF" fill-opacity="0.8"></path><path d="M56.25 68.75c-13.828 0-25 11.172-25 25 0 3.438 2.813 6.25 6.25 6.25H75c3.438 0 6.25-2.813 6.25-6.25 0-13.828-11.172-25-25-25Z" fill="#CDFAFA"></path></svg>
                                </li>
                                <li style="line-height: 40px;">
                                    <span style="font-weight:600;"><?= $temperature_celsius .'°C'?></span>
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
                            <!-- begin logo --><a class="logo_link" href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/index'])?>"><img class="jl_logo_n" src="/img/logo1.png" alt="songxanh24h"/><img class="jl_logo_w" src="/img/logo1.png" alt="songxanh24h" /></a><!-- end logo -->
                        </div>
                    </div>
                    <div class="search_header_menu jl_nav_mobile">
                    <div class="menu_mobile_icons">
                      <div class="jlm_w">
                        <span class="jlma"></span><span class="jlmb"></span
                        ><span class="jlmc"></span>
                      </div>
                    </div>
                    <div class="jl_day_night jl_day_en">
                      <span class="jl-night-toggle-icon">
                        <span class="jl_moon"> <i class="jli-moon"></i> </span
                        ><span class="jl_sun"> <i class="jli-sun"></i> </span
                      ></span>
                    </div>
                  </div>
                    <div class="menu-primary-container navigation_wrapper jl_cus_share_mnu">
                        <ul id="mainmenu" class="jl_main_menu">
                            <?php if (isset($this->params['paramName']) && $this->params['paramName']) : ?>
                                <?php foreach ($this->params['paramName'] as $item) : ?>
                                    <?php if (isset($item->category_child[0]) && $item->category_child[0]) : ?>
                                        <li class="menu-item menu-item-has-children">
                                            <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/category','slug'=>create_slug($item['name'])]) ?>">
                                                <?= $item->name?> <span class="border-menu"></span>
                                                <span class="jl_menu_lb" style="
                              background: #ffe500 !important;
                              color: red !important;
                            "><span class="jl_lb_ar" style="border-top: 3px solid #ffe500 !important"></span>Hot</span>
                                            </a>
                                            <ul class="sub-menu">
                                            <?php foreach ($item->category_child as $item_child) : ?>
                                                <li class="menu-item">
                                                    <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/category-child','parent'=>create_slug($item['name']) ,'slug'=>create_slug($item_child)]) ?>"><?= $item_child ?><span class="border-menu"></span></a>
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

