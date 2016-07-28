<?php
 class Index extends Controller
 {
   function __construct()
    {
        //构造函数
    }
    
    function Index()
    {
        $this->setViewName("index");
        $this->display(true,true);
    }  
 }

 ?>