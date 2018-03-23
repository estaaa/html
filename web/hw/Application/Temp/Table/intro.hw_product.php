<?php if(!defined('HDPHP_PATH'))exit;
return array (
  'pro_id' => 
  array (
    'field' => 'pro_id',
    'type' => 'int(10) unsigned',
    'null' => 'NO',
    'key' => true,
    'default' => NULL,
    'extra' => 'auto_increment',
  ),
  'cid' => 
  array (
    'field' => 'cid',
    'type' => 'smallint(5) unsigned',
    'null' => 'NO',
    'key' => false,
    'default' => '0',
    'extra' => '',
  ),
  'p_title' => 
  array (
    'field' => 'p_title',
    'type' => 'varchar(300)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
  'p_cost' => 
  array (
    'field' => 'p_cost',
    'type' => 'decimal(10,2) unsigned',
    'null' => 'NO',
    'key' => false,
    'default' => '0.00',
    'extra' => '',
  ),
  'p_code' => 
  array (
    'field' => 'p_code',
    'type' => 'int(10) unsigned',
    'null' => 'NO',
    'key' => false,
    'default' => '0',
    'extra' => '',
  ),
  'carriage' => 
  array (
    'field' => 'carriage',
    'type' => 'decimal(10,0) unsigned',
    'null' => 'NO',
    'key' => false,
    'default' => '0',
    'extra' => '',
  ),
  'buy_num' => 
  array (
    'field' => 'buy_num',
    'type' => 'tinyint(3) unsigned',
    'null' => 'NO',
    'key' => false,
    'default' => '0',
    'extra' => '',
  ),
  'surplus' => 
  array (
    'field' => 'surplus',
    'type' => 'smallint(5) unsigned',
    'null' => 'NO',
    'key' => false,
    'default' => '0',
    'extra' => '',
  ),
  'brand_bid' => 
  array (
    'field' => 'brand_bid',
    'type' => 'tinyint(3) unsigned',
    'null' => 'NO',
    'key' => false,
    'default' => '0',
    'extra' => '',
  ),
  'market_price' => 
  array (
    'field' => 'market_price',
    'type' => 'decimal(10,2)',
    'null' => 'NO',
    'key' => false,
    'default' => '0.00',
    'extra' => '',
  ),
  'list_img' => 
  array (
    'field' => 'list_img',
    'type' => 'varchar(400)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
  'type_tid' => 
  array (
    'field' => 'type_tid',
    'type' => 'smallint(6)',
    'null' => 'NO',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'adminid' => 
  array (
    'field' => 'adminid',
    'type' => 'smallint(6)',
    'null' => 'NO',
    'key' => false,
    'default' => '0',
    'extra' => '',
  ),
  'add_time' => 
  array (
    'field' => 'add_time',
    'type' => 'int(11)',
    'null' => 'NO',
    'key' => false,
    'default' => '0',
    'extra' => '',
  ),
  'edit_time' => 
  array (
    'field' => 'edit_time',
    'type' => 'int(11)',
    'null' => 'NO',
    'key' => false,
    'default' => '0',
    'extra' => '',
  ),
  'activity' => 
  array (
    'field' => 'activity',
    'type' => 'varchar(150)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
  'pro_des' => 
  array (
    'field' => 'pro_des',
    'type' => 'varchar(200)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
  'give' => 
  array (
    'field' => 'give',
    'type' => 'varchar(300)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
  'is_sustain' => 
  array (
    'field' => 'is_sustain',
    'type' => 'smallint(5) unsigned',
    'null' => 'NO',
    'key' => false,
    'default' => '0',
    'extra' => '',
  ),
  'app_num' => 
  array (
    'field' => 'app_num',
    'type' => 'int(10) unsigned',
    'null' => 'NO',
    'key' => false,
    'default' => '0',
    'extra' => '',
  ),
);
?>