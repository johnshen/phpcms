CREATE TABLE `phpcms_legal_advice` (
  `id` integer unsigned NOT NULL AUTO_INCREMENT,
  `username` char(50) NOT NULL DEFAULT '' comment '姓名', 
  `sex` char(1) NOT NULL DEFAULT '1' comment '性别',
  `phone` char(50) NOT NULL DEFAULT '' comment '联络电话',
  `email` varchar(255) DEFAULT '' comment '电子邮箱',
  `appointment_day` date NOT NULL comment '预约时间',
  `appointment_time` char(50) NOT NULL DEFAULT '' comment '咨询时段',
  `topic` varchar(200) DEFAULT '' comment '主题',
  `content` varchar(500) NOT NULL DEFAULT '' comment '咨询内容',
  `createtime` timestamp default current_timestamp comment '创建时间',
  PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8;
