<?php

namespace app\assets;

use yii\web\AssetBundle;

class WebAsset extends AssetBundle
{
	public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        
        "/font-awesome/css/fontawesome.css",
        "/font-awesome/css/brands.css",
        "/font-awesome/css/solid.css",
        "css/web/style.css",
    ];
    public $js = [
    ];
}
