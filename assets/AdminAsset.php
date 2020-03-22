<?php


namespace app\assets;


use yii\web\AssetBundle;

class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    // public $css = [
    //     'css/site.css',
    // ];
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
            "/font-awesome/css/fontawesome.css",
            "/font-awesome/css/brands.css",
            "/font-awesome/css/solid.css",
//            "/plugins/layer/skin/default/layer.css",
            "/css/admin/style.css?v=$release_version",
            "/plugins/datetimepicker/bootstrap-datetimepicker.min.css",
        ];
        $this->js = [
            // "/plugins/layer/layer.js",
            "/js/admin/common.js?v=$release_version",
            "/plugins/datetimepicker/bootstrap-datetimepicker.min.js",
        ];
        parent::registerAssetFiles( $view );
    }
}