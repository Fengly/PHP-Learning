<?php if (!defined('THINK_PATH')) exit();?><script language="javascript">$(function(){
	var th = $(".top").height();
	th = 111-th
	var wh = $(window).height()-th;
	var cw = $(window).width()-177;
	$("#info").panel({
		//title:'信息統計',
		doSize:true,
		height:219,
		collapsible:true
	});
	whs = (wh-243);
	$("#ReportUserTabs").height(whs);
});

$(function(){ 
var $this = $(".renav"); 
var scrollTimer; 
$this.hover(function(){ 
clearInterval(scrollTimer); 
},function(){ 
scrollTimer = setInterval(function(){ 
scrollNews( $this ); 
}, 3800 ); 
}).trigger("mouseout"); 
}); 
function scrollNews(obj){ 
var $self = obj.find("ul:first"); 
var lineHeight = $self.find("li:first").height(); 
$self.animate({ "margin-top" : -lineHeight +"px" },600 , function(){ 
$self.css({"margin-top":"0px"}).find("li:first").appendTo($self); 
});
}

function toShowNotice(id){
	var has = $("#detailFormNotice").length;
	if(!has){
		$("<div/>").dialog({
			title:'公告详情',
			resizable:true,
			width:720,
			height:480,
			href:'__GROUP__/Notice/detail/id/'+id,
			onOpen:function(){
				cancel['NoticeDetail'] = $(this);
			},
			onClose:function(){
				$(this).dialog('destroy');
				cancel['NoticeDetail'] = null;
			}
		});
	}
}


function onCheckVer(){
	var url = 'http://'+window.location.host;
	var x = $.getJSON("http://server.piocms.com/dwuss/index.php/Admin/project/upload?callback=?",{mode:'Dream', serial:'<?php echo $serial ?>', ver:'<?php echo $ver[0] ?>' ,domain:url, key:'e1a111321d2cc0c2ba779e7ccd43994d'}, function(data){
		$.get('__URL__/upver');
		return;
	});
}
</script><div class="con"><div id="info" style="margin-bottom:5px; padding:3px;"><table class="infobox table-border linebox" width="100%" border="0" cellspacing="0" cellpadding="0"><tr style="height:25px;"><td colspan="2"><span class="vol up-font-over"><div class="renav_tit">公告：</div><div class="renav"><ul style="margin-top: 0px;"><?php if(is_array($ninfo)): foreach($ninfo as $key=>$t): ?><li><a href="javascript:toShowNotice('<?php echo ($t["id"]); ?>')"><?php echo ($t["title"]); ?>&nbsp;/&nbsp;<?php echo ($t["addtime"]); ?></a></li><?php endforeach; endif; ?></ul></div></span></td></tr><tr style="height:23px; line-height:23px;"><td height="28" class="rebg" colspan="2"><label>项目统计</label></td></tr><tr><td colspan="2"><span class="total_box"><div style="font-weight:bold; line-height:20px; font-size:19px; color:#F30;"><?php echo $app->getTotal('Project_table'); ?></div><div>总数量</div></span><?php
 foreach($pro_status as $k=>$t){ ?><span class="total_box"><div style="font-weight:bold; line-height:20px; font-size:19px; color:#5B83B9"><?php echo $app->getTotal('Project_table','`status`='.$t['id']); ?></div><div><?php echo ($t["text"]); ?></div></span><?php
 } ?></td></tr><!--<tr style="height:35px; line-height:35px;"><td colspan="2"><span style="margin-right:25px;">用户总数：<span class="up-font-over" style="font-weight:bold;"><?php echo $app->getTotal('User_table') ?></span></span><span style="margin-right:25px;">角色总数：<span class="up-font-over" style="font-weight:bold;"><?php echo $app->getTotal('User_group_table') ?></span></span><?php if(C('MORE_COMY')){ ?><span style="margin-right:25px;">子公司总数：<span class="up-font-over" style="font-weight:bold;"><?php echo $app->getTotal('User_company_table','type=0') ?></span></span><?php } ?><span style="margin-right:25px;">部门总数：<span class="up-font-over" style="font-weight:bold;"><?php echo $app->getTotal('User_part_table') ?></span></span><span style="margin-right:25px;">公告总数：<span class="up-font-over" style="font-weight:bold;"><?php echo $app->getTotal('Notice_table') ?></span></span><span style="margin-right:25px;">客户总数：<span class="up-font-over" style="font-weight:bold;"><?php echo $app->getTotal('User_company_table','type=1') ?></span></span></td></tr>--><tr style="height:23px; line-height:23px;"><td height="28" class="rebg" colspan="2"><label>程序团队</label></td></tr><tr style="height:23px; line-height:23px;"><td width="17%">主程序开发</td><td width="83%"><a href="http://www.d-winner.com/" target="_blank">梦赢科技</a>、<a href="http://www.95era.com/" target="_blank">九五时代</a></td></tr><tr style="height:23px; line-height:23px;"><td>QQ交流群</td><td><a href="http://shang.qq.com/wpa/qunwpa?idkey=4de623d1a4e4a0b640bdf76ad7bc9693653341d5490f9ab075e60f8c9467b654" target="_blank">286914596</a></td></tr><tr style="height:23px; line-height:23px;"><td>赞助商</td><td><a href="http://www.075595.com/" target="_blank">95数据中心</a></td></tr><tr style="height:23px; line-height:23px;"><td>特别鸣谢</td><td>ThinkPHP、EasyUI、Kindeditor、My97</td></tr></table></div><div id="ReportUserTabs" class="easyui-tabs"><div title="指派給我的BUG" data-options="href:'__GROUP__/Report/index/type/1',cache:false"></div><div title="我创建的BUG" data-options="href:'__GROUP__/Report/index/type/2',cache:false"></div><div title="我相关的BUG" data-options="href:'__GROUP__/Report/index/type/3',cache:false"></div></div><div align="center" style="line-height:21px; color:#A7A7A7;">Copyright © 2010-2015 程序由 <a style="line-height:21px; color:#A7A7A7;" href="http://www.95era.com/" target="_blank">九五时代</a> 设计开发 &nbsp; <span><a class="up-font-over" onclick="onCheckVer()" href="http://www.d-winner.com/html/download/dreamapp/" target="_blank">版本号：<?php echo ($ver["0"]); ?></a></span></div></div>