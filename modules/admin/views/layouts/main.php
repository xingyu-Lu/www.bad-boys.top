<?php
/* @var $this \yii\web\View */
/* @var $content string */
use \app\common\services\UrlService;
use yii\helpers\Html;
use app\assets\WebAsset;

WebAsset::register($this);
$upload_config = Yii::$app->params['upload'];
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
                <li class="dashboard">
                    <a href="/admin/articles/index"><i class="fa fa-file-text fa-lg"></i>
                        <span class="nav-label">文章</span></a>
                </li>
            </ul>

        </div>
    </nav>

    <div id="page-wrapper" class="gray-bg" style="background-color: #ffffff; height: 656px">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="<?=UrlService::buildNullUrl();?>"><i class="fa fa-bars"></i> </a>

                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
						<span class="m-r-sm text-muted welcome-message">
                            欢迎使用星宇博客管理后台
                        </span>
                    </li>
                    <li class="hidden">
                        <a class="count-info" href="<?=UrlService::buildNullUrl();?>">
                            <i class="fa fa-bell"></i>
                            <span class="label label-primary">8</span>
                        </a>
                    </li>


                    <li class="dropdown user_info">
                        <a class="dropdown-toggle" data-toggle="dropdown" ole="button" aria-haspopup="true" aria-expanded="false" href="<?=UrlService::buildNullUrl();?>">
                            <img alt="image" class="img-circle" src="/images/web/avatar.png" />
                        </a>
                        <ul class="dropdown-menu dropdown-messages">
                            <li>
                                <div class="dropdown-messages-box">
                                    姓名：
                                    <a href="" class="pull-right">编辑</a>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="dropdown-messages-box">
                                    手机号码：
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="link-block text-center">
                                    <a class="pull-left" href="">
                                        <i class="fa fa-lock"></i> 修改密码
                                    </a>
                                    <a class="pull-right" href="">
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
<div class="hidden_layout_warp hide">
    <input type="hidden" name="upload_config" value='<?=json_encode( $upload_config );?>'/>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
