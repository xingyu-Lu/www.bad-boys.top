<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\web\View;
use yii\widgets\DetailView;

$this->title = '查看系统用户';

?>

<?php echo Yii::$app->view->renderFile("@app/modules/admin/views/common/tab_system.php",[ 'current' => '' ]);?>

<h2><?= Html::encode($this->title) ?></h2>

<p>
    <?= Html::a('返回列表', ['index'], ['class' => 'btn btn-primary']) ?>
    <?= Html::a('编辑', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
</p>

<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        'name',
        'email',
        [
            'attribute' => 'status',
            'value' => function($data) {
                return $data->getStatusList()[$data->status];
            },
        ],
        'create_time:datetime',
        'update_time:datetime',
    ]
]);?>
