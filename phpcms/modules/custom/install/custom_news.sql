CREATE TABLE `phpcms_custom_news` (
  `id` integer unsigned NOT NULL AUTO_INCREMENT,
  `content` TEXT NOT NULL DEFAULT '' comment '活动标题', 
  `starttime` date NOT NULL DEFAULT '0000-00-00' comment '起始时间',
  `endtime` date NOT NULL DEFAULT '0000-00-00' comment '结束时间',
  `siteid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `username` varchar(40) NOT NULL,
  `createtime` timestamp default current_timestamp comment '创建时间',
  PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8;
