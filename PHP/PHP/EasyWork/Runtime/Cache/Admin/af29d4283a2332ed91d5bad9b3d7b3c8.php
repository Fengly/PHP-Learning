<?php if (!defined('THINK_PATH')) exit();?><script language="javascript">$(function(){
	var th = $(".top").height();
	th = 111-th;
	var wh = $(window).height()-th;
	var cw = $("#LogCon").width();
	var ch = $("body").height();
	var pr = '<?php echo $page_row ?>';
	var pn = false;
	if(pr>0){
		pn = true;
	}
	$("#Log").datagrid({	
		height:wh,
		autoRowHeight:false,
		singleSelect:true,
		striped:true,
		rownumbers:true,
		pagination:pn,
		pageSize:pr,
		pageList:[30,50,80,100,1000],
		method:'get',
		sortName:'addtime',
		sortOrder:'desc',
		url:'__ACTION__/json/1',
		fitColumns:true,
		nowrap:Number('<?php echo (C("DATA_NOWRAP")); ?>'),
		onBeforeLoad: function () {  
			
		},
		onDblClickRow:function(e,rowIndex,rowData){
			var se = $(this).datagrid('getSelected');
			var idd = se['id'];
			getDetailLog(idd);
		},
		columns:[[   
			{field:'title',title:'动态',width:380},
			{field:'usages',title:'耗时',width:60},   
			{field:'status',title:'状态',width:90},
			{field:'proname',title:'所属项目',width:180},
			{field:'addtime',title:'更新于',width:140}
		]]
	});
	
	 var dataview = '<?php echo C("DATAGRID_VIEW") ?>';
	 if(dataview!='0'){
		var pager = $('#Log').datagrid('getPager');
		pager.pagination({
			layout: 'list,sep,first,prev,sep,manual,sep,next,last,sep,refresh',
			displayMsg: '共{total}记录'
		});
	 }
});

function getDetailLog(id){
	var isform = $(".add-logdetail").length;
	if(!isform){
		$("<div/>").dialog({
			title:'操作日志详情',
			resizable:true,
			width:520,
			height:306,
			href:'__URL__/logdetail/id/'+id,
			onOpen:function(){
				cancel['Logdetail'] = $(this);
			},
			onClose:function(){
				cancel['Logdetail'].dialog('destroy');
				cancel['Logdetail'] = null;
			}
		});
	}
}
</script><div class="con" id="LogCon" onselectstart="return false;" style="-moz-user-select:none;"><?php if(C('DATAGRID_VIEW')!='0'){ ?><table id="Log" data-options="view:<?php echo C("DATAGRID_VIEW") ?>"></table><?php }else{ ?><table id="Log"></table><?php } ?></div><div id="searchLog"></div><div id="addLog"></div><div id="selectInputLog" style="display:none"><span class="datagrid-btn-separator-nofloat"  style="margin-right:2px;"></span><input id="sersSearchLog" style="width:100px; margin-left:3px" /></div>