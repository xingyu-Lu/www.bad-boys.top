<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';
$session_redis = require __DIR__ . '/session_redis.php';

$config = [
    'id' => 'basic',
    'name' => '博客后台',
    'homeUrl' => '/admin/dashboard/index',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'zh-CN',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '9Qp0Wp-TfwF7v-nv6EzHB_gNpacu0hEN',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '/' => 'web/article/index',
            ],
        ],
        'formatter' => [
            'dateFormat' => 'Y-M-d',
            'datetimeFormat' => 'php:Y-m-d H:i:s',
            'decimalSeparator' => ',',
            'thousandSeparator' => ' ',
            'currencyCode' => '￥',
            'sizeFormatBase' => 1000,
        ],
        'session' => $session_redis,
        'assetManager' => [
            // 'bundles' => [
            //     'yii\web\JqueryAsset' => [
            //         'sourcePath' => null,   // 一定不要发布该资源
            //         'js' => [
            //             'https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js',
            //         ]
            //     ],
            // ]
        ],
    ],
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\AdminModule',
        ],
        'v1' => [
            'class' => 'app\modules\v1\V1Module',
        ],
        'web' => [
            'class' => 'app\modules\web\Module',
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1', '192.168.197.*'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1', '192.168.197.*'],
    ];
}

return $config;
