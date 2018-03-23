<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."user (`uid`,`username`,`nickname`,`password`,`is_admin`,`is_lock`,`supper`)
						VALUES(1,'admin','','21232f297a57a5a743894a0e4a801fc3',1,0,0)");
