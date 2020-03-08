<?php
/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */

use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

$this->registerCssFile('/plugins/umeditor/themes/default/css/umeditor.css');
// $this->registerJsFile('/plugins/umeditor/third-party/template.min.js', ['depends'=>'yii\web\YiiAsset','position'=>\yii\web\View::POS_END]);
$this->registerJsFile('/plugins/umeditor/umeditor.config.js', ['depends'=>'yii\web\YiiAsset','position'=>\yii\web\View::POS_END]);
$this->registerJsFile('/plugins/umeditor/umeditor.js', ['depends'=>'yii\web\YiiAsset','position'=>\yii\web\View::POS_END]);
$this->registerJsFile('/plugins/umeditor/lang/zh-cn/zh-cn.js', ['depends'=>'yii\web\YiiAsset','position'=>\yii\web\View::POS_END]);

$js = <<<JS
    var um = UM.getEditor('myEditor', {
    //关闭字数统计
    // wordCount:false,
    //关闭elementPath
    // elementPathEnabled:false,
    //默认的编辑区域高度
    initialFrameHeight:340,     
});
JS;

$this->registerJs($js);

?>
    <div class="col-md-8">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'content')->textarea(['rows' => 10, 'id' => 'myEditor']); ?>

        <?= $form->field($model, 'status')->dropDownList($model->getStatusList()); ?>

        <?= $form->field($model, 'category')->dropDownList($model->getCategoryList()); ?>

        <?= $form->field($model, 'tag'); ?>

        <?= Html::submitButton($model->isNewRecord ? '添加' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

        <?php ActiveForm::end(); ?>
    </div>
