<?php if (!defined('THINK_PATH')) exit();?><script language="javascript">$(function(){
	var th = $(".top").height();
	th = 111-th;
	var wh = $(window).height()-th;
	var cw = $(window).width()-177;
	whs = wh/2-52;
	$("#newpro").panel({
		height:wh,
		width:cw,
		border:false,
		headerCls:'panel-main-header',
		href:'__URL__/myview/json/1',
	});
	
	$("#rightTabs").tabs({
		onClose:function(t,i){
			$.ajaxSetup({  
				async : false  
			});
			if(t=='最新跟进'){
				$.get('__URL__/clear/act/view', function(data){});
			}	
			$.ajaxSetup({  
				async : true  
			});
		}
	});
	
	$("#rightTabs").tabs('select','最新跟进');
});
</script><div class="con" id="ViewCon"><div id="newpro"></div></div>