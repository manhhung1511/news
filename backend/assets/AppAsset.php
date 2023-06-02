<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'app-assets/vendors/css/vendors.min.css',
        'app-assets/vendors/css/forms/select/select2.min.css',
        'app-assets/css/bootstrap.min.css',
        'app-assets/css/bootstrap-extended.min.css',
        'app-assets/css/colors.min.css',
        'app-assets/css/components.min.css',
        'app-assets/css/style.css?v=1.8',
    ];
    public $js = [
        'app-assets/vendors/js/vendors.min.js',
        'app-assets/vendors/js/forms/select/select2.full.min.js',
        'app-assets/js/my-script.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        // 'yii\bootstrap\BootstrapAsset',
    ];
    public $jsOptions = [
        'position' => \yii\web\View::POS_HEAD
    ];
}
