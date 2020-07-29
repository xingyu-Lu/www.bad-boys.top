<?php

$tab_list = [
	'index' => [
		'title' => '系统用户',
		'url' => '/admin/system/index'
	],
	'create-admin-user' => [
		'title' => '添加系统用户',
		'url' => "/admin/system/create-admin-user"
	],
	'role' => [
		'title' => '系统角色',
		'url' => "/admin/system/role"
	],
	'create-role' => [
		'title' => '添加系统角色',
		'url' => "/admin/system/create-role"
	],
	'access' => [
		'title' => '系统权限',
		'url' => "/admin/system/access"
	],
	'create-access' => [
		'title' => '添加系统权限',
		'url' => "/admin/system/create-access"
	],
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