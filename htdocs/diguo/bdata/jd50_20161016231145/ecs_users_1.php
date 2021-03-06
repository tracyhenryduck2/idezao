<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `ecs_users`;");
E_C("CREATE TABLE `ecs_users` (
  `user_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `aite_id` text NOT NULL,
  `email` varchar(60) NOT NULL DEFAULT '',
  `user_name` varchar(60) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `is_surplus_open` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否开启余额支付密码功能',
  `surplus_password` varchar(32) NOT NULL COMMENT '余额支付密码',
  `question` varchar(255) NOT NULL DEFAULT '',
  `answer` varchar(255) NOT NULL DEFAULT '',
  `sex` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `birthday` date NOT NULL DEFAULT '0000-00-00',
  `user_money` decimal(10,2) NOT NULL DEFAULT '0.00',
  `frozen_money` decimal(10,2) NOT NULL DEFAULT '0.00',
  `pay_points` int(10) unsigned NOT NULL DEFAULT '0',
  `rank_points` int(10) unsigned NOT NULL DEFAULT '0',
  `address_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `reg_time` int(10) unsigned NOT NULL DEFAULT '0',
  `last_login` int(11) unsigned NOT NULL DEFAULT '0',
  `last_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_ip` varchar(15) NOT NULL DEFAULT '',
  `visit_count` smallint(5) unsigned NOT NULL DEFAULT '0',
  `user_rank` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `is_special` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `ec_salt` varchar(10) DEFAULT NULL,
  `salt` varchar(10) NOT NULL DEFAULT '0',
  `parent_id` mediumint(9) NOT NULL DEFAULT '0',
  `flag` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `alias` varchar(60) NOT NULL,
  `msn` varchar(60) NOT NULL,
  `qq` varchar(20) NOT NULL,
  `office_phone` varchar(20) NOT NULL,
  `home_phone` varchar(20) NOT NULL,
  `mobile_phone` varchar(20) NOT NULL,
  `is_validated` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `validated` int(11) NOT NULL,
  `credit_line` decimal(10,2) unsigned NOT NULL,
  `passwd_question` varchar(50) DEFAULT NULL,
  `passwd_answer` varchar(255) DEFAULT NULL,
  `is_fenxiao` tinyint(1) NOT NULL,
  `real_name` varchar(255) NOT NULL,
  `card` varchar(255) NOT NULL,
  `face_card` varchar(255) NOT NULL,
  `back_card` varchar(255) NOT NULL,
  `country` int(11) NOT NULL,
  `province` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `district` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `mediaUID` varchar(50) NOT NULL,
  `mediaID` int(4) NOT NULL,
  `froms` char(10) NOT NULL DEFAULT 'pc' COMMENT 'pc:电脑,mobile:手机,app:应用',
  `headimg` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`),
  KEY `email` (`email`),
  KEY `parent_id` (`parent_id`),
  KEY `flag` (`flag`),
  KEY `mediaUID` (`mediaUID`,`mediaID`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=utf8");
E_D("replace into `ecs_users` values('1','','anan@68ecshop.com','anan','66a70008d4b89bbf036fc924deefb9a4','0','','','','0','1956-01-01','99945.10','110.00','199','397','16','1437431243','1458182297','0000-00-00 00:00:00','222.223.93.156','3271','0','0','','0','0','0','','','','','','','0','0','0.00','','','0','','','','','0','0','0','0','','1','','0','pc','');");
E_D("replace into `ecs_users` values('2','','285188787@qq.com','68ecshopyy','66a70008d4b89bbf036fc924deefb9a4','1','96e79218965eb72c92a549dd5a330112','','','0','0000-00-00','785.00','0.00','2744','3444','2','1437497947','1457747336','0000-00-00 00:00:00','127.0.0.1','16','0','0','','0','0','0','','','','','','','0','0','0.00','','','0','','','','','0','0','0','0','','0','','0','pc','data/headimg/201507/1437497989600204049.jpg');");
E_D("replace into `ecs_users` values('3','','admin9@qq.com','admin9','66a70008d4b89bbf036fc924deefb9a4','0','','','','0','0000-00-00','0.00','0.00','100','100','0','1437500502','1437500519','0000-00-00 00:00:00','192.168.1.196','2','0','0','','0','0','0','','','','','','','0','0','0.00','','','0','','','','','0','0','0','0','','0','','0','pc','');");
E_D("replace into `ecs_users` values('4','','admin8@qq.com','admin8','66a70008d4b89bbf036fc924deefb9a4','0','','','','0','0000-00-00','0.00','0.00','100','100','0','1437501016','1437501016','0000-00-00 00:00:00','192.168.1.196','1','0','0','','0','0','0','','','','','','','0','0','0.00','','','0','','','','','0','0','0','0','','0','','0','pc','');");
E_D("replace into `ecs_users` values('5','','2691111111@qq.com','leilei','66a70008d4b89bbf036fc924deefb9a4','1','96e79218965eb72c92a549dd5a330112','','','0','0000-00-00','10085.75','0.00','2317','2317','1','1437502269','1456454898','0000-00-00 00:00:00','127.0.0.1','112','0','0','','0','0','0','','','','','','17097249373','0','0','0.00','','','0','','','','','0','0','0','0','','0','','0','pc','');");
E_D("replace into `ecs_users` values('6','','3490134@qq.com','yiren','66a70008d4b89bbf036fc924deefb9a4','0','','','','0','1956-01-01','6090.57','0.00','14585','14485','50','1437503705','1457936107','0000-00-00 00:00:00','127.0.0.1','149','0','0','','0','0','0','','','','','','17097249373','0','0','0.00','','','0','','','','','0','0','0','0','','1','','0','pc','');");
E_D("replace into `ecs_users` values('7','','33342@qq.com','liuyu','66a70008d4b89bbf036fc924deefb9a4','0','','','','0','0000-00-00','0.00','0.00','100','100','0','1437518661','1437520761','0000-00-00 00:00:00','192.168.1.125','2','0','0','','0','0','0','','','','','','','0','0','0.00','','','0','','','','','0','0','0','0','','0','','0','pc','');");
E_D("replace into `ecs_users` values('8','','222222@qq.com','liza','66a70008d4b89bbf036fc924deefb9a4','0','','','','0','0000-00-00','0.00','0.00','100','100','0','1437525999','1457331992','0000-00-00 00:00:00','127.0.0.1','2','0','0','','0','0','0','','','','','','','0','0','0.00','','','0','','','','','0','0','0','0','','0','','0','pc','');");
E_D("replace into `ecs_users` values('9','','936666944@qq.com','test','66a70008d4b89bbf036fc924deefb9a4','1','e10adc3949ba59abbe56e057f20f883e','','','0','1955-01-01','0.00','0.00','0','0','17','1438043389','1438059416','0000-00-00 00:00:00','192.168.1.116','4','0','0','','0','0','0','','','','','','','1','0','0.00','','','0','aaaa','130321190000000001','images/201507/1438059526856062304.jpg','images/201507/1438059526674494583.jpg','1','2','52','503','aaa','1','','0','pc','data/headimg/201507/1438059585297019393.jpg');");
E_D("replace into `ecs_users` values('26','','cuibo@68ecshop.com','u834HZFP8084','66a70008d4b89bbf036fc924deefb9a4','0','','','','0','1956-01-01','0.00','0.00','100','100','26','1440197475','1440197490','0000-00-00 00:00:00','127.0.0.1','2','0','0','','0','30','0','','','','','','','1','0','0.00','','','1','','','','','0','0','0','0','','1','','0','pc','');");
E_D("replace into `ecs_users` values('11','','2697138630@qq.com','lianglei_','66a70008d4b89bbf036fc924deefb9a4','0','','','','0','0000-00-00','0.00','0.00','100','100','0','1438044758','1438044758','0000-00-00 00:00:00','192.168.1.162','1','0','0','','0','0','0','','','','','','','0','0','0.00','','','0','','','','','0','0','0','0','','0','','0','pc','');");
E_D("replace into `ecs_users` values('12','','1234@qq.com','liang','66a70008d4b89bbf036fc924deefb9a4','0','','','','0','0000-00-00','0.00','0.00','100','100','0','1438045239','1438045239','0000-00-00 00:00:00','192.168.1.162','1','0','0','','0','0','0','','','1234','1234','234','1234','0','1','0.00','friend_birthday','1111','0','','','','','0','0','0','0','','0','','0','pc','');");
E_D("replace into `ecs_users` values('13','','1@qq.com','liangl','66a70008d4b89bbf036fc924deefb9a4','0','','','','0','0000-00-00','0.00','0.00','100','100','0','1438045379','1438045379','0000-00-00 00:00:00','192.168.1.162','1','0','0','','0','0','0','','','1','1','1','1','0','1','0.00','','','0','','','','','0','0','0','0','','0','','0','pc','');");
E_D("replace into `ecs_users` values('14','','979963733@qq.com','qweqwe','66a70008d4b89bbf036fc924deefb9a4','0','','','','0','0000-00-00','0.00','0.00','100','100','0','1438046467','1438046467','0000-00-00 00:00:00','192.168.1.164','1','0','0','','0','0','0','','','','','','','0','0','0.00','','','0','','','','','0','0','0','0','','0','','0','pc','');");
E_D("replace into `ecs_users` values('15','','1471085298@qq.com','liangtest','66a70008d4b89bbf036fc924deefb9a4','1','96e79218965eb72c92a549dd5a330112','','','0','1955-01-01','0.00','0.00','480','380','19','1438046740','1445362414','0000-00-00 00:00:00','127.0.0.1','14','0','0','','0','0','0','','','','','','15032369431','0','1','0.00','','','0','','','','','0','0','0','0','','0','','0','pc','');");
E_D("replace into `ecs_users` values('16','','435345@qq.com','yy','66a70008d4b89bbf036fc924deefb9a4','0','','','','0','1955-01-01','0.00','0.00','0','0','0','1438047259','1442367633','0000-00-00 00:00:00','127.0.0.1','3','0','0','','0','0','0','','','','','','','0','0','0.00','','','0','','','','','0','0','0','0','','0','','0','pc','');");
E_D("replace into `ecs_users` values('17','','qwe@qwe.qwe','ewqewq','66a70008d4b89bbf036fc924deefb9a4','0','','','','0','0000-00-00','0.00','0.00','0','0','0','1438050031','1438050031','0000-00-00 00:00:00','192.168.1.164','1','0','0','','0','0','0','','','','','','','0','0','0.00','','','0','','','','','0','0','0','0','','0','','0','pc','');");
E_D("replace into `ecs_users` values('18','','qwqe@qwe.qwe','wer','66a70008d4b89bbf036fc924deefb9a4','0','','','','0','0000-00-00','0.00','0.00','0','0','0','1438050133','1438050133','0000-00-00 00:00:00','192.168.1.164','1','0','0','','0','0','0','','','','','','','0','0','0.00','','','0','','','','','0','0','0','0','','0','','0','pc','');");
E_D("replace into `ecs_users` values('19','','3575177995@qq.com','fds','66a70008d4b89bbf036fc924deefb9a4','0','','','','0','0000-00-00','0.00','0.00','100','100','0','1438050222','1438050222','0000-00-00 00:00:00','192.168.1.164','1','0','0','','0','0','0','','','','','','','0','0','0.00','','','0','','','','','0','0','0','0','','0','','0','pc','');");
E_D("replace into `ecs_users` values('20','','358095@qq.com','admin123','66a70008d4b89bbf036fc924deefb9a4','0','','','','0','0000-00-00','10340.85','0.00','245','101446','20','1438051836','1438059199','0000-00-00 00:00:00','192.168.1.127','5','0','0','','0','0','0','','','','','','','0','0','0.00','','','0','','','','','0','0','0','0','','0','','0','pc','');");
E_D("replace into `ecs_users` values('21','','admin@admin.com','admin002','66a70008d4b89bbf036fc924deefb9a4','0','','','','0','0000-00-00','0.00','0.00','100','100','24','1438055340','1438107483','0000-00-00 00:00:00','192.168.1.184','2','0','0','','0','0','0','','','','','','','0','0','0.00','','','0','','','','','0','0','0','0','','0','','0','pc','');");
E_D("replace into `ecs_users` values('22','','admin@qq.com','admin2008','66a70008d4b89bbf036fc924deefb9a4','0','','','','0','1955-01-01','0.00','0.00','0','0','23','1438059162','1444585418','0000-00-00 00:00:00','127.0.0.1','2','0','0','','0','0','0','','','','','','','0','0','0.00','','','0','','','','','0','0','0','0','','0','','0','pc','');");
E_D("replace into `ecs_users` values('23','','admin999@qq.com','admin999','66a70008d4b89bbf036fc924deefb9a4','0','','','','0','0000-00-00','0.00','0.00','420','420','22','1438059219','1438059219','0000-00-00 00:00:00','192.168.1.157','1','0','0','','0','1','0','','','','','','','0','0','0.00','','','0','','','','','0','0','0','0','','0','','0','pc','');");
E_D("replace into `ecs_users` values('24','','11@qq.qq','111','66a70008d4b89bbf036fc924deefb9a4','0','','','','0','1955-01-01','1105753.00','0.00','5076','5087','25','1438111712','1457685653','0000-00-00 00:00:00','127.0.0.1','12','0','0','','0','25','0','','','','','','','0','0','0.00','','','0','','','','','0','0','0','0','','1','','0','pc','data/headimg/201602/1454465447480755089.jpg');");
E_D("replace into `ecs_users` values('25','','12121@qqq.qq','222','66a70008d4b89bbf036fc924deefb9a4','0','','','','0','1955-01-01','0.00','0.00','0','100','0','1440195818','0','0000-00-00 00:00:00','','0','0','0','','0','0','0','','','','','','','0','0','0.00','','','0','','','','','0','0','0','0','','1','','0','pc','');");
E_D("replace into `ecs_users` values('27','','stu111@qq.com','stu111','66a70008d4b89bbf036fc924deefb9a4','0','','','','0','1956-01-01','0.00','0.00','0','0','0','1455674629','1455674644','0000-00-00 00:00:00','127.0.0.1','1','0','0','','0','0','0','','','','','','14456778899','1','0','0.00','','','0','','','','','0','0','0','0','','1','','0','pc','');");
E_D("replace into `ecs_users` values('28','','qingwarj@163.com','u270XGB4348','66a70008d4b89bbf036fc924deefb9a4','0','','','','0','0000-00-00','0.00','0.00','100','100','0','1458094086','1458094086','0000-00-00 00:00:00','120.197.16.137','1','0','0','','0','0','0','','','','','','','1','0','0.00','','','0','','','','','0','0','0','0','','0','','0','app','');");
E_D("replace into `ecs_users` values('29','','zhiweili@live.com','u218GDU8421','66a70008d4b89bbf036fc924deefb9a4','0','','','','0','0000-00-00','0.00','0.00','100','100','0','1458096549','1458188687','0000-00-00 00:00:00','59.40.101.149','66','0','0','','0','0','0','','','','','','','1','0','0.00','','','0','','','','','0','0','0','0','','0','','0','pc','');");
E_D("replace into `ecs_users` values('34','weixin_ocrg3vxoWHB9tiZWLfIbGMpPDhC8','','孟','66a70008d4b89bbf036fc924deefb9a4','0','','','','1','0000-00-00','0.00','0.00','0','0','0','1458173466','1458175416','0000-00-00 00:00:00','1.199.173.224','18','0','0','','0','0','0','','','','','','','1','0','0.00','','','0','','','','','0','0','0','0','','0','','0','app','http://wx.qlogo.cn/mmopen/oLU121BePGmKmTeSlZtYgRszjBFLdd3bxxXiaEQHmWs2DfPZWicwGsCQ2sd6o8m6kuEKsufibbTZ4n2DusXCRYzKw/0');");
E_D("replace into `ecs_users` values('30','','1908043531@qq.com','u870RBR3883','66a70008d4b89bbf036fc924deefb9a4','0','','','','0','1956-01-01','0.00','0.00','100','100','51','1458100249','1458100249','0000-00-00 00:00:00','222.90.72.82','1','0','0','','0','28','0','','','','','','','1','0','0.00','','','1','','','','','0','0','0','0','','0','','0','pc','');");
E_D("replace into `ecs_users` values('31','','25190080@qq.com','u296GEU8413','66a70008d4b89bbf036fc924deefb9a4','0','','','','0','0000-00-00','0.00','0.00','100','100','0','1458114015','1458114015','0000-00-00 00:00:00','111.193.225.226','1','0','0','','0','0','0','','','','','','','1','0','0.00','','','0','','','','','0','0','0','0','','0','','0','pc','');");
E_D("replace into `ecs_users` values('32','','hz@g.com','hhh','66a70008d4b89bbf036fc924deefb9a4','0','','','','0','1956-01-01','0.00','0.00','99','99','52','1458118239','1458185072','0000-00-00 00:00:00','222.223.93.156','130','0','0','','0','0','0','','','','','','13333333333','1','0','0.00','','','0','','','','','0','0','0','0','','1','','0','pc','');");
E_D("replace into `ecs_users` values('33','','','u157GGKS8852','66a70008d4b89bbf036fc924deefb9a4','0','','','','0','0000-00-00','0.00','0.00','100','100','0','1458119207','1458119207','0000-00-00 00:00:00','222.223.93.156','1','0','0','','0','0','0','','','','','','15703378852','0','1','0.00','','','0','','','','','0','0','0','0','','0','','0','pc','');");
E_D("replace into `ecs_users` values('35','','','u182JHTS9680','66a70008d4b89bbf036fc924deefb9a4','0','','','','0','0000-00-00','0.00','0.00','0','0','0','1458185419','1458185419','0000-00-00 00:00:00','222.223.93.156','1','0','0','','0','0','0','','','','','','18231089680','0','1','0.00','','','1','','','','','0','0','0','0','','0','','0','mobile','');");
E_D("replace into `ecs_users` values('36','','','u136YCHG3636','66a70008d4b89bbf036fc924deefb9a4','0','','','','0','0000-00-00','0.00','0.00','0','0','0','1458186036','1458186036','0000-00-00 00:00:00','121.32.118.164','1','0','0','','0','0','0','','','','','','13650813636','0','1','0.00','','','1','','','','','0','0','0','0','','0','','0','mobile','');");
E_D("replace into `ecs_users` values('37','','taykey@126.com','u904SEGB4430','66a70008d4b89bbf036fc924deefb9a4','0','','','','0','0000-00-00','0.00','0.00','100','100','0','1458196862','1458225264','0000-00-00 00:00:00','14.125.203.17','95','0','0','','0','0','0','','','','','','','1','0','0.00','','','0','','','','','0','0','0','0','','0','','0','pc','');");
E_D("replace into `ecs_users` values('38','','327819834@qq.com','u296JYHF7632','66a70008d4b89bbf036fc924deefb9a4','0','','','','0','1956-01-01','0.00','0.00','100','100','53','1458197094','1458197094','0000-00-00 00:00:00','1.58.95.149','1','0','0','','0','0','0','','','','','','','1','0','999999.00','','','0','','','','','0','0','0','0','','1','','0','pc','');");
E_D("replace into `ecs_users` values('39','weixin_oWeRDuGtPl-5RVzoKNArBRR4q4kw','','王艳美','66a70008d4b89bbf036fc924deefb9a4','0','','','','0','0000-00-00','0.00','0.00','0','0','0','1458197929','1458198007','0000-00-00 00:00:00','222.223.93.156','13','0','0','','0','0','0','','','','','','','1','0','0.00','','','1','','','','','0','0','0','0','','0','','0','mobile','http://wx.qlogo.cn/mmopen/Q3auHgzwzM6QnzeaeKFDCuHNUtia1K47w5OYcOrm8vHYMCCmRYoL1z7IibnticwlW0bASyMaOnGH5AWiaMrsVKJghyls1ibQGvqcBD815lI6KML4/0');");
E_D("replace into `ecs_users` values('40','','1721406238@qq.com','u956DNTQ4328','66a70008d4b89bbf036fc924deefb9a4','0','','','','0','0000-00-00','0.00','0.00','100','100','54','1458202147','1458202147','0000-00-00 00:00:00','175.42.92.124','1','0','0','','0','0','0','','','','','','','1','0','0.00','','','0','','','','','0','0','0','0','','0','','0','pc','');");
E_D("replace into `ecs_users` values('41','','','u185LKFA0941','66a70008d4b89bbf036fc924deefb9a4','0','','','','0','0000-00-00','0.00','0.00','100','100','0','1458206852','1458206852','0000-00-00 00:00:00','58.218.192.158','1','0','0','','0','0','0','','','','','','18552800941','0','1','0.00','','','0','','','','','0','0','0','0','','0','','0','pc','');");
E_D("replace into `ecs_users` values('42','weixin_ocrg3vwGeP6IxFnouzkMOcdZq8mY','','Daniel','66a70008d4b89bbf036fc924deefb9a4','0','','','','1','0000-00-00','0.00','0.00','0','0','0','1458207780','1458208090','0000-00-00 00:00:00','221.214.48.170','21','0','0','','0','0','0','','','','','','','1','0','0.00','','','0','','','','','0','0','0','0','','0','','0','app','http://wx.qlogo.cn/mmopen/NvWn9hjTvgibic0jtsGkFn6LWiaAxya8FzVrVyWIOzIziaicKdibBEMzZ0x4CyibDGCcU8o3SNmyHdchoorfOibTBOE6QePz9eEnfI7Y/0');");
E_D("replace into `ecs_users` values('43','','','u136SKUL6040','66a70008d4b89bbf036fc924deefb9a4','0','','','','0','0000-00-00','0.00','0.00','0','0','0','1458207806','1458207806','0000-00-00 00:00:00','123.151.191.178','1','0','0','','0','0','0','','','','','','13621596040','0','1','0.00','','','1','','','','','0','0','0','0','','0','','0','mobile','');");
E_D("replace into `ecs_users` values('44','weixin_oWeRDuJdvF3hl_lRD2Gf0EsQ35KU','','lave','66a70008d4b89bbf036fc924deefb9a4','0','','','','1','0000-00-00','0.00','0.00','10','0','0','1458264649','1458306792','0000-00-00 00:00:00','117.136.84.85','57','0','0','','0','0','0','','','','','','','1','0','0.00','','','1','','','','','0','0','0','0','','0','','0','mobile','http://wx.qlogo.cn/mmopen/icAhd39DdKkicQnhYy1OX8mKPrmVTrlwrfmFBrI9WlXWMribzRXWOqYYJZ7u5tibeU3kcE7k8Ye2dx6jGicHqDnWrFsCodZJCnmCic/0');");
E_D("replace into `ecs_users` values('45','','','u155HCNU9687','66a70008d4b89bbf036fc924deefb9a4','0','','','','0','0000-00-00','0.00','0.00','100','100','55','1458269249','1458269249','0000-00-00 00:00:00','36.48.201.220','1','0','0','','0','0','0','','','','','','15590489687','0','1','0.00','','','0','','','','','0','0','0','0','','0','','0','pc','');");
E_D("replace into `ecs_users` values('48','weixin_oWeRDuGVlWYeFRB9Jv-TTmht_USs','','秦皇岛商之翼小李','66a70008d4b89bbf036fc924deefb9a4','0','','','','0','0000-00-00','0.00','0.00','0','0','0','1458285896','1458285896','0000-00-00 00:00:00','222.223.93.156','1','0','0','','0','0','0','','','','','','','1','0','0.00','','','1','','','','','0','0','0','0','','0','','0','mobile','http://wx.qlogo.cn/mmopen/7N2JRaWooRCZx40OsAWJyRUwpibvBB01FtibDyXbfJbSW8TITzW4WRia6U31JXRiaCm0j3ePE3590gZibAmcibVOk5PzmShLLNCsGx/0');");
E_D("replace into `ecs_users` values('47','','','xiaoxiao','66a70008d4b89bbf036fc924deefb9a4','0','','','','0','1956-01-01','925.20','0.00','164','164','56','1458284407','1458305995','0000-00-00 00:00:00','116.5.244.118','54','0','0','','0','0','0','','','','','','18029989821','0','0','0.00','','','0','','','','','0','0','0','0','','0','','0','app','');");
E_D("replace into `ecs_users` values('49','weixin_oWeRDuCrUkgH3FkwhTO45twRnBNQ','','tree','66a70008d4b89bbf036fc924deefb9a4','0','','','','1','0000-00-00','0.00','0.00','20','0','0','1458286006','1458289469','0000-00-00 00:00:00','218.28.137.2','142','0','0','','0','0','0','','','','','','','1','0','0.00','','','1','','','','','0','0','0','0','','0','','0','mobile','http://wx.qlogo.cn/mmopen/pBqI2HTD4pSzy13psrf4B6nPEiaE2mrrCUxbPsibAs0A7nOTicpy6iaWM4eQgUyeDWCujt7sGYFg6mGBIUfSl7picNlEyYLmKFDEX/0');");
E_D("replace into `ecs_users` values('50','weixin_ocrg3v0NSx0Byqqgwr0dqgJvXJck','','时光','66a70008d4b89bbf036fc924deefb9a4','0','','','','1','0000-00-00','0.00','0.00','0','0','0','1458288027','1458288370','0000-00-00 00:00:00','39.67.98.23','70','0','0','','0','0','0','','','','','','','1','0','0.00','','','0','','','','','0','0','0','0','','0','','0','app','http://wx.qlogo.cn/mmopen/ajNVdqHZLLDkap1yNibYrbkBgl4icN63Vj1k4hmhFXKyu1ZZjM6uzA240XmCLWcKklMwaZ42icKIqK7bxGN2WT5Dw/0');");
E_D("replace into `ecs_users` values('51','','252571015@qq.com','u725ERK7029','66a70008d4b89bbf036fc924deefb9a4','0','','','','0','0000-00-00','0.00','0.00','100','100','57','1458288435','1458364246','0000-00-00 00:00:00','124.166.242.212','4','0','0','','0','0','0','','','','','','','1','0','0.00','','','0','','','','','0','0','0','0','','0','','0','pc','');");
E_D("replace into `ecs_users` values('52','weixin_oWeRDuCxhbg8DBxN63WIQiXEeNVc','','张坤','66a70008d4b89bbf036fc924deefb9a4','0','','','','1','0000-00-00','0.00','0.00','0','0','0','1458293891','1458312914','0000-00-00 00:00:00','110.255.243.6','16','0','0','','0','0','0','','','','','','','1','0','0.00','','','1','','','','','0','0','0','0','','0','','0','mobile','http://wx.qlogo.cn/mmopen/PiajxSqBRaEJbXpUINMjRDmAAZZmBz9oBlkibOJPxia35TIH8uGS24icOUQMfJ7PFt2M6gzeYeWK4JpzHvCr0GJhcg/0');");
E_D("replace into `ecs_users` values('55','','qhjs@vip.qq.com','123','66a70008d4b89bbf036fc924deefb9a4','0','','','','0','1956-01-01','0.00','0.00','0','0','0','1458316796','1458316829','0000-00-00 00:00:00','1.31.58.224','1','0','0','','0','0','0','','','','','','15248015762','1','0','0.00','','','0','','','','','0','0','0','0','','0','','0','pc','');");
E_D("replace into `ecs_users` values('54','','','u180MZMA982','66a70008d4b89bbf036fc924deefb9a4','0','','','','0','1956-01-01','9755.64','0.00','316','10316','59','1458296943','1458326651','0000-00-00 00:00:00','113.83.186.49','121','0','0','','0','0','0','','','','','','18029989828','0','1','0.00','','','0','','','','','0','0','0','0','','0','','0','app','');");
E_D("replace into `ecs_users` values('56','weixin_oWeRDuBrpA6a-bixngYCFRekmsMc','','少红','66a70008d4b89bbf036fc924deefb9a4','0','','','','1','0000-00-00','0.00','0.00','0','0','0','1458345874','1458345874','0000-00-00 00:00:00','219.133.233.200','1','0','0','','0','0','0','','','','','','','1','0','0.00','','','1','','','','','0','0','0','0','','0','','0','mobile','http://wx.qlogo.cn/mmopen/icAhd39DdKkicuV52op499Vad1PZ19ibdwPojh58jkf7mSoic4DWiceNoeH5wfJSChvhK1ibMQJgvpUGbGgS0HLhn3uHvQqow99xCJ/0');");
E_D("replace into `ecs_users` values('57','','','Javaset','66a70008d4b89bbf036fc924deefb9a4','0','','','','1','1986-11-07','0.00','0.00','0','0','0','1458346348','1458346348','0000-00-00 00:00:00','106.32.77.170','1','0','0','','0','0','0','','','','','','13314401515','0','1','0.00','','','1','','','','','0','0','0','0','','0','','0','mobile','');");
E_D("replace into `ecs_users` values('58','','113549093@qq.com','zzl_221','66a70008d4b89bbf036fc924deefb9a4','0','','','','0','1956-01-01','9999990.00','0.00','110','100','61','1458377571','1458383359','0000-00-00 00:00:00','101.206.20.200','83','0','0','','0','0','0','','','','','','','1','0','0.00',NULL,NULL,'1','','','','','0','0','0','0','','0','','0','pc','data/headimg/201603/1458377675398466051.jpg');");
E_D("replace into `ecs_users` values('59','','957073146@qq.com','ceshi','c6229cffe596a8eb3145b46e9297a308','1','ce9b8e98182dc5d2d2771489ca4e14f6','','','0','1956-01-01','0.00','0.00','0','0','0','1463454697','1463466064','0000-00-00 00:00:00','113.99.1.210','2','0','0','7296','0','0','0','','','','','','13711333333','1','0','0.00',NULL,NULL,'0','','','','','0','0','0','0','','1','','0','pc','');");

require("../../inc/footer.php");
?>