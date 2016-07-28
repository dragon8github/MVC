<?php 
/**
* 
*/
class Login extends Controller
{
	
	function __construct()
	{
		# code...
	}

	function Index()
	{
		$this->setViewName("login");
		$this->display();
	}

   function quit()
   {
       $this->_viewName = "quit";
       $this->addObject("refer", $_SERVER['HTTP_REFERER']);
       setcookie(COOKIES_LOGIN,"",time() - 1,"/");
       $this->display();
   }

   function login_action()
   {
       $get_usernaeme = POST("username");
       $get_password = POST("password");
       $get_IsWeek = intval(POST("IsWeek"));  //为了防止0或1被转换，特意使用intval强制转换为整型
       
       IF($get_password == "" || $get_usernaeme == "")
       {
           AJAX("用户名或者密码不能为空", "", "失败");
       }
       
       $m = load_model("user");
       $m->find(["user_name"=>$get_usernaeme],["user_pwd"]);
       $pwd =  $m->user_pwd; 
       IF($pwd)
       {
               IF(myCrypt($get_password, DESKEY) == $pwd)
               {
                   load_POJO("UserInfo.POJO");                       
                   $u = new UserInfo();
                   $u->user_name = $get_usernaeme;
                   $u->user_ip = IP();
                   $u->user_logintime = time();                       
                   $u->user_regtime = $m->user_regtime;                       
                   $mycookie = myCrypt(serialize($u), DESKEY);
                   $cookiesTime = 0;
                   if($get_IsWeek == 1) $cookiesTime = time() + 3600 * 7 * 24;
                   setcookie(COOKIES_LOGIN,$mycookie,$cookiesTime,"/"); 
                   AJAX("登录成功", "", "成功"); 
               }
               ELSE
               {
                   AJAX("密码错误", "", "失败");
               }
       }
       ELSE
       {
            AJAX("账号不存在", "", "失败");
       }
   }


}
?>