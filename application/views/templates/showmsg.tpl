<{include file="mainheader.tpl"}>
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
  <p><{$msg}></p>
  <p class="relative"><a href="<{$base_url}><{$gourl}>">返回<span></span></a></p>
  <p class="relative"><a href="#">回到首页<span></span></a></p>
</div>
<{include file="mainfooter.tpl"}>
