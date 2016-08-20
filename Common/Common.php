<?php

//DES加密类库
include 'DesCrypt.php';

//Lee便携式类库
include 'Lee.php';

//缓存类库
include "Cache.php";

function exit_404()
{
  include 'MVC/V/'.CURRENT_THEME.'/404.v';exit();
}

//引用model
function load_model($modelName,$database_name = DB_NAME)
{
    return new Model($modelName,$database_name);
}

//引用第三方类库
function load_lib($folderName,$touchName)
{    
  
    require_once 'Library/'.$folderName.'/'.$touchName;
}

//引用POJO
function load_POJO($className)
{
    require_once 'Library/POJO/'.$className;
}

//获取登录cookies
function get_LoginCookies()
{
    if(isset($_COOKIE[COOKIES_LOGIN]))
    {
       $loginCookies = myDecrypt($_COOKIE[COOKIES_LOGIN], DESKEY);
       load_POJO("UserInfo.POJO"); 
       $u = new UserInfo();
       $u = unserialize($loginCookies);
       $user_name = $u->user_name;
       $user_ip = $u->user_ip;
       IF($u && $user_name != "" && $user_ip == IP())
       return $u;
    }    
    return false;    
}


//为了配合这种格式的奇思淫巧：商品类别|shop_prod_class
function genInputLabel($comment)
{
  $comment=explode("|",$comment);
  return $comment[0];
}

 //根据easyui动态生成控件类型
//参数1：数据类型，参数2：是否允许为null，参数3：字段名，参数4：长度，参数5：注释
function genInput($colType,$isnullable,$colName,$length,$comment)
{
   $options=$isnullable=="NO"?"required:true":"";//如果不能为空,则加上required:true
   switch($colType) //添加验证
   {
     
   }
   $length=intval($length);
   $missingMessage="missingMessage='必填项'";
   $minLength=150;//控件的最小宽度
   $maxLength=500;//控件的最大宽度
   $textHeight=150;//textare框的默认高度
   $style="";
   if($length>0)
   {
    $length=($minLength+$length*0.8);
    if($length>$maxLength) $length=$maxLength;
    $style="width:".$length."px";
    if($colType=="text") $style.=";height:".$textHeight."px";
   }
   $comment=explode("|",$comment);
   if(count($comment)==2) //是为下拉列表框做的专门程序
   {
     $select='<select name="'.$colName.'"  class="easyui-combobox" >';
     $json=json_decode($comment[1]);
     $tb=load_model($json->tb);
     $result = $tb->select();
     foreach($result as $r)
     {
      $select.="<option value='".$r[$json->id]."'>".$r[$json->text]."</option>";
     }
     $select.="</select>";
     return $select;
   }
    
  switch($colType)
  {
    case "bit":
      return '<input '.$missingMessage.' style="'.$style.'" autocomplete="off" class="easyui-checkbox" ' 
              .'type="checkbox" name="'.$colName.'" ' 
              .'data-options="'.$options.'"/>';
     case "text":
      return '<textarea '.$missingMessage.' style="'.$style.'" autocomplete="off" class="easyui-validatebox" ' 
              .'type="textarea" name="'.$colName.'" ' 
              .'data-options="'.$options.'"></textarea>';
     case "datetime":
      return '<input '.$missingMessage.' style="'.$style.'" autocomplete="off" class="easyui-datetimebox" ' 
              .'type="textbox" name="'.$colName.'" ' 
              .'data-options="'.$options.'"/>';
     case "longtext":
       $ueEditor=' <script name="content" id="id_'.$colName.'" type="text/plain"> </script>';
       // $ueEditor.='<script type="text/javascript" src="/jsm/ue/ueditor.config.js"></script>';
       // $ueEditor.='<script type="text/javascript" src="/jsm/ue/ueditor.all.js"></script>';
       $ueEditor.= JsLoader::Ueditor();
        $ueEditor.=' <script type="text/javascript">var ue_'.$colName.' = UE.getEditor("id_'.$colName.'");</script>';
        $ueEditor.='<input type="hidden" name="'.$colName.'" class="hideControl"/>';
       return $ueEditor;
      default:
        return '<input '.$missingMessage.' style="'.$style.'" autocomplete="off" class="easyui-textbox" ' 
              .'type="text"  name="'.$colName.'" ' 
              .'data-options="'.$options.'"/>';
         
  }
}


?>
