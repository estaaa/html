<?php
if (!defined("HDPHP_PATH"))exit('No direct script access allowed');
//更多配置请查看hdphp/Config/config.php
return array(
    /********************************基本参数********************************/
    'AUTO_LOAD_FILE'                => array(),     //自动加载文件
   /********************************数据库********************************/
      'DB_DRIVER'                     => 'mysqli',    //驱动
      'DB_CHARSET'                    => 'utf8',      //字符集
      'DB_HOST'                       => '127.0.0.1', //主机
      'DB_PORT'                       => 3306,        //端口
      'DB_USER'                       => 'root',      //帐号
      'DB_PASSWORD'                   => '@#msq888.+',          //密码
      'DB_DATABASE'                   => 'intro',          //数据库
      'DB_PREFIX'                     => 'hw_',          //表前缀
    /********************************模板参数********************************/
    'TPL_PATH'                      => 'View',      //目录
    'TPL_FIX'                       => '.html',     //文件扩展名
    'TPL_TAGS'                      => array(),     //标签类
    /********************************URL路由********************************/
   
    // 开启伪静态 处理 
    'HTML_SUFFIX'                   =>'.html',
   
    /********************************验证码********************************/
    'CODE_FONT'                     => HDPHP_PATH . 'Data/Font/font.ttf', //字体
    'CODE_STR'                      => '23456789abcdefghjkmnpqrstuvwsyz', //验证码种子
    'CODE_WIDTH'                    => 120,         //宽度
    'CODE_HEIGHT'                   => 35,          //高度
    'CODE_BG_COLOR'                 => '#ffffff',   //背景颜色
    'CODE_LEN'                      => 1,           //文字数量
    'CODE_FONT_SIZE'                => 20,          //字体大小
    'CODE_FONT_COLOR'               => '',   //字体颜色
    /********************************文件上传********************************/
    'UPLOAD_THUMB_ON'               => FALSE,       //上传图片缩略图处理
    'UPLOAD_ALLOW_TYPE'             => array('jpg','jpeg','gif','png'),//允许上传类型
    'UPLOAD_ALLOW_SIZE'             => 2097152,     //允许上传文件大小 单位B
    'UPLOAD_PATH'                   => './Upload/',   //上传路径
    /********************************图像水印处理********************************/
    'WATER_ON'                      => TRUE,        //开关
    'WATER_FONT'                    => HDPHP_PATH . 'Data/Font/font.ttf',   //水印字体
    'WATER_IMG'                     => HDPHP_PATH . 'Data/Image/water.png', //水印图像
    'WATER_POS'                     => 9,           //位置  1~9九个位置  0为随机
    'WATER_PCT'                     => 60,          //透明度
    'WATER_QUALITY'                 => 80,          //压缩比
    'WATER_TEXT'                    => 'WWW.HOUDUNWANG.COM', //水印文字
    'WATER_TEXT_COLOR'              => '#f00f00',   //文字颜色
    'WATER_TEXT_SIZE'               => 12,          //文字大小
    /********************************图片缩略图********************************/
    'THUMB_PREFIX'                  => '',          //缩略图前缀
    'THUMB_ENDFIX'                  => '_thumb',    //缩略图后缀
    'THUMB_TYPE'                    => 6,   //生成方式,
                                            //1:固定宽度,高度自增 2:固定高度,宽度自增 3:固定宽度,高度裁切
                                            //4:固定高度,宽度裁切 5:缩放最大边       6:自动裁切图片
    'THUMB_WIDTH'                   => 300,         //缩略图宽度
    'THUMB_HEIGHT'                  => 300,         //缩略图高度
);
?>