<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."flink (`fid`,`fname`,`msg`,`addtime`,`sort`,`logo`,`url`,`is_show`)
						VALUES('1','百度','百度','1433854086','1','Upload/57301433854086_thumb.jpg','http://baidu.com','1')");
$db->exe("REPLACE INTO ".$db_prefix."flink (`fid`,`fname`,`msg`,`addtime`,`sort`,`logo`,`url`,`is_show`)
						VALUES('2','QQ','QQ','1433854121','2','Upload/59641433854121_thumb.jpg','http://qq.com','1')");
