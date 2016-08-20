<?php

class JsLoader
{       
    
    public static function LoadJs($ProName,$FileName)
    {
        echo  sprintf("<script type='text/javascript' src='/Src/Js/%s'></script>",$ProName."/".$FileName);
    }
    
    public static function LoadViewJs($CURRENT_THEME,$FileName)
    {
       echo  sprintf("<script type='text/javascript' src='/MVC/V/%s/js/%s'></script>",$CURRENT_THEME,$FileName);
    }

    public static function Ueditor()
    {
        echo sprintf("<script type='text/javascript' src='/Src/Js/%s'></script>",'ueditor/ueditor.config.js');
        echo sprintf("<script type='text/javascript' src='/Src/Js/%s'></script>",'ueditor/ueditor.all.min.js');
    }
    
    public static function easyui()
    {
         echo  sprintf("<script type='text/javascript' src='/Src/Js/Easyui/jquery.easyui.min.js'></script>");
    }
    
    public static function Jquery()
    {
       echo  sprintf("<script type='text/javascript' src='%s'></script>","https://cdn.bootcss.com/jquery/1.10.2/jquery.min.js");
    }
    
    public static function autoComplete()
    {
        echo  sprintf("<script src='//cdn.bootcss.com/jquery-autocomplete/1.0.7/jquery.auto-complete.min.js'></script>");
    }
    
    public static function Jqm()    
    {
        echo  sprintf("<script type='text/javascript' src='%s'></script>","https://cdn.bootcss.com/jquery-mobile/1.4.5/jquery.mobile.min.js");
    }
    
    public static function Layer()
    {
        echo  sprintf("<script type='text/javascript' src='/Src/Js/%s'></script>",'Layer/layer/layer.js');
    }
    
    public static function Layermobile()
    {
        echo  sprintf("<script type='text/javascript' src='/Src/Js/%s'></script>",'Layermobile/layer.js');
    }    
    
    public static function Zepto()
    {
        echo  sprintf("<script type='text/javascript' src='/Src/Js/%s'></script>",'Zepto/zepto_1.1.3.js');
    }
    
    public static function wilddog()
    {
        echo  sprintf("<script type='text/javascript' src='%s'></script>","https://cdn.wilddog.com/js/client/current/wilddog.js");
    }
    
    
    public static function Bootstrap()
    {
        echo  sprintf("<script src='https://cdn.bootcss.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>");
    }
    
}


?>