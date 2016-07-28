<?php

class CssLoader
{

    public static function LoadPublicCss($folder,$name)
    {
        echo sprintf("<link rel='stylesheet' href='/Src/Css/%s'  />",$folder.'/'.$name);
    }
    
    public static function LoadViewCss($Css_Name)
    {
         echo  sprintf("<link rel='stylesheet' href='/MVC/V/".CURRENT_THEME."/css/%s'  />",$Css_Name);
    }
    
    public static function easyui($theme)
    {
        echo sprintf("<link rel='stylesheet' href='/Src/Css/Easyui/".$theme."/easyui.css'  />");
        echo sprintf("<link rel='stylesheet' href='/Src/Css/Easyui/icon.css'  />");
    }
    
    public static function Jqm()
    {
        echo sprintf("<link rel='stylesheet' href='/Src/Css/%s'  />","JqueryMobile/jquery.mobile-1.4.5.min.css");
    }
    
    public static function autoComplete()
    {
        echo  sprintf("<link href='//cdn.bootcss.com/jquery-autocomplete/1.0.7/jquery.auto-complete.min.css' rel='stylesheet'>");
    }
    

    public static function Bootstrap()
    {
        echo  sprintf("<link href='https://cdn.bootcss.com/bootstrap/3.3.6//css/bootstrap.min.css' rel='stylesheet'>");
    }

}


?>