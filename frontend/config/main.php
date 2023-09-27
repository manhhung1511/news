<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => \yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManagerBackend' => [
            'class' => 'yii\web\urlManager',
            'baseUrl' => 'https://cms.songxanh24h.vn/img/',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                ''=>'site/index',
                'category/<slug:[\w\-]+>' => 'site/category',   
                'category/<parent:[\w\-]+>/<slug:[\w\-]+>/' => 'site/category-child',   
                '<slug:[\w\-]+>' => 'site/detail', 
                '<slug:[\w\-]+>/page-<page:\w+>/per-page-<per_page:\w+>/' => 'site/category',
                'thuoc/<slug:[\w\-]+>' => 'crawl/medicine-detail',
                'thuoc/danh-muc/tat-ca' => 'crawl/full-medicine', 
                'nhom-thuoc/thuoc/<slug:[\w\-]+>' => 'crawl/medicine',
                'benh-vien/tat-ca' => 'crawl/full-province',
                'benh-vien/<slug:[\w\-]+>' => 'crawl/hospital',
                'benh-vien/<slug-category:[\w\-]+>/<slug:[\w\-]+>' => 'crawl/hospital-detail',
                'benh/tat-ca' => 'crawl/full-sick',
                'benh/<slug:[\w\-]+>' => 'crawl/sick-detail',
                'nha-thuoc/tat-ca' => 'crawl/full-drugstore',
                'nha-thuoc/<slug:[\w\-]+>' => 'crawl/drugstore',
                'nha-thuoc/<slug-category:[\w\-]+>/<slug:[\w\-]+>' => 'crawl/drug-store-detail',
                'duoc-lieu/tat-ca' => 'crawl/full-drug',
                'duoc-lieu/<slug:[\w\-]+>' => 'crawl/drug-detail',
                'hoat-chat/tat-ca' => 'crawl/full-active',
                'hoat-chat/<slug:[\w\-]+>' => 'crawl/active-detail'
            ], 
        ],
    
    ],
    'params' => $params,
];
