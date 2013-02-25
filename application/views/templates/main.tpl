<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="<{$base_url}>static/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="<{$base_url}>static/css/style.css" />
<script type="text/javascript" src="<{$base_url}>static/js/jquery-1.8.2.js"></script>
<script type="text/javascript" src="<{$base_url}>static/js/bootstrap.min.js"></script>
<title>飞流</title>
</head>

<body>
<div id="top">
  <div id="header">
    <div id="logo"><img src="<{$base_url}>static/images/logo.png" /> </div>
    <div id="user">
      <ul>
	  <li>你好管理员：<{$uinfo.truename}>(<{$uinfo.username}>)</li>
      <li><a href="<{$base_url}>login/logout" target="_top" class="fix-submenu">退出</a></li>
    </ul>
    </div>
  </div>
  <div id="navbar">
    <ul>
	  <{foreach from=$topmenu item=mi}>
      <li><a href="#link<{$mi.menu_id}>" id="item<{$mi.menu_id}>" onclick="Tabmenu(this,<{$mi.menu_id}>);" ><{$mi.menu_name}></a></li>
	  <{/foreach}>
    </ul>
  </div>
  <script type="text/javascript">  	
function Tabmenu(obj,n){
	var Items = document.getElementById("navbar").getElementsByTagName("a");
	
	for(var i= 0,len = Items.length;i<len;++i){
		if(Items[i].className !=""){
			Items[i].className = "";
		}
		obj.className = "active";
		obj.blur();
		location.hash = n;
	}
};
(function(){
var n = location.hash.replace("#","");
if(!n){ n = 0;}
var curitem = document.getElementById("item"+n);
	Tabmenu(curitem,n);
})();
  </script> 
</div>
<div id="bottom">
  <div id="left">
	<{foreach from=$topmenu item=mi}>
	<iframe id="link<{$mi.menu_id}>" src="<{$base_url}>main/menu/<{$mi.menu_id}>" target='main-frame' frameborder="0" allowtransparency="true"></iframe>
	<{/foreach}>
  </div>
  <div id="right">
    <div id="content">
    <iframe id="main-frame" name="main-frame" src="<{$base_url}>main/welcome" frameborder="0" allowtransparency="true"></iframe>
    </div>
  </div>
</div>
<script>
	$(document).ready(function(e) {
        var h=document.documentElement.clientHeight;
        $("#content").css({
			"height":h-101+"px"
		})
		$('#left iframe').css({
			"height":h-101+"px"
		})
    });
</script>
</body>
</html>