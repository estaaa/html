<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."article`");
$db->exe("CREATE TABLE `".$db_prefix."article`".$db_prefix." (
  `".$db_prefix."aid`".$db_prefix." int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '文章表主键id',
  `".$db_prefix."title`".$db_prefix." char(120) NOT NULL DEFAULT '' COMMENT '文章标题',
  `".$db_prefix."click`".$db_prefix." mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '点击次数',
  `".$db_prefix."sendtime`".$db_prefix." int(10) unsigned NOT NULL DEFAULT '0' COMMENT '发表时间',
  `".$db_prefix."updatetime`".$db_prefix." timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '修改时间，自动更新',
  `".$db_prefix."thumb`".$db_prefix." varchar(100) NOT NULL DEFAULT '' COMMENT '缩略图',
  `".$db_prefix."is_recycle`".$db_prefix." tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '0为没有进入的回收站，1为在回收站中',
  `".$db_prefix."digest`".$db_prefix." varchar(255) NOT NULL DEFAULT '' COMMENT '文章摘要',
  `".$db_prefix."attr`".$db_prefix." set('图文','推荐','热门','置顶') DEFAULT NULL COMMENT '文章属性',
  `".$db_prefix."author`".$db_prefix." char(15) NOT NULL DEFAULT 'admin' COMMENT '作者',
  `".$db_prefix."category_cid`".$db_prefix." smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '所属分类id',
  `".$db_prefix."user_uid`".$db_prefix." int(10) unsigned NOT NULL DEFAULT '0' COMMENT '所属用户id',
  PRIMARY KEY (`".$db_prefix."aid`".$db_prefix."),
  KEY `".$db_prefix."fk_cmd_article_cms_category_idx`".$db_prefix." (`".$db_prefix."category_cid`".$db_prefix."),
  KEY `".$db_prefix."fk_article_user1_idx`".$db_prefix." (`".$db_prefix."user_uid`".$db_prefix.")
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='文章表'");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."article_data`");
$db->exe("CREATE TABLE `".$db_prefix."article_data`".$db_prefix." (
  `".$db_prefix."keywords`".$db_prefix." varchar(125) NOT NULL DEFAULT '' COMMENT '关键字',
  `".$db_prefix."description`".$db_prefix." varchar(255) NOT NULL DEFAULT '' COMMENT '描述',
  `".$db_prefix."content`".$db_prefix." text COMMENT '文章内容',
  `".$db_prefix."article_aid`".$db_prefix." int(10) unsigned NOT NULL DEFAULT '0' COMMENT '所属文章id',
  KEY `".$db_prefix."fk_article_data_article1_idx`".$db_prefix." (`".$db_prefix."article_aid`".$db_prefix.")
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文章分离表'");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."article_tag`");
$db->exe("CREATE TABLE `".$db_prefix."article_tag`".$db_prefix." (
  `".$db_prefix."article_aid`".$db_prefix." int(10) unsigned NOT NULL DEFAULT '0' COMMENT '所属文章id',
  `".$db_prefix."tag_tid`".$db_prefix." smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '所属标签id',
  `".$db_prefix."category_cid`".$db_prefix." smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '所属分类id',
  KEY `".$db_prefix."fk_article_tag_article1_idx`".$db_prefix." (`".$db_prefix."article_aid`".$db_prefix."),
  KEY `".$db_prefix."fk_article_tag_tag1_idx`".$db_prefix." (`".$db_prefix."tag_tid`".$db_prefix."),
  KEY `".$db_prefix."fk_article_tag_category1_idx`".$db_prefix." (`".$db_prefix."category_cid`".$db_prefix.")
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文章与标签关联表'");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."category`");
$db->exe("CREATE TABLE `".$db_prefix."category`".$db_prefix." (
  `".$db_prefix."cid`".$db_prefix." smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '分类表主键id',
  `".$db_prefix."cname`".$db_prefix." char(20) NOT NULL DEFAULT '' COMMENT '分类名称',
  `".$db_prefix."pid`".$db_prefix." smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '父级id',
  `".$db_prefix."ctitle`".$db_prefix." varchar(60) NOT NULL DEFAULT '' COMMENT '分类标题',
  `".$db_prefix."cdes`".$db_prefix." varchar(255) NOT NULL DEFAULT '' COMMENT '分类描述',
  `".$db_prefix."ckeywords`".$db_prefix." varchar(120) NOT NULL DEFAULT '' COMMENT '关键字',
  `".$db_prefix."csort`".$db_prefix." smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '分类排序',
  `".$db_prefix."htmldir`".$db_prefix." varchar(50) NOT NULL DEFAULT '' COMMENT '静态目录',
  `".$db_prefix."is_listhtml`".$db_prefix." tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '列表页是否生成静态',
  `".$db_prefix."is_archtml`".$db_prefix." tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '内容页是否生成静态',
  `".$db_prefix."is_show`".$db_prefix." tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '是否显示分类,0为不显示，1为显示',
  PRIMARY KEY (`".$db_prefix."cid`".$db_prefix.")
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='分类表'");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."comment`");
$db->exe("CREATE TABLE `".$db_prefix."comment`".$db_prefix." (
  `".$db_prefix."coid`".$db_prefix." smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '评论主键id',
  `".$db_prefix."pid`".$db_prefix." smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '父级id',
  `".$db_prefix."comcon`".$db_prefix." varchar(255) NOT NULL DEFAULT '' COMMENT '评论内容',
  `".$db_prefix."addtime`".$db_prefix." int(10) unsigned NOT NULL DEFAULT '0' COMMENT '发表时间',
  `".$db_prefix."user_uid`".$db_prefix." int(10) unsigned NOT NULL DEFAULT '0' COMMENT '所属用户uid',
  `".$db_prefix."article_aid`".$db_prefix." int(10) unsigned NOT NULL DEFAULT '0' COMMENT '所属文章aid',
  PRIMARY KEY (`".$db_prefix."coid`".$db_prefix."),
  KEY `".$db_prefix."fk_comment_user1_idx`".$db_prefix." (`".$db_prefix."user_uid`".$db_prefix."),
  KEY `".$db_prefix."fk_comment_article1_idx`".$db_prefix." (`".$db_prefix."article_aid`".$db_prefix.")
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文章评论表'");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."config`");
$db->exe("CREATE TABLE `".$db_prefix."config`".$db_prefix." (
  `".$db_prefix."coid`".$db_prefix." smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `".$db_prefix."name`".$db_prefix." varchar(15) NOT NULL DEFAULT '' COMMENT '配置项名称',
  `".$db_prefix."value`".$db_prefix." varchar(70) NOT NULL DEFAULT '' COMMENT '配置值',
  `".$db_prefix."title`".$db_prefix." varchar(45) NOT NULL DEFAULT '' COMMENT '配置项标题',
  `".$db_prefix."des`".$db_prefix." varchar(255) NOT NULL DEFAULT '' COMMENT '配置项详细描述',
  `".$db_prefix."type_id`".$db_prefix." tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '配置项类型id，相同类型id相同',
  PRIMARY KEY (`".$db_prefix."coid`".$db_prefix.")
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COMMENT='站点配置'");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."flink`");
$db->exe("CREATE TABLE `".$db_prefix."flink`".$db_prefix." (
  `".$db_prefix."fid`".$db_prefix." int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '友情链接主键id',
  `".$db_prefix."fname`".$db_prefix." varchar(30) NOT NULL DEFAULT '' COMMENT '友情链接名称',
  `".$db_prefix."msg`".$db_prefix." varchar(150) NOT NULL DEFAULT '' COMMENT '友情链接描述',
  `".$db_prefix."addtime`".$db_prefix." int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  `".$db_prefix."sort`".$db_prefix." smallint(5) unsigned NOT NULL DEFAULT '100' COMMENT '排序',
  `".$db_prefix."logo`".$db_prefix." varchar(80) NOT NULL DEFAULT '' COMMENT '友情链接Logo',
  `".$db_prefix."url`".$db_prefix." varchar(75) NOT NULL DEFAULT '' COMMENT '友情链接地址',
  `".$db_prefix."is_show`".$db_prefix." tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '0为不显示，1为默认为显示',
  PRIMARY KEY (`".$db_prefix."fid`".$db_prefix.")
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='友情链接'");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."tag`");
$db->exe("CREATE TABLE `".$db_prefix."tag`".$db_prefix." (
  `".$db_prefix."tid`".$db_prefix." smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '标签主键id',
  `".$db_prefix."tagname`".$db_prefix." char(26) NOT NULL DEFAULT '' COMMENT '标签名称',
  PRIMARY KEY (`".$db_prefix."tid`".$db_prefix.")
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COMMENT='文章标签'");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."user`");
$db->exe("CREATE TABLE `".$db_prefix."user`".$db_prefix." (
  `".$db_prefix."uid`".$db_prefix." int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户表主键id',
  `".$db_prefix."username`".$db_prefix." char(20) NOT NULL DEFAULT '' COMMENT '用户名',
  `".$db_prefix."nickname`".$db_prefix." varchar(25) NOT NULL DEFAULT '' COMMENT '昵称',
  `".$db_prefix."password`".$db_prefix." char(32) NOT NULL DEFAULT '' COMMENT '密码',
  `".$db_prefix."is_admin`".$db_prefix." tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '0为普通用户，1为后台用户',
  `".$db_prefix."is_lock`".$db_prefix." tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否锁定，0为没有锁定，1为锁定',
  `".$db_prefix."supper`".$db_prefix." tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '超级管理员，不能被锁定，不能被删除,1为超级管理员，0为普通',
  PRIMARY KEY (`".$db_prefix."uid`".$db_prefix."),
  UNIQUE KEY `".$db_prefix."username_UNIQUE`".$db_prefix." (`".$db_prefix."username`".$db_prefix.")
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='用户表'");
