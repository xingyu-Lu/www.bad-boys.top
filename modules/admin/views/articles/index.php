<?php
/* @var $this yii\web\View */

use app\models\BlogArticles;
use yii\bootstrap\Collapse;
use yii\bootstrap\Dropdown;
use yii\grid\GridView;
use yii\web\View;

$this->title = '文章列表';
$current_action = $this->context->action->id;

?>

<?php echo Yii::$app->view->renderFile("@app/modules/admin/views/common/tab_article.php",[ 'current' => $current_action ]);?>

<form class="form-inline" action="/admin/articles/index" method="get">
    <div class="form-group">
        <div class="input-group">
            <input type="text" placeholder="请输入文章标题" name="title" class="form-control"  value="">
        </div>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-w-m btn-outline btn-primary" value="查询">
    </div>
    <hr/>
</form>

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
        [
            'attribute' => 'category',
            'value' => function($data) {
                return BlogArticles::getCategoryList()[$data->category];
            },
            'contentOptions' => ['style'=>'width: 70px; word-wrap: break-word;'],
        ],
        'tag',
        'author',
        'title',
        [
            'attribute' => 'title',
            'value' => function($data) {
                return $data->title;
            },
            'contentOptions' => ['style'=>'width: 200px; word-wrap: break-word;'],
        ],
        'count',
        'create_time:datetime',
        'update_time:datetime',
        ['class' => 'yii\grid\ActionColumn', 'template' => '{view} {update}'],
    ]
]);

?>
