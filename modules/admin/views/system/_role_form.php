<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BlogAdminUser */
/* @var $form ActiveForm */
?>
<div class="system-create_admin_user">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name') ?>
        
        <?= $form->field($model, 'status')->dropDownList($model->getStatusList()); ?>

		<?php foreach ($access_menu as $key => $value): ?>
			<table class="table" style="box-shadow: 2px 2px 5px #888888;">
				<tbody>
					<tr>
						<td colspan="10">
							<label><input type="checkbox" name="access[]" value="<?= $value['id'] ?>" <?php if (in_array($value['id'], $role_access_list)) echo "checked"; ?>> <?= $value['title'] ?></label>
							<span class="label label-default">菜单</span>
						</td>
					</tr>
					<?php foreach ($access_list as $key_l => &$value_l): ?>
						<tr>
							<?php foreach ($value_l as $key_l_l => $value_l_l): ?>
								<?php if ($value_l_l['parents_id'] != $value['id']): ?>
									<?php continue; ?>
								<?php endif ?>
								<td>
									<label><input type="checkbox" name="access[]" value="<?= $value_l_l['id'] ?>" <?php if (in_array($value_l_l['id'], $role_access_list)) echo "checked"; ?>> <?= $value_l_l['title'] ?></label>
									<?php if ($value_l_l['type'] == 0): ?>
										<?= '<span class="label label-default">菜单</span>' ?>
									<?php elseif($value_l_l['type'] == 1): ?>
										<?= '<span class="label label-info">页面</span>' ?>
									<?php else: ?>
										<?= '<span class="label label-success">ajax</span>' ?>
									<?php endif ?>
								</td>
								<?php unset($value_l[$key_l_l]); ?>
							<?php endforeach ?>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		<?php endforeach ?>
    
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? '添加' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- system-create_admin_user -->
