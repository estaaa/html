<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."config (`coid`,`name`,`value`,`title`,`des`,`type_id`)
						VALUES('1','WEBNAME','后盾cms教学cccc','网站名称','网站名称','1')");
$db->exe("REPLACE INTO ".$db_prefix."config (`coid`,`name`,`value`,`title`,`des`,`type_id`)
						VALUES('2','ADMINEMAIL','admin@admin.com','站长邮箱','站长邮箱','1')");
$db->exe("REPLACE INTO ".$db_prefix."config (`coid`,`name`,`value`,`title`,`des`,`type_id`)
						VALUES('3','copy','教学demo','版权信息','网站版权信息','1')");
$db->exe("REPLACE INTO ".$db_prefix."config (`coid`,`name`,`value`,`title`,`des`,`type_id`)
						VALUES('4','CODE_WIDTH','150','验证码宽度','验证码宽度','2')");
$db->exe("REPLACE INTO ".$db_prefix."config (`coid`,`name`,`value`,`title`,`des`,`type_id`)
						VALUES('5','CODE_HEIGHT','35','验证码高度','验证码高度','2')");
$db->exe("REPLACE INTO ".$db_prefix."config (`coid`,`name`,`value`,`title`,`des`,`type_id`)
						VALUES('6','CODE_LEN','1','验证码长度','验证码长度','2')");
$db->exe("REPLACE INTO ".$db_prefix."config (`coid`,`name`,`value`,`title`,`des`,`type_id`)
						VALUES('7','CODE_FONT_SIZE','22','验证码字体大小','验证码字体大小','2')");
$db->exe("REPLACE INTO ".$db_prefix."config (`coid`,`name`,`value`,`title`,`des`,`type_id`)
						VALUES('8','CODE_FONT_COLOR','#000','验证码背景','验证码背景','2')");
$db->exe("REPLACE INTO ".$db_prefix."config (`coid`,`name`,`value`,`title`,`des`,`type_id`)
						VALUES('9','WATER_ON','0','水印开关','水印开关','3')");
$db->exe("REPLACE INTO ".$db_prefix."config (`coid`,`name`,`value`,`title`,`des`,`type_id`)
						VALUES('10','WATER_FONT','F:/wamp/www/lecture/yuan3/cms/hdphp/hdphp/Data/Font/font.ttf','水印字体','水印字体','3')");
$db->exe("REPLACE INTO ".$db_prefix."config (`coid`,`name`,`value`,`title`,`des`,`type_id`)
						VALUES('11','WATER_IMG','F:/wamp/www/lecture/cms/hdphp/hdphp/Data/Image/water.png ','水印图像','水印图像','3')");
$db->exe("REPLACE INTO ".$db_prefix."config (`coid`,`name`,`value`,`title`,`des`,`type_id`)
						VALUES('12','WATER_POS','9','水印位置','水印位置','3')");
$db->exe("REPLACE INTO ".$db_prefix."config (`coid`,`name`,`value`,`title`,`des`,`type_id`)
						VALUES('13','WATER_PCT','60','水印透明度','水印透明度','3')");
$db->exe("REPLACE INTO ".$db_prefix."config (`coid`,`name`,`value`,`title`,`des`,`type_id`)
						VALUES('14','WATER_QUALITY','80','水印压缩质量','水印压缩质量','3')");
$db->exe("REPLACE INTO ".$db_prefix."config (`coid`,`name`,`value`,`title`,`des`,`type_id`)
						VALUES('15','WATER_TEXT','WWW.HOUDUNWANG.COM','水印文字','水印文字','3')");
$db->exe("REPLACE INTO ".$db_prefix."config (`coid`,`name`,`value`,`title`,`des`,`type_id`)
						VALUES('16','WATER_TEXT_COLO','#f00f00','水印文字颜色','水印文字颜色','3')");
$db->exe("REPLACE INTO ".$db_prefix."config (`coid`,`name`,`value`,`title`,`des`,`type_id`)
						VALUES('17','WATER_TEXT_SIZE','12','水印文字大小','水印文字大小','3')");
$db->exe("REPLACE INTO ".$db_prefix."config (`coid`,`name`,`value`,`title`,`des`,`type_id`)
						VALUES('20','THUMB_TYPE','6','生成缩略图方式','生成缩略图方式','4')");
$db->exe("REPLACE INTO ".$db_prefix."config (`coid`,`name`,`value`,`title`,`des`,`type_id`)
						VALUES('21','THUMB_SIZE','300,300,100,100','缩略图尺寸','缩略图尺寸','4')");
$db->exe("REPLACE INTO ".$db_prefix."config (`coid`,`name`,`value`,`title`,`des`,`type_id`)
						VALUES('22','THUMB_PATH','./upload/thumb','缩略图路径','缩略图路径','4')");
$db->exe("REPLACE INTO ".$db_prefix."config (`coid`,`name`,`value`,`title`,`des`,`type_id`)
						VALUES('23','INDEX_TPL_STYLE','default','模板风格','指定前台模板风格目录','1')");
$db->exe("REPLACE INTO ".$db_prefix."config (`coid`,`name`,`value`,`title`,`des`,`type_id`)
						VALUES('24','CODE_BG_COLOR','#FFFF00','验证码背景色','验证码背景色','2')");
