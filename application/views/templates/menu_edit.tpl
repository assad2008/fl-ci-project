<{include file="mainheader.tpl"}>
<div class="wrap">
  <div class="title"><strong class="l"><{$ur_here}></strong> <{if $action_link}><span class="relative r"> <a class="buttons4" href="<{$base_url}><{$action_link.link}>"><font><{$action_link.text}></font></a></span><{else}><span class="relative r"></span> <{/if}></div>
  <form class="form form-horizontal" action="<{$base_url}>menu/update" name="dataform" method="post" >
    <fieldset>
      <div class="control-group">
        <label class="control-label" for="menu_name">菜单名称</label>
        <div class="controls">
		  <input type="hidden" name="menu_id" id="menu_id" value="<{$data.menu_id}>">
          <input type="text" name="menu_name" class="input-medium" id="menu_name" required="required" value="<{$data.menu_name}>" />
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="sel">父ID</label>
        <div class="controls">
          <select name="parent_id" class="input-medium">
	      <option value="0">无父ID</option>
	      <{foreach key="key" item="menu_ids" from=$menu_id_List}>
            <option value="<{$menu_ids.menu_id}>"<{if $data.parent_id == $menu_ids.menu_id}> selected="selected"<{/if}>><{$menu_ids.menu_id}>:<{$menu_ids.menu_name}></option>
		  <{/foreach}>
          </select>
        </div>
      </div>
      <div class="control-group" <{if !($is_menu_level3)}> style="display:none"<{/if}>>
      	<label class="control-label" for="url">链接地址</label>
        <div class="controls">
        	<input type="text" name="url" class="input-medium" id="url" value="<{$data.url}>" <{if ($is_menu_level3)}> required="required"<{/if}>/>
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
          <input type="text" name="sort" class="input-medium" id="sort" required="required" placeholder="255" value="<{$data.sort}>" />
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
<{include file="mainfooter.tpl"}>