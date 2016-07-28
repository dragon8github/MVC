closeLayer = function()
{
	var index = parent.layer.getFrameIndex(window.name); //获取窗口索引
	//parent.layer.closeAll(index); 
	parent.layer.closeAll(); 
}


loginAction = function()
{
	var index = parent.layer.getFrameIndex(window.name); //获取窗口索引
	parent.layer.load(0,{time:5000});
	var _IsWeek = 0; 
	if($("#IsWeek").prop("checked") == true) _IsWeek = 1;
	$.ajax
	({
		type:"POST",
		url:"/login/login_action",
		data:{"username":$("#username").val(),"password":$("#password").val(),"IsWeek":_IsWeek},
		success:function(data)
		{
			console.log(data);
			var json = JSON.parse(data);
			var Status = json.Status;
			var Result = json.Result;
			var Msg = json.Msg;
			if(Status == "成功")
			{
				parent.layer.msg( Msg, {time:1000}, function(){ parent.location.reload();});
			}
			else if(Status == "失败")
			{
				parent.layer.msg(Msg);
			}
		},
		complete:function(){parent.layer.closeAll("loading")}		
	})
}
