<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `ecs_account_log`;");
E_C("CREATE TABLE `ecs_account_log` (
  `log_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned NOT NULL,
  `user_money` decimal(10,2) NOT NULL,
  `frozen_money` decimal(10,2) NOT NULL,
  `rank_points` mediumint(9) NOT NULL,
  `pay_points` mediumint(9) NOT NULL,
  `change_time` int(10) unsigned NOT NULL,
  `change_desc` varchar(255) NOT NULL,
  `change_type` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`log_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=165 DEFAULT CHARSET=utf8");
E_D("replace into `ecs_account_log` values('1','0','0.00','0.00','100','100','1437431243','注册送积分','99');");
E_D("replace into `ecs_account_log` values('2','1','100000.00','0.00','0','0','1437431272','10000','2');");
E_D("replace into `ecs_account_log` values('3','1','0.00','100.00','0','0','1437431418','zceshi','2');");
E_D("replace into `ecs_account_log` values('4','2','0.00','0.00','100','100','1437497947','注册送积分','99');");
E_D("replace into `ecs_account_log` values('5','3','0.00','0.00','100','100','1437500502','注册送积分','99');");
E_D("replace into `ecs_account_log` values('6','4','0.00','0.00','100','100','1437501016','注册送积分','99');");
E_D("replace into `ecs_account_log` values('7','5','0.00','0.00','100','100','1437502268','注册送积分','99');");
E_D("replace into `ecs_account_log` values('8','6','0.00','0.00','100','100','1437503705','注册送积分','99');");
E_D("replace into `ecs_account_log` values('9','7','0.00','0.00','100','100','1437518661','注册送积分','99');");
E_D("replace into `ecs_account_log` values('10','8','0.00','0.00','100','100','1437525999','注册送积分','99');");
E_D("replace into `ecs_account_log` values('11','1','-10.00','10.00','0','0','1437588105','冻结拍卖活动的保证金：海尔HGS-2164手持蒸汽挂烫机家用挂式电熨斗熨烫机正品全国联保','99');");
E_D("replace into `ecs_account_log` values('12','0','0.00','0.00','100','100','1438043389','注册送积分','99');");
E_D("replace into `ecs_account_log` values('13','0','0.00','0.00','100','100','1438043650','注册送积分','99');");
E_D("replace into `ecs_account_log` values('14','11','0.00','0.00','100','100','1438044758','注册送积分','99');");
E_D("replace into `ecs_account_log` values('15','12','0.00','0.00','100','100','1438045239','注册送积分','99');");
E_D("replace into `ecs_account_log` values('16','13','0.00','0.00','100','100','1438045379','注册送积分','99');");
E_D("replace into `ecs_account_log` values('17','10','100000.00','0.00','0','0','1438045835','111','2');");
E_D("replace into `ecs_account_log` values('18','10','-320.00','0.00','0','0','1438045953','支付订单 2015072822274','99');");
E_D("replace into `ecs_account_log` values('19','10','-4888.00','0.00','0','0','1438046040','支付订单 2015072866466','99');");
E_D("replace into `ecs_account_log` values('20','14','0.00','0.00','100','100','1438046467','注册送积分','99');");
E_D("replace into `ecs_account_log` values('21','15','0.00','0.00','100','100','1438046740','注册送积分','99');");
E_D("replace into `ecs_account_log` values('22','1','0.00','0.00','199','199','1438046904','订单 2015072875360 赠送的积分','99');");
E_D("replace into `ecs_account_log` values('23','0','0.00','0.00','100','100','1438047259','注册送积分','99');");
E_D("replace into `ecs_account_log` values('24','10','100.00','0.00','0','0','1438049762','储值卡充值，卡号：15072832440295','99');");
E_D("replace into `ecs_account_log` values('25','17','0.00','0.00','0','0','1438050031','注册送积分','99');");
E_D("replace into `ecs_account_log` values('26','18','0.00','0.00','-100','-100','1438050133','注册送积分','99');");
E_D("replace into `ecs_account_log` values('27','19','0.00','0.00','100','100','1438050222','注册送积分','99');");
E_D("replace into `ecs_account_log` values('28','2','0.00','0.00','100000','0','1438051724','11','2');");
E_D("replace into `ecs_account_log` values('29','2','0.00','0.00','-99999','0','1438051813','4','2');");
E_D("replace into `ecs_account_log` values('30','20','0.00','0.00','100','100','1438051836','注册送积分','99');");
E_D("replace into `ecs_account_log` values('31','1','-35.00','0.00','0','0','1438051859','支付订单 2015072871984','99');");
E_D("replace into `ecs_account_log` values('32','2','0.00','0.00','1000','0','1438051869','6','2');");
E_D("replace into `ecs_account_log` values('33','20','1000.00','0.00','1000','0','1438051877','测试1','2');");
E_D("replace into `ecs_account_log` values('34','1','-78.00','0.00','0','0','1438051957','支付订单 2015072891383','99');");
E_D("replace into `ecs_account_log` values('35','1','-99.00','0.00','0','0','1438051957','支付订单 2015072849993','99');");
E_D("replace into `ecs_account_log` values('36','2','800.00','0.00','0','900','1438051982','0','2');");
E_D("replace into `ecs_account_log` values('37','2','0.00','0.00','0','-100','1438052294','支付订单 2015072809307','99');");
E_D("replace into `ecs_account_log` values('38','2','0.00','0.00','2199','2199','1438052331','订单 2015072809307 赠送的积分','99');");
E_D("replace into `ecs_account_log` values('39','1','0.00','0.00','78','78','1438052516','订单 2015072899999 赠送的积分','99');");
E_D("replace into `ecs_account_log` values('40','1','0.00','0.00','-78','-78','1438052539','由于退货或未发货操作，退回订单 2015072899999 赠送的积分','99');");
E_D("replace into `ecs_account_log` values('41','20','10000.00','0.00','100000','0','1438052581','测试2','2');");
E_D("replace into `ecs_account_log` values('42','1','78.00','0.00','0','0','1438052588','dd','99');");
E_D("replace into `ecs_account_log` values('43','2','-45.00','0.00','0','0','1438053619','支付订单 2015072882458','99');");
E_D("replace into `ecs_account_log` values('44','15','0.00','0.00','280','280','1438054022','订单 2015072875951 赠送的积分','99');");
E_D("replace into `ecs_account_log` values('45','15','0.00','0.00','0','100','1438054467','晒单获得积分','99');");
E_D("replace into `ecs_account_log` values('46','2','0.00','0.00','0','-499','1438054628','支付订单 2015072862934','99');");
E_D("replace into `ecs_account_log` values('47','2','0.00','0.00','30','30','1438054897','订单 2015072882458 赠送的积分','99');");
E_D("replace into `ecs_account_log` values('48','21','0.00','0.00','100','100','1438055340','注册送积分','99');");
E_D("replace into `ecs_account_log` values('49','20','-203.00','0.00','0','0','1438059014','支付订单 2015072885037','99');");
E_D("replace into `ecs_account_log` values('50','20','0.00','0.00','0','-100','1438059014','支付订单 2015072885037','99');");
E_D("replace into `ecs_account_log` values('51','0','0.00','0.00','100','100','1438059162','注册送积分','99');");
E_D("replace into `ecs_account_log` values('52','23','0.00','0.00','100','100','1438059219','注册送积分','99');");
E_D("replace into `ecs_account_log` values('53','20','0.00','0.00','1','0','1438059272','测试3','2');");
E_D("replace into `ecs_account_log` values('54','23','0.00','0.00','320','320','1438059475','订单 2015072819691 赠送的积分','99');");
E_D("replace into `ecs_account_log` values('55','20','-360.00','0.00','0','0','1438059641','支付订单 2015072886829','99');");
E_D("replace into `ecs_account_log` values('56','20','0.00','0.00','345','345','1438059715','订单 2015072886829 赠送的积分','99');");
E_D("replace into `ecs_account_log` values('57','1','99.00','0.00','198','0','1438059732','订单号 2015072818895, 分成:金钱 99 积分 198','99');");
E_D("replace into `ecs_account_log` values('58','2','0.00','0.00','114','114','1438059899','订单 2015072807789 赠送的积分','99');");
E_D("replace into `ecs_account_log` values('59','20','-96.15','0.00','0','0','1438060064','支付订单 2015072835125','99');");
E_D("replace into `ecs_account_log` values('60','20','0.00','0.00','0','-100','1438060064','支付订单 2015072835125','99');");
E_D("replace into `ecs_account_log` values('61','1','-9.90','0.00','0','0','1438061634','支付订单 2015072818430','99');");
E_D("replace into `ecs_account_log` values('62','0','0.00','0.00','100','100','1438111711','注册送积分','99');");
E_D("replace into `ecs_account_log` values('63','10','81.60','0.00','23','0','1438112143','订单号 2015072913543, 分成:金钱 81.6 积分 23','99');");
E_D("replace into `ecs_account_log` values('64','10','0.00','0.00','4888','4888','1439503243','订单 2015081442374 赠送的积分','99');");
E_D("replace into `ecs_account_log` values('65','10','0.00','0.00','2199','2199','1439503617','订单 2015081480627 赠送的积分','99');");
E_D("replace into `ecs_account_log` values('66','10','0.00','0.00','4888','4888','1439504157','订单 2015081456099 赠送的积分','99');");
E_D("replace into `ecs_account_log` values('67','10','0.00','0.00','4888','4888','1439504340','订单 2015081453691 赠送的积分','99');");
E_D("replace into `ecs_account_log` values('68','10','0.00','0.00','4888','4888','1439505178','订单 2015081459952 赠送的积分','99');");
E_D("replace into `ecs_account_log` values('69','10','0.00','0.00','4888','4888','1439505573','订单 2015081492643 赠送的积分','99');");
E_D("replace into `ecs_account_log` values('70','10','0.00','0.00','4888','4888','1439505703','订单 2015081408271 赠送的积分','99');");
E_D("replace into `ecs_account_log` values('71','24','0.00','0.00','11','0','1439746126','11','2');");
E_D("replace into `ecs_account_log` values('72','24','1111111.00','0.00','0','0','1440185828','1','2');");
E_D("replace into `ecs_account_log` values('73','24','-98.00','0.00','0','0','1440185894','支付订单 2015082252907','99');");
E_D("replace into `ecs_account_log` values('74','24','0.00','0.00','88','88','1440185904','订单 2015082252907 赠送的积分','99');");
E_D("replace into `ecs_account_log` values('75','24','-272.00','0.00','0','0','1440194911','追加使用余额支付订单：2015072913543','99');");
E_D("replace into `ecs_account_log` values('76','24','-4988.00','0.00','0','0','1440195000','支付订单 2015082281287','99');");
E_D("replace into `ecs_account_log` values('77','24','0.00','0.00','4988','4988','1440195009','订单 2015082281287 赠送的积分','99');");
E_D("replace into `ecs_account_log` values('78','0','0.00','0.00','100','100','1440195818','注册送积分','99');");
E_D("replace into `ecs_account_log` values('79','25','0.00','0.00','100','0','1440196023','111','2');");
E_D("replace into `ecs_account_log` values('80','26','0.00','0.00','100','100','1440197475','注册送积分','99');");
E_D("replace into `ecs_account_log` values('81','5','0.00','0.00','249','249','1440376620','订单 2015082484247 赠送的积分','99');");
E_D("replace into `ecs_account_log` values('82','5','10000.00','0.00','0','0','1440530473','f','2');");
E_D("replace into `ecs_account_log` values('83','5','0.00','0.00','455','455','1441816829','订单 2015091098385 赠送的积分','99');");
E_D("replace into `ecs_account_log` values('84','5','0.00','0.00','669','669','1441816875','订单 2015091073713 赠送的积分','99');");
E_D("replace into `ecs_account_log` values('85','5','0.00','0.00','299','299','1442274829','订单 2015091562316 赠送的积分','99');");
E_D("replace into `ecs_account_log` values('86','5','0.00','0.00','188','188','1442882292','订单 2015092233392 赠送的积分','99');");
E_D("replace into `ecs_account_log` values('87','5','0.00','0.00','18','18','1442973256','订单 2015092308424 赠送的积分','99');");
E_D("replace into `ecs_account_log` values('88','5','-14.25','0.00','0','0','1444605027','支付订单 2015101251748','99');");
E_D("replace into `ecs_account_log` values('89','5','0.00','0.00','14','14','1444605028','订单 2015101251748 赠送的积分','99');");
E_D("replace into `ecs_account_log` values('90','5','0.00','0.00','233','233','1446657429','订单 2015110532816 赠送的积分','99');");
E_D("replace into `ecs_account_log` values('91','5','100.00','0.00','0','0','1448923199','储值卡充值，卡号：15120152848970','99');");
E_D("replace into `ecs_account_log` values('92','5','0.00','0.00','74','74','1449162408','订单 2015120153558 赠送的积分','99');");
E_D("replace into `ecs_account_log` values('93','5','0.00','0.00','18','18','1449162478','订单 2015120141721 赠送的积分','99');");
E_D("replace into `ecs_account_log` values('94','0','0.00','0.00','100','100','1455674628','注册送积分','99');");
E_D("replace into `ecs_account_log` values('95','6','0.00','0.00','5764','5764','1455934009','订单 2016022072517 赠送的积分','99');");
E_D("replace into `ecs_account_log` values('96','6','0.00','0.00','0','100','1456193848','晒单获得积分','99');");
E_D("replace into `ecs_account_log` values('97','6','0.00','0.00','8396','8396','1456212739','订单 2016022097688 赠送的积分','99');");
E_D("replace into `ecs_account_log` values('98','6','0.00','0.00','169','169','1456284647','订单 2016022451812 赠送的积分','99');");
E_D("replace into `ecs_account_log` values('99','6','11111.00','0.00','0','0','1456290702','充值','0');");
E_D("replace into `ecs_account_log` values('100','6','-67.15','0.00','0','0','1456290781','支付订单 2016022497287','99');");
E_D("replace into `ecs_account_log` values('101','6','-67.15','0.00','0','0','1456290948','支付订单 2016022401774','99');");
E_D("replace into `ecs_account_log` values('102','6','-849.15','0.00','0','0','1456362937','支付订单 2016022587052','99');");
E_D("replace into `ecs_account_log` values('103','6','-89.13','0.00','0','0','1456404188','支付订单 2016022590434','99');");
E_D("replace into `ecs_account_log` values('104','6','-56.10','0.00','0','0','1456406444','支付订单 2016022538549','99');");
E_D("replace into `ecs_account_log` values('105','6','0.00','0.00','56','56','1456406445','订单 2016022538549 赠送的积分','99');");
E_D("replace into `ecs_account_log` values('106','6','-3888.75','0.00','0','0','1456406927','追加使用余额支付订单：2016022516450','99');");
E_D("replace into `ecs_account_log` values('107','6','-1.00','0.00','0','0','1456407036','追加使用余额支付订单：2016022598233','99');");
E_D("replace into `ecs_account_log` values('108','6','-1.00','0.00','0','0','1456407058','追加使用余额支付订单：2016022598233','99');");
E_D("replace into `ecs_account_log` values('109','6','-1.00','0.00','0','0','1456407068','追加使用余额支付订单：2016022598233','99');");
E_D("replace into `ecs_account_log` values('110','28','0.00','0.00','100','100','1458094086','注册送积分','99');");
E_D("replace into `ecs_account_log` values('111','29','0.00','0.00','100','100','1458096549','注册送积分','99');");
E_D("replace into `ecs_account_log` values('112','30','0.00','0.00','100','100','1458100249','注册送积分','99');");
E_D("replace into `ecs_account_log` values('113','31','0.00','0.00','100','100','1458114015','注册送积分','99');");
E_D("replace into `ecs_account_log` values('114','0','0.00','0.00','100','100','1458118239','注册送积分','99');");
E_D("replace into `ecs_account_log` values('115','32','0.00','0.00','99','99','1458118533','订单 2016031638792 赠送的积分','99');");
E_D("replace into `ecs_account_log` values('116','32','0.00','0.00','99','99','1458118756','订单 2016031622459 赠送的积分','99');");
E_D("replace into `ecs_account_log` values('117','33','0.00','0.00','100','100','1458119207','注册送积分','99');");
E_D("replace into `ecs_account_log` values('118','37','0.00','0.00','100','100','1458196862','注册送积分','99');");
E_D("replace into `ecs_account_log` values('119','38','0.00','0.00','100','100','1458197094','注册送积分','99');");
E_D("replace into `ecs_account_log` values('120','40','0.00','0.00','100','100','1458202147','注册送积分','99');");
E_D("replace into `ecs_account_log` values('121','41','0.00','0.00','100','100','1458206852','注册送积分','99');");
E_D("replace into `ecs_account_log` values('122','45','0.00','0.00','100','100','1458269249','注册送积分','99');");
E_D("replace into `ecs_account_log` values('123','45','0.00','0.00','336','336','1458283110','订单 2016031818519 赠送的积分','99');");
E_D("replace into `ecs_account_log` values('128','47','0.00','0.00','100','100','1458284407','注册送积分','99');");
E_D("replace into `ecs_account_log` values('125','40','0.00','0.00','336','336','1458284030','订单 2016031706308 赠送的积分','99');");
E_D("replace into `ecs_account_log` values('126','40','0.00','0.00','-336','-336','1458284064','由于退货或未发货操作，退回订单 2016031706308 赠送的积分','99');");
E_D("replace into `ecs_account_log` values('127','45','0.00','0.00','-336','-336','1458284219','由于退货或未发货操作，退回订单 2016031818519 赠送的积分','99');");
E_D("replace into `ecs_account_log` values('129','47','1000.00','0.00','0','0','1458284846','++','2');");
E_D("replace into `ecs_account_log` values('130','47','-74.80','0.00','0','0','1458284850','支付订单 2016031835280','99');");
E_D("replace into `ecs_account_log` values('131','47','0.00','0.00','64','64','1458284986','订单 2016031835280 赠送的积分','99');");
E_D("replace into `ecs_account_log` values('132','2','15.00','0.00','0','0','1458284995','范德萨','99');");
E_D("replace into `ecs_account_log` values('133','2','15.00','0.00','0','0','1458285030','订单退款：2015072862934','99');");
E_D("replace into `ecs_account_log` values('134','47','0.00','0.00','-64','-64','1458285731','由于退货或未发货操作，退回订单 2016031835280 赠送的积分','99');");
E_D("replace into `ecs_account_log` values('135','47','0.00','0.00','64','64','1458286106','订单 2016031835280 赠送的积分','99');");
E_D("replace into `ecs_account_log` values('136','49','0.00','0.00','0','10','1458286119','微信活动赠送积分','99');");
E_D("replace into `ecs_account_log` values('137','32','0.00','0.00','-99','-99','1458286483','由于退货或未发货操作，退回订单 2016031622459 赠送的积分','99');");
E_D("replace into `ecs_account_log` values('138','47','0.00','0.00','-64','-64','1458286543','由于退货或未发货操作，退回订单 2016031835280 赠送的积分','99');");
E_D("replace into `ecs_account_log` values('139','47','0.00','0.00','64','64','1458287491','订单 2016031835280 赠送的积分','99');");
E_D("replace into `ecs_account_log` values('140','47','0.00','0.00','-64','-64','1458287537','由于退货或未发货操作，退回订单 2016031835280 赠送的积分','99');");
E_D("replace into `ecs_account_log` values('141','47','0.00','0.00','64','64','1458287557','订单 2016031835280 赠送的积分','99');");
E_D("replace into `ecs_account_log` values('142','51','0.00','0.00','100','100','1458288435','注册送积分','99');");
E_D("replace into `ecs_account_log` values('143','49','0.00','0.00','0','10','1458288806','微信活动赠送积分','99');");
E_D("replace into `ecs_account_log` values('145','54','0.00','0.00','100','100','1458296943','注册送积分','99');");
E_D("replace into `ecs_account_log` values('146','54','10000.00','0.00','0','0','1458297713','++','2');");
E_D("replace into `ecs_account_log` values('147','54','0.00','0.00','10000','0','1458297736','+++','2');");
E_D("replace into `ecs_account_log` values('148','54','-211.00','0.00','0','0','1458298382','支付订单 2016031897028','99');");
E_D("replace into `ecs_account_log` values('149','54','0.00','0.00','216','216','1458298780','订单 2016031897028 赠送的积分','99');");
E_D("replace into `ecs_account_log` values('150','54','-33.35','0.00','0','0','1458299200','追加使用余额支付订单：2016031810058','99');");
E_D("replace into `ecs_account_log` values('151','54','-0.01','0.00','0','0','1458299226','追加使用余额支付订单：2016031810058','99');");
E_D("replace into `ecs_account_log` values('152','44','0.00','0.00','0','10','1458306534','微信活动赠送积分','99');");
E_D("replace into `ecs_account_log` values('153','54','0.00','0.00','18','18','1458310290','订单 2016031810058 赠送的积分','99');");
E_D("replace into `ecs_account_log` values('154','0','0.00','0.00','100','100','1458316796','注册送积分','99');");
E_D("replace into `ecs_account_log` values('155','51','0.00','0.00','0','0','1458357090','订单 2016031977763 赠送的积分','99');");
E_D("replace into `ecs_account_log` values('156','51','0.00','0.00','0','0','1458357112','由于退货或未发货操作，退回订单 2016031977763 赠送的积分','99');");
E_D("replace into `ecs_account_log` values('157','51','0.00','0.00','0','0','1458357138','订单 2016031977763 赠送的积分','99');");
E_D("replace into `ecs_account_log` values('158','51','0.00','0.00','0','0','1458357147','由于退货或未发货操作，退回订单 2016031977763 赠送的积分','99');");
E_D("replace into `ecs_account_log` values('159','54','0.00','0.00','-18','-18','1458357221','由于退货或未发货操作，退回订单 2016031810058 赠送的积分','99');");
E_D("replace into `ecs_account_log` values('160','51','0.00','0.00','0','0','1458357739','订单 2016031909241 赠送的积分','99');");
E_D("replace into `ecs_account_log` values('161','58','0.00','0.00','100','100','1458377571','注册送积分','99');");
E_D("replace into `ecs_account_log` values('162','58','9999990.00','0.00','0','0','1458380592','0','2');");
E_D("replace into `ecs_account_log` values('163','58','0.00','0.00','0','10','1458384947','微信活动赠送积分','99');");
E_D("replace into `ecs_account_log` values('164','0','0.00','0.00','100','100','1463454697','注册送积分','99');");

require("../../inc/footer.php");
?>