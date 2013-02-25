
/* $Id: listtable.js 14980 2008-10-22 05:01:19Z testyang $ */
var listTable = new Object;
listTable.query = "query";
listTable.filter = new Object;
listTable.url = location.href.lastIndexOf("?") == -1 ? location.href.substring((location.href.lastIndexOf("/")) + 1) : location.href.substring((location.href.lastIndexOf("/")) + 1, location.href.lastIndexOf("?"));
listTable.url += "?c=ajaxdo";
/**
* ����һ���ɱ༭��
*/
listTable.edit = function(obj, act, id)
{
var tag = obj.firstChild.tagName;
if (typeof(tag) != "undefined" && tag.toLowerCase() == "input")
{
return;
}
/* ����ԭʼ������ */
var org = obj.innerHTML;
var val = Browser.isIE ? obj.innerText : obj.textContent;
/* ����һ������� */
var txt = document.createElement("INPUT");
txt.value = (val == 'N/A') ? '' : val;
txt.style.width = (obj.offsetWidth + 12) + "px" ;
/* ���ض����е����ݣ������������뵽������ */
obj.innerHTML = "";
obj.appendChild(txt);
txt.focus();
/* �༭�������¼������� */
txt.onkeypress = function(e)
{
var evt = Utils.fixEvent(e);
var obj = Utils.srcElement(e);
if (evt.keyCode == 13)
{
obj.blur();
return false;
}
if (evt.keyCode == 27)
{
obj.parentNode.innerHTML = org;
}
}
/* �༭��ʧȥ����Ĵ����� */
txt.onblur = function(e)
{
if (Utils.trim(txt.value).length > 0)
{
res = Ajax.call(listTable.url, "a="+act+"&val=" + encodeURIComponent(Utils.trim(txt.value)) + "&id=" +id, null, "GET", "JSON", false);
if (res.message)
{
alert(res.message);
}
obj.innerHTML = (res.error == 0) ? res.content : org;
}
else
{
obj.innerHTML = org;
}
}
}
/**
* �л�״̬
*/
listTable.toggle = function(obj, act, id)
{
var val = (obj.src.match(/yes.gif/i)) ? 0 : 1;
var res = Ajax.call(this.url, "act="+act+"&val=" + val + "&id=" +id, null, "POST", "JSON", false);
if (res.message)
{
alert(res.message);
}
if (res.error == 0)
{
obj.src = (res.content > 0) ? './static/images/yes.gif' : './static/images/no.gif';
}
}
/**
* �л�����ʽ
*/
listTable.sort = function(sort_by, sort_order)
{
var args = "act="+this.query+"&sort_by="+sort_by+"&sort_order=";
if (this.filter.sort_by == sort_by)
{
args += this.filter.sort_order == "DESC" ? "ASC" : "DESC";
}
else
{
args += "DESC";
}
for (var i in this.filter)
{
if (typeof(this.filter[i]) != "function" &&
i != "sort_order" && i != "sort_by" && !Utils.isEmpty(this.filter[i]))
{
args += "&" + i + "=" + this.filter[i];
}
}
this.filter['page_size'] = this.getPageSize();
Ajax.call(this.url, args, this.listCallback, "POST", "JSON");
}
/**
* ��ҳ
*/
listTable.gotoPage = function(page)
{
if (page != null) this.filter['page'] = page;
if (this.filter['page'] > this.pageCount) this.filter['page'] = 1;
this.filter['page_size'] = this.getPageSize();
this.loadList();
}
/**
* �����б�
*/
listTable.loadList = function()
{
var args = "a="+this.query+"" + this.compileFilter();
Ajax.call(this.url, args, this.listCallback, "POST", "JSON");
}
/**
* ɾ���б��е�һ����¼
*/
listTable.remove = function(id, cfm, opt)
{
if (opt == null)
{
opt = "remove";
}
if (confirm(cfm))
{
var args = "a=" + opt + "&id=" + id + this.compileFilter();
Ajax.call(this.url, args, this.listCallback, "GET", "JSON");
}
}
listTable.forumremove = function(id, fid, cfm, opt)
{
if (opt == null)
{
opt = "remove";
}
if (confirm(cfm))
{
var args = "a=" + opt + "&id=" + id + "&fid=" + fid + this.compileFilter();
Ajax.call(this.url, args, this.listCallback, "GET", "JSON");
}
}
listTable.loadfid = function(id,opt)
{
var args = "a=" + opt + "&id=" + id + this.compileFilter();
Ajax.call(this.url, args, this.listCallback, "GET", "JSON");
}
//����״̬
listTable.changestatus = function(id, cfm, opt)
{
if (opt == null)
{
return null;
}
if (confirm(cfm))
{
var args = "a=" + opt + "&id=" + id + this.compileFilter();
Ajax.call(this.url, args, this.listCallback, "GET", "JSON");
}
}
listTable.gotoPageFirst = function()
{
if (this.filter.page > 1)
{
listTable.gotoPage(1);
}
}
listTable.gotoPagePrev = function()
{
if (this.filter.page > 1)
{
listTable.gotoPage(this.filter.page - 1);
}
}
listTable.gotoPageNext = function()
{
if (this.filter.page < listTable.pageCount)
{
listTable.gotoPage(parseInt(this.filter.page) + 1);
}
}
listTable.gotoPageLast = function()
{
if (this.filter.page < listTable.pageCount)
{
listTable.gotoPage(listTable.pageCount);
}
}
listTable.changePageSize = function(e)
{
var evt = Utils.fixEvent(e);
if (evt.keyCode == 13)
{
listTable.gotoPage();
return false;
};
}
listTable.listCallback = function(result, txt)
{
if (result.error > 0)
{
alert(result.message);
}
else
{
try
{
document.getElementById('listDiv').innerHTML = result.content;
if (typeof result.filter == "object")
{
listTable.filter = result.filter;
}
listTable.pageCount = result.page_count;
}
catch (e)
{
alert(e.message);
}
}
}
listTable.selectAll = function(obj, chk)
{
if (chk == null)
{
chk = 'checkboxes';
}
var elems = obj.form.getElementsByTagName("input");
for (var i=0; i < elems.length; i++)
{
if (elems[i].name == chk || elems[i].name == chk + "[]")
{
elems[i].checked = obj.checked;
}
}
}
listTable.compileFilter = function()
{
var args = '';
for (var i in this.filter)
{
if (typeof(this.filter[i]) != "function" && typeof(this.filter[i]) != "undefined")
{
args += "&" + i + "=" + encodeURIComponent(this.filter[i]);
}
}
return args;
}
listTable.getPageSize = function()
{
var ps = 15;
pageSize = document.getElementById("pageSize");
if (pageSize)
{
ps = Utils.isInt(pageSize.value) ? pageSize.value : 15;
document.cookie = "ECSCP[page_size]=" + ps + ";";
}
}
listTable.addRow = function(checkFunc)
{
cleanWhitespace(document.getElementById("listDiv"));
var table = document.getElementById("listDiv").childNodes[0];
var firstRow = table.rows[0];
var newRow = table.insertRow(-1);
newRow.align = "center";
var items = new Object();
for(var i=0; i < firstRow.cells.length;i++) {
var cel = firstRow.cells[i];
var celName = cel.getAttribute("name");
var newCel = newRow.insertCell(-1);
if (!cel.getAttribute("ReadOnly") && cel.getAttribute("Type")=="TextBox")
{
items[celName] = document.createElement("input");
items[celName].type = "text";
items[celName].style.width = "50px";
items[celName].onkeypress = function(e)
{
var evt = Utils.fixEvent(e);
var obj = Utils.srcElement(e);
if (evt.keyCode == 13)
{
listTable.saveFunc();
}
}
newCel.appendChild(items[celName]);
}
if (cel.getAttribute("Type") == "Button")
{
var saveBtn = document.createElement("input");
saveBtn.type = "image";
saveBtn.src = "./images/icon_add.gif";
saveBtn.value = save;
newCel.appendChild(saveBtn);
this.saveFunc = function()
{
if (checkFunc)
{
if (!checkFunc(items))
{
return false;
}
}
var str = "act=add";
for(var key in items)
{
if (typeof(items[key]) != "function")
{
str += "&" + key + "=" + items[key].value;
}
}
res = Ajax.call(listTable.url, str, null, "POST", "JSON", false);
if (res.error)
{
alert(res.message);
table.deleteRow(table.rows.length-1);
items = null;
}
else
{
document.getElementById("listDiv").innerHTML = res.content;
if (document.getElementById("listDiv").childNodes[0].rows.length < 6)
{
listTable.addRow(checkFunc);
}
items = null;
}
}
saveBtn.onclick = this.saveFunc;
//var delBtn = document.createElement("input");
//delBtn.type = "image";
//delBtn.src = "./images/no.gif";
//delBtn.value = cancel;
//newCel.appendChild(delBtn);
}
}
} 