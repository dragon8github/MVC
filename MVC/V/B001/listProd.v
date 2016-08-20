	<style>
		a{color:#FFFFFF}
		
	</style>
	<table id="tb" class="easyui-datagrid" title="商品列表" style="width:100%;height:100%"
			data-options="pagination:true, singleSelect:true,collapsible:true, url:'/admin/getprod/', method:'get', rownumbers:'true'">
		<thead>
			<tr>
				<th data-options="field:'prod_name',width:80">商品名称</th>
				<th data-options="field:'prod_intr',width:200">文字简介</th>
				<th data-options="field:'is_public',width:80,align:'right'" formatter="isPub">发布状态</th>
				<th data-options="field:'add_time',width:100">入库时间</th>
				<th data-options="field:'id',width:60,align:'center'" formatter="showEdit">操作</th>
			</tr>
		</thead>
	</table>
	 <script>
	 function isPub(val,row)
	 {
	 	if(val==1)
	 	return "是";
	 	return "否";
	 }
	 function showEdit(val,row)
	 {
	 	return "<a href='/?id="+val+"'>编辑</a>"
	 }
	 $(function(){
	 	 
	 	//以下是对分页控件的处理
	 	 var p = $('#tb').datagrid('getPager');  
	 	 $(p).pagination({ 
     	pageSize:10, 
        pageList: [2,10,20],//可以设置每页记录条数的列表 
        beforePageText: '第',//页数文本框前显示的汉字 
        afterPageText: '页    共 {pages} 页', 
        displayMsg: '当前显示 {from} - {to} 条记录   共 {total} 条记录' 
    	});  
    });
	 </script>