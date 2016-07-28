$.ajaxSetup
({
    //公共参数
    timeout: 10000,
    type: "POST",
    //发送请求前触发
    beforeSend: function (xhr)
    {
        layer.load(0, { shade: [0.5, '#fff'] });
        console.log("AJAX请求发送之前beforeSend_xhr:");
        console.log(xhr);
    },
    //请求失败遇到异常触发
        error: function (xhr, status, e)
        {
　　　//error的第一个参数xhr.responseText 可以打印出后台的错误信息。
		  alert(xhr.responseText);
　
            if (status == 'timeout')
        {
            layer.open({
                type: 0,
                content: "超时了，喵呜~",
                icon: 5,
                closeBtn: 2,
                btn1: function (index) { layer.closeAll() },
                end: function () { layer.closeAll() }
            });
        }
        else     //其他错误情况以后调试过程中认知并且加入
        {
            layer.open({
                type: 0,
                content: "处理失败，喵呜~",
                icon: 5,
                closeBtn: 2,
                btn1: function (index) { layer.closeAll() },
                end: function () { layer.closeAll() }
            });
        }
        console.log("AJAX出错了error_xhr:");
        console.log(xhr);
        console.log("AJAX出错了error_status:");
        console.log(status);
        console.log("AJAX出错了error_e:");
        console.log(e);
    },
    //完成请求后触发。即在success或error触发后触发
    complete: function (xhr, status)
    {
        layer.closeAll('loading');
        console.log("AJAX已完成_xhr");
        console.log(xhr);
        console.log("AJAX已完成_status:");
        console.log(status);
    },
})
