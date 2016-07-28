<?php

//$_POST单一入口封装
function POST($get_key)
{
    $str=$_POST[$get_key];
    return Validata($str);
}

//$_GET单一入口封装
function GET($get_key)
{
    $str=$_GET[$get_key];
    return Validata($str);
}

//验证数据
function Validata($str)
{
    //如果值为空，那么返回空字符串
    if(!isset($str)) return "";
    //过滤html标记
    $farr = array("/<(\/?)(script|i?frame|style|html|body|title|link|meta|\?|\%)([^>]*?)>/isU");
    //过滤类似 <script>  <style> <object>  <meta> <iframe> 等
    $str = preg_replace($farr,"",$str);
    //对单引号、双引号等预定义字符 前面加上反斜杠 如'变成\'
    $str=addslashes($str);
    //过滤敏感词汇
    $str=str_replace(explode(",", UNSAFE_WORD),"***",$str);
    //返回结果
    return trim($str);
}

//获取ip
function IP()
{
    if(!empty($_SERVER["HTTP_CLIENT_IP"])){
        $cip = $_SERVER["HTTP_CLIENT_IP"];
    }
    elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
        $cip = $_SERVER["HTTP_X_FORWARDED_FOR"];
    }
    elseif(!empty($_SERVER["REMOTE_ADDR"])){
        $cip = $_SERVER["REMOTE_ADDR"];
    }
    else{
        $cip = "";
    }
    return $cip;
}

function ArrToStr($arr,$key,$split = ',')
{
    $ids = null;
    for ($i=0;$i<count($arr);$i++)
    {
        $ids .=  $arr[$i][$key] . $split;
    }
    //去除最后一个字符串“，”号
    $ids =  substr($ids, 0,-1);
    return $ids;
}

//打印
function console($split,$a,$b=0,$c=0,$d=0,$e=0,$f=0,$g=0,$h=0,$i=0,$j=0,$k=0,$l=0,$m=0,$n=0)
{
    //获取参数总数
    $n = func_num_args();    
    $str = "";    
    for($i = 1;$i< $n;$i++)
    {
        $str .= func_get_arg($i) . $split;
    }    
    return $str;
}

// 返回Lee约定风格的AJAX字符串
function AJAX($Msg,$Result,$Status)
{
    $arr = array("Msg" => $Msg,"Result" => $Result,"Status" => $Status);
    exit(json_encode($arr));
}

//字符串截取
function Sub_截取字符串如果超出某位就省略号($str,$num)
{
    if(mb_strlen($str) > $num)  $str = substr($str,0,$num)."...";
    return $str;
}

//创建文件夹
function mkFolder($path)
{
    if(!is_readable($path))  is_file($path) or mkdir($path,'0777');
}

//警告
function alert($str)
{
    echo "<script type='text/javascript'>alert('".$str."')</script>";
}

//页面跳转
function href($url)
{
    echo "<script type='text/javascript'>window.location.href('".$url."')</script>";
}

//调试日志
function WriteLog($msg,$module = null,$logLevel = "DEBUG")
{
    $filepath = "Log/";
    mkFolder($filepath);
    $MyLogFile = @fopen($filepath.date("Y-m-d").".txt",'a+');
    $time = date("Y-m-d H:i:s");
    if(isset($module)){$module =  sprintf("\r\n归属模块：".$module."\r\n");}
    $logLine = "\r\n-------------------------------  $time -------------------------------\r\n";
    $logLine .= $module;
    $logLine .= "\r\n异常信息：$msg\r\n";
    $logLine .= "\r\n错误等级：$logLevel\r\n";
    fwrite($MyLogFile,$logLine);
}

?>