<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="http://lib.sinaapp.com/js/bootstrap/2.2.1/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="<{$base_url}>static/css/style.css" />
<script type="text/javascript" src="http://lib.sinaapp.com/js/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript" src="http://lib.sinaapp.com/js/bootstrap/2.2.1/js/bootstrap.min.js"></script>
<title>飞流游戏SDK管理平台- 登录</title>
</head>

<body>
<div id="login">
  <div id="logo"><img src="<{$base_url}>static/images/logo.png" /></div>
  <div class="login-form">
    <div id="login-title"><img src="<{$base_url}>static/images/land.jpg" /></div>
    <fieldset>
      <form method="post" action="<{$base_url}>login">
        <p><span title="name"></span>
          <input type="text" id="username" name="username" required="required" placeholder="用户名" onfocus="add('username')" onblur="remove('username')"  />
        </p>
        <p><span title="password"></span>
          <input type="password" id="password" name="password" required="required" placeholder="密码" onfocus="add('password')" onblur="remove('password')" />
        </p>
        <p title="code"><span title="code"></span>
          <input type="text" id="code" name="captcha" required="required" placeholder="验证码" onfocus="add('captcha')" onblur="remove('captcha')"  />
        </p>
        <p id="code-img"> <img align="absmiddle" id="regimg" name="regimg" src="<{$base_url}>code?rand="+Math.random()" height="60" width="140" alt="CAPTCHA" border="1" onclick= this.src="<{$base_url}>code?rand="+Math.random() style="cursor: pointer;" title="<{$lang.click_for_another}>" /> </p>	
		
        <input class="" type="submit" name="submit" value="登录" />
        <div class="alert" id="error1">
          <button class="close" data-dismiss="alert">&times;</button>
          <strong class="relative"><span class="warming"></span></strong>用户名或者密码错误！</div>
          <div class="alert" id="error2">
          <button class="close" data-dismiss="alert">&times;</button>
          <strong class="relative"><span class="warming"></span></strong>验证码错误！ </div>
      </form>
    </fieldset>
    <script>
		function add(p){
				$("#"+p).parent().addClass("hover");
			}
		function remove(p){
				$("#"+p).parent().removeClass('hover');
		}
	</script>
    <div id="login-bottom"> </div>
  </div>
  <!--<div id="load" style="z-index:10000; width:100%; height:100%; background:url(images/loader.white.gif) center center no-repeat rgba(255,255,255,0.3); position:absolute; top:0; bottom:0; left:0; right:0;"></div>
<script>
	function loading(){
		document.getElementById("load").style.display="block";
	}
</script>--> 
  
</div>
</body>
</html>
