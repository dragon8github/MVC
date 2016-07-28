$(function(){
	$("#mytree").tree({
		//异步请求的地址
		url:"/admin/tree",
		//为所有节点绑定点击时间，node为点击节点的DOM
		onClick:function(node)
		{	
			//alert(node.text + "~" + node.state + "~" + node.id + "~" + node.attr.url);
			if(node.attr && node.attr.url)
			{
				addTab(node.text,node.attr.url);
			}
		}
	})
})


addTab = function(title, url)
{
	if ($('#mytab').tabs('exists', title))
	{
		$('#mytab').tabs('select', title);
	} 
	else 
	{
		var content = '<iframe scrolling="auto" frameborder="0"  src="'+url+'" style="width:100%;height:100%;"></iframe>';
		$('#mytab').tabs('add',
		{
			title:title,
			content:content,
			closable:true
		});
	}
}