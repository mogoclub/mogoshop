<?php
$sql="CREATE TABLE IF NOT EXISTS `ims_activity_clerk_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `displayorder` int(4) NOT NULL,
  `pid` int(6) NOT NULL,
  `group_name` varchar(20) NOT NULL,
  `title` varchar(20) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `url` varchar(255) NOT NULL,
  `type` varchar(20) NOT NULL,
  `permission` varchar(50) NOT NULL,
  `system` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
CREATE TABLE IF NOT EXISTS `ims_activity_clerks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `storeid` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `openid` varchar(50) NOT NULL,
  `nickname` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `password` (`password`),
  KEY `openid` (`openid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
CREATE TABLE IF NOT EXISTS `ims_activity_coupon` (
  `couponid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `type` tinyint(4) NOT NULL,
  `title` varchar(30) NOT NULL,
  `couponsn` varchar(50) NOT NULL,
  `description` text,
  `discount` decimal(10,2) NOT NULL,
  `condition` decimal(10,2) NOT NULL,
  `starttime` int(10) unsigned NOT NULL,
  `endtime` int(10) unsigned NOT NULL,
  `limit` int(11) NOT NULL,
  `dosage` int(11) unsigned NOT NULL,
  `amount` int(11) unsigned NOT NULL,
  `thumb` varchar(500) NOT NULL,
  `credit` int(10) unsigned NOT NULL,
  `credittype` varchar(20) NOT NULL,
  `use_module` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`couponid`),
  KEY `uniacid` (`uniacid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
CREATE TABLE IF NOT EXISTS `ims_activity_coupon_allocation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `couponid` int(10) unsigned NOT NULL,
  `groupid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`,`couponid`,`groupid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
CREATE TABLE IF NOT EXISTS `ims_activity_coupon_modules` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `couponid` int(10) unsigned NOT NULL,
  `module` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `couponid` (`couponid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
CREATE TABLE IF NOT EXISTS `ims_activity_coupon_password` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `storeid` int(10) unsigned NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `openid` varchar(50) NOT NULL,
  `nickname` varchar(30) NOT NULL,
  `uid` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
CREATE TABLE IF NOT EXISTS `ims_activity_coupon_record` (
  `recid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `grantmodule` varchar(50) NOT NULL,
  `granttime` int(10) unsigned NOT NULL,
  `usemodule` varchar(50) NOT NULL,
  `usetime` int(10) unsigned NOT NULL,
  `status` tinyint(4) NOT NULL,
  `remark` varchar(300) NOT NULL,
  `couponid` int(10) unsigned NOT NULL,
  `operator` varchar(30) NOT NULL,
  `clerk_id` int(10) unsigned NOT NULL,
  `store_id` int(10) unsigned NOT NULL,
  `clerk_type` tinyint(3) unsigned NOT NULL,
  `code` varchar(50) NOT NULL,
  PRIMARY KEY (`recid`),
  KEY `couponid` (`uid`,`grantmodule`,`usemodule`,`status`),
  KEY `uniacid` (`uniacid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
CREATE TABLE IF NOT EXISTS `ims_activity_day` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `aid` int(11) unsigned DEFAULT NULL,
  `daytime` int(11) unsigned DEFAULT NULL,
  `dname` varchar(20) DEFAULT NULL,
  `ddes` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
CREATE TABLE IF NOT EXISTS `ims_activity_exchange` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `couponid` int(10) NOT NULL,
  `uniacid` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `thumb` varchar(500) NOT NULL,
  `type` tinyint(1) unsigned NOT NULL,
  `extra` varchar(3000) NOT NULL,
  `credit` int(10) unsigned NOT NULL,
  `credittype` varchar(10) NOT NULL,
  `pretotal` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `total` int(10) unsigned NOT NULL,
  `status` tinyint(3) unsigned NOT NULL,
  `starttime` int(10) unsigned NOT NULL,
  `endtime` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `extra` (`extra`(255))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
CREATE TABLE IF NOT EXISTS `ims_activity_exchange_trades` (
  `tid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `exid` int(10) unsigned NOT NULL,
  `type` int(10) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`tid`),
  KEY `uniacid` (`uniacid`,`uid`,`exid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
CREATE TABLE IF NOT EXISTS `ims_activity_exchange_trades_shipping` (
  `tid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `exid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `status` tinyint(4) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `province` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `district` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zipcode` varchar(6) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`tid`),
  KEY `uniacid` (`uniacid`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
CREATE TABLE IF NOT EXISTS `ims_activity_guest` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `aid` int(11) unsigned DEFAULT NULL,
  `gname` varchar(20) NOT NULL,
  `jobtitle` varchar(20) NOT NULL,
  `gdesc` varchar(500) NOT NULL,
  `sig` varchar(20) NOT NULL,
  `headimage` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='嘉宾';
CREATE TABLE IF NOT EXISTS `ims_activity_mail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `weid` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
CREATE TABLE IF NOT EXISTS `ims_activity_modules` (
  `mid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `exid` int(10) unsigned NOT NULL,
  `module` varchar(50) NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `available` int(10) unsigned NOT NULL,
  PRIMARY KEY (`mid`),
  KEY `uniacid` (`uniacid`),
  KEY `module` (`module`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
CREATE TABLE IF NOT EXISTS `ims_activity_modules_record` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mid` int(10) unsigned NOT NULL,
  `num` tinyint(3) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `mid` (`mid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
CREATE TABLE IF NOT EXISTS `ims_activity_note` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `aid` int(11) unsigned DEFAULT NULL,
  `title` varchar(50) NOT NULL,
  `ndesc` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
CREATE TABLE IF NOT EXISTS `ims_activity_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(10) unsigned NOT NULL DEFAULT '0',
  `aid` int(10) unsigned NOT NULL,
  `new_pic` varchar(200) NOT NULL,
  `news_content` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_rid` (`rid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
CREATE TABLE IF NOT EXISTS `ims_activity_stores` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `business_name` varchar(50) NOT NULL,
  `branch_name` varchar(50) NOT NULL,
  `category` varchar(255) NOT NULL,
  `province` varchar(15) NOT NULL,
  `city` varchar(15) NOT NULL,
  `district` varchar(15) NOT NULL,
  `address` varchar(50) NOT NULL,
  `longitude` varchar(15) NOT NULL,
  `latitude` varchar(15) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `photo_list` varchar(10000) NOT NULL,
  `avg_price` int(10) unsigned NOT NULL,
  `recommend` varchar(255) NOT NULL,
  `special` varchar(255) NOT NULL,
  `introduction` varchar(255) NOT NULL,
  `open_time` varchar(50) NOT NULL,
  `location_id` int(10) unsigned NOT NULL,
  `status` tinyint(3) unsigned NOT NULL,
  `source` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '1为系统门店，2为微信门店',
  `message` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `location_id` (`location_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
CREATE TABLE IF NOT EXISTS `ims_activity_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `aid` int(11) unsigned DEFAULT NULL,
  `createtime` int(11) unsigned DEFAULT NULL,
  `uname` varchar(20) DEFAULT NULL,
  `sex` varchar(10) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `company` varchar(20) NOT NULL,
  `jobtitle` varchar(20) NOT NULL,
  `acname` varchar(50) DEFAULT NULL,
  `openid` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
CREATE TABLE IF NOT EXISTS `ims_coupon` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `acid` int(10) unsigned NOT NULL,
  `card_id` varchar(50) NOT NULL,
  `type` varchar(15) NOT NULL,
  `logo_url` varchar(150) NOT NULL,
  `code_type` tinyint(3) unsigned NOT NULL,
  `brand_name` varchar(15) NOT NULL,
  `title` varchar(15) NOT NULL,
  `sub_title` varchar(20) NOT NULL,
  `color` varchar(15) NOT NULL,
  `notice` varchar(15) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `date_info` varchar(200) NOT NULL,
  `quantity` int(10) unsigned NOT NULL,
  `use_custom_code` tinyint(3) NOT NULL,
  `bind_openid` tinyint(3) unsigned NOT NULL,
  `can_share` tinyint(3) unsigned NOT NULL,
  `can_give_friend` tinyint(3) unsigned NOT NULL,
  `get_limit` tinyint(3) unsigned NOT NULL,
  `service_phone` varchar(20) NOT NULL,
  `extra` varchar(1000) NOT NULL,
  `source` tinyint(3) unsigned NOT NULL DEFAULT '2',
  `status` tinyint(3) unsigned NOT NULL,
  `is_display` tinyint(3) unsigned NOT NULL,
  `promotion_url_name` varchar(10) NOT NULL,
  `promotion_url` varchar(100) NOT NULL,
  `promotion_url_sub_title` varchar(10) NOT NULL,
  `is_selfconsume` tinyint(3) unsigned NOT NULL,
  `dosage` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`,`acid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
CREATE TABLE IF NOT EXISTS `ims_coupon_activity` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `msg_id` int(10) NOT NULL,
  `status` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `type` int(3) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `coupons` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `members` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
CREATE TABLE IF NOT EXISTS `ims_coupon_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `couponid` varchar(255) NOT NULL,
  `groupid` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
CREATE TABLE IF NOT EXISTS `ims_coupon_location` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `acid` int(10) unsigned NOT NULL,
  `location_id` int(10) unsigned NOT NULL,
  `business_name` varchar(50) NOT NULL,
  `branch_name` varchar(50) NOT NULL,
  `category` varchar(255) NOT NULL,
  `province` varchar(15) NOT NULL,
  `city` varchar(15) NOT NULL,
  `district` varchar(15) NOT NULL,
  `address` varchar(50) NOT NULL,
  `longitude` varchar(15) NOT NULL,
  `latitude` varchar(15) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `photo_list` varchar(10000) NOT NULL,
  `avg_price` int(10) unsigned NOT NULL,
  `open_time` varchar(50) NOT NULL,
  `recommend` varchar(255) NOT NULL,
  `special` varchar(255) NOT NULL,
  `introduction` varchar(255) NOT NULL,
  `offset_type` tinyint(3) unsigned NOT NULL,
  `status` tinyint(3) unsigned NOT NULL,
  `message` varchar(255) NOT NULL,
  `sid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`,`acid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
CREATE TABLE IF NOT EXISTS `ims_coupon_modules` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `acid` int(10) unsigned NOT NULL,
  `couponid` int(10) unsigned NOT NULL DEFAULT '0',
  `module` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cid` (`couponid`),
  KEY `uniacid` (`uniacid`,`acid`),
  KEY `couponid` (`couponid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
CREATE TABLE IF NOT EXISTS `ims_coupon_record` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `acid` int(10) unsigned NOT NULL,
  `card_id` varchar(50) NOT NULL,
  `openid` varchar(50) NOT NULL,
  `friend_openid` varchar(50) NOT NULL,
  `givebyfriend` tinyint(3) unsigned NOT NULL,
  `code` varchar(50) NOT NULL,
  `hash` varchar(32) NOT NULL,
  `addtime` int(10) unsigned NOT NULL,
  `usetime` int(10) unsigned NOT NULL,
  `status` tinyint(3) NOT NULL,
  `clerk_name` varchar(15) NOT NULL,
  `clerk_id` int(10) unsigned NOT NULL,
  `store_id` int(10) unsigned NOT NULL,
  `clerk_type` tinyint(3) unsigned NOT NULL,
  `couponid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `grantmodule` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`,`acid`),
  KEY `card_id` (`card_id`),
  KEY `hash` (`hash`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
CREATE TABLE IF NOT EXISTS `ims_coupon_setting` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `acid` int(10) NOT NULL,
  `logourl` varchar(150) NOT NULL,
  `whitelist` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`,`acid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
CREATE TABLE IF NOT EXISTS `ims_coupon_store` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `couponid` varchar(255) NOT NULL,
  `storeid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `couponid` (`couponid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
CREATE TABLE IF NOT EXISTS `ims_mc_card` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `title` varchar(100) NOT NULL,
  `color` varchar(255) NOT NULL,
  `background` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `format` varchar(50) NOT NULL,
  `fields` varchar(1000) NOT NULL,
  `snpos` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `business` text NOT NULL,
  `description` varchar(512) NOT NULL,
  `discount_type` tinyint(3) unsigned NOT NULL,
  `discount` varchar(3000) NOT NULL,
  `grant` varchar(3000) NOT NULL,
  `grant_rate` varchar(20) NOT NULL,
  `offset_rate` int(10) unsigned NOT NULL,
  `offset_max` int(10) NOT NULL,
  `nums_status` tinyint(3) unsigned NOT NULL,
  `nums_text` varchar(15) NOT NULL,
  `nums` varchar(1000) NOT NULL,
  `times_status` tinyint(3) unsigned NOT NULL,
  `times_text` varchar(15) NOT NULL,
  `times` varchar(1000) NOT NULL,
  `recharge` varchar(500) NOT NULL,
  `format_type` tinyint(3) unsigned NOT NULL,
  `params` longtext NOT NULL,
  `html` longtext NOT NULL,
  `recommend_status` tinyint(3) unsigned NOT NULL,
  `sign_status` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
CREATE TABLE IF NOT EXISTS `ims_mc_card_care` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `title` varchar(30) NOT NULL,
  `type` tinyint(3) unsigned NOT NULL,
  `groupid` int(10) unsigned NOT NULL,
  `credit1` int(10) unsigned NOT NULL,
  `credit2` int(10) unsigned NOT NULL,
  `couponid` int(10) unsigned NOT NULL,
  `granttime` int(10) unsigned NOT NULL,
  `days` int(10) unsigned NOT NULL,
  `time` tinyint(3) unsigned NOT NULL,
  `show_in_card` tinyint(3) unsigned NOT NULL,
  `content` varchar(1000) NOT NULL,
  `sms_notice` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
CREATE TABLE IF NOT EXISTS `ims_mc_card_credit_set` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `sign` varchar(1000) NOT NULL,
  `share` varchar(500) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
CREATE TABLE IF NOT EXISTS `ims_mc_card_members` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) DEFAULT NULL,
  `cid` int(10) NOT NULL,
  `cardsn` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `openid` varchar(50) NOT NULL,
  `nums` int(10) unsigned NOT NULL,
  `endtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
CREATE TABLE IF NOT EXISTS `ims_mc_card_notices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `type` tinyint(3) unsigned NOT NULL,
  `title` varchar(30) NOT NULL,
  `thumb` varchar(100) NOT NULL,
  `groupid` int(10) unsigned NOT NULL,
  `content` text NOT NULL,
  `addtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
CREATE TABLE IF NOT EXISTS `ims_mc_card_notices_unread` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `notice_id` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `is_new` tinyint(3) unsigned NOT NULL,
  `type` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `uid` (`uid`),
  KEY `notice_id` (`notice_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
CREATE TABLE IF NOT EXISTS `ims_mc_card_recommend` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `title` varchar(30) NOT NULL,
  `thumb` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `displayorder` tinyint(3) unsigned NOT NULL,
  `addtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
CREATE TABLE IF NOT EXISTS `ims_mc_card_record` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `type` varchar(15) NOT NULL,
  `model` tinyint(3) unsigned NOT NULL,
  `fee` decimal(10,2) unsigned NOT NULL,
  `tag` varchar(10) NOT NULL,
  `note` varchar(255) NOT NULL,
  `remark` varchar(200) NOT NULL,
  `addtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `uid` (`uid`),
  KEY `addtime` (`addtime`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
CREATE TABLE IF NOT EXISTS `ims_mc_card_sign_record` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `credit` int(10) unsigned NOT NULL,
  `is_grant` tinyint(3) unsigned NOT NULL,
  `addtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
CREATE TABLE IF NOT EXISTS `ims_paycenter_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `pid` int(10) unsigned NOT NULL,
  `clerk_id` int(10) unsigned NOT NULL,
  `store_id` int(10) unsigned NOT NULL,
  `clerk_type` tinyint(3) unsigned NOT NULL,
  `uniontid` varchar(40) NOT NULL,
  `transaction_id` varchar(40) NOT NULL,
  `type` varchar(10) NOT NULL,
  `trade_type` varchar(10) NOT NULL,
  `body` varchar(255) NOT NULL,
  `fee` varchar(15) NOT NULL,
  `final_fee` decimal(10,2) unsigned NOT NULL,
  `credit1` int(10) unsigned NOT NULL,
  `credit1_fee` decimal(10,2) unsigned NOT NULL,
  `credit2` decimal(10,2) unsigned NOT NULL,
  `cash` decimal(10,2) unsigned NOT NULL,
  `remark` varchar(255) NOT NULL,
  `auth_code` varchar(30) NOT NULL,
  `openid` varchar(50) NOT NULL,
  `nickname` varchar(50) NOT NULL,
  `follow` tinyint(3) unsigned NOT NULL,
  `status` tinyint(3) unsigned NOT NULL,
  `credit_status` tinyint(3) unsigned NOT NULL,
  `paytime` int(10) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
";
pdo_run($sql);
if(!pdo_fieldexists('coupon',  'id')) {
	pdo_query("ALTER TABLE ".tablename('coupon')." ADD `id` int(10) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('coupon',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('coupon')." ADD `uniacid` int(10) unsigned NOT NULL;");
}
if(!pdo_fieldexists('coupon',  'acid')) {
	pdo_query("ALTER TABLE ".tablename('coupon')." ADD `acid` int(10) unsigned NOT NULL;");
}
if(!pdo_fieldexists('coupon',  'card_id')) {
	pdo_query("ALTER TABLE ".tablename('coupon')." ADD `card_id` varchar(50) NOT NULL;");
}
if(!pdo_fieldexists('coupon',  'type')) {
	pdo_query("ALTER TABLE ".tablename('coupon')." ADD `type` varchar(15) NOT NULL;");
}
if(!pdo_fieldexists('coupon',  'logo_url')) {
	pdo_query("ALTER TABLE ".tablename('coupon')." ADD `logo_url` varchar(150) NOT NULL;");
}
if(!pdo_fieldexists('coupon',  'code_type')) {
	pdo_query("ALTER TABLE ".tablename('coupon')." ADD `code_type` tinyint(3) unsigned NOT NULL;");
}
if(!pdo_fieldexists('coupon',  'brand_name')) {
	pdo_query("ALTER TABLE ".tablename('coupon')." ADD `brand_name` varchar(15) NOT NULL;");
}
if(!pdo_fieldexists('coupon',  'title')) {
	pdo_query("ALTER TABLE ".tablename('coupon')." ADD `title` varchar(15) NOT NULL;");
}
if(!pdo_fieldexists('coupon',  'sub_title')) {
	pdo_query("ALTER TABLE ".tablename('coupon')." ADD `sub_title` varchar(20) NOT NULL;");
}
if(!pdo_fieldexists('coupon',  'color')) {
	pdo_query("ALTER TABLE ".tablename('coupon')." ADD `color` varchar(15) NOT NULL;");
}
if(!pdo_fieldexists('coupon',  'notice')) {
	pdo_query("ALTER TABLE ".tablename('coupon')." ADD `notice` varchar(15) NOT NULL;");
}
if(!pdo_fieldexists('coupon',  'description')) {
	pdo_query("ALTER TABLE ".tablename('coupon')." ADD `description` varchar(1000) NOT NULL;");
}
if(!pdo_fieldexists('coupon',  'date_info')) {
	pdo_query("ALTER TABLE ".tablename('coupon')." ADD `date_info` varchar(200) NOT NULL;");
}
if(!pdo_fieldexists('coupon',  'quantity')) {
	pdo_query("ALTER TABLE ".tablename('coupon')." ADD `quantity` int(10) unsigned NOT NULL;");
}
if(!pdo_fieldexists('coupon',  'use_custom_code')) {
	pdo_query("ALTER TABLE ".tablename('coupon')." ADD `use_custom_code` tinyint(3) NOT NULL;");
}
if(!pdo_fieldexists('coupon',  'bind_openid')) {
	pdo_query("ALTER TABLE ".tablename('coupon')." ADD `bind_openid` tinyint(3) unsigned NOT NULL;");
}
if(!pdo_fieldexists('coupon',  'can_share')) {
	pdo_query("ALTER TABLE ".tablename('coupon')." ADD `can_share` tinyint(3) unsigned NOT NULL;");
}
if(!pdo_fieldexists('coupon',  'can_give_friend')) {
	pdo_query("ALTER TABLE ".tablename('coupon')." ADD `can_give_friend` tinyint(3) unsigned NOT NULL;");
}
if(!pdo_fieldexists('coupon',  'get_limit')) {
	pdo_query("ALTER TABLE ".tablename('coupon')." ADD `get_limit` tinyint(3) unsigned NOT NULL;");
}
if(!pdo_fieldexists('coupon',  'service_phone')) {
	pdo_query("ALTER TABLE ".tablename('coupon')." ADD `service_phone` varchar(20) NOT NULL;");
}
if(!pdo_fieldexists('coupon',  'extra')) {
	pdo_query("ALTER TABLE ".tablename('coupon')." ADD `extra` varchar(1000) NOT NULL;");
}
if(!pdo_fieldexists('coupon',  'source')) {
	pdo_query("ALTER TABLE ".tablename('coupon')." ADD `source` tinyint(3) unsigned NOT NULL DEFAULT '2';");
}
if(!pdo_fieldexists('coupon',  'status')) {
	pdo_query("ALTER TABLE ".tablename('coupon')." ADD `status` tinyint(3) unsigned NOT NULL;");
}
if(!pdo_fieldexists('coupon',  'is_display')) {
	pdo_query("ALTER TABLE ".tablename('coupon')." ADD `is_display` tinyint(3) unsigned NOT NULL;");
}
if(!pdo_fieldexists('coupon',  'promotion_url_name')) {
	pdo_query("ALTER TABLE ".tablename('coupon')." ADD `promotion_url_name` varchar(10) NOT NULL;");
}
if(!pdo_fieldexists('coupon',  'promotion_url')) {
	pdo_query("ALTER TABLE ".tablename('coupon')." ADD `promotion_url` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('coupon',  'promotion_url_sub_title')) {
	pdo_query("ALTER TABLE ".tablename('coupon')." ADD `promotion_url_sub_title` varchar(10) NOT NULL;");
}
if(!pdo_fieldexists('coupon',  'is_selfconsume')) {
	pdo_query("ALTER TABLE ".tablename('coupon')." ADD `is_selfconsume` tinyint(3) unsigned NOT NULL;");
}
if(!pdo_fieldexists('coupon',  'dosage')) {
	pdo_query("ALTER TABLE ".tablename('coupon')." ADD `dosage` int(10) unsigned DEFAULT NULL;");
}
if(!pdo_indexexists('coupon',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('coupon')." ADD KEY `uniacid` (`uniacid`,`acid`);");
}
if(!pdo_fieldexists('coupon_activity',  'id')) {
	pdo_query("ALTER TABLE ".tablename('coupon_activity')." ADD `id` int(10) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('coupon_activity',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('coupon_activity')." ADD `uniacid` int(10) NOT NULL;");
}
if(!pdo_fieldexists('coupon_activity',  'msg_id')) {
	pdo_query("ALTER TABLE ".tablename('coupon_activity')." ADD `msg_id` int(10) NOT NULL;");
}
if(!pdo_fieldexists('coupon_activity',  'status')) {
	pdo_query("ALTER TABLE ".tablename('coupon_activity')." ADD `status` int(10) NOT NULL;");
}
if(!pdo_fieldexists('coupon_activity',  'title')) {
	pdo_query("ALTER TABLE ".tablename('coupon_activity')." ADD `title` varchar(255) NOT NULL;");
}
if(!pdo_fieldexists('coupon_activity',  'type')) {
	pdo_query("ALTER TABLE ".tablename('coupon_activity')." ADD `type` int(3) NOT NULL;");
}
if(!pdo_fieldexists('coupon_activity',  'thumb')) {
	pdo_query("ALTER TABLE ".tablename('coupon_activity')." ADD `thumb` varchar(255) NOT NULL;");
}
if(!pdo_fieldexists('coupon_activity',  'coupons')) {
	pdo_query("ALTER TABLE ".tablename('coupon_activity')." ADD `coupons` varchar(255) NOT NULL;");
}
if(!pdo_fieldexists('coupon_activity',  'description')) {
	pdo_query("ALTER TABLE ".tablename('coupon_activity')." ADD `description` varchar(255) NOT NULL;");
}
if(!pdo_fieldexists('coupon_activity',  'members')) {
	pdo_query("ALTER TABLE ".tablename('coupon_activity')." ADD `members` varchar(255) NOT NULL;");
}
if(!pdo_fieldexists('coupon_groups',  'id')) {
	pdo_query("ALTER TABLE ".tablename('coupon_groups')." ADD `id` int(10) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('coupon_groups',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('coupon_groups')." ADD `uniacid` int(10) NOT NULL;");
}
if(!pdo_fieldexists('coupon_groups',  'couponid')) {
	pdo_query("ALTER TABLE ".tablename('coupon_groups')." ADD `couponid` varchar(255) NOT NULL;");
}
if(!pdo_fieldexists('coupon_groups',  'groupid')) {
	pdo_query("ALTER TABLE ".tablename('coupon_groups')." ADD `groupid` int(10) NOT NULL;");
}
if(!pdo_fieldexists('coupon_location',  'id')) {
	pdo_query("ALTER TABLE ".tablename('coupon_location')." ADD `id` int(10) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('coupon_location',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('coupon_location')." ADD `uniacid` int(10) unsigned NOT NULL;");
}
if(!pdo_fieldexists('coupon_location',  'acid')) {
	pdo_query("ALTER TABLE ".tablename('coupon_location')." ADD `acid` int(10) unsigned NOT NULL;");
}
if(!pdo_fieldexists('coupon_location',  'location_id')) {
	pdo_query("ALTER TABLE ".tablename('coupon_location')." ADD `location_id` int(10) unsigned NOT NULL;");
}
if(!pdo_fieldexists('coupon_location',  'business_name')) {
	pdo_query("ALTER TABLE ".tablename('coupon_location')." ADD `business_name` varchar(50) NOT NULL;");
}
if(!pdo_fieldexists('coupon_location',  'branch_name')) {
	pdo_query("ALTER TABLE ".tablename('coupon_location')." ADD `branch_name` varchar(50) NOT NULL;");
}
if(!pdo_fieldexists('coupon_location',  'category')) {
	pdo_query("ALTER TABLE ".tablename('coupon_location')." ADD `category` varchar(255) NOT NULL;");
}
if(!pdo_fieldexists('coupon_location',  'province')) {
	pdo_query("ALTER TABLE ".tablename('coupon_location')." ADD `province` varchar(15) NOT NULL;");
}
if(!pdo_fieldexists('coupon_location',  'city')) {
	pdo_query("ALTER TABLE ".tablename('coupon_location')." ADD `city` varchar(15) NOT NULL;");
}
if(!pdo_fieldexists('coupon_location',  'district')) {
	pdo_query("ALTER TABLE ".tablename('coupon_location')." ADD `district` varchar(15) NOT NULL;");
}
if(!pdo_fieldexists('coupon_location',  'address')) {
	pdo_query("ALTER TABLE ".tablename('coupon_location')." ADD `address` varchar(50) NOT NULL;");
}
if(!pdo_fieldexists('coupon_location',  'longitude')) {
	pdo_query("ALTER TABLE ".tablename('coupon_location')." ADD `longitude` varchar(15) NOT NULL;");
}
if(!pdo_fieldexists('coupon_location',  'latitude')) {
	pdo_query("ALTER TABLE ".tablename('coupon_location')." ADD `latitude` varchar(15) NOT NULL;");
}
if(!pdo_fieldexists('coupon_location',  'telephone')) {
	pdo_query("ALTER TABLE ".tablename('coupon_location')." ADD `telephone` varchar(20) NOT NULL;");
}
if(!pdo_fieldexists('coupon_location',  'photo_list')) {
	pdo_query("ALTER TABLE ".tablename('coupon_location')." ADD `photo_list` varchar(10000) NOT NULL;");
}
if(!pdo_fieldexists('coupon_location',  'avg_price')) {
	pdo_query("ALTER TABLE ".tablename('coupon_location')." ADD `avg_price` int(10) unsigned NOT NULL;");
}
if(!pdo_fieldexists('coupon_location',  'open_time')) {
	pdo_query("ALTER TABLE ".tablename('coupon_location')." ADD `open_time` varchar(50) NOT NULL;");
}
if(!pdo_fieldexists('coupon_location',  'recommend')) {
	pdo_query("ALTER TABLE ".tablename('coupon_location')." ADD `recommend` varchar(255) NOT NULL;");
}
if(!pdo_fieldexists('coupon_location',  'special')) {
	pdo_query("ALTER TABLE ".tablename('coupon_location')." ADD `special` varchar(255) NOT NULL;");
}
if(!pdo_fieldexists('coupon_location',  'introduction')) {
	pdo_query("ALTER TABLE ".tablename('coupon_location')." ADD `introduction` varchar(255) NOT NULL;");
}
if(!pdo_fieldexists('coupon_location',  'offset_type')) {
	pdo_query("ALTER TABLE ".tablename('coupon_location')." ADD `offset_type` tinyint(3) unsigned NOT NULL;");
}
if(!pdo_fieldexists('coupon_location',  'status')) {
	pdo_query("ALTER TABLE ".tablename('coupon_location')." ADD `status` tinyint(3) unsigned NOT NULL;");
}
if(!pdo_fieldexists('coupon_location',  'message')) {
	pdo_query("ALTER TABLE ".tablename('coupon_location')." ADD `message` varchar(255) NOT NULL;");
}
if(!pdo_fieldexists('coupon_location',  'sid')) {
	pdo_query("ALTER TABLE ".tablename('coupon_location')." ADD `sid` int(10) unsigned NOT NULL;");
}
if(!pdo_indexexists('coupon_location',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('coupon_location')." ADD KEY `uniacid` (`uniacid`,`acid`);");
}
if(!pdo_fieldexists('coupon_modules',  'id')) {
	pdo_query("ALTER TABLE ".tablename('coupon_modules')." ADD `id` int(10) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('coupon_modules',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('coupon_modules')." ADD `uniacid` int(10) unsigned NOT NULL;");
}
if(!pdo_fieldexists('coupon_modules',  'acid')) {
	pdo_query("ALTER TABLE ".tablename('coupon_modules')." ADD `acid` int(10) unsigned NOT NULL;");
}
if(!pdo_fieldexists('coupon_modules',  'couponid')) {
	pdo_query("ALTER TABLE ".tablename('coupon_modules')." ADD `couponid` int(10) unsigned NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists('coupon_modules',  'module')) {
	pdo_query("ALTER TABLE ".tablename('coupon_modules')." ADD `module` varchar(30) NOT NULL;");
}
if(!pdo_indexexists('coupon_modules',  'cid')) {
	pdo_query("ALTER TABLE ".tablename('coupon_modules')." ADD KEY `cid` (`couponid`);");
}
if(!pdo_indexexists('coupon_modules',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('coupon_modules')." ADD KEY `uniacid` (`uniacid`,`acid`);");
}
if(!pdo_indexexists('coupon_modules',  'couponid')) {
	pdo_query("ALTER TABLE ".tablename('coupon_modules')." ADD KEY `couponid` (`couponid`);");
}
if(!pdo_fieldexists('coupon_record',  'id')) {
	pdo_query("ALTER TABLE ".tablename('coupon_record')." ADD `id` int(10) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('coupon_record',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('coupon_record')." ADD `uniacid` int(10) unsigned NOT NULL;");
}
if(!pdo_fieldexists('coupon_record',  'acid')) {
	pdo_query("ALTER TABLE ".tablename('coupon_record')." ADD `acid` int(10) unsigned NOT NULL;");
}
if(!pdo_fieldexists('coupon_record',  'card_id')) {
	pdo_query("ALTER TABLE ".tablename('coupon_record')." ADD `card_id` varchar(50) NOT NULL;");
}
if(!pdo_fieldexists('coupon_record',  'openid')) {
	pdo_query("ALTER TABLE ".tablename('coupon_record')." ADD `openid` varchar(50) NOT NULL;");
}
if(!pdo_fieldexists('coupon_record',  'friend_openid')) {
	pdo_query("ALTER TABLE ".tablename('coupon_record')." ADD `friend_openid` varchar(50) NOT NULL;");
}
if(!pdo_fieldexists('coupon_record',  'givebyfriend')) {
	pdo_query("ALTER TABLE ".tablename('coupon_record')." ADD `givebyfriend` tinyint(3) unsigned NOT NULL;");
}
if(!pdo_fieldexists('coupon_record',  'code')) {
	pdo_query("ALTER TABLE ".tablename('coupon_record')." ADD `code` varchar(50) NOT NULL;");
}
if(!pdo_fieldexists('coupon_record',  'hash')) {
	pdo_query("ALTER TABLE ".tablename('coupon_record')." ADD `hash` varchar(32) NOT NULL;");
}
if(!pdo_fieldexists('coupon_record',  'addtime')) {
	pdo_query("ALTER TABLE ".tablename('coupon_record')." ADD `addtime` int(10) unsigned NOT NULL;");
}
if(!pdo_fieldexists('coupon_record',  'usetime')) {
	pdo_query("ALTER TABLE ".tablename('coupon_record')." ADD `usetime` int(10) unsigned NOT NULL;");
}
if(!pdo_fieldexists('coupon_record',  'status')) {
	pdo_query("ALTER TABLE ".tablename('coupon_record')." ADD `status` tinyint(3) NOT NULL;");
}
if(!pdo_fieldexists('coupon_record',  'clerk_name')) {
	pdo_query("ALTER TABLE ".tablename('coupon_record')." ADD `clerk_name` varchar(15) NOT NULL;");
}
if(!pdo_fieldexists('coupon_record',  'clerk_id')) {
	pdo_query("ALTER TABLE ".tablename('coupon_record')." ADD `clerk_id` int(10) unsigned NOT NULL;");
}
if(!pdo_fieldexists('coupon_record',  'store_id')) {
	pdo_query("ALTER TABLE ".tablename('coupon_record')." ADD `store_id` int(10) unsigned NOT NULL;");
}
if(!pdo_fieldexists('coupon_record',  'clerk_type')) {
	pdo_query("ALTER TABLE ".tablename('coupon_record')." ADD `clerk_type` tinyint(3) unsigned NOT NULL;");
}
if(!pdo_fieldexists('coupon_record',  'couponid')) {
	pdo_query("ALTER TABLE ".tablename('coupon_record')." ADD `couponid` int(10) unsigned NOT NULL;");
}
if(!pdo_fieldexists('coupon_record',  'uid')) {
	pdo_query("ALTER TABLE ".tablename('coupon_record')." ADD `uid` int(10) unsigned NOT NULL;");
}
if(!pdo_fieldexists('coupon_record',  'grantmodule')) {
	pdo_query("ALTER TABLE ".tablename('coupon_record')." ADD `grantmodule` varchar(255) NOT NULL;");
}
if(!pdo_fieldexists('coupon_record',  'remark')) {
	pdo_query("ALTER TABLE ".tablename('coupon_record')." ADD `remark` varchar(255) NOT NULL;");
}
if(!pdo_indexexists('coupon_record',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('coupon_record')." ADD KEY `uniacid` (`uniacid`,`acid`);");
}
if(!pdo_indexexists('coupon_record',  'card_id')) {
	pdo_query("ALTER TABLE ".tablename('coupon_record')." ADD KEY `card_id` (`card_id`);");
}
if(!pdo_indexexists('coupon_record',  'hash')) {
	pdo_query("ALTER TABLE ".tablename('coupon_record')." ADD KEY `hash` (`hash`);");
}
if(!pdo_fieldexists('coupon_setting',  'id')) {
	pdo_query("ALTER TABLE ".tablename('coupon_setting')." ADD `id` int(10) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('coupon_setting',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('coupon_setting')." ADD `uniacid` int(10) unsigned NOT NULL;");
}
if(!pdo_fieldexists('coupon_setting',  'acid')) {
	pdo_query("ALTER TABLE ".tablename('coupon_setting')." ADD `acid` int(10) NOT NULL;");
}
if(!pdo_fieldexists('coupon_setting',  'logourl')) {
	pdo_query("ALTER TABLE ".tablename('coupon_setting')." ADD `logourl` varchar(150) NOT NULL;");
}
if(!pdo_fieldexists('coupon_setting',  'whitelist')) {
	pdo_query("ALTER TABLE ".tablename('coupon_setting')." ADD `whitelist` varchar(1000) NOT NULL;");
}
if(!pdo_indexexists('coupon_setting',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('coupon_setting')." ADD KEY `uniacid` (`uniacid`,`acid`);");
}
if(!pdo_fieldexists('coupon_store',  'id')) {
	pdo_query("ALTER TABLE ".tablename('coupon_store')." ADD `id` int(10) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('coupon_store',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('coupon_store')." ADD `uniacid` int(10) NOT NULL;");
}
if(!pdo_fieldexists('coupon_store',  'couponid')) {
	pdo_query("ALTER TABLE ".tablename('coupon_store')." ADD `couponid` varchar(255) NOT NULL;");
}
if(!pdo_fieldexists('coupon_store',  'storeid')) {
	pdo_query("ALTER TABLE ".tablename('coupon_store')." ADD `storeid` int(10) unsigned NOT NULL;");
}
if(!pdo_indexexists('coupon_store',  'couponid')) {
	pdo_query("ALTER TABLE ".tablename('coupon_store')." ADD KEY `couponid` (`couponid`);");
}
if(!pdo_fieldexists('mc_card',  'id')) {
	pdo_query("ALTER TABLE ".tablename('mc_card')." ADD `id` int(10) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('mc_card',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('mc_card')." ADD `uniacid` int(10) unsigned NOT NULL;");
}
if(!pdo_fieldexists('mc_card',  'title')) {
	pdo_query("ALTER TABLE ".tablename('mc_card')." ADD `title` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('mc_card',  'color')) {
	pdo_query("ALTER TABLE ".tablename('mc_card')." ADD `color` varchar(255) NOT NULL;");
}
if(!pdo_fieldexists('mc_card',  'background')) {
	pdo_query("ALTER TABLE ".tablename('mc_card')." ADD `background` varchar(255) NOT NULL;");
}
if(!pdo_fieldexists('mc_card',  'logo')) {
	pdo_query("ALTER TABLE ".tablename('mc_card')." ADD `logo` varchar(255) NOT NULL;");
}
if(!pdo_fieldexists('mc_card',  'format')) {
	pdo_query("ALTER TABLE ".tablename('mc_card')." ADD `format` varchar(50) NOT NULL;");
}
if(!pdo_fieldexists('mc_card',  'fields')) {
	pdo_query("ALTER TABLE ".tablename('mc_card')." ADD `fields` varchar(1000) NOT NULL;");
}
if(!pdo_fieldexists('mc_card',  'snpos')) {
	pdo_query("ALTER TABLE ".tablename('mc_card')." ADD `snpos` int(11) NOT NULL;");
}
if(!pdo_fieldexists('mc_card',  'status')) {
	pdo_query("ALTER TABLE ".tablename('mc_card')." ADD `status` tinyint(1) NOT NULL;");
}
if(!pdo_fieldexists('mc_card',  'business')) {
	pdo_query("ALTER TABLE ".tablename('mc_card')." ADD `business` text NOT NULL;");
}
if(!pdo_fieldexists('mc_card',  'description')) {
	pdo_query("ALTER TABLE ".tablename('mc_card')." ADD `description` varchar(512) NOT NULL;");
}
if(!pdo_fieldexists('mc_card',  'discount_type')) {
	pdo_query("ALTER TABLE ".tablename('mc_card')." ADD `discount_type` tinyint(3) unsigned NOT NULL;");
}
if(!pdo_fieldexists('mc_card',  'discount')) {
	pdo_query("ALTER TABLE ".tablename('mc_card')." ADD `discount` varchar(3000) NOT NULL;");
}
if(!pdo_fieldexists('mc_card',  'grant')) {
	pdo_query("ALTER TABLE ".tablename('mc_card')." ADD `grant` varchar(3000) NOT NULL;");
}
if(!pdo_fieldexists('mc_card',  'grant_rate')) {
	pdo_query("ALTER TABLE ".tablename('mc_card')." ADD `grant_rate` varchar(20) NOT NULL;");
}
if(!pdo_fieldexists('mc_card',  'offset_rate')) {
	pdo_query("ALTER TABLE ".tablename('mc_card')." ADD `offset_rate` int(10) unsigned NOT NULL;");
}
if(!pdo_fieldexists('mc_card',  'offset_max')) {
	pdo_query("ALTER TABLE ".tablename('mc_card')." ADD `offset_max` int(10) NOT NULL;");
}
if(!pdo_fieldexists('mc_card',  'nums_status')) {
	pdo_query("ALTER TABLE ".tablename('mc_card')." ADD `nums_status` tinyint(3) unsigned NOT NULL;");
}
if(!pdo_fieldexists('mc_card',  'nums_text')) {
	pdo_query("ALTER TABLE ".tablename('mc_card')." ADD `nums_text` varchar(15) NOT NULL;");
}
if(!pdo_fieldexists('mc_card',  'nums')) {
	pdo_query("ALTER TABLE ".tablename('mc_card')." ADD `nums` varchar(1000) NOT NULL;");
}
if(!pdo_fieldexists('mc_card',  'times_status')) {
	pdo_query("ALTER TABLE ".tablename('mc_card')." ADD `times_status` tinyint(3) unsigned NOT NULL;");
}
if(!pdo_fieldexists('mc_card',  'times_text')) {
	pdo_query("ALTER TABLE ".tablename('mc_card')." ADD `times_text` varchar(15) NOT NULL;");
}
if(!pdo_fieldexists('mc_card',  'times')) {
	pdo_query("ALTER TABLE ".tablename('mc_card')." ADD `times` varchar(1000) NOT NULL;");
}
if(!pdo_fieldexists('mc_card',  'recharge')) {
	pdo_query("ALTER TABLE ".tablename('mc_card')." ADD `recharge` varchar(500) NOT NULL;");
}
if(!pdo_fieldexists('mc_card',  'format_type')) {
	pdo_query("ALTER TABLE ".tablename('mc_card')." ADD `format_type` tinyint(3) unsigned NOT NULL;");
}
if(!pdo_fieldexists('mc_card',  'params')) {
	pdo_query("ALTER TABLE ".tablename('mc_card')." ADD `params` longtext NOT NULL;");
}
if(!pdo_fieldexists('mc_card',  'html')) {
	pdo_query("ALTER TABLE ".tablename('mc_card')." ADD `html` longtext NOT NULL;");
}
if(!pdo_fieldexists('mc_card',  'recommend_status')) {
	pdo_query("ALTER TABLE ".tablename('mc_card')." ADD `recommend_status` tinyint(3) unsigned NOT NULL;");
}
if(!pdo_fieldexists('mc_card',  'sign_status')) {
	pdo_query("ALTER TABLE ".tablename('mc_card')." ADD `sign_status` tinyint(3) unsigned NOT NULL;");
}
if(!pdo_indexexists('mc_card',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('mc_card')." ADD KEY `uniacid` (`uniacid`);");
}
if(!pdo_fieldexists('mc_card_care',  'id')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_care')." ADD `id` int(10) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('mc_card_care',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_care')." ADD `uniacid` int(10) unsigned NOT NULL;");
}
if(!pdo_fieldexists('mc_card_care',  'title')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_care')." ADD `title` varchar(30) NOT NULL;");
}
if(!pdo_fieldexists('mc_card_care',  'type')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_care')." ADD `type` tinyint(3) unsigned NOT NULL;");
}
if(!pdo_fieldexists('mc_card_care',  'groupid')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_care')." ADD `groupid` int(10) unsigned NOT NULL;");
}
if(!pdo_fieldexists('mc_card_care',  'credit1')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_care')." ADD `credit1` int(10) unsigned NOT NULL;");
}
if(!pdo_fieldexists('mc_card_care',  'credit2')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_care')." ADD `credit2` int(10) unsigned NOT NULL;");
}
if(!pdo_fieldexists('mc_card_care',  'couponid')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_care')." ADD `couponid` int(10) unsigned NOT NULL;");
}
if(!pdo_fieldexists('mc_card_care',  'granttime')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_care')." ADD `granttime` int(10) unsigned NOT NULL;");
}
if(!pdo_fieldexists('mc_card_care',  'days')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_care')." ADD `days` int(10) unsigned NOT NULL;");
}
if(!pdo_fieldexists('mc_card_care',  'time')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_care')." ADD `time` tinyint(3) unsigned NOT NULL;");
}
if(!pdo_fieldexists('mc_card_care',  'show_in_card')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_care')." ADD `show_in_card` tinyint(3) unsigned NOT NULL;");
}
if(!pdo_fieldexists('mc_card_care',  'content')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_care')." ADD `content` varchar(1000) NOT NULL;");
}
if(!pdo_fieldexists('mc_card_care',  'sms_notice')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_care')." ADD `sms_notice` tinyint(3) unsigned NOT NULL;");
}
if(!pdo_indexexists('mc_card_care',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_care')." ADD KEY `uniacid` (`uniacid`);");
}
if(!pdo_fieldexists('mc_card_credit_set',  'id')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_credit_set')." ADD `id` int(10) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('mc_card_credit_set',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_credit_set')." ADD `uniacid` int(10) unsigned NOT NULL;");
}
if(!pdo_fieldexists('mc_card_credit_set',  'sign')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_credit_set')." ADD `sign` varchar(1000) NOT NULL;");
}
if(!pdo_fieldexists('mc_card_credit_set',  'share')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_credit_set')." ADD `share` varchar(500) NOT NULL;");
}
if(!pdo_fieldexists('mc_card_credit_set',  'content')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_credit_set')." ADD `content` text NOT NULL;");
}
if(!pdo_indexexists('mc_card_credit_set',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_credit_set')." ADD KEY `uniacid` (`uniacid`);");
}
if(!pdo_fieldexists('mc_card_members',  'id')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_members')." ADD `id` int(10) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('mc_card_members',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_members')." ADD `uniacid` int(10) unsigned NOT NULL;");
}
if(!pdo_fieldexists('mc_card_members',  'uid')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_members')." ADD `uid` int(10) DEFAULT NULL;");
}
if(!pdo_fieldexists('mc_card_members',  'cid')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_members')." ADD `cid` int(10) NOT NULL;");
}
if(!pdo_fieldexists('mc_card_members',  'cardsn')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_members')." ADD `cardsn` varchar(20) NOT NULL;");
}
if(!pdo_fieldexists('mc_card_members',  'status')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_members')." ADD `status` tinyint(1) NOT NULL;");
}
if(!pdo_fieldexists('mc_card_members',  'createtime')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_members')." ADD `createtime` int(10) unsigned NOT NULL;");
}
if(!pdo_fieldexists('mc_card_members',  'openid')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_members')." ADD `openid` varchar(50) NOT NULL;");
}
if(!pdo_fieldexists('mc_card_members',  'nums')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_members')." ADD `nums` int(10) unsigned NOT NULL;");
}
if(!pdo_fieldexists('mc_card_members',  'endtime')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_members')." ADD `endtime` int(10) unsigned NOT NULL;");
}
if(!pdo_fieldexists('mc_card_notices',  'id')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_notices')." ADD `id` int(10) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('mc_card_notices',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_notices')." ADD `uniacid` int(10) unsigned NOT NULL;");
}
if(!pdo_fieldexists('mc_card_notices',  'uid')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_notices')." ADD `uid` int(10) unsigned NOT NULL;");
}
if(!pdo_fieldexists('mc_card_notices',  'type')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_notices')." ADD `type` tinyint(3) unsigned NOT NULL;");
}
if(!pdo_fieldexists('mc_card_notices',  'title')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_notices')." ADD `title` varchar(30) NOT NULL;");
}
if(!pdo_fieldexists('mc_card_notices',  'thumb')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_notices')." ADD `thumb` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('mc_card_notices',  'groupid')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_notices')." ADD `groupid` int(10) unsigned NOT NULL;");
}
if(!pdo_fieldexists('mc_card_notices',  'content')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_notices')." ADD `content` text NOT NULL;");
}
if(!pdo_fieldexists('mc_card_notices',  'addtime')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_notices')." ADD `addtime` int(10) unsigned NOT NULL;");
}
if(!pdo_indexexists('mc_card_notices',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_notices')." ADD KEY `uniacid` (`uniacid`);");
}
if(!pdo_indexexists('mc_card_notices',  'uid')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_notices')." ADD KEY `uid` (`uid`);");
}
if(!pdo_fieldexists('mc_card_notices_unread',  'id')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_notices_unread')." ADD `id` int(10) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('mc_card_notices_unread',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_notices_unread')." ADD `uniacid` int(10) unsigned NOT NULL;");
}
if(!pdo_fieldexists('mc_card_notices_unread',  'notice_id')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_notices_unread')." ADD `notice_id` int(10) unsigned NOT NULL;");
}
if(!pdo_fieldexists('mc_card_notices_unread',  'uid')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_notices_unread')." ADD `uid` int(10) unsigned NOT NULL;");
}
if(!pdo_fieldexists('mc_card_notices_unread',  'is_new')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_notices_unread')." ADD `is_new` tinyint(3) unsigned NOT NULL;");
}
if(!pdo_fieldexists('mc_card_notices_unread',  'type')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_notices_unread')." ADD `type` tinyint(3) unsigned NOT NULL;");
}
if(!pdo_indexexists('mc_card_notices_unread',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_notices_unread')." ADD KEY `uniacid` (`uniacid`);");
}
if(!pdo_indexexists('mc_card_notices_unread',  'uid')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_notices_unread')." ADD KEY `uid` (`uid`);");
}
if(!pdo_indexexists('mc_card_notices_unread',  'notice_id')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_notices_unread')." ADD KEY `notice_id` (`notice_id`);");
}
if(!pdo_fieldexists('mc_card_recommend',  'id')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_recommend')." ADD `id` int(10) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('mc_card_recommend',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_recommend')." ADD `uniacid` int(10) unsigned NOT NULL;");
}
if(!pdo_fieldexists('mc_card_recommend',  'title')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_recommend')." ADD `title` varchar(30) NOT NULL;");
}
if(!pdo_fieldexists('mc_card_recommend',  'thumb')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_recommend')." ADD `thumb` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('mc_card_recommend',  'url')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_recommend')." ADD `url` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('mc_card_recommend',  'displayorder')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_recommend')." ADD `displayorder` tinyint(3) unsigned NOT NULL;");
}
if(!pdo_fieldexists('mc_card_recommend',  'addtime')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_recommend')." ADD `addtime` int(10) unsigned NOT NULL;");
}
if(!pdo_indexexists('mc_card_recommend',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_recommend')." ADD KEY `uniacid` (`uniacid`);");
}
if(!pdo_fieldexists('mc_card_record',  'id')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_record')." ADD `id` int(10) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('mc_card_record',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_record')." ADD `uniacid` int(10) unsigned NOT NULL;");
}
if(!pdo_fieldexists('mc_card_record',  'uid')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_record')." ADD `uid` int(10) unsigned NOT NULL;");
}
if(!pdo_fieldexists('mc_card_record',  'type')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_record')." ADD `type` varchar(15) NOT NULL;");
}
if(!pdo_fieldexists('mc_card_record',  'model')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_record')." ADD `model` tinyint(3) unsigned NOT NULL;");
}
if(!pdo_fieldexists('mc_card_record',  'fee')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_record')." ADD `fee` decimal(10,2) unsigned NOT NULL;");
}
if(!pdo_fieldexists('mc_card_record',  'tag')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_record')." ADD `tag` varchar(10) NOT NULL;");
}
if(!pdo_fieldexists('mc_card_record',  'note')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_record')." ADD `note` varchar(255) NOT NULL;");
}
if(!pdo_fieldexists('mc_card_record',  'remark')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_record')." ADD `remark` varchar(200) NOT NULL;");
}
if(!pdo_fieldexists('mc_card_record',  'addtime')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_record')." ADD `addtime` int(10) unsigned NOT NULL;");
}
if(!pdo_indexexists('mc_card_record',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_record')." ADD KEY `uniacid` (`uniacid`);");
}
if(!pdo_indexexists('mc_card_record',  'uid')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_record')." ADD KEY `uid` (`uid`);");
}
if(!pdo_indexexists('mc_card_record',  'addtime')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_record')." ADD KEY `addtime` (`addtime`);");
}
if(!pdo_fieldexists('mc_card_sign_record',  'id')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_sign_record')." ADD `id` int(10) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('mc_card_sign_record',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_sign_record')." ADD `uniacid` int(10) unsigned NOT NULL;");
}
if(!pdo_fieldexists('mc_card_sign_record',  'uid')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_sign_record')." ADD `uid` int(10) unsigned NOT NULL;");
}
if(!pdo_fieldexists('mc_card_sign_record',  'credit')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_sign_record')." ADD `credit` int(10) unsigned NOT NULL;");
}
if(!pdo_fieldexists('mc_card_sign_record',  'is_grant')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_sign_record')." ADD `is_grant` tinyint(3) unsigned NOT NULL;");
}
if(!pdo_fieldexists('mc_card_sign_record',  'addtime')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_sign_record')." ADD `addtime` int(10) unsigned NOT NULL;");
}
if(!pdo_indexexists('mc_card_sign_record',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_sign_record')." ADD KEY `uniacid` (`uniacid`);");
}
if(!pdo_indexexists('mc_card_sign_record',  'uid')) {
	pdo_query("ALTER TABLE ".tablename('mc_card_sign_record')." ADD KEY `uid` (`uid`);");
}
if(!pdo_fieldexists('paycenter_order',  'id')) {
	pdo_query("ALTER TABLE ".tablename('paycenter_order')." ADD `id` int(10) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('paycenter_order',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('paycenter_order')." ADD `uniacid` int(10) unsigned NOT NULL;");
}
if(!pdo_fieldexists('paycenter_order',  'uid')) {
	pdo_query("ALTER TABLE ".tablename('paycenter_order')." ADD `uid` int(10) unsigned NOT NULL;");
}
if(!pdo_fieldexists('paycenter_order',  'pid')) {
	pdo_query("ALTER TABLE ".tablename('paycenter_order')." ADD `pid` int(10) unsigned NOT NULL;");
}
if(!pdo_fieldexists('paycenter_order',  'clerk_id')) {
	pdo_query("ALTER TABLE ".tablename('paycenter_order')." ADD `clerk_id` int(10) unsigned NOT NULL;");
}
if(!pdo_fieldexists('paycenter_order',  'store_id')) {
	pdo_query("ALTER TABLE ".tablename('paycenter_order')." ADD `store_id` int(10) unsigned NOT NULL;");
}
if(!pdo_fieldexists('paycenter_order',  'clerk_type')) {
	pdo_query("ALTER TABLE ".tablename('paycenter_order')." ADD `clerk_type` tinyint(3) unsigned NOT NULL;");
}
if(!pdo_fieldexists('paycenter_order',  'uniontid')) {
	pdo_query("ALTER TABLE ".tablename('paycenter_order')." ADD `uniontid` varchar(40) NOT NULL;");
}
if(!pdo_fieldexists('paycenter_order',  'transaction_id')) {
	pdo_query("ALTER TABLE ".tablename('paycenter_order')." ADD `transaction_id` varchar(40) NOT NULL;");
}
if(!pdo_fieldexists('paycenter_order',  'type')) {
	pdo_query("ALTER TABLE ".tablename('paycenter_order')." ADD `type` varchar(10) NOT NULL;");
}
if(!pdo_fieldexists('paycenter_order',  'trade_type')) {
	pdo_query("ALTER TABLE ".tablename('paycenter_order')." ADD `trade_type` varchar(10) NOT NULL;");
}
if(!pdo_fieldexists('paycenter_order',  'body')) {
	pdo_query("ALTER TABLE ".tablename('paycenter_order')." ADD `body` varchar(255) NOT NULL;");
}
if(!pdo_fieldexists('paycenter_order',  'fee')) {
	pdo_query("ALTER TABLE ".tablename('paycenter_order')." ADD `fee` varchar(15) NOT NULL;");
}
if(!pdo_fieldexists('paycenter_order',  'final_fee')) {
	pdo_query("ALTER TABLE ".tablename('paycenter_order')." ADD `final_fee` decimal(10,2) unsigned NOT NULL;");
}
if(!pdo_fieldexists('paycenter_order',  'credit1')) {
	pdo_query("ALTER TABLE ".tablename('paycenter_order')." ADD `credit1` int(10) unsigned NOT NULL;");
}
if(!pdo_fieldexists('paycenter_order',  'credit1_fee')) {
	pdo_query("ALTER TABLE ".tablename('paycenter_order')." ADD `credit1_fee` decimal(10,2) unsigned NOT NULL;");
}
if(!pdo_fieldexists('paycenter_order',  'credit2')) {
	pdo_query("ALTER TABLE ".tablename('paycenter_order')." ADD `credit2` decimal(10,2) unsigned NOT NULL;");
}
if(!pdo_fieldexists('paycenter_order',  'cash')) {
	pdo_query("ALTER TABLE ".tablename('paycenter_order')." ADD `cash` decimal(10,2) unsigned NOT NULL;");
}
if(!pdo_fieldexists('paycenter_order',  'remark')) {
	pdo_query("ALTER TABLE ".tablename('paycenter_order')." ADD `remark` varchar(255) NOT NULL;");
}
if(!pdo_fieldexists('paycenter_order',  'auth_code')) {
	pdo_query("ALTER TABLE ".tablename('paycenter_order')." ADD `auth_code` varchar(30) NOT NULL;");
}
if(!pdo_fieldexists('paycenter_order',  'openid')) {
	pdo_query("ALTER TABLE ".tablename('paycenter_order')." ADD `openid` varchar(50) NOT NULL;");
}
if(!pdo_fieldexists('paycenter_order',  'nickname')) {
	pdo_query("ALTER TABLE ".tablename('paycenter_order')." ADD `nickname` varchar(50) NOT NULL;");
}
if(!pdo_fieldexists('paycenter_order',  'follow')) {
	pdo_query("ALTER TABLE ".tablename('paycenter_order')." ADD `follow` tinyint(3) unsigned NOT NULL;");
}
if(!pdo_fieldexists('paycenter_order',  'status')) {
	pdo_query("ALTER TABLE ".tablename('paycenter_order')." ADD `status` tinyint(3) unsigned NOT NULL;");
}
if(!pdo_fieldexists('paycenter_order',  'credit_status')) {
	pdo_query("ALTER TABLE ".tablename('paycenter_order')." ADD `credit_status` tinyint(3) unsigned NOT NULL;");
}
if(!pdo_fieldexists('paycenter_order',  'paytime')) {
	pdo_query("ALTER TABLE ".tablename('paycenter_order')." ADD `paytime` int(10) unsigned NOT NULL;");
}
if(!pdo_fieldexists('paycenter_order',  'createtime')) {
	pdo_query("ALTER TABLE ".tablename('paycenter_order')." ADD `createtime` int(10) unsigned NOT NULL;");
}
if(!pdo_indexexists('paycenter_order',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('paycenter_order')." ADD KEY `uniacid` (`uniacid`);");
}

?>