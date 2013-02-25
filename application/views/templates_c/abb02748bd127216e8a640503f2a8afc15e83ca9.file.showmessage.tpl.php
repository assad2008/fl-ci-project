<?php /* Smarty version Smarty-3.1.13, created on 2013-02-25 13:58:01
         compiled from "application/views/templates/showmessage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1865326786512afd693f7901-20591436%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'abb02748bd127216e8a640503f2a8afc15e83ca9' => 
    array (
      0 => 'application/views/templates/showmessage.tpl',
      1 => 1358931336,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1865326786512afd693f7901-20591436',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'base_url' => 0,
    'msg' => 0,
    'gourl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_512afd69426da6_80370105',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_512afd69426da6_80370105')) {function content_512afd69426da6_80370105($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="http://lib.sinaapp.com/js/bootstrap/2.2.1/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
static/css/style.css" />
<title>跳转页面</title>

  </head> 
   
  <body> 
    <div id="login">
  <div id="logo"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
static/images/logo.png" /></div>
  <div class="login-form">
    <div id="login-title"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
static/images/land.jpg" /></div>
        <div class="mid"><div class="msg"><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

        <div class="h"><a href="<?php echo $_smarty_tpl->tpl_vars['gourl']->value;?>
">如不跳转，请点击</a></div></div></div>
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
	background:url(<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
static/images/back.png) left center no-repeat;
	padding-left:20px;
	font-size:20px;
}
</style><?php }} ?>