<?php 
use app\models\BlogArticles;
?>
<div class="row b-article">
    <h1 class="col-xs-12 col-md-12 col-lg-12 b-title"><?= $article['title']; ?></h1>
    <div class="col-xs-12 col-md-12 col-lg-12">
        <ul class="row b-metadata">
            <li class="col-xs-5 col-md-2 col-lg-3">
                <i class="fas fa-user fa-sm"></i>
                <span><?= $article['author']; ?></span>
            </li>
            <li class="col-xs-7 col-md-3 col-lg-3">
                <i class="fas fa-calendar fa-sm"></i>
                <span><?= date('Y-m-d H:i:s', $article['create_time']); ?></span>
            </li>
            <li class="col-xs-5 col-md-2 col-lg-2">
                <i class="fas fa-list-alt fa-sm"></i>
                <span><?= BlogArticles::getCategoryList()[$article['category']]; ?></span>
            </li>
            <li class="col-xs-7 col-md-5 col-lg-4 ">
                <i class="fas fa-tag fa-sm"></i>
                <span><?= $article['tag']; ?></span>
            </li>
        </ul>
    </div>
    <div class="col-xs-12 col-md-12 col-lg-12 b-content-word">
        <div class="js-content">
            <?= $article['content']; ?>
        </div>
        <p class="b-h-20"></p>
        <p class="b-copyright">
        本文为卢星宇原创文章,转载无需和我联系,但请注明来自<a href="http://www.bad-boys.top" target="_blank">卢星宇博客</a>
        </p>
    </div>
</div>