<?php /* Smarty version Smarty-3.1.13, created on 2013-02-25 14:00:16
         compiled from "application/views/templates/menu_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1620361191512afda08f2f19-82337177%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a7566f640a9c48002defe3bd5e3f3a5c9e90eae2' => 
    array (
      0 => 'application/views/templates/menu_edit.tpl',
      1 => 1361771969,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1620361191512afda08f2f19-82337177',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_512afda099aa53_67445690',
  'variables' => 
  array (
    'ur_here' => 0,
    'action_link' => 0,
    'base_url' => 0,
    'data' => 0,
    'menu_id_List' => 0,
    'menu_ids' => 0,
    'is_menu_level3' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_512afda099aa53_67445690')) {function content_512afda099aa53_67445690($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("mainheader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="wrap">
  <div class="title"><strong class="l"><?php echo $_smarty_tpl->tpl_vars['ur_here']->value;?>
</strong> <?php if ($_smarty_tpl->tpl_vars['action_link']->value){?><span class="relative r"> <a class="buttons4" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['action_link']->value['link'];?>
"><font><?php echo $_smarty_tpl->tpl_vars['action_link']->value['text'];?>
</font></a></span><?php }else{ ?><span class="relative r"></span> <?php }?></div>
  <form class="form form-horizontal" action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
menu/update" name="dataform" method="post" >
    <fieldset>
      <div class="control-group">
        <label class="control-label" for="menu_name">菜单名称</label>
        <div class="controls">
		  <input type="hidden" name="menu_id" id="menu_id" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['menu_id'];?>
">
          <input type="text" name="menu_name" class="input-medium" id="menu_name" required="required" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['menu_name'];?>
" />
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="sel">父ID</label>
        <div class="controls">
          <select name="parent_id" class="input-medium">
	      <option value="0">无父ID</option>
	      <?php  $_smarty_tpl->tpl_vars["menu_ids"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["menu_ids"]->_loop = false;
 $_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['menu_id_List']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["menu_ids"]->key => $_smarty_tpl->tpl_vars["menu_ids"]->value){
$_smarty_tpl->tpl_vars["menu_ids"]->_loop = true;
 $_smarty_tpl->tpl_vars["key"]->value = $_smarty_tpl->tpl_vars["menu_ids"]->key;
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['menu_ids']->value['menu_id'];?>
"<?php if ($_smarty_tpl->tpl_vars['data']->value['parent_id']==$_smarty_tpl->tpl_vars['menu_ids']->value['menu_id']){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['menu_ids']->value['menu_id'];?>
:<?php echo $_smarty_tpl->tpl_vars['menu_ids']->value['menu_name'];?>
</option>
		  <?php } ?>
          </select>
        </div>
      </div>
      <div class="control-group" <?php if (!($_smarty_tpl->tpl_vars['is_menu_level3']->value)){?> style="display:none"<?php }?>>
      	<label class="control-label" for="url">链接地址</label>
        <div class="controls">
        	<input type="text" name="url" class="input-medium" id="url" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['url'];?>
" <?php if (($_smarty_tpl->tpl_vars['is_menu_level3']->value)){?> required="required"<?php }?>/>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">是/否隐藏</label>
        <div class="controls">
          <label class="radio">
            <input type="radio" name="hidden_group" value="0" checked="checked">
            显示</label>
          <label class="radio">
            <input type="radio" name="hidden_group" value="1">
            隐藏</label>
        </div>
      <div class="control-group">
        <label class="control-label" for="sort">排列顺序</label>
        <div class="controls">
          <input type="text" name="sort" class="input-medium" id="sort" required="required" placeholder="255" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['sort'];?>
" />
        </div>
      </div>
      </div>
      <div class="button">
        <input class=" btn btn-primary btn-small" type="submit" value="提交" />
        <input class="btn btn-small" type="reset" value="重写" />
      </div>
    </fieldset>
  </form>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("mainfooter.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>