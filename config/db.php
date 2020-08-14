<?php

if (YII_ENV_DEV) {
    return [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=mysql;dbname=blog',
        'username' => 'root',
        'password' => '123456',
        'charset' => 'utf8',

        // Schema cache options (for production environment)
        //'enableSchemaCache' => true,
        //'schemaCacheDuration' => 60,
        //'schemaCache' => 'cache',
    ];
} else {
    return [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=mysql;dbname=blog',
        'username' => 'blog',
        'password' => 'blog@123',
        'charset' => 'utf8',

        // Schema cache options (for production environment)
        //'enableSchemaCache' => true,
        //'schemaCacheDuration' => 60,
        //'schemaCache' => 'cache',
    ];
}
