<?php

//DES加密类库
include 'DesCrypt.php';

//Lee便携式类库
include 'Lee.php';

//缓存类库
include "Cache.php";

function exit_404()
{
  include 'MVC/V/'.CURRENT_THEME.'/404.v';exit();
}

//引用model
function load_model($modelName,$database_name)
{
    return new Model($modelName,$database_name);
}

//引用第三方类库
function load_lib($folderName,$touchName)
{    
  
    require_once 'Library/'.$folderName.'/'.$touchName;
}

//引用POJO
function load_POJO($className)
{
    require_once 'Library/POJO/'.$className;
}

//获取登录cookies
function get_LoginCookies()
{
    if(isset($_COOKIE[COOKIES_LOGIN]))
    {
       $loginCookies = myDecrypt($_COOKIE[COOKIES_LOGIN], DESKEY);
       load_POJO("UserInfo.POJO"); 
       $u = new UserInfo();
       $u = unserialize($loginCookies);
       $user_name = $u->user_name;
       $user_ip = $u->user_ip;
       IF($u && $user_name != "" && $user_ip == IP())
       return $u;
    }    
    return false;    
}

?>
