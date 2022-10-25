-- 2020-02-27 添加文章表 --
create table if not exists `blog_articles` (
    `id` int(11) unsigned not null AUTO_INCREMENT,
    `content` text not null comment '文章内容',
    `status` tinyint(1) unsigned not null default '0' comment '0:正常；1:下线',
    `category` varchar(20) not null default '' comment '分类',
    `tag` varchar(20) not null default '' comment '标签',
    `author` varchar(20) not null default '' comment '作者',
    `title` varchar(30) not null default '' comment '文章标题',
    `count` int(11) not null default 0 comment '浏览次数',
    `create_time` int(11) unsigned not null default '0',
    `update_time` int(11) unsigned not null default '0',
    primary key (`id`)
) engine=innodb auto_increment=1;

-- 2020-02-27 添加后台用户表 --
create table if not exists `blog_admin_user` (
	`id` int(11) unsigned not null AUTO_INCREMENT,
	`name` varchar(20) not null default '' comment '姓名',
	`email` varchar(30) not null default '' comment '邮箱',
	`password` varchar(32) not null default '' comment '密码',
	`status` tinyint(1) unsigned not null default '0' comment '0:有效；1：无效',
	`create_time` int(11) unsigned not null default '0',
    `update_time` int(11) unsigned not null default '0',
    primary key (`id`)
) engine=innodb auto_increment=1;

-- 2020-02-28 初始化后台用户 --
insert into blog_admin_user (name, email, password, create_time, update_time) values ('卢星宇', 'luxingyumail@163.com', 'e10adc3949ba59abbe56e057f20f883e', '1582873713', '1582873713');

-- 2020-03-18 添加 blog_visitor 表 --
create table if not exists `blog_visitor` (
    `id` int(11) unsigned not null AUTO_INCREMENT,
    `ip` int(11) unsigned not null default 0 comment 'ip',
    `ua` varchar(300) not null default '' comment 'ua',
    `create_time` int(11) unsigned not null default '0',
    primary key (`id`)
) engine=innodb auto_increment=1;

-- 2020-03-18 添加pv uv 表 --
create table if not exists `blog_pv_uv` (
    `id` int(11) unsigned not null AUTO_INCREMENT,
    `day` int(11) unsigned not null default 0 comment 'day',
    `pv` int(11) unsigned not null default 0 comment 'pv',
    `uv` int(11) unsigned not null default 0 comment 'uv',
    `create_time` int(11) unsigned not null default '0',
    `update_time` int(11) unsigned not null default '0',
    primary key (`id`)
) engine=innodb auto_increment=1;

-- 2020-04-15 修改blog_articles表字段 --
ALTER TABLE `blog_articles` modify `content` mediumtext NOT NULL COMMENT '文章内容';

-- 2020-06-29 添加blog_admin_user表字段 --
ALTER TABLE `blog_admin_user` ADD `is_admin` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT '是否是超级管理员 1表示是 0表示不是';

ALTER TABLE `blog_admin_user` ADD `role_id` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '角色ID';

-- 2020-06-29 添加blog_role表 --
CREATE TABLE if not exists `blog_role` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `name` varchar(50) NOT NULL DEFAULT '' COMMENT '角色名称',
    `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态 1：有效 0：无效',
    `create_time` int(11) unsigned NOT NULL DEFAULT '0',
    `update_time` int(11) unsigned NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB COMMENT='角色表';

-- 2020-06-29 添加blog_access表 --
CREATE TABLE if not exists `blog_access` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `title` varchar(50) NOT NULL DEFAULT '' COMMENT '权限名称',
    `urls` varchar(1000) NOT NULL DEFAULT '' COMMENT 'json 数组',
    `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '状态 1：有效 0：无效',
    `type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '类型 0：菜单 1：页面 2：ajax',
    `parents_id` int(11) unsigned NOT NULL DEFAULT '0',
    `create_time` int(11) unsigned NOT NULL DEFAULT '0',
    `update_time` int(11) unsigned NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB COMMENT='权限详情表';

-- 2020-06-29 添加blog_role_access表 --
CREATE TABLE if not exists `blog_role_access` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `role_id` int(11) NOT NULL DEFAULT '0' COMMENT '角色id',
    `access_ids` varchar(100) NOT NULL DEFAULT '' COMMENT '权限id',
    `create_time` int(11) unsigned NOT NULL DEFAULT '0',
    `update_time` int(11) unsigned NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB COMMENT='角色权限表';

-- 2020-07-09 添加客服用户对话表 --
create table if not exists `blog_cs_message` (
    `id` int(11) unsigned not null AUTO_INCREMENT,
    `msg` text not null comment '对话内容',
    `type` tinyint(1) unsigned not null default 0 comment '0:用户；1:客服',
    `user_id` int(11) unsigned not null default 0 comment '用户ID(type为0时是用户ID(暂用用户fd代替)，type为1时是客服ID)',
    `create_time` int(11) unsigned not null default 0,
    primary key (`id`)
) engine=innodb auto_increment=1;
