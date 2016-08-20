<?php
/*
 * 一个数据表对应一个模型，所以模型名就是数据库表名
 * */
 class Model
{
    //模型
    private $_modelName = "";
    //DB对象
    private $_db = false;
    //模型对象
    private $_Result = false;    


    //构造函数,外部通过公共函数库Common.php的load_model加载并且实例化本类的对象，然后返回使用
    function __construct($modelName,$database_name)
    {
        //表前缀
        $_prefix = $database_name == DB_NAME ? DB_PREFIX : "";

        //模型名
        $this->_modelName = $_prefix.$modelName;      
        
        //初始化DB
        if($this->_db == false)
        {
            //加载第三方ORM
            load_lib("Medoo", "Medoo.php");        
            // 初始化配置
            $this->_db = new medoo([
                'database_type' => DB_TYPE,
                'database_name' => $database_name,
                'server' => DB_SERVER,
                'username' => DB_USER,
                'password' => DB_PWD,
                'charset' => DB_CHARSET,
                'prefix' => $_prefix
            ]);

        }
    } 

      
    
    //非法对象拦截器,外部通过公共函数库Common.php的load_model加载并且实例化本类的对象，然后$m->xxxx使用。通常需要先使用一次$m->find($colArray,$whereArray)
    function __get($keyName)
    {       
        IF($this->_Result)
        { 
            $ret =  $this->_Result;            
            $Result = $ret[$keyName];            
            IF($Result != "")
            {
                return $Result;
            }            
            return false;
        }
    }  
  
    //插入
    function insert($colArray)
    {
        return  $this->_db->insert($this->_modelName, $colArray);
    }    
    
    
    //更新
    function update($colArray,$whereArray)
    {
        return $this->_db->update($this->_modelName,$colArray,$whereArray);
    } 
   

    //查找所有
    function select($whereArray = [],$colArray = "*")
    {
        if(count($whereArray) == 0) return $this->_db->select($this->_modelName,$colArray); 
        return $this->_db->select($this->_modelName,$colArray,$whereArray);
    }

     //查找一条
    function find($whereArray = [],$colArray = "*")
    {
        $this->_Result = $this->_db->get($this->_modelName,$colArray,$whereArray);
        return $this->_Result;
    }

    //自定义查找
    function query($sql)
    {
        $Result = $this->_db->query($sql);
        if($Result)  $Result = $Result->fetchAll();      
        return $Result;
    }  

    //查询总行数
    function count($whereArray = [])
    {
      return  $this->_db->count($this->_modelName,$whereArray);
    }
}
?>