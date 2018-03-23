<?php
return array(
	/* 数据库设置 */
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  '127.0.0.1', // 服务器地址
    'DB_NAME'               =>  'intro',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  '@#msq888.+',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    //'DB_CONFIG2'            =>     'mysql://9bf980fd-59ec:e59a6f8a-6d31@192.168.1.13:3306/d2c0d4a20f90a4b4581324a48a8ee202e#utf8',
    'DB_PREFIX'             =>  'th_',    // 数据库表前缀
    'DB_PARAMS'             =>  array(), // 数据库连接参数    
    'DB_DEBUG'              =>  TRUE, // 数据库调试模式 开启后可以记录SQL日志
    'DB_FIELDS_CACHE'       =>  true,        // 启用字段缓存
    'DB_CHARSET'            =>  'utf8',      // 数据库编码默认采用utf8
    'DB_DEPLOY_TYPE'        =>  0, // 数据库部署方式:0 集中式(单一服务器),1 分布式(主从服务器)
 // *************************自定义路径***********************************************
    'TMPL_PARSE_STRING'     =>  array(
        '__STATIC__'        => __ROOT__.'/Public/Static',
        '__CSS__'        => __ROOT__.'/Public/Css',
        '__JS__'        => __ROOT__.'/Public/Js',
        '__IMAGES__'        => __ROOT__.'/Public/Images',
        // 'PUBLIC'        => __ROOT__.'/Home/View/Common',
        ),
);