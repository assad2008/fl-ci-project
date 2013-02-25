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
    <form action="<{$base_url}>menu/select" method="post" class="form-inline">
      <label for="">菜单名称</label>
      <input type="text" name="txt_menu_name" id="txt_menu_name" class="input-medium" value="<{$txt_menu_name}>"/>
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
	<{foreach from=$data_list item=data}>
    <tr class="add">
      <td><{$data.menu_id}></td>
      <td><{$data.menu_name}></td>
      <td class="txt-left"><{$data.parent_id}></td>
      <td><{$data.url}></td>
      <td><{if $data.hidden == '1'}><font>是</font><{else}><font>否</font><{/if}></td>
      <td><{if $data.status == '1'}><font>正常</font><{/if}></td>
      <td><{$data.sort}></td>
      <td><{if $data.is_del == '1'}><font color="red">删除</font><{else}><font>正常</font><{/if}></td>
      <td align="center">
		  <a href="<{$base_url}>menu/edit/<{$data.menu_id}>" title="编辑">编辑</a></li>
         <a href="<{$base_url}>menu/delete/<{$data.menu_id}>" onclick="return confirm('确实要删除吗？')" title="删除">删除</a>
		 </td>
    </tr>
	<{/foreach}>
     </tbody>
    </table>
    </form>
  </div>
<{include file="mainfooter.tpl"}>