<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<title><?php echo $Title ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	
    <meta http-equiv="cache-control" content="max-age=0" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
    <meta http-equiv="pragma" content="no-cache" />
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" /> 
</head>
<body class="container">

<?php IF(!$hideHeader) : ?>
<div class="container" style="margin-top: 15px;">
    <div class="row clearfix">
        <div class="col-md-12 column">
            <nav class="navbar navbar-default" role="navigation">
                <div class="navbar-header">
                     <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">切换导航</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" href="#">导航</a>
                </div>
                
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active">
                            <a href="#">链接</a>
                        </li>
                        <li>
                            <a href="#">链接</a>
                        </li>
                        <li class="dropdown">
                             <a href="#" class="dropdown-toggle" data-toggle="dropdown">下拉菜单<strong class="caret"></strong></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#">列表一</a>
                                </li>
                                <li>
                                    <a href="#">列表二</a>
                                </li>
                                <li>
                                    <a href="#">列表三</a>
                                </li>
                                <li class="divider">
                                </li>
                                <li>
                                    <a href="#">更多列表</a>
                                </li>
                                <li class="divider">
                                </li>
                                <li>
                                    <a href="#">更多列表</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input class="form-control" type="text" />
                        </div> <button type="submit" class="btn btn-default">搜索</button>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                    	<?php $u = get_LoginCookies(); ?>
                        <?php IF($u) : ?>
                            <li> <a href="javascript:;" ><?php echo $u->user_name; ?></a> </li>
                            <li> <a href="/login/quit" >安全退出</a> </li>
                        <?php ELSE: ?>
                            <li> <a href="javascript:;" onclick="Sign_In()">登录</a> </li>
                            <li> <a href="javascript:;" onclick="Sign_Up()">注册</a> </li>
                         <?php ENDIF; ?> 
                    </ul>
                </div>
                
            </nav>
        </div>
    </div>
</div>
<?php ENDIF; ?>