<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."brand (`bid`,`title`,`logo`,`sort`)
						VALUES('1','华为','','1')");
$db->exe("REPLACE INTO ".$db_prefix."brand (`bid`,`title`,`logo`,`sort`)
						VALUES('2','荣耀','','0')");
