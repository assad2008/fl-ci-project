<?php /* Smarty version Smarty-3.1.13, created on 2013-02-25 13:52:11
         compiled from "application/views/templates/showmsg.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2062515020512afc0be4d3a1-41852580%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8ecd3b31c28cf80843b470988cd80b9e23107aa4' => 
    array (
      0 => 'application/views/templates/showmsg.tpl',
      1 => 1358836233,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2062515020512afc0be4d3a1-41852580',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'msg' => 0,
    'base_url' => 0,
    'gourl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_512afc0be768e8_24242713',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_512afc0be768e8_24242713')) {function content_512afc0be768e8_24242713($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("mainheader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<style>
	body{
		width:99%;
		margin:10px auto;
	}
h4{
	margin-bottom:10px;
	color:#63666d;
}
	p{
		text-indent:2em;
		line-height:25px;
		color:#63666d;
	}
	a span{
		position:absolute;
		left:5px;
		top:5px;
		background:url(images/back.png) center center no-repeat;
		height:15px;
		width:15px;
	}
.alert{
	background:#f3f4f9;
	border:1px solid #c9ccd3;
	border-top:none;
	border-radius:0 0 5px 5px;
}
</style>
<div class="title"><strong class="l">信息提示</strong><span class="relative r"></span> </div>
<div class="resp-info alert">
  <h4 class="relative">温馨提示<span class="warming"></span></h4>
  <p><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</p>
  <p class="relative"><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['gourl']->value;?>
">返回<span></span></a></p>
  <p class="relative"><a href="#">回到首页<span></span></a></p>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("mainfooter.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>