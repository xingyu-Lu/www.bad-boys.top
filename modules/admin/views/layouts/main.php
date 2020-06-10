<?php
/* @var $this \yii\web\View */
/* @var $content string */
use app\assets\AdminAsset;
use app\models\BlogAdminUser;
use yii\bootstrap\Alert;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

AdminAsset::register($this);

$user_id = Yii::$app->session->get('user_id');
$user_info = BlogAdminUser::findOne($user_id);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Dashboard', 'url' => ['/admin/dashboard/index']],
            ['label' => '文章', 'url' => ['/admin/articles/index']],
            ['label' => '统计', 'url' => ['/admin/stat/index']],
            ['label' => '个人中心', 'url' => ['/admin/dashboard/edit']],
            ['label' => 'Logout', 'url' => ['/admin/dashboard/logout']]
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container-fluid" style="padding-top: 60px;">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
