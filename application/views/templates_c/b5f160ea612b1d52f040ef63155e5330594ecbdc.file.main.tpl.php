<?php /* Smarty version Smarty-3.1.13, created on 2013-02-25 13:45:50
         compiled from "application/views/templates/main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1685615153512afa8e5f8e84-36592831%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b5f160ea612b1d52f040ef63155e5330594ecbdc' => 
    array (
      0 => 'application/views/templates/main.tpl',
      1 => 1361343848,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1685615153512afa8e5f8e84-36592831',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'base_url' => 0,
    'uinfo' => 0,
    'topmenu' => 0,
    'mi' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_512afa8e690ab5_94314043',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_512afa8e690ab5_94314043')) {function content_512afa8e690ab5_94314043($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
static/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
static/css/style.css" />
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
static/js/jquery-1.8.2.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
static/js/bootstrap.min.js"></script>
<title>飞流</title>
</head>

<body>
<div id="top">
  <div id="header">
    <div id="logo"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
static/images/logo.png" /> </div>
    <div id="user">
      <ul>
	  <li>你好管理员：<?php echo $_smarty_tpl->tpl_vars['uinfo']->value['truename'];?>
(<?php echo $_smarty_tpl->tpl_vars['uinfo']->value['username'];?>
)</li>
      <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
login/logout" target="_top" class="fix-submenu">退出</a></li>
    </ul>
    </div>
  </div>
  <div id="navbar">
    <ul>
	  <?php  $_smarty_tpl->tpl_vars['mi'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['mi']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['topmenu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['mi']->key => $_smarty_tpl->tpl_vars['mi']->value){
$_smarty_tpl->tpl_vars['mi']->_loop = true;
?>
      <li><a href="#link<?php echo $_smarty_tpl->tpl_vars['mi']->value['menu_id'];?>
" id="item<?php echo $_smarty_tpl->tpl_vars['mi']->value['menu_id'];?>
" onclick="Tabmenu(this,<?php echo $_smarty_tpl->tpl_vars['mi']->value['menu_id'];?>
);" ><?php echo $_smarty_tpl->tpl_vars['mi']->value['menu_name'];?>
</a></li>
	  <?php } ?>
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
	<?php  $_smarty_tpl->tpl_vars['mi'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['mi']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['topmenu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['mi']->key => $_smarty_tpl->tpl_vars['mi']->value){
$_smarty_tpl->tpl_vars['mi']->_loop = true;
?>
	<iframe id="link<?php echo $_smarty_tpl->tpl_vars['mi']->value['menu_id'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
main/menu/<?php echo $_smarty_tpl->tpl_vars['mi']->value['menu_id'];?>
" target='main-frame' frameborder="0" allowtransparency="true"></iframe>
	<?php } ?>
  </div>
  <div id="right">
    <div id="content">
    <iframe id="main-frame" name="main-frame" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
main/welcome" frameborder="0" allowtransparency="true"></iframe>
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
</html><?php }} ?>