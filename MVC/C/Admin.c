<?php 
/**
* 
*/
class Admin extends Controller
{
	
	function __construct()
	{
		  $this->setAdmin(true);
	}

	function index()
	{     
		  $this->_viewName = "index";     
		  $this->display(true,true);
	}

  function listProd()
  {
    $this->_viewName = "listProd";
    $this->display(true,true);
  }


   function getprod()
   {
      //当前页码
      $page=1;if(isset($_GET["page"])) $page=intval($_GET["page"]);
      //每页显示多少条
      $pagesize=2;if(isset($_GET["rows"])) $pagesize=intval($_GET["rows"]);
      //limit
      $limit = ($page-1)*$pagesize;
      //载入模型      
      $prod=load_model("shop_prod");      
      //把notor的值直接转化为array
      $ret=$prod->query("SELECT * FROM shop_prod order by id DESC LIMIT {$limit},{$pagesize}");
      //返回easyui的json格式
      $result=array("rows"=>$ret,"total"=>$prod->count(),"page"=>$page);
      //exit
      exit(json_encode($result));
   }
  #添加商品
  function addProd()
  {

    if($_POST)
    {
        $prod = load_model("shop_prod");
        $_arr = array(
            "prod_name"=>POST("prod_name"),
            "prod_intr"=>POST("prod_intr"),
            "prod_classid"=>POST("prod_classid"),
            "is_public"=>POST("is_public") == null ? 0:1,
            "add_time"=>POST("add_time")
        );
        $rowsCount = $prod->insert($_arr);
        exit($rowsCount); 
    }

    $this->_viewName = "addProd";
    $COLUMNS_model = load_model('columns',DB_SYSNAME); 
    $Result =  $COLUMNS_model->query("select COLUMN_NAME,DATA_TYPE,CHARACTER_MAXIMUM_LENGTH,IS_NULLABLE,COLUMN_COMMENT from `COLUMNS` where TABLE_NAME = 'shop_prod' and TABLE_SCHEMA = 'huahua' AND EXTRA != 'auto_increment'");
    $this->addObject("tb",$Result);
    $this->display(true,true);
  }

  private  function getTree_children($id,$tree)
  {
        $myArray = array();
        foreach($tree AS $t)
        {
            $_pid = $t["pid"];
            $_id = $t["id"];
            $_text = $t["tree_text"];
            $_state = $t["tree_state"];
            $_url = $t["tree_url"];
            if($_pid == $id)
            {
                $children_array =  array("id"=>$_id,"text"=>$_text,"state"=>$_state,"attr"=>array("url"=>$_url));
                array_push($myArray, $children_array);
            }
        }
        return $myArray;
    }
    
    //生成菜单数
    function tree()
    {
        //最终生成的树形菜单
        $tree = array();
        //加载model
        $tree_model = load_model("admin_tree");
        //查询所有
        $Result =  $tree_model->select();
        //克隆一个结果集
        $Result_clone = $Result;       
        //遍历结果集
        foreach($Result as $value)
        {
           $tree_text =  $value["tree_text"];
           $tree_state =  $value["tree_state"];
           $tree_url =  $value["tree_url"];
           $pid =  $value["pid"];
           $id = $value["id"];
           $parentNode = array("id"=>$id,"text"=>$tree_text,"state"=>$tree_state);  
           $children_array = $this->getTree_children($id, $Result_clone);
           if(count($children_array)>0)  
           {
               $parentNode["children"] = $children_array;      
               array_push($tree, $parentNode);
           }
        }
        exit(json_encode($tree));
    }

}
?>