<?php
$tab_list = [
    'articles' => [
        'title' => '文章列表',
        'url' => '/admin/articles/index'
    ],
];
?>

<div class="row  border-bottom" style="margin-bottom: 10px">
    <div class="col-lg-12">
        <div class="tab_title">
            <ul class="nav nav-pills">
                <?php foreach( $tab_list as  $_current => $_item ):?>
                    <li <?php if( $current == $_current ):?> class="current" <?php endif;?> >
                        <a href="<?= $_item['url']; ?>"><?=$_item['title'];?></a>
                    </li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>
</div>
