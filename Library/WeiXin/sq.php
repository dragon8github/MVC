<?php 
session_start();
$url="http://huahua.ncywjd.com/index.php";
$appid = WX_APPID;
$url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid='.$appid.'&redirect_uri='.$url.'&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect';
header("Location:".$url);
?>