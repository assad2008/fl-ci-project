<?php /* Smarty version Smarty-3.1.13, created on 2013-02-25 13:51:09
         compiled from "application/views/templates/userindex.tpl" */ ?>
<?php /*%%SmartyHeaderCode:870749763512afbcd2f9985-35900763%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '68b600ac50a603f28031e9c40f581781993842be' => 
    array (
      0 => 'application/views/templates/userindex.tpl',
      1 => 1359737522,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '870749763512afbcd2f9985-35900763',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'base_url' => 0,
    'ur_here' => 0,
    'action_link' => 0,
    'userlist' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_512afbcd407a31_98216121',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_512afbcd407a31_98216121')) {function content_512afbcd407a31_98216121($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/data0/www/html/gonghui/shenji/application/libraries/smarty/libs/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("mainheader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
    <form method="get" action="" class="form-inline">
      <label for="">关键词：</label>
      <input type="text" name="option1" class="input-medium" />
          
      <input type="submit" value="搜索" class="btn" />
    </form>
  </div>
  <div class="table-body">
    <form name="listForm" onsubmit="return confirmSubmit(this)">
      <table class="table txtt" cellspacing="0">
        <thead>
          <tr>
            <th id="news-id">会员ID</th>
            <th id="app-id">BOSSID</th>
			<th id="level">登记</th>
            <th id="news-title">登录名称</th>
            <th id="news-type">Email</th>
            <th id="news-status">姓名</th>
            <th id="news-operating">创建时间</th>
			<th id="news-operating">状态</th>
			<th id="news-operating">操作</th>
          </tr>
        </thead>
        <tbody>
	<?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['userlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
$_smarty_tpl->tpl_vars['data']->_loop = true;
?>
    <tr class="add">
      <td><?php echo $_smarty_tpl->tpl_vars['data']->value['user_id'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['data']->value['boss_id'];?>
</td>
	  <td><?php if ($_smarty_tpl->tpl_vars['data']->value['level']==1){?>超级管理员<?php }elseif($_smarty_tpl->tpl_vars['data']->value['level']==2){?>普通管理员<?php }?></td>
      <td class="txt-left"><?php echo $_smarty_tpl->tpl_vars['data']->value['username'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['data']->value['email'];?>
</td>
	  <td><?php echo $_smarty_tpl->tpl_vars['data']->value['truename'];?>
</td>
	  <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['createtime'],'%Y-%m-%d %H:%M:%S');?>
</td>
      <td><?php if ($_smarty_tpl->tpl_vars['data']->value['status']==1){?>正常<?php }else{ ?><font color="red">禁止</font><?php }?></td>
      <td align="center">
          <?php if ($_smarty_tpl->tpl_vars['data']->value['status']==1){?><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
user/bandlogin/<?php echo $_smarty_tpl->tpl_vars['data']->value['user_id'];?>
" onclick="return confirm('确实要禁止登录吗？')" title="禁止登录">禁止</a><?php }else{ ?><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
user/unbandlogin/<?php echo $_smarty_tpl->tpl_vars['data']->value['user_id'];?>
" onclick="return confirm('确实要允许登录吗？')" title="允许登录">允许</a><?php }?>&nbsp;&nbsp;<a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
user/right/<?php echo $_smarty_tpl->tpl_vars['data']->value['user_id'];?>
">权限</a></td>
    </tr>
	<?php } ?>
        </tbody>
      </table>
    </form>
  </div>
<?php echo $_smarty_tpl->getSubTemplate ("mainfooter.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>