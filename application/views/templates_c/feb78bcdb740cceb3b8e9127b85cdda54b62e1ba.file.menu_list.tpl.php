<?php /* Smarty version Smarty-3.1.13, created on 2013-02-25 13:50:04
         compiled from "application/views/templates/menu_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:221640501512afb8cd6ea65-84348322%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'feb78bcdb740cceb3b8e9127b85cdda54b62e1ba' => 
    array (
      0 => 'application/views/templates/menu_list.tpl',
      1 => 1358935895,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '221640501512afb8cd6ea65-84348322',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'base_url' => 0,
    'ur_here' => 0,
    'action_link' => 0,
    'txt_menu_name' => 0,
    'data_list' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_512afb8ce502b2_95044802',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_512afb8ce502b2_95044802')) {function content_512afb8ce502b2_95044802($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("mainheader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="wrap"> 
  <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
static/js/jquery.dataTables.js">
</script> 
  <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
static/js/index.js"></script> 
  <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
static/js/ftrendstat.js"></script> 
  <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
static/js/date.js"></script> 
  <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
static/js/My97DatePicker/WdatePicker.js"></script>
  <div class="title"><strong class="l"><?php echo $_smarty_tpl->tpl_vars['ur_here']->value;?>
</strong> <?php if ($_smarty_tpl->tpl_vars['action_link']->value){?><span class="relative r"> <a class="buttons4" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['action_link']->value['link'];?>
"><font><?php echo $_smarty_tpl->tpl_vars['action_link']->value['text'];?>
</font></a></span><?php }else{ ?><span class="relative r"></span> <?php }?></div>
  <div class="oper">
    <form action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
menu/select" method="post" class="form-inline">
      <label for="">菜单名称</label>
      <input type="text" name="txt_menu_name" id="txt_menu_name" class="input-medium" value="<?php echo $_smarty_tpl->tpl_vars['txt_menu_name']->value;?>
"/>
      <input type="submit" value="搜索" class="btn" />
    </form>
  </div>
  <div class="table-body">
    <form name="listForm" onsubmit="return confirmSubmit(this)">
      <table class="table txtt" cellspacing="0">
        <thead>
          <tr>
            <th id="news-id">菜单ID</th>
            <th id="app-id">菜单名称</th>
            <th id="news-title">父ID</th>
            <th id="news-type">链接</th>
            <th id="news-author">隐藏</th>
            <th id="news-access">状态</th>
            <th id="news-time">排列顺序</th>
            <th id="news-status">是否删除</th>
            <th id="news-operating">操作</th>
          </tr>
        </thead>
     <tbody>
	<?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
$_smarty_tpl->tpl_vars['data']->_loop = true;
?>
    <tr class="add">
      <td><?php echo $_smarty_tpl->tpl_vars['data']->value['menu_id'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['data']->value['menu_name'];?>
</td>
      <td class="txt-left"><?php echo $_smarty_tpl->tpl_vars['data']->value['parent_id'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['data']->value['url'];?>
</td>
      <td><?php if ($_smarty_tpl->tpl_vars['data']->value['hidden']=='1'){?><font>是</font><?php }else{ ?><font>否</font><?php }?></td>
      <td><?php if ($_smarty_tpl->tpl_vars['data']->value['status']=='1'){?><font>正常</font><?php }?></td>
      <td><?php echo $_smarty_tpl->tpl_vars['data']->value['sort'];?>
</td>
      <td><?php if ($_smarty_tpl->tpl_vars['data']->value['is_del']=='1'){?><font color="red">删除</font><?php }else{ ?><font>正常</font><?php }?></td>
      <td align="center">
		  <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
menu/edit/<?php echo $_smarty_tpl->tpl_vars['data']->value['menu_id'];?>
" title="编辑">编辑</a></li>
         <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
menu/delete/<?php echo $_smarty_tpl->tpl_vars['data']->value['menu_id'];?>
" onclick="return confirm('确实要删除吗？')" title="删除">删除</a>
		 </td>
    </tr>
	<?php } ?>
     </tbody>
    </table>
    </form>
  </div>
<?php echo $_smarty_tpl->getSubTemplate ("mainfooter.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>