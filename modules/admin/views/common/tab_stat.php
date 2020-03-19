<?php

$tab_list = [
	'index' => [
		'title' => '游客统计',
		'url' => '/admin/stat/index'
	],
	'pv-uv' => [
		'title' => 'pv-uv统计',
		'url' => "/admin/stat/pv-uv"
	]
];
?>
<div class="row  border-bottom">
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