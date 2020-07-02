<?php

use app\assets\AdminAsset;
use yii\captcha\Captcha;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
AdminAsset::register($this);

/* @var $this yii\web\View */
/* @var $model app\models\BlogAdminUser */
/* @var $form ActiveForm */

$this->title = '登录';

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

<body style="background-color: white">
<?php $this->beginBody() ?>
    <div class="row">
        <div class="col-lg-4 col-lg-offset-4" style="margin-top: 100px;">
            <h1>登录系统</h1>

            <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'verify_code')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
                </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>