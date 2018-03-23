<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."protected (`nickname`,`did`,`truename`,`iphoto`,`emli`,`birthday`,`city`,`user_uid`,`thumb`,`max`)
						VALUES('小夜','1','','4294967295','estaaa@163.com','1990.02.02','河南','1','./Upload/28531436805085.jpg','保密')");
$db->exe("REPLACE INTO ".$db_prefix."protected (`nickname`,`did`,`truename`,`iphoto`,`emli`,`birthday`,`city`,`user_uid`,`thumb`,`max`)
						VALUES('34546','2','','4294967295','','','','2','/Upload/88511437796883.jpg','保密')");
$db->exe("REPLACE INTO ".$db_prefix."protected (`nickname`,`did`,`truename`,`iphoto`,`emli`,`birthday`,`city`,`user_uid`,`thumb`,`max`)
						VALUES('','3','','0','','','','3','./Upload/9381436882767.jpg','保密')");
$db->exe("REPLACE INTO ".$db_prefix."protected (`nickname`,`did`,`truename`,`iphoto`,`emli`,`birthday`,`city`,`user_uid`,`thumb`,`max`)
						VALUES('','4','','0','','','','4','./Upload/75221436942896.jpg','保密')");
