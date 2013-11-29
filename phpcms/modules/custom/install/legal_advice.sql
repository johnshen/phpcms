CREATE TABLE `phpcms_legal_advice` (
  `id` integer unsigned NOT NULL AUTO_INCREMENT,
  `username` char(50) NOT NULL DEFAULT '' comment '姓名', 
  `sex` char(1) NOT NULL DEFAULT '1' comment '性别',
  `phone` char(50) NOT NULL DEFAULT '' comment '联络电话',
  `email` varchar(255) DEFAULT '' comment '电子邮箱',
  `appointment` date NOT NULL comment '预约时间',
  `duration` char(50) NOT NULL DEFAULT '' comment '咨询时段',
  `topic` varchar(200) DEFAULT '' comment '主题',
  `content` varchar(500) NOT NULL DEFAULT '' comment '咨询内容',
  `createtime` timestamp default current_timestamp comment '创建时间',
  PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8;


CREATE TABLE `phpcms_news` (
  `id` integer unsigned NOT NULL AUTO_INCREMENT,
  `content` char(50) NOT NULL DEFAULT '' comment '活动标题', 
  `starttime` date NOT NULL DEFAULT '0000-00-00' comment '起始时间',
  `endtime` date NOT NULL DEFAULT '0000-00-00' comment '结束时间',
  `createtime` timestamp default current_timestamp comment '创建时间',
  PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8;
