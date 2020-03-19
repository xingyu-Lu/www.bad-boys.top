<?php 
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?= Yii::$app->view->renderFile("@app/modules/admin/views/common/tab_user.php",['current' => 'edit']); ?>

<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($user_info, 'name') ?>

    <?= $form->field($user_info, 'email') ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>