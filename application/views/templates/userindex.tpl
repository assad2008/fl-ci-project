<{include file="mainheader.tpl"}>
<div class="wrap"> 
  <script type="text/javascript" src="<{$base_url}>static/js/jquery.dataTables.js">
</script> 
  <script type="text/javascript" src="<{$base_url}>static/js/index.js"></script> 
  <script type="text/javascript" src="<{$base_url}>static/js/ftrendstat.js"></script> 
  <script type="text/javascript" src="<{$base_url}>static/js/date.js"></script> 
  <script type="text/javascript" src="<{$base_url}>static/js/My97DatePicker/WdatePicker.js"></script>
  <div class="title"><strong class="l"><{$ur_here}></strong> <{if $action_link}><span class="relative r"> <a class="buttons4" href="<{$base_url}><{$action_link.link}>"><font><{$action_link.text}></font></a></span><{else}><span class="relative r"></span> <{/if}></div>
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
	<{foreach from=$userlist item=data}>
    <tr class="add">
      <td><{$data.user_id}></td>
      <td><{$data.boss_id}></td>
	  <td><{if $data.level == 1}>超级管理员<{elseif $data.level == 2}>普通管理员<{/if}></td>
      <td class="txt-left"><{$data.username}></td>
      <td><{$data.email}></td>
	  <td><{$data.truename}></td>
	  <td><{$data.createtime|date_format:'%Y-%m-%d %H:%M:%S'}></td>
      <td><{if $data.status == 1}>正常<{else}><font color="red">禁止</font><{/if}></td>
      <td align="center">
          <{if $data.status == 1}><a href="<{$base_url}>user/bandlogin/<{$data.user_id}>" onclick="return confirm('确实要禁止登录吗？')" title="禁止登录">禁止</a><{else}><a href="<{$base_url}>user/unbandlogin/<{$data.user_id}>" onclick="return confirm('确实要允许登录吗？')" title="允许登录">允许</a><{/if}>&nbsp;&nbsp;<a href="<{$base_url}>user/right/<{$data.user_id}>">权限</a></td>
    </tr>
	<{/foreach}>
        </tbody>
      </table>
    </form>
  </div>
<{include file="mainfooter.tpl"}>