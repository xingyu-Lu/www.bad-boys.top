<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BlogAdminUser */
/* @var $form ActiveForm */

?>

<script type="text/javascript">
	function check() {
		var type = $('#blogaccess-type').val();
		var parents_id = $('#blogaccess-parents_id').val();
		if (type == 0 && parents_id != 0) {
			alert('类型为菜单，所属上级只能为无');
			return false;
		}
		if (type != 0 && parents_id == 0) {
			alert('类型不为菜单，所属上级不能为无');
			return false;
		}
	}
</script>

<div class="system-create_admin_user col-md-8">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'title') ?>

        <?= $form->field($model, 'urls') ?>
        
        <?= $form->field($model, 'status')->dropDownList($model->getStatusList()); ?>

        <?= $form->field($model, 'type')->dropDownList($model->getTypeList()); ?>

        <?= $form->field($model, 'parents_id')->dropDownList($access_list); ?>
    
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? '添加' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'onclick' => 'return check();']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- system-create_admin_user -->
