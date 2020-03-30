<?php
/* @var $this yii\web\View */

use yii\grid\GridView;
use yii\web\View;

$this->title = '文章列表';
$current_controller = $this->context->id;

?>

<?php echo Yii::$app->view->renderFile("@app/modules/admin/views/common/tab_article.php",[ 'current' => $current_controller ]);?>

<div class="row" style="margin-bottom: 10px;">
    <div class="col-lg-12">
        <a class="btn btn-w-m btn-outline btn-primary pull-right" href="/admin/articles/create">
            <i class="fa fa-plus"></i>写文章
        </a>
    </div>
</div>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'emptyText' => '暂无文章',
    'columns' => [
        'id',
        [
            'attribute' => 'content',
            'value' => function($data) {
                return substr(strip_tags($data->content), 0, 300);
            },
            'contentOptions' => ['style'=>'width: 700px; word-wrap: break-word;'],
        ],
        [
            'attribute' => 'status',
            'value' => function($data) {
                return $data->getStatusList()[$data->status];
            },
        ],
        'count',
        'create_time:datetime',
        'update_time:datetime',
        ['class' => 'yii\grid\ActionColumn', 'template' => '{view} {update}'],
    ]
]);

?>
