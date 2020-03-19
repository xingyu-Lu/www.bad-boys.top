<?php
/* @var $this yii\web\View */

use app\common\services\UtilService;
use yii\grid\GridView;
use yii\web\View;

$this->title = 'pv_uv';
$current_action = $this->context->action->id;

?>

<?php echo Yii::$app->view->renderFile("@app/modules/admin/views/common/tab_stat.php",[ 'current' => $current_action ]);?>

<div style="margin-bottom: 10px;"></div>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'emptyText' => '暂无数据',
    'columns' => [
        'id',
        'day:date',
        'pv',
        'uv',
        'create_time:datetime',
        'update_time:datetime',
    ]
]);

?>
