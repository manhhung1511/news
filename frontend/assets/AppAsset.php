<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        // 'css/site.css'
        'css/site.min.css?v=1.5.0',
        // 'css/fonts/jl_font.ttf',
        // 'css/fonts/P5sMzZCDf9_T_10ZxCE.woff2',
        // 'css/fonts/UcC73FwrK3iLTeHuS_fvQtMwCp50KnMa1ZL7.woff2'
    ];
    public $js = [
        'js/jquery.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        // 'yii\bootstrap\BootstrapAsset',
    ];
    public $jsOptions = [
        'position' => \yii\web\View::POS_HEAD
    ];
}
