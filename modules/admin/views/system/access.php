<?php

use app\models\BlogAccess;
use yii\grid\GridView;
/* @var $this yii\web\View */

$this->title = '系统权限';
$current_action = $this->context->action->id;

?>

<?php echo Yii::$app->view->renderFile("@app/modules/admin/views/common/tab_system.php",[ 'current' => $current_action ]);?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'emptyText' => '暂无数据',
    'columns' => [
        'id',
        'title',
        'urls',
        [
            'attribute' => 'status',
            'value' => function($data) {
                return $data->getStatusList()[$data->status];
            },
        ],
        [
            'attribute' => 'type',
            'value' => function($data) {
                return $data->getTypeList()[$data->type];
            },
        ],
        [
            'attribute' => 'parents_id',
            'value' => function($data) {
                return empty($data->parents_id) ? '无' : BlogAccess::findOne($data->parents_id)['title'];
            },
        ],
        'create_time:datetime',
        'update_time:datetime',
        ['class' => 'yii\grid\ActionColumn', 'template' => '{view}{update}', 'urlCreator' => function ($action, $model, $key, $index) {
            if ($action == 'view') {
                return 'view-access?id=' . $key;
            } else {
                return 'update-access?id=' . $key;
            }
        }],
    ]
]);

?>
