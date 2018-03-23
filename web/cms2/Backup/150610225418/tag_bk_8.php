<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."tag (`tid`,`tagname`)
						VALUES(1,'娱乐')");
$db->exe("REPLACE INTO ".$db_prefix."tag (`tid`,`tagname`)
						VALUES(2,'爱我')");
$db->exe("REPLACE INTO ".$db_prefix."tag (`tid`,`tagname`)
						VALUES(3,'html')");
$db->exe("REPLACE INTO ".$db_prefix."tag (`tid`,`tagname`)
						VALUES(4,'php')");
$db->exe("REPLACE INTO ".$db_prefix."tag (`tid`,`tagname`)
						VALUES(5,'友情')");
