<?php if(!defined('HDPHP_PATH'))exit;
return array (
  'sid' => 
  array (
    'field' => 'sid',
    'type' => 'smallint(5) unsigned',
    'null' => 'NO',
    'key' => true,
    'default' => NULL,
    'extra' => 'auto_increment',
  ),
  'stitle' => 
  array (
    'field' => 'stitle',
    'type' => 'char(45)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
  'is_edit' => 
  array (
    'field' => 'is_edit',
    'type' => 'tinyint(3) unsigned',
    'null' => 'NO',
    'key' => false,
    'default' => '0',
    'extra' => '',
  ),
  'content' => 
  array (
    'field' => 'content',
    'type' => 'varchar(300)',
    'null' => 'NO',
    'key' => false,
    'default' => '0',
    'extra' => '',
  ),
  'tid' => 
  array (
    'field' => 'tid',
    'type' => 'smallint(5) unsigned',
    'null' => 'NO',
    'key' => false,
    'default' => '0',
    'extra' => '',
  ),
);
?>