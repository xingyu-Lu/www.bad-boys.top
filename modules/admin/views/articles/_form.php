<?php
/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */

use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

$this->registerJsFile('/plugins/ueditor/ueditor.config.js');
$this->registerJsFile('/plugins/ueditor/ueditor.all.min.js');

$js = <<<JS
    var um = UE.getEditor('myEditor', {
    //关闭字数统计
    // wordCount:false,
    //关闭elementPath
    // elementPathEnabled:false,
    //默认的编辑区域高度
    initialFrameHeight:240,
});
JS;

$this->registerJs($js);

?>
    <div class="col-md-8">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'content')->textarea(['rows' => 6, 'id' => 'myEditor', 'class' => 'col-sm-1 col-md-12', 'style' => 'margin-left: -15px']); ?>

        <?= $form->field($model, 'status')->dropDownList($model->getStatusList()); ?>

        <?= Html::submitButton($model->isNewRecord ? '添加' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

        <?php ActiveForm::end(); ?>
    </div>
