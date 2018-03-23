<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."user (`uid`,`username`,`nickname`,`password`,`is_admin`,`is_lock`,`supper`)
						VALUES(1,'admin','','21232f297a57a5a743894a0e4a801fc3',1,0,0)");
$db->exe("REPLACE INTO ".$db_prefix."user (`uid`,`username`,`nickname`,`password`,`is_admin`,`is_lock`,`supper`)
						VALUES(2,'admin1','','21232f297a57a5a743894a0e4a801fc3',1,0,0)");
$db->exe("REPLACE INTO ".$db_prefix."user (`uid`,`username`,`nickname`,`password`,`is_admin`,`is_lock`,`supper`)
						VALUES(3,'','password1','',0,0,0)");
$db->exe("REPLACE INTO ".$db_prefix."user (`uid`,`username`,`nickname`,`password`,`is_admin`,`is_lock`,`supper`)
						VALUES(4,'password','','5f4dcc3b5aa765d61d8327deb882cf99',0,0,0)");
$db->exe("REPLACE INTO ".$db_prefix."user (`uid`,`username`,`nickname`,`password`,`is_admin`,`is_lock`,`supper`)
						VALUES(5,'nickname','nickname','e80674170aae03909a55625e9cc9cf97',0,0,0)");
