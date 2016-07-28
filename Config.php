<?php

//控制器后缀
define("CONTROLLER_SUFFIX",".c");

//模型后缀
define("MODEL_SUFFIX",".m");

//视图后缀
define("VIEW_SUFFIX",".v");

//前台模板版本
define("CURRENT_THEME", "A001");

//后台模板版本
define("ADMIN_THEME", "B001");

//数据库名
define("DB_NAME", "huahua");

//系统数据库名
define("DB_SYSNAME", "information_schema");

//数据库类型
define("DB_TYPE", "mysql");

//数据库连接地址
define("DB_SERVER","localhost");

//数据库账号
define("DB_USER", "root");

//数据库密码
define("DB_PWD", "202063sb");

//数据表前缀，如"shop_"、"book_"、"huahua_"
define("DB_PREFIX", "");    

//DES秘钥
define("DESKEY", "BDA621F1C7284B95BB29D549ED34A728");

//非法字符拦截
define("UNSAFE_WORD", "fuck,毛泽东,习近平,法轮功,翻墙,色情,东亚病夫");

//缓存memcache
define("CACHE_IP", "127.0.0.1");

//默认端口
define("CACHE_PORT", "11211");   

//是否开启调试模式，false为关闭，true为打开.必须是bool类型
define("DEBUG_MODEL",false);

//本网站的域名
define("CURRENT_URL", "http://huahua.ncywjd.com");

//用户登录Cookies的key
define("COOKIES_LOGIN", "user_login");

//微信公共类路径
define("WX_PATH", "Library/WeiXin");

//微信支付类路径
define("WXPAY_PATH", "Library/WeiXin/wxpay");

//微信appid
define("WX_APPID", "wx92ea69e479013e3d");

//微信secret
define("WX_SECRET", "814dcdacf3d9c92dd72bfab7914c1bd9");

//设置微信管理员的openid
define("WX_ADMIN", "oYNn6wg0qYDkqNVomc78AUctYfRM,oYNn6wi2Lg4qvvQDOFFTMXpY6ulY");

?>