<?php
return array(
    'URL_MODEL'=>1,
    'DB_TYPE'   => 'mysql', // 数据库类型
    'DB_HOST'   => '127.0.0.1', // 服务器地址
    'DB_NAME'   => 'reservation', // 数据库名
    'DB_USER'   => 'root', // 用户名
    'DB_PWD'    => 'fg544011909', // 密码
    'DB_PORT'   =>  3306, // 端口
    'DB_PREFIX' => 'sw_', // 数据库表前缀
    'DB_CHARSET'=> 'utf8', // 字符集
    'DEFAULT_FILTER' =>false,
    /*短信*/
    'ALI_SMS' => array(
        'PRODUCT' => 'Dysmsapi',
        'DOMAIN' => 'dysmsapi.aliyuncs.com',
        'REGION' => 'cn-hangzhou',
        'END_POINT_NAME' => 'cn-hangzhou',
        'KEY_ID' => 'LTAINwieuECXDOdk',
        'KEY_SECRET' => 'ye16iLTfcN5bxGDBBRd8lhydhTaBVF'
    ),
/*微信支付*/
    'WEIXINPAY_CONFIG'       => array(
        'APPID'              => 'wx41bec5da2490c1e8', // 微信支付APPID
        'MCHID'              => '1493366092', // 微信支付MCHID 商户收款账号
        'KEY'                => 'd10f46371bedf9912c55d548daa4bc4c', // 微信支付KEY
        'APPSECRET'          => 'd10f46371b238c91c55d548daa4bc4c5',  //公众帐号secert
        'NOTIFY_URL'         => 'http://www.ineusoft.com/yuyue/index.php/Home/Wxpay/notify', // 接收支付状态的连接
    ),

);