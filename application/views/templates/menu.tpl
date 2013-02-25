<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="<{$base_url}>static/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="<{$base_url}>static/css/style.css" />
<script type="text/javascript" src="<{$base_url}>static/js/jquery-1.8.2.js"></script>
<script type="text/javascript" src="<{$base_url}>static/js/bootstrap.min.js"></script>
<title>目录</title>
</head>
<body>
<script type="text/javascript" src="<{$base_url}>static/js/index.js"></script>
<div id="sidebar" class="menu">
  <ul>
	<{foreach from=$menulist item=lmi}>
    <li><a href="#this" id="item-<{$lmi.father.menu_id}>" onclick="menu(this,'item-<{$lmi.father.menu_id}>','item-<{$lmi.father.menu_id}>close')" class="more-icon"><span><font><{$lmi.father.menu_name}></font></span></a>
      <ol id="item-<{$lmi.father.menu_id}>ol">
		<{foreach from=$lmi.son item=slmi}>
        <li><a href="<{$base_url}><{$slmi.url}>" target="main-frame"><{$slmi.menu_name}></a></li>
		<{/foreach}>
      </ol>
    </li>
	<{/foreach}>
  </ul>
</div>
</body>
</html>
