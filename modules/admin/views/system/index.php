<?php

use yii\grid\GridView;
/* @var $this yii\web\View */

$this->title = '系统';
$current_action = $this->context->action->id;

?>

<?php echo Yii::$app->view->renderFile("@app/modules/admin/views/common/tab_system.php",[ 'current' => $current_action ]);?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'emptyText' => '暂无数据',
    'columns' => [
        'id',
        'name',
        'email',
        [
            'attribute' => 'status',
            'value' => function($data) {
                return $data->getStatusList()[$data->status];
            },
        ],
        [
            'attribute' => 'is_admin',
            'value' => function($data) {
                return $data->getAdminStatusList()[$data->is_admin];
            },
        ],
        'role_id',
        'create_time:datetime',
        'update_time:datetime',
        ['class' => 'yii\grid\ActionColumn', 'template' => '{view}{update}'],
    ]
]);

?>
