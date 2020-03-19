<?php

if (YII_ENV_DEV) {
    return [
        'class' => 'yii\redis\Session',
        'timeout' => 24 * 3600,
        // 'cookieParams' => ['lifetime' => 7 * 24 * 3600],
        'redis' => [
            'hostname' => 'localhost',
            'port' => 6380,
            'database' => 0,
        ]
    ];
}

if (YII_ENV_PROD) {
    return [
        'class' => 'yii\redis\Session',
        'timeout' => 24 * 3600,
        // 'cookieParams' => ['lifetime' => 7 * 24 * 3600],
        'redis' => [
            'hostname' => 'redis',
            'port' => 6379,
            'database' => 0,
        ]
    ];
}

