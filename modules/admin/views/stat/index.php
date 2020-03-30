<?php
/* @var $this yii\web\View */

use app\common\services\IpLocationService;
use app\common\services\UtilService;
use yii\grid\GridView;
use yii\web\View;

$this->title = '统计';
$current_action = $this->context->action->id;

$js = <<<JS
    $('#start_time').datetimepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        startView: 2,
        minView: 'month',
        language: 'zh-CN',
        pickerPosition: 'bottom-right'
    });
    $('#end_time').datetimepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        startView: 2,
        minView: 'month',
        language: 'zh-CN',
        pickerPosition: 'bottom-right'
    });
JS;

$this->registerJs($js);

?>

<?php echo Yii::$app->view->renderFile("@app/modules/admin/views/common/tab_stat.php",[ 'current' => $current_action ]);?>

<div style="margin-bottom: 10px;"></div>

<div>
    <form class="form-inline" action="/admin/stat/index" method="get">
        <div class="row p-w-m">
            <div class="form-group">
                <div class="input-group">
                    <input id="start_time" type="text" placeholder="请选择开始时间" name="start_time" readonly class="form-control"  value="<?= $start_time ?>">
                </div>
            </div>
            <div class="form-group m-r m-l">
                <label>至</label>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input id="end_time" type="text" placeholder="请选择结束时间" name="end_time" readonly class="form-control" value="<?= $end_time ?>">
                </div>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-w-m btn-outline btn-primary" value="查询">
            </div>
        </div>
        <hr/>
    </form>
</div>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'emptyText' => '暂无数据',
    'columns' => [
        'id',
        [
            'attribute' => 'ip',
            'value' => function($data) {
                $ip = UtilService::intToIp($data->ip);

                $ip_location = new IpLocationService();

                $ip_location = $ip_location->getlocation($ip);
                
                $location = $ip_location ? $ip_location['country'] . $ip_location['area'] : '';
                
                return $ip . '(' . $location . ')';
            },
        ],
        'ua',
        'create_time:datetime',
    ]
]);

?>
