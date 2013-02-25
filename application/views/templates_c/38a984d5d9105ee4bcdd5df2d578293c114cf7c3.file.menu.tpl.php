<?php /* Smarty version Smarty-3.1.13, created on 2013-02-25 13:45:50
         compiled from "application/views/templates/menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:965997852512afa8ec14994-12334302%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '38a984d5d9105ee4bcdd5df2d578293c114cf7c3' => 
    array (
      0 => 'application/views/templates/menu.tpl',
      1 => 1358746196,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '965997852512afa8ec14994-12334302',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'base_url' => 0,
    'menulist' => 0,
    'lmi' => 0,
    'slmi' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_512afa8ec88ff0_17845103',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_512afa8ec88ff0_17845103')) {function content_512afa8ec88ff0_17845103($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<title>目录</title>
</head>
<body>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
static/js/index.js"></script>
<div id="sidebar" class="menu">
  <ul>
	<?php  $_smarty_tpl->tpl_vars['lmi'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['lmi']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menulist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['lmi']->key => $_smarty_tpl->tpl_vars['lmi']->value){
$_smarty_tpl->tpl_vars['lmi']->_loop = true;
?>
    <li><a href="#this" id="item-<?php echo $_smarty_tpl->tpl_vars['lmi']->value['father']['menu_id'];?>
" onclick="menu(this,'item-<?php echo $_smarty_tpl->tpl_vars['lmi']->value['father']['menu_id'];?>
','item-<?php echo $_smarty_tpl->tpl_vars['lmi']->value['father']['menu_id'];?>
close')" class="more-icon"><span><font><?php echo $_smarty_tpl->tpl_vars['lmi']->value['father']['menu_name'];?>
</font></span></a>
      <ol id="item-<?php echo $_smarty_tpl->tpl_vars['lmi']->value['father']['menu_id'];?>
ol">
		<?php  $_smarty_tpl->tpl_vars['slmi'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['slmi']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lmi']->value['son']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['slmi']->key => $_smarty_tpl->tpl_vars['slmi']->value){
$_smarty_tpl->tpl_vars['slmi']->_loop = true;
?>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['slmi']->value['url'];?>
" target="main-frame"><?php echo $_smarty_tpl->tpl_vars['slmi']->value['menu_name'];?>
</a></li>
		<?php } ?>
      </ol>
    </li>
	<?php } ?>
  </ul>
</div>
</body>
</html>
<?php }} ?>