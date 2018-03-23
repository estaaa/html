<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."user (`uid`,`username`,`nickname`,`password`,`is_admin`,`is_lock`,`supper`)
						VALUES(1,'admin','','21232f297a57a5a743894a0e4a801fc3',1,0,0)");
$db->exe("REPLACE INTO ".$db_prefix."user (`uid`,`username`,`nickname`,`password`,`is_admin`,`is_lock`,`supper`)
						VALUES(2,'1','admin','c4ca4238a0b923820dcc509a6f75849b',0,0,0)");
$db->exe("REPLACE INTO ".$db_prefix."user (`uid`,`username`,`nickname`,`password`,`is_admin`,`is_lock`,`supper`)
						VALUES(3,'','1','',0,0,0)");
$db->exe("REPLACE INTO ".$db_prefix."user (`uid`,`username`,`nickname`,`password`,`is_admin`,`is_lock`,`supper`)
						VALUES(4,'22','','b6d767d2f8ed5d21a44b0e5886680cb9',0,0,0)");
$db->exe("REPLACE INTO ".$db_prefix."user (`uid`,`username`,`nickname`,`password`,`is_admin`,`is_lock`,`supper`)
						VALUES(5,'33','33','182be0c5cdcd5072bb1864cdee4d3d6e',0,0,0)");
$db->exe("REPLACE INTO ".$db_prefix."user (`uid`,`username`,`nickname`,`password`,`is_admin`,`is_lock`,`supper`)
						VALUES(6,'44','44','f7177163c833dff4b38fc8d2872f1ec6',0,0,0)");
