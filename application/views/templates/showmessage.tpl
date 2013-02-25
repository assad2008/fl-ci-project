<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="http://lib.sinaapp.com/js/bootstrap/2.2.1/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="<{$base_url}>static/css/style.css" />
<title>跳转页面</title>

  </head> 
   
  <body> 
    <div id="login">
  <div id="logo"><img src="<{$base_url}>static/images/logo.png" /></div>
  <div class="login-form">
    <div id="login-title"><img src="<{$base_url}>static/images/land.jpg" /></div>
        <div class="mid"><div class="msg"><{$msg}>
        <div class="h"><a href="<{$gourl}>">如不跳转，请点击</a></div></div></div>
    <div id="login-bottom"> </div>
  </div>
</div>
  </body> 
</html>
<style>
.mid{
	display:block;
	height:240px;
	border-left:1px solid #90a4d5;
	border-right:1px solid #90a4d5;
	text-align:left;
	padding-top:120px;
	font-size:16px;
	line-height:30px;
}
.msg{
	width:280px;
	margin:0 auto;
	font-size:20px;
}
.mid a{
	background:url(<{$base_url}>static/images/back.png) left center no-repeat;
	padding-left:20px;
	font-size:20px;
}
</style>