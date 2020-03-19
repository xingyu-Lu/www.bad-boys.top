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
