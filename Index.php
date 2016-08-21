<?php

//加载全局配置文件
include 'Config.php';

//加载全局函数库
include 'Common/Common.php';

//加载基控制器
load_lib("Public","Controller.php");

//加载基模型
load_lib("Public","Model.php");

//加载微信类库(可选)
load_lib("WeiXin","Wx_Class.php");

//加载CSS组件
include 'Inc/CssLoader.inc.php';

//加载JS组件
include 'Inc/JsLoader.inc.php';

//Controller拦截,默认调用index控制器
$_controller = (isset($_GET["controller"])?$_GET["controller"]:"index");

//Action拦截,默认调用index函数
$_action =  isset($_GET["action"])?$_GET["action"]:"index";

//控制器的路径
$_controller_path = 'MVC/C/'.$_controller.CONTROLLER_SUFFIX;

//如果控制器文件不存在，则切换成404界面
if(!file_exists($_controller_path)) exit_404();

//引用控制器
include $_controller_path;

//如果控制器不存在，则切换成404界面
if(!class_exists($_controller)) exit_404();

//实例化控制器
$_controllerobj = new $_controller();

//如果函数存在，则切换成404界面
if(!method_exists($_controllerobj, $_action)) exit_404();

//类注释反射
$_ReflectionClass = new ReflectionClass($_controllerobj);

//返回函数注释反射
$_getMethod = $_ReflectionClass->getMethod($_action);

if($_getMethod)
{
	//获取该函数的注释
	$_getDocComment = $_getMethod->getDocComment(); 
	//如果该函数需要权限
	if(preg_match("/power:{(.*?)}/", $_getDocComment,$result))
	{
	  $admin_user = "Lee";  //测试
	  $admin_role = array("editor");  //测试 
	  //获取权限的json
	  $role = json_decode("{".$result[1]."}")->role; 
	  //如果用户存在该权限，则正常运行网页
	  if(!$admin_user || !in_array($role, $admin_role)) exit('你没有访问权限');
	}

  	//调用函数
	$_controllerobj->$_action();
}



?>