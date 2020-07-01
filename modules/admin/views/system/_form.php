<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BlogAdminUser */
/* @var $form ActiveForm */
?>
<div class="system-create_admin_user col-md-8">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name') ?>

        <?= $form->field($model, 'email') ?>

        <?= $form->field($model, 'password')->passwordInput() ?>
        
        <?= $form->field($model, 'status')->dropDownList($model->getStatusList()); ?>

        <?= $form->field($model, 'is_admin')->dropDownList($model->getAdminStatusList()); ?>

        <?= $form->field($model, 'role_id')->dropDownList($role_list); ?>
    
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? '添加' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- system-create_admin_user -->
