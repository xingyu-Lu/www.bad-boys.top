<?php 
use app\models\BlogArticles;
use yii\widgets\LinkPager;
?>

<?php if(Yii::$app->controller->id == 'article' && Yii::$app->controller->action->id == 'tag'): ?>
    <div class="row b-tag-title">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <h2>拥有<span class="b-highlight"><?= $tag; ?></span>标签的文章</h2>
        </div>
    </div>
<?php endif; ?>

<?php foreach ($articles as $key => $value): ?>
    <div class="row b-one-article">
        <h3 class="col-xs-12 col-md-12 col-lg-12">
            <a class="b-oa-title" href="/web/article/info?id=<?= $value['id'] ?>" target="_blank"><?= $value['title']; ?></a>
        </h3>
        <div class="col-xs-12 col-md-12 col-lg-12 b-date">
            <ul class="row">
                <li class="col-xs-5 col-md-2 col-lg-3">
                    <i class="fa fa-user"></i>
                    <span><?= $value['author']; ?></span>
                </li>
                <li class="col-xs-7 col-md-3 col-lg-3">
                    <i class="fa fa-calendar"></i>
                    <span><?= date('Y-m-d H:i:s', $value['create_time']); ?></span>
                </li>
                <li class="col-xs-5 col-md-2 col-lg-2">
                    <i class="fa fa-list-alt"></i>
                    <span><?= BlogArticles::getCategoryList()[$value['category']]; ?></span>
                </li>
                <li class="col-xs-7 col-md-5 col-lg-4 ">
                    <i class="fa fa-tag"></i>
                    <span><?= $value['tag']; ?></span>
                </li>
            </ul>
        </div>
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="row">
                <!-- 文章描述开始 -->
                <div class="col-xs-12 col-sm-12  col-md-12 col-lg-12 b-des-read">
                    <?= substr(strip_tags($value['content']), 0, 300); ?>
                </div>
                <!-- 文章描述结束 -->
            </div>
        </div>
        <a class=" b-readall" href="/web/article/info?id=<?= $value['id'] ?>" target="_blank">阅读全文</a>
    </div>
<?php endforeach; ?>

<?php if(empty($articles)): ?>
    <p class="text-center text-danger">暂无文章</p>
<?php endif; ?>


<!-- 列表分页开始 -->
<?= LinkPager::widget([
    'pagination' => $pagination,
]); ?>
<!-- 列表分页结束 -->
