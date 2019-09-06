-- 文章表 --
create table if not exists `db_articles` (
    `id` int(11) unsigned not null ,
    `content` text not null comment '文章内容',
    `status` tinyint(1) unsigned not null default '0' COMMENT '0:公开；1:私密',
    `create_time` int(11) unsigned not null default '0',
    `update_time` int(11) unsigned not null default '0',
    primary key (`id`)
) engine=innodb auto_increment=1 default charset=utf8;