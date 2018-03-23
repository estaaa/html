<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."type (`title`,`tid`)
						VALUES('手机','1')");
$db->exe("REPLACE INTO ".$db_prefix."type (`title`,`tid`)
						VALUES('智能家居','3')");
$db->exe("REPLACE INTO ".$db_prefix."type (`title`,`tid`)
						VALUES('配件','4')");
$db->exe("REPLACE INTO ".$db_prefix."type (`title`,`tid`)
						VALUES('平板','5')");
