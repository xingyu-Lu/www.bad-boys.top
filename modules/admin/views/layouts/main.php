<?php
/* @var $this \yii\web\View */
/* @var $content string */
use app\assets\AdminAsset;
use app\models\BlogAdminUser;
use yii\helpers\Html;

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
<div id="wrapper">
    <nav style="z-index: 0;" class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="profile-element text-center">
                        <img alt="image" class="img-circle" src="/images/web/logo.png" />
                        <p class="text-muted">星宇博客</p>
                    </div>
                    <div class="logo-element">
                        <img alt="image" class="img-circle" src="/images/web/logo.png" />
                    </div>
                </li>
                <li class="dashbord">
                    <a href="/admin/dashbord/index"><i class="fab fa-dashcube fa-lg"></i><span class="nav-label">仪表盘</span></a>
                </li>
                <li class="article">
                    <a href="/admin/articles/index"><i class="fas fa-newspaper fa-lg"></i><span class="nav-label">文章</span></a>
                </li>
                <li class="stat">
                    <a href="/admin/stat/index"><i class="fas fa-chart-line fa-lg"></i><span class="nav-label">统计</span></a>
                </li>
            </ul>

        </div>
    </nav>

    <div id="page-wrapper" style="background-color: #ffffff; height: 2000px;">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="javascript:void(0)"><i class="fa fa-bars"></i> </a>

                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
						<span class="m-r-sm text-muted welcome-message">
                            欢迎使用星宇博客管理后台
                        </span>
                    </li>
                    <li class="dropdown user_info">
                        <a class="dropdown-toggle" data-toggle="dropdown" ole="button" aria-haspopup="true" aria-expanded="false" href="javascript:void(0)">
                            <img alt="image" class="img-circle" src="/images/web/avatar.png" />
                        </a>
                        <ul class="dropdown-menu dropdown-messages">
                            <li>
                                <div class="dropdown-messages-box">
                                    姓名：<?= isset($user_info->name) ? $user_info->name : ''; ?>
                                    <a href="/admin/dashbord/edit" class="pull-right">编辑</a>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="dropdown-messages-box">
                                    邮箱：<?= isset($user_info->email) ? $user_info->email : ''; ?>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="link-block text-center">
                                    <a class="pull-left" href="/admin/dashbord/pwd-reset">
                                        <i class="fas fa-lock"></i> 修改密码
                                    </a>
                                    <a class="pull-right" href="/admin/dashbord/loginout">
                                        <i class="fa fa-sign-out"></i> 退出
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>

                </ul>

            </nav>
        </div>
        <?= $content; ?>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
