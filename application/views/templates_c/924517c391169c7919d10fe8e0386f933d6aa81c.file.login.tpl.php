<?php /* Smarty version Smarty-3.1.13, created on 2013-02-25 13:26:07
         compiled from "application/views/templates/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1402056118512af5ef3839c1-42267524%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '924517c391169c7919d10fe8e0386f933d6aa81c' => 
    array (
      0 => 'application/views/templates/login.tpl',
      1 => 1361760624,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1402056118512af5ef3839c1-42267524',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'base_url' => 0,
    'lang' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_512af5ef450638_64652172',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_512af5ef450638_64652172')) {function content_512af5ef450638_64652172($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="http://lib.sinaapp.com/js/bootstrap/2.2.1/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
static/css/style.css" />
<script type="text/javascript" src="http://lib.sinaapp.com/js/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript" src="http://lib.sinaapp.com/js/bootstrap/2.2.1/js/bootstrap.min.js"></script>
<title>飞流游戏SDK管理平台- 登录</title>
</head>

<body>
<div id="login">
  <div id="logo"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
static/images/logo.png" /></div>
  <div class="login-form">
    <div id="login-title"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
static/images/land.jpg" /></div>
    <fieldset>
      <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
login">
        <p><span title="name"></span>
          <input type="text" id="username" name="username" required="required" placeholder="用户名" onfocus="add('username')" onblur="remove('username')"  />
        </p>
        <p><span title="password"></span>
          <input type="password" id="password" name="password" required="required" placeholder="密码" onfocus="add('password')" onblur="remove('password')" />
        </p>
        <p title="code"><span title="code"></span>
          <input type="text" id="code" name="captcha" required="required" placeholder="验证码" onfocus="add('captcha')" onblur="remove('captcha')"  />
        </p>
        <p id="code-img"> <img align="absmiddle" id="regimg" name="regimg" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
code?rand="+Math.random()" height="60" width="140" alt="CAPTCHA" border="1" onclick= this.src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
code?rand="+Math.random() style="cursor: pointer;" title="<?php echo $_smarty_tpl->tpl_vars['lang']->value['click_for_another'];?>
" /> </p>	
		
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
<?php }} ?>