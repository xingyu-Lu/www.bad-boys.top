<?php 

use app\assets\WebCsAsset;
use app\models\BlogArticles;
use yii\helpers\Html;

WebCsAsset::register($this);

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
    <title>客服系统</title>
    <?php $this->head() ?>
</head>

<body class="room">
<?php $this->beginBody() ?>
    <?= $content; ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>