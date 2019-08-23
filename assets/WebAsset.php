<?php


namespace app\assets;


use yii\web\AssetBundle;

class WebAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/font-awesome.min.css',
        'css/web/style.css',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

    public function registerAssetFiles( $view ){
        //加一个版本号,目的 ： 是浏览器获取最新的css 和 js 文件
        $release_version = defined("RELEASE_VERSION")?RELEASE_VERSION:time();
        $this->css = [
            "/font-awesome/css/font-awesome.css",
//            "/plugins/layer/skin/default/layer.css",
            "/css/web/style.css?v=$release_version",
        ];
        $this->js = [
            "/plugins/layer/layer.js",
            "/js/web/common.js?v=$release_version",
        ];
        parent::registerAssetFiles( $view );
    }
}