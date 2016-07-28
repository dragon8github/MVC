<?php 
/*
 * 基类控制器
 * */
abstract class Controller
{
    //模板名称
    var $_viewName = "index";
    
    //核心数组
    var $_objectList = array();

    //是否为后台
    var $_IsAdmin = false;


    //将变量(字符串或者数组)塞入$_objectList数组，之后通过extract解包，就可以在VIEW层中使用数组的键名来召唤值
    function addObject($key,$val)
    {
        $this->_objectList[$key] = $val;
    }
    
    //设置模板名称
    function setViewName($ViewName)
    {
        $this->_viewName = $ViewName;
    }

    //是否为后端模板
    function setAdmin()
    {
        $this->_IsAdmin = true;
    }

    //渲染
    public function display($header = false,$footer = false)
    {
        $theme = $this->_IsAdmin == true? ADMIN_THEME : CURRENT_THEME;
        //将数组解包成变量,在VIEW中就可以直接使用数组的键名来召唤值，如：$ProdName、$NewsTite 
        extract($this->_objectList);
        //引用头部
        if($header)include 'MVC/V/'.$theme.'/header'.VIEW_SUFFIX;
        //引用身体
        include 'MVC/V/'.$theme.'/'.$this->_viewName.VIEW_SUFFIX;
        //引用脚部
        if($footer)include 'MVC/V/'.$theme.'/footer'.VIEW_SUFFIX;
    }
}

?>