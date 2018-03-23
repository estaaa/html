<?php if(!defined('HDPHP_PATH'))exit;
return array (
  'attid' => 
  array (
    'field' => 'attid',
    'type' => 'int(10) unsigned',
    'null' => 'NO',
    'key' => true,
    'default' => NULL,
    'extra' => 'auto_increment',
  ),
  'avalue' => 
  array (
    'field' => 'avalue',
    'type' => 'varchar(200)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
  'pro_id' => 
  array (
    'field' => 'pro_id',
    'type' => 'int(10) unsigned',
    'null' => 'NO',
    'key' => false,
    'default' => '0',
    'extra' => '',
  ),
  'sid' => 
  array (
    'field' => 'sid',
    'type' => 'smallint(5) unsigned',
    'null' => 'NO',
    'key' => false,
    'default' => '0',
    'extra' => '',
  ),
  'added' => 
  array (
    'field' => 'added',
    'type' => 'decimal(10,0)',
    'null' => 'NO',
    'key' => false,
    'default' => '0',
    'extra' => '',
  ),
);
?>