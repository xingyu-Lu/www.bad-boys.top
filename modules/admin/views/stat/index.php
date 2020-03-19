<?php
/* @var $this yii\web\View */

use app\common\services\UtilService;
use yii\grid\GridView;
use yii\web\View;

$this->title = '统计';
$current_action = $this->context->action->id;

?>

<?php echo Yii::$app->view->renderFile("@app/modules/admin/views/common/tab_stat.php",[ 'current' => $current_action ]);?>

<div style="margin-bottom: 10px;"></div>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'emptyText' => '暂无数据',
    'columns' => [
        'id',
        [
            'attribute' => 'ip',
            'value' => function($data) {
                return UtilService::intToIp($data->ip);
            },
        ],
        'ua',
        'create_time:datetime',
    ]
]);

?>
