<?php

use yii\grid\GridView;
/* @var $this yii\web\View */

$this->title = '系统角色';
$current_action = $this->context->action->id;

?>

<?php echo Yii::$app->view->renderFile("@app/modules/admin/views/common/tab_system.php",[ 'current' => $current_action ]);?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'emptyText' => '暂无数据',
    'columns' => [
        'id',
        'name',
        [
            'attribute' => 'status',
            'value' => function($data) {
                return $data->getStatusList()[$data->status];
            },
        ],
        'create_time:datetime',
        'update_time:datetime',
        ['class' => 'yii\grid\ActionColumn', 'template' => '{view}{update}', 'urlCreator' => function ($action, $model, $key, $index) {
            if ($action == 'view') {
                return 'view-role?id=' . $key;
            } else {
                return 'update-role?id=' . $key;
            }
        }],
    ]
]);

?>
