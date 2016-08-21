<?php 
CssLoader::Bootstrap();
CssLoader::LoadViewCss("login.css");
?>
<div class="container col-xs-12" id="login_container">
	<div class="row clearfix">
		<div class="col-xs-12 column">
			<form class="form-horizontal" role="form">
				<div class="form-group">
					 <label for="inputEmail3" class="col-xs-3 control-label login_label">用户名：</label>
					<div class="col-xs-9">
						<input class="form-control" name="username" id="username" value="Lee" type="text" placeholder="请输入用户名" />
					</div>
				</div>
				<div class="form-group">
					 <label for="inputPassword3" class="col-xs-3 control-label login_label">密码：</label>
					<div class="col-xs-9">
						<input class="form-control" name="password" value="202063sb" id="password" type="password" />
					</div>
				</div>
				<div class="form-group">
					 <label for="inputPassword3" class="col-xs-3 control-label login_label">验证码：</label>
					<div class="col-xs-9">
					<img  title="点击刷新" src="/login/validateCode/" align="absbottom" onclick="this.src='/login/validateCode/?'+Math.random();"></img>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-offset-3 col-xs-9">
						<div class="checkbox">
							 <label><input type="checkbox"  id="IsWeek" /> 一周内免登录</label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-offset-3 col-xs-9">
						 <button type="button" class="btn btn-info" onclick = "loginAction()">登录</button>
						 <button type="button"  class="btn btn-default"  onclick="closeLayer()">关闭</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<?php 
JsLoader::Jquery();
JsLoader::LoadViewJs(CURRENT_THEME,"login.js");
?>