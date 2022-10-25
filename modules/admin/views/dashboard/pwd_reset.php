<?php 
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = '修改密码';
$current_action = $this->context->action->id;

?>

<?= Yii::$app->view->renderFile("@app/modules/admin/views/common/tab_user.php",['current' => $current_action]); ?>

<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($user_info, 'password') ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>