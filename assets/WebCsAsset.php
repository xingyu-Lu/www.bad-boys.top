<?php

namespace app\assets;

use yii\web\AssetBundle;

class WebCsAsset extends AssetBundle
{
	public $basePath = '@webroot';
    
    public $baseUrl = '@web';

    public $css = [
        "css/web_cs/cs_style.css",
        "css/web_cs/cs_rolling.css",
    ];

    public $js = [
        "js/web_cs/cs_rolling.js",
        "js/web_cs/cs_public.js",
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
