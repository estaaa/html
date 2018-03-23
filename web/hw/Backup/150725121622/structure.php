<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."add_address`");
$db->exe("CREATE TABLE `".$db_prefix."add_address`".$db_prefix." (
  `".$db_prefix."add_id`".$db_prefix." int(10) unsigned NOT NULL AUTO_INCREMENT,
  `".$db_prefix."add_people`".$db_prefix." char(100) NOT NULL DEFAULT '' COMMENT '收货人',
  `".$db_prefix."shop_city`".$db_prefix." varchar(200) NOT NULL DEFAULT '' COMMENT '收货地址',
  `".$db_prefix."address`".$db_prefix." varchar(200) NOT NULL DEFAULT '' COMMENT '收货地址',
  `".$db_prefix."postcode`".$db_prefix." int(10) unsigned NOT NULL DEFAULT '0' COMMENT '邮编',
  `".$db_prefix."add_iphoto`".$db_prefix." varchar(100) NOT NULL DEFAULT '0' COMMENT '收货电话',
  `".$db_prefix."user_uid`".$db_prefix." int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户id',
  `".$db_prefix."pic_all`".$db_prefix." varchar(100) NOT NULL DEFAULT '0' COMMENT '座机电话',
  `".$db_prefix."is_add`".$db_prefix." tinyint(4) NOT NULL DEFAULT '0' COMMENT '0为不默认1为默认',
  PRIMARY KEY (`".$db_prefix."add_id`".$db_prefix."),
  UNIQUE KEY `".$db_prefix."add_id_UNIQUE`".$db_prefix." (`".$db_prefix."add_id`".$db_prefix."),
  KEY `".$db_prefix."fk_add_address_user1_idx`".$db_prefix." (`".$db_prefix."user_uid`".$db_prefix.")
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='收货地址表'");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."add_info`");
$db->exe("CREATE TABLE `".$db_prefix."add_info`".$db_prefix." (
  `".$db_prefix."infoid`".$db_prefix." int(10) unsigned NOT NULL AUTO_INCREMENT,
  `".$db_prefix."add_people`".$db_prefix." varchar(100) NOT NULL DEFAULT '' COMMENT '收货人',
  `".$db_prefix."shop_city`".$db_prefix." char(100) NOT NULL DEFAULT '' COMMENT '收货城市',
  `".$db_prefix."address`".$db_prefix." varchar(200) NOT NULL DEFAULT '' COMMENT '详细地址',
  `".$db_prefix."postcode`".$db_prefix." int(11) NOT NULL DEFAULT '0' COMMENT '邮编',
  `".$db_prefix."add_iphoto`".$db_prefix." varchar(100) NOT NULL DEFAULT '' COMMENT '电话',
  `".$db_prefix."buy_time`".$db_prefix." int(11) NOT NULL DEFAULT '0' COMMENT '购买时间',
  `".$db_prefix."user_uid`".$db_prefix." int(11) NOT NULL DEFAULT '0',
  `".$db_prefix."pic_all`".$db_prefix." decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '总价',
  `".$db_prefix."is_buy`".$db_prefix." smallint(6) NOT NULL DEFAULT '0' COMMENT '0为没有支付1为待评价2为已评价3为退货4待收货5取消订单',
  `".$db_prefix."info_code`".$db_prefix." char(20) DEFAULT '' COMMENT '订单号',
  PRIMARY KEY (`".$db_prefix."infoid`".$db_prefix."),
  UNIQUE KEY `".$db_prefix."infoid_UNIQUE`".$db_prefix." (`".$db_prefix."infoid`".$db_prefix."),
  KEY `".$db_prefix."fk_add_info_user1_idx`".$db_prefix." (`".$db_prefix."user_uid`".$db_prefix.")
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='收货地址'");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."appraise`");
$db->exe("CREATE TABLE `".$db_prefix."appraise`".$db_prefix." (
  `".$db_prefix."app_id`".$db_prefix." int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '评论id',
  `".$db_prefix."app_content`".$db_prefix." varchar(200) NOT NULL DEFAULT '' COMMENT '评论内容',
  `".$db_prefix."good_rep`".$db_prefix." tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '0代表好评1差评2好评',
  `".$db_prefix."publish_time`".$db_prefix." int(10) unsigned NOT NULL DEFAULT '0' COMMENT '发表时间',
  `".$db_prefix."uid`".$db_prefix." int(10) unsigned NOT NULL DEFAULT '0',
  `".$db_prefix."pro_id`".$db_prefix." int(10) unsigned NOT NULL,
  PRIMARY KEY (`".$db_prefix."app_id`".$db_prefix."),
  UNIQUE KEY `".$db_prefix."app_id_UNIQUE`".$db_prefix." (`".$db_prefix."app_id`".$db_prefix."),
  KEY `".$db_prefix."fk_appraise_product_cont1_idx`".$db_prefix." (`".$db_prefix."pro_id`".$db_prefix.")
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='评价表'");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."attribute`");
$db->exe("CREATE TABLE `".$db_prefix."attribute`".$db_prefix." (
  `".$db_prefix."attid`".$db_prefix." int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品属性id',
  `".$db_prefix."avalue`".$db_prefix." varchar(200) NOT NULL DEFAULT '' COMMENT '属性值',
  `".$db_prefix."pro_id`".$db_prefix." int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商品id',
  `".$db_prefix."sid`".$db_prefix." smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '所属属性ID',
  `".$db_prefix."added`".$db_prefix." decimal(10,0) NOT NULL DEFAULT '0' COMMENT '附加价格',
  PRIMARY KEY (`".$db_prefix."attid`".$db_prefix."),
  UNIQUE KEY `".$db_prefix."attid_UNIQUE`".$db_prefix." (`".$db_prefix."attid`".$db_prefix."),
  KEY `".$db_prefix."fk_Attribute_product1_idx`".$db_prefix." (`".$db_prefix."pro_id`".$db_prefix."),
  KEY `".$db_prefix."fk_Attribute_type_son1_idx`".$db_prefix." (`".$db_prefix."sid`".$db_prefix.")
) ENGINE=MyISAM AUTO_INCREMENT=448 DEFAULT CHARSET=utf8 COMMENT='商品属性'");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."brand`");
$db->exe("CREATE TABLE `".$db_prefix."brand`".$db_prefix." (
  `".$db_prefix."bid`".$db_prefix." smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '品牌id',
  `".$db_prefix."title`".$db_prefix." varchar(100) NOT NULL DEFAULT '' COMMENT '标题',
  `".$db_prefix."logo`".$db_prefix." varchar(100) NOT NULL DEFAULT '' COMMENT 'logo地址',
  `".$db_prefix."sort`".$db_prefix." smallint(6) NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`".$db_prefix."bid`".$db_prefix."),
  UNIQUE KEY `".$db_prefix."bid_UNIQUE`".$db_prefix." (`".$db_prefix."bid`".$db_prefix.")
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='品牌表'");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."buy_con`");
$db->exe("CREATE TABLE `".$db_prefix."buy_con`".$db_prefix." (
  `".$db_prefix."bid`".$db_prefix." int(10) unsigned NOT NULL,
  `".$db_prefix."pro_id`".$db_prefix." int(10) unsigned NOT NULL,
  `".$db_prefix."buyid`".$db_prefix." int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`".$db_prefix."buyid`".$db_prefix."),
  KEY `".$db_prefix."fk_buy_con_buyinfo1_idx`".$db_prefix." (`".$db_prefix."bid`".$db_prefix."),
  KEY `".$db_prefix."fk_buy_con_product1_idx`".$db_prefix." (`".$db_prefix."pro_id`".$db_prefix.")
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='购买信息和产品中间表'");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."buyinfo`");
$db->exe("CREATE TABLE `".$db_prefix."buyinfo`".$db_prefix." (
  `".$db_prefix."bid`".$db_prefix." smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `".$db_prefix."user_uid`".$db_prefix." int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户id',
  `".$db_prefix."pro_id`".$db_prefix." int(10) unsigned NOT NULL DEFAULT '0' COMMENT '产品id',
  `".$db_prefix."buy_num`".$db_prefix." tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '购买数量',
  `".$db_prefix."pic`".$db_prefix." int(10) unsigned NOT NULL DEFAULT '0' COMMENT '价格',
  `".$db_prefix."remark`".$db_prefix." varchar(200) NOT NULL DEFAULT '' COMMENT '备注说明',
  `".$db_prefix."add_id`".$db_prefix." int(10) unsigned NOT NULL DEFAULT '0' COMMENT '收货地址id',
  `".$db_prefix."infoid`".$db_prefix." int(10) unsigned NOT NULL DEFAULT '0',
  `".$db_prefix."img`".$db_prefix." varchar(200) DEFAULT '' COMMENT '产品图片',
  PRIMARY KEY (`".$db_prefix."bid`".$db_prefix."),
  UNIQUE KEY `".$db_prefix."bid_UNIQUE`".$db_prefix." (`".$db_prefix."bid`".$db_prefix."),
  KEY `".$db_prefix."fk_buyinfo_user1_idx`".$db_prefix." (`".$db_prefix."user_uid`".$db_prefix."),
  KEY `".$db_prefix."fk_buyinfo_product1_idx`".$db_prefix." (`".$db_prefix."pro_id`".$db_prefix."),
  KEY `".$db_prefix."fk_buyinfo_add_address1_idx`".$db_prefix." (`".$db_prefix."add_id`".$db_prefix."),
  KEY `".$db_prefix."fk_buyinfo_add_info1_idx`".$db_prefix." (`".$db_prefix."infoid`".$db_prefix.")
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='购物车信息表'");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."carousel`");
$db->exe("CREATE TABLE `".$db_prefix."carousel`".$db_prefix." (
  `".$db_prefix."car_id`".$db_prefix." smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `".$db_prefix."img`".$db_prefix." varchar(200) NOT NULL DEFAULT '' COMMENT '图片地址',
  `".$db_prefix."url`".$db_prefix." varchar(200) NOT NULL DEFAULT '' COMMENT '图片链接',
  `".$db_prefix."isimg`".$db_prefix." smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '0代表大轮播图1代表小轮播图2代表中图',
  PRIMARY KEY (`".$db_prefix."car_id`".$db_prefix.")
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COMMENT='轮播'");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."category`");
$db->exe("CREATE TABLE `".$db_prefix."category`".$db_prefix." (
  `".$db_prefix."cid`".$db_prefix." smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '分类id',
  `".$db_prefix."ctitle`".$db_prefix." char(50) NOT NULL DEFAULT '' COMMENT '分类名称',
  `".$db_prefix."cdes`".$db_prefix." char(70) NOT NULL DEFAULT '' COMMENT '分类描述',
  `".$db_prefix."ckeywords`".$db_prefix." char(70) NOT NULL DEFAULT '' COMMENT '关键字',
  `".$db_prefix."is_show`".$db_prefix." tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否显示分类,0为不显示，1为显示',
  `".$db_prefix."pid`".$db_prefix." smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '父级id',
  `".$db_prefix."type_tid`".$db_prefix." smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '属性id',
  PRIMARY KEY (`".$db_prefix."cid`".$db_prefix."),
  UNIQUE KEY `".$db_prefix."cid_UNIQUE`".$db_prefix." (`".$db_prefix."cid`".$db_prefix."),
  KEY `".$db_prefix."fk_category_type1_idx`".$db_prefix." (`".$db_prefix."type_tid`".$db_prefix.")
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COMMENT='分类表'");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."combo`");
$db->exe("CREATE TABLE `".$db_prefix."combo`".$db_prefix." (
  `".$db_prefix."sid`".$db_prefix." int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '套餐id',
  `".$db_prefix."com_title`".$db_prefix." varchar(100) NOT NULL DEFAULT '0' COMMENT '套餐名字',
  PRIMARY KEY (`".$db_prefix."sid`".$db_prefix."),
  UNIQUE KEY `".$db_prefix."sid_UNIQUE`".$db_prefix." (`".$db_prefix."sid`".$db_prefix.")
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='套餐'");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."cpcon`");
$db->exe("CREATE TABLE `".$db_prefix."cpcon`".$db_prefix." (
  `".$db_prefix."cpid`".$db_prefix." int(10) unsigned NOT NULL AUTO_INCREMENT,
  `".$db_prefix."sid`".$db_prefix." int(10) unsigned NOT NULL DEFAULT '0',
  `".$db_prefix."pro_id`".$db_prefix." int(10) unsigned NOT NULL,
  PRIMARY KEY (`".$db_prefix."cpid`".$db_prefix."),
  UNIQUE KEY `".$db_prefix."cpid_UNIQUE`".$db_prefix." (`".$db_prefix."cpid`".$db_prefix."),
  KEY `".$db_prefix."fk_combo_has_productcont_combo1_idx`".$db_prefix." (`".$db_prefix."sid`".$db_prefix."),
  KEY `".$db_prefix."fk_cpcon_product_cont1_idx`".$db_prefix." (`".$db_prefix."pro_id`".$db_prefix.")
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='产品套餐中间表'");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."flink`");
$db->exe("CREATE TABLE `".$db_prefix."flink`".$db_prefix." (
  `".$db_prefix."fid`".$db_prefix." smallint(6) NOT NULL AUTO_INCREMENT,
  `".$db_prefix."ftitle`".$db_prefix." varchar(100) NOT NULL DEFAULT '' COMMENT '链接名字',
  `".$db_prefix."link`".$db_prefix." varchar(200) NOT NULL DEFAULT '' COMMENT '链接',
  PRIMARY KEY (`".$db_prefix."fid`".$db_prefix."),
  UNIQUE KEY `".$db_prefix."fid_UNIQUE`".$db_prefix." (`".$db_prefix."fid`".$db_prefix.")
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COMMENT='友情链接'");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."product`");
$db->exe("CREATE TABLE `".$db_prefix."product`".$db_prefix." (
  `".$db_prefix."pro_id`".$db_prefix." int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '产品id',
  `".$db_prefix."cid`".$db_prefix." smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '分类id',
  `".$db_prefix."p_title`".$db_prefix." varchar(300) NOT NULL DEFAULT '' COMMENT '产品标题',
  `".$db_prefix."p_cost`".$db_prefix." decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '价格',
  `".$db_prefix."p_code`".$db_prefix." int(10) unsigned NOT NULL DEFAULT '0' COMMENT '产品编码',
  `".$db_prefix."carriage`".$db_prefix." decimal(10,0) unsigned NOT NULL DEFAULT '0' COMMENT '运费',
  `".$db_prefix."buy_num`".$db_prefix." tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '已售出',
  `".$db_prefix."surplus`".$db_prefix." smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '库存',
  `".$db_prefix."brand_bid`".$db_prefix." tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '品牌id',
  `".$db_prefix."market_price`".$db_prefix." decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '商场价',
  `".$db_prefix."list_img`".$db_prefix." varchar(400) NOT NULL DEFAULT '' COMMENT '列表图片',
  `".$db_prefix."type_tid`".$db_prefix." smallint(6) NOT NULL COMMENT '类型id',
  `".$db_prefix."adminid`".$db_prefix." smallint(6) NOT NULL DEFAULT '0' COMMENT '后台管理员id',
  `".$db_prefix."add_time`".$db_prefix." int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `".$db_prefix."edit_time`".$db_prefix." int(11) NOT NULL DEFAULT '0' COMMENT '修改时间',
  `".$db_prefix."activity`".$db_prefix." varchar(150) NOT NULL DEFAULT '' COMMENT '促销消息',
  `".$db_prefix."pro_des`".$db_prefix." varchar(200) NOT NULL DEFAULT '' COMMENT '商品描述',
  `".$db_prefix."give`".$db_prefix." varchar(300) NOT NULL DEFAULT '' COMMENT '赠送',
  `".$db_prefix."is_sustain`".$db_prefix." smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '0不推荐1推荐',
  `".$db_prefix."app_num`".$db_prefix." int(10) unsigned NOT NULL DEFAULT '0' COMMENT '评价数',
  PRIMARY KEY (`".$db_prefix."pro_id`".$db_prefix."),
  UNIQUE KEY `".$db_prefix."pid_UNIQUE`".$db_prefix." (`".$db_prefix."pro_id`".$db_prefix."),
  KEY `".$db_prefix."fk_product_category_idx`".$db_prefix." (`".$db_prefix."cid`".$db_prefix."),
  KEY `".$db_prefix."fk_product_brand1_idx`".$db_prefix." (`".$db_prefix."brand_bid`".$db_prefix."),
  KEY `".$db_prefix."fk_product_type1_idx`".$db_prefix." (`".$db_prefix."type_tid`".$db_prefix.")
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8 COMMENT='产品表'");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."product_cont`");
$db->exe("CREATE TABLE `".$db_prefix."product_cont`".$db_prefix." (
  `".$db_prefix."conid`".$db_prefix." int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '产品id',
  `".$db_prefix."pro_content`".$db_prefix." text NOT NULL COMMENT '产品介绍',
  `".$db_prefix."pack_list`".$db_prefix." varchar(500) NOT NULL DEFAULT '' COMMENT '包装清单',
  `".$db_prefix."after_sale`".$db_prefix." varchar(500) NOT NULL DEFAULT '' COMMENT '售后服务',
  `".$db_prefix."smallimg`".$db_prefix." varchar(300) NOT NULL DEFAULT '' COMMENT '小图',
  `".$db_prefix."big`".$db_prefix." varchar(300) NOT NULL DEFAULT '' COMMENT '大图',
  `".$db_prefix."medium`".$db_prefix." varchar(300) NOT NULL DEFAULT '' COMMENT '中图',
  `".$db_prefix."pro_id`".$db_prefix." int(10) unsigned NOT NULL,
  PRIMARY KEY (`".$db_prefix."conid`".$db_prefix."),
  UNIQUE KEY `".$db_prefix."product_pid_UNIQUE`".$db_prefix." (`".$db_prefix."conid`".$db_prefix."),
  KEY `".$db_prefix."fk_product_cont_product1_idx`".$db_prefix." (`".$db_prefix."pro_id`".$db_prefix.")
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8 COMMENT='产品内容表'");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."prolist`");
$db->exe("CREATE TABLE `".$db_prefix."prolist`".$db_prefix." (
  `".$db_prefix."listid`".$db_prefix." smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `".$db_prefix."pro_id`".$db_prefix." int(10) unsigned NOT NULL DEFAULT '0' COMMENT '产品id',
  `".$db_prefix."attrand`".$db_prefix." varchar(100) NOT NULL DEFAULT '' COMMENT '属性组合id',
  `".$db_prefix."styleid`".$db_prefix." int(10) unsigned NOT NULL DEFAULT '0' COMMENT '货号',
  `".$db_prefix."stock`".$db_prefix." smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '货存',
  PRIMARY KEY (`".$db_prefix."listid`".$db_prefix."),
  UNIQUE KEY `".$db_prefix."listid_UNIQUE`".$db_prefix." (`".$db_prefix."listid`".$db_prefix."),
  KEY `".$db_prefix."fk_prolist_product1_idx`".$db_prefix." (`".$db_prefix."pro_id`".$db_prefix.")
) ENGINE=MyISAM AUTO_INCREMENT=113 DEFAULT CHARSET=utf8 COMMENT='货品列表'");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."protected`");
$db->exe("CREATE TABLE `".$db_prefix."protected`".$db_prefix." (
  `".$db_prefix."nickname`".$db_prefix." varchar(100) NOT NULL DEFAULT '' COMMENT '用户昵称',
  `".$db_prefix."did`".$db_prefix." int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '个人信息id',
  `".$db_prefix."truename`".$db_prefix." varchar(100) NOT NULL DEFAULT '' COMMENT '真实名字',
  `".$db_prefix."iphoto`".$db_prefix." int(10) unsigned NOT NULL DEFAULT '0' COMMENT '手机号码',
  `".$db_prefix."emli`".$db_prefix." varchar(100) NOT NULL DEFAULT '' COMMENT '邮箱',
  `".$db_prefix."birthday`".$db_prefix." varchar(100) NOT NULL DEFAULT '' COMMENT '生日',
  `".$db_prefix."city`".$db_prefix." varchar(100) NOT NULL DEFAULT '' COMMENT '地址',
  `".$db_prefix."user_uid`".$db_prefix." int(10) unsigned NOT NULL,
  `".$db_prefix."thumb`".$db_prefix." varchar(100) NOT NULL DEFAULT '' COMMENT '缩略图',
  `".$db_prefix."max`".$db_prefix." enum('男','女','保密') NOT NULL DEFAULT '保密' COMMENT '0男1女3保密',
  PRIMARY KEY (`".$db_prefix."did`".$db_prefix."),
  UNIQUE KEY `".$db_prefix."did_UNIQUE`".$db_prefix." (`".$db_prefix."did`".$db_prefix."),
  UNIQUE KEY `".$db_prefix."user_uid_UNIQUE`".$db_prefix." (`".$db_prefix."user_uid`".$db_prefix."),
  KEY `".$db_prefix."fk_protected_user1_idx`".$db_prefix." (`".$db_prefix."user_uid`".$db_prefix.")
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='个人信息'");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."type`");
$db->exe("CREATE TABLE `".$db_prefix."type`".$db_prefix." (
  `".$db_prefix."title`".$db_prefix." char(60) NOT NULL DEFAULT '' COMMENT '类型标题',
  `".$db_prefix."tid`".$db_prefix." smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '类型id',
  PRIMARY KEY (`".$db_prefix."tid`".$db_prefix."),
  UNIQUE KEY `".$db_prefix."tid_UNIQUE`".$db_prefix." (`".$db_prefix."tid`".$db_prefix.")
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='类型表'");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."type_son`");
$db->exe("CREATE TABLE `".$db_prefix."type_son`".$db_prefix." (
  `".$db_prefix."sid`".$db_prefix." smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '子分类id',
  `".$db_prefix."stitle`".$db_prefix." char(45) NOT NULL DEFAULT '',
  `".$db_prefix."is_edit`".$db_prefix." tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '0不可修改1可以修改',
  `".$db_prefix."content`".$db_prefix." varchar(300) NOT NULL DEFAULT '0' COMMENT '属性值',
  `".$db_prefix."tid`".$db_prefix." smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '父级属性id',
  PRIMARY KEY (`".$db_prefix."sid`".$db_prefix."),
  UNIQUE KEY `".$db_prefix."sid_UNIQUE`".$db_prefix." (`".$db_prefix."sid`".$db_prefix."),
  KEY `".$db_prefix."fk_type_son_type1_idx`".$db_prefix." (`".$db_prefix."tid`".$db_prefix.")
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COMMENT='类型属性表'");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."user`");
$db->exe("CREATE TABLE `".$db_prefix."user`".$db_prefix." (
  `".$db_prefix."uid`".$db_prefix." int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `".$db_prefix."username`".$db_prefix." varchar(100) NOT NULL DEFAULT '' COMMENT '用户名字',
  `".$db_prefix."password`".$db_prefix." varchar(32) NOT NULL DEFAULT '' COMMENT '密码',
  `".$db_prefix."addtime`".$db_prefix." int(10) unsigned NOT NULL DEFAULT '0' COMMENT '注册时间',
  `".$db_prefix."logtime`".$db_prefix." int(10) unsigned NOT NULL DEFAULT '0' COMMENT '登陆时间',
  `".$db_prefix."review`".$db_prefix." int(10) unsigned NOT NULL DEFAULT '0' COMMENT '评论数',
  `".$db_prefix."is_lock`".$db_prefix." tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是1否0被锁定',
  `".$db_prefix."is_admin`".$db_prefix." int(10) unsigned NOT NULL DEFAULT '0' COMMENT '1管理员0普通用户',
  `".$db_prefix."buynum`".$db_prefix." tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '购买数量',
  `".$db_prefix."suffer`".$db_prefix." smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '经验',
  `".$db_prefix."money`".$db_prefix." decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '钱',
  PRIMARY KEY (`".$db_prefix."uid`".$db_prefix."),
  UNIQUE KEY `".$db_prefix."uid_UNIQUE`".$db_prefix." (`".$db_prefix."uid`".$db_prefix."),
  UNIQUE KEY `".$db_prefix."username_UNIQUE`".$db_prefix." (`".$db_prefix."username`".$db_prefix.")
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='用户表'");
