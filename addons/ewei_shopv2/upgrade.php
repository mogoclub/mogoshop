<?php
$sql="DROP TABLE IF EXISTS `ims_ewei_shop_address_applyfor`;
CREATE TABLE `ims_ewei_shop_address_applyfor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT NULL,
  `openid` varchar(11) DEFAULT NULL,
  `data` text,
  `orderid` int(11) DEFAULT NULL,
  `ordersn` varchar(255) DEFAULT NULL,
  `isdispose` tinyint(1) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `createtime` int(11) DEFAULT NULL,
  `ispass` tinyint(1) DEFAULT NULL,
  `isdelete` tinyint(4) DEFAULT NULL,
  `isall` tinyint(4) DEFAULT NULL,
  `old_address` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `ims_ewei_shop_datatransfer`;
CREATE TABLE `ims_ewei_shop_datatransfer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fromuniacid` int(11) DEFAULT NULL,
  `touniacid` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `ims_ewei_shop_member_tmp`;
CREATE TABLE `ims_ewei_shop_member_tmp` (
  `uniacid` int(11) DEFAULT NULL,
  `openid` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
DROP TABLE IF EXISTS `ims_ewei_shop_cycelbuy_periods`;
CREATE TABLE `ims_ewei_shop_cycelbuy_periods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `cycelsn` varchar(255) NOT NULL,
  `sendtime` int(11) DEFAULT NULL,
  `receipttime` int(11) DEFAULT NULL,
  `status` tinyint(3) NOT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `addressid` int(11) DEFAULT NULL,
  `dispatchprice` decimal(10,2) DEFAULT NULL,
  `dispatchid` int(11) DEFAULT NULL,
  `createtime` int(11) DEFAULT NULL,
  `dispatchtype` tinyint(3) DEFAULT NULL,
  `finishtime` int(11) DEFAULT NULL,
  `expresscom` varchar(255) DEFAULT NULL,
  `expresssn` varchar(255) DEFAULT NULL,
  `express` varchar(255) DEFAULT NULL,
  `address` text,
  `updatelog` text,
  `ispostpone` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
ALTER TABLE ims_ewei_shop_wxapp_page MODIFY `data` mediumtext;
ALTER TABLE ims_ewei_shop_virtual_type MODIFY `linktext` varchar(50) DEFAULT NULL;
ALTER TABLE ims_ewei_shop_virtual_type MODIFY `linkurl` varchar(255) DEFAULT NULL;
ALTER TABLE ims_ewei_shop_exchange_group MODIFY `repeat` int(11) NOT NULL;
ALTER TABLE ims_ewei_shop_groups_goods MODIFY `category` int(11) DEFAULT NULL;
ALTER TABLE ims_ewei_shop_member MODIFY `groupid` varchar(1000) DEFAULT NULL;
ALTER TABLE ims_ewei_shop_order MODIFY `liveid` int(11) DEFAULT NULL;
ALTER TABLE ims_ewei_shop_order MODIFY `tradepaytype` tinyint(1) DEFAULT NULL;
ALTER TABLE ims_ewei_shop_order MODIFY `ordersn_trade` varchar(32) DEFAULT NULL;
ALTER TABLE ims_ewei_shop_order MODIFY  `wxapp_prepay_id` varchar(255) DEFAULT NULL;
";
pdo_run($sql);
if(!pdo_fieldexists('ewei_shop_goods',  'saleupdate')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_goods')." ADD `saleupdate` tinyint(3) DEFAULT NULL;");
}
if(!pdo_fieldexists('ewei_shop_goods_spec',  'iscycelbuy')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_goods_spec')." ADD `iscycelbuy` tinyint(1) DEFAULT NULL;");
}
if(!pdo_fieldexists('ewei_shop_lottery',  'award_start')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_lottery')." ADD `award_start` int(11) DEFAULT NULL;");
}
if(!pdo_fieldexists('ewei_shop_lottery',  'award_end')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_lottery')." ADD `award_end` int(11) DEFAULT NULL;");
}
if(!pdo_fieldexists('ewei_shop_task_set',  'top_notice')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_task_set')." ADD `top_notice` tinyint(1) NOT NULL;");
}
if(!pdo_fieldexists('ewei_shop_task_list',  'verb')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_task_list')." ADD `verb` varchar(255) DEFAULT NULL;");
}
if(!pdo_fieldexists('ewei_shop_task_list',  'unit')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_task_list')." ADD `unit` varchar(255) DEFAULT NULL;");
}
if(!pdo_fieldexists('ewei_shop_task_list',  'member_level')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_task_list')." ADD `member_level` int(11) NOT NULL;");
}
if(!pdo_fieldexists('ewei_shop_sign_user',  'isminiprogram')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_sign_user')." ADD `isminiprogram` int(11) NOT NULL;");
}
if(!pdo_fieldexists('ewei_shop_seckill_task',  'overtimes')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_seckill_task')." ADD `overtimes` tinyint(2) DEFAULT NULL;");
}
if(!pdo_fieldexists('ewei_shop_member_mergelog',  'fromuniacid')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_member_mergelog')." ADD `fromuniacid` int(11) DEFAULT NULL;");
}
if(!pdo_fieldexists('ewei_shop_member_address',  'lng')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_member_address')." ADD `lng` varchar(255) NOT NULL;");
}
if(!pdo_fieldexists('ewei_shop_member_address',  'lat')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_member_address')." ADD `lat` varchar(255) NOT NULL;");
}
if(!pdo_fieldexists('ewei_shop_goods_option',  'cycelbuy_periodic')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_goods_option')." ADD `cycelbuy_periodic` varchar(255) DEFAULT NULL;");
}
if(!pdo_fieldexists('ewei_shop_goods_spec_item',  'cycelbuy_periodic')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_goods_spec_item')." ADD `cycelbuy_periodic` varchar(20) DEFAULT NULL;");
}
if(!pdo_fieldexists('ewei_shop_order',  'ces')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_order')." ADD `ces` int(1) DEFAULT NULL;");
}
if(!pdo_fieldexists('ewei_shop_order',  'commissionmoney')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_order')." ADD `commissionmoney` decimal(10,2) DEFAULT NULL;");
}
if(!pdo_fieldexists('ewei_shop_order',  'is_cashier')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_order')." ADD `is_cashier` tinyint(3) DEFAULT NULL;");
}
if(!pdo_fieldexists('ewei_shop_order',  'iscycelbuy')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_order')." ADD `iscycelbuy` tinyint(3) DEFAULT NULL;");
}
if(!pdo_fieldexists('ewei_shop_order',  'cycelbuy_predict_time')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_order')." ADD `cycelbuy_predict_time` int(11) DEFAULT NULL;");
}
if(!pdo_fieldexists('ewei_shop_order',  'cycelbuy_periodic')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_order')." ADD `cycelbuy_periodic` varchar(255) DEFAULT NULL;");
}
if(!pdo_fieldexists('ewei_shop_member',  'commission')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_member')." ADD `commission` decimal(10,2) DEFAULT NULL;");
}
if(!pdo_fieldexists('ewei_shop_member',  'commission_pay')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_member')." ADD `commission_pay` decimal(10,2) DEFAULT NULL;");
}
if(!pdo_fieldexists('ewei_shop_member',  'hasnewcoupon')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_member')." ADD  `hasnewcoupon` tinyint(1) DEFAULT NULL;");
}
?>