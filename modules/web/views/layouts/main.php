<?php 

use app\assets\WebAsset;
use app\models\BlogArticles;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;

WebAsset::register($this);

$tags_arr = BlogArticles::find()
    ->select('tag, count(*) as count')
    ->where(['status' => 0])
    ->groupBy('tag')
    ->asArray()
    ->all();

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="博客系统,技术博客,个人博客,设计模式,yii2博客,php博客" />
    <meta name="description" content="卢星宇的php博客,个人技术博客,写一些技术文章设计模式." />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?= Html::csrfMetaTags() ?>
    <title>卢星宇博客,技术博客,php博客系统</title>
    <?php $this->head() ?>
</head>

<body>
<?php $this->beginBody() ?>
<div class="wrap">
    <?php
        NavBar::begin([
            'brandLabel' => '卢星宇博客',
            'brandUrl' => '/',
            'options' => [
                'class' => 'navbar-inverse navbar-fixed-top',
            ],
        ]);
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
                ['label' => '首页', 'url' => ['/']],
                ['label' => 'PHP', 'url' => ['/web/article/php']],
                ['label' => 'Linux', 'url' => ['/web/article/linux']],
                ['label' => '算法', 'url' => ['/web/article/arithmetic']],
                ['label' => 'MySQL', 'url' => ['/web/article/mysql']],
                ['label' => '其他', 'url' => ['/web/article/others']],
                ['label' => '联系客服', 'url' => ['/web/cs/index'], 'linkOptions' => ['target' => '_blank']]
            ],
        ]);
        NavBar::end();
    ?>

    <div class="b-h-70"></div>

    <div id="b-content" class="container">
        <div class="row">
            <!-- 左侧列表开始 -->
            <div class="col-xs-12 col-md-12 col-lg-8">
                <?= $content; ?> 
            </div>
            <!-- 左侧列表结束 -->
            <div id="b-public-right" class="col-lg-4 hidden-xs hidden-sm hidden-md">
                <div class="b-search">
                    <form class="form-inline" role="form" action="/web/article/search" method="get">
                        <input class="b-search-text" type="text" name="keywords">
                        <input class="b-search-submit" type="submit" value="搜索">
                    </form>
                </div>
                <div class="b-tags">
                    <h4 class="b-title">标签</h4>
                    <ul class="b-all-tname">
                        <?php foreach ($tags_arr as $key => $value): ?>
                            <li class="b-tname">
                                <a class="tstyle-<?= rand(1, 4); ?>" href="/web/article/tag?tag=<?= $value['tag']; ?>"><?= $value['tag'] . '(' . $value['count'] . ')'; ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<footer id="b-foot" style="padding: 10px 0;">
    <div class="container">
        <div class="row b-content">
            <dl class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                <dd><a href="http://www.beian.miit.gov.cn" target="_blank" rel="nofollow me noopener noreferrer">ICP 备案：蜀ICP备17043702号-1</a></dd>
            </dl>
        </div>
    </div>
    <a class="go-top fa fa-angle-up animated jello" href="javascript:;"></a>
</footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>