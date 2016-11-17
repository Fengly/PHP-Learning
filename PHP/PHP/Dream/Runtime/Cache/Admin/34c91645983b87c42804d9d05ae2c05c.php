<?php if (!defined('THINK_PATH')) exit();?><script language="javascript">var se = Array();
$(function(){
	var th = $(".top").height();
	th = 111-th
	var wh = $(window).height()-th;
	var cw = $(window).width()-177;
	whs = (wh-282);
	var pr = '<?php echo $page_row ?>';
	var pn = false;
	var ch = $("body").height();
	if(pr>0){
		pn = true;
	}
	
	$("#Reports<?php echo ($uniqid); ?>").datagrid({
		height:whs,
		autoRowHeight:false,
		singleSelect:true,
		striped:true,
		rownumbers:true,
		pagination:pn,
		showFooter:true,
		prototype:true,
		sortName:'t1_new_priority',
		sortOrder:'desc',
		pageSize:30,
		pageList:[10,30,50,80,100,100000000000],
		method:'get',
		url:'__GROUP__/Report/index/json/1/type/<?php echo ($type); ?>',
		fitColumns:false,
		nowrap:Number('<?php echo (C("DATA_NOWRAP")); ?>'),
		selectOnCheck:false,
		checkOnSelect:true,
		onBeforeLoad: function(){  
			if($("#ReportListDetail<?php echo ($uniqid); ?> .datagrid-toolbar table tr #sersSearchReport<?php echo ($uniqid); ?>").length==0){
				 var grid = $("#ReportListDetail<?php echo ($uniqid); ?> .datagrid-toolbar table tr");  
				 var date = '<td>'+$("#selectInputReport<?php echo ($uniqid); ?>").html()+'</td>';    
				 grid.prepend(date);
				 
				 $("#sersSearchReport<?php echo ($uniqid); ?>").combobox({
					url:'__GROUP__/project/getProject/act/json/mode/1',
					editable:true,
					method:'get',
					valueField:'id',
					textField:'text',
					filter: function(q,r){
						var opts = $(this).combobox('options');
						var v = r[opts.textField];
						var vu = v.toUpperCase();
						var vp = String(getPinYin(v));
						var qp = q.toUpperCase();
						if(vp.indexOf(qp)>=0 || vu.indexOf(qp) >= 0){
							return r[opts.textField];
						}
					}
				 }); 
				 //alert(se['year']);
				 $("#searchYear<?php echo ($uniqid); ?>").val(se['year']);
				 $("#searchMonth<?php echo ($uniqid); ?>").val(se['month']);
				 $("#searchType<?php echo ($uniqid); ?>").val(se['type']);
				 $("#searchStatus<?php echo ($uniqid); ?>").val(se['status']);
				 $("#searchLevel<?php echo ($uniqid); ?>").val(se['level']);
				 $("#searchPriority<?php echo ($uniqid); ?>").val(se['priority']);
				 $("#searchHertz<?php echo ($uniqid); ?>").val(se['hertz']);
				 $("#sersSearchReport<?php echo ($uniqid); ?>").combobox('setValue',se['pro_id']);
			 }
		},
		onDblClickRow:function(e,rowIndex,rowData){
			//var se = $(this).datagrid('getSelected');
			var se = $("#Reports<?php echo ($uniqid); ?>").datagrid('getChecked');
			var se_len = se.length;
			var idd = se[0]['id'];
			if(se_len==1){
				$("<div/>").dialog({
					title:'BUG详情',
					resizable:true,
					width:960,
					height:ch-80,
					href:'__GROUP__/Report/detail/id/'+idd,
					onOpen:function(){
						cancel['ReportDetail'] = $(this);
					},
					onClose:function(){
						//$("#Bug").datagrid('reload');
						$(this).dialog('destroy');
						cancel['ReportDetail'] = null;
					}
				});
			}
		},
		onUncheck:function(i,d){
			$("#Reports<?php echo ($uniqid); ?>").datagrid('unselectRow',i);
		},
		toolbar:[{
			iconCls: 'icon-reload',
			text : '重载',
			handler: function(){
				$.get('__GROUP__/Report/clear', function(data){
					$("#searchYear<?php echo ($uniqid); ?>").val(0);
				 	$("#searchMonth<?php echo ($uniqid); ?>").val(0);
				 	$("#searchType<?php echo ($uniqid); ?>").val(0);
					$("#searchStatus<?php echo ($uniqid); ?>").val(0);
					$("#searchLevel<?php echo ($uniqid); ?>").val(0);
				 	$("#searchPriority<?php echo ($uniqid); ?>").val(0);
				 	$("#searchHertz<?php echo ($uniqid); ?>").val(0);
				 	$("#sersSearchReport<?php echo ($uniqid); ?>").combobox('setValue',0);
					$("#Reports<?php echo ($uniqid); ?>").datagrid('reload');
				});
			}
		}],
		frozenColumns:[[
			{checkbox:true},
			{field:'bugno',title:'问题编号',width:83,sortable:true}
		]],
		columns:[[  
			{field:'title',title:'摘要',width:320},
			{field:'t1_old_user_id',title:'指派给',width:55,sortable:true},
			{field:'t1_new_type',title:'出现位置',width:100,sortable:true},
			{field:'t1_new_level',title:'严重性',width:55,sortable:true},
			{field:'t1_new_hertz',title:'频率',width:60,sortable:true},
			{field:'t1_new_priority',title:'优先级',width:55,sortable:true},
			{field:'t1_new_status',title:'状态',width:75,sortable:true},
			{field:'proname',title:'所属项目',width:190,sortable:true},
			{field:'creatorname',title:'提交人',width:55,sortable:true},
			{field:'addtime',title:'提交日期',width:150,sortable:true}
		]]
	});
});

function toReportSearch(idd){
	$.messager.progress();
	var datas = $("#searchForm"+idd).serializeArray();
	se['year'] = datas[0]['value'];
	se['month'] = datas[1]['value'];
	se['status'] = datas[2]['value'];
	se['level'] = datas[3]['value'];
	se['type'] = datas[4]['value'];
	se['hertz'] = datas[5]['value'];
	se['priority'] = datas[6]['value'];
	se['pro_id'] = datas[7]['value'];
	$.post('__URL__/search',datas,function(data){
		$("#Reports<?php echo ($uniqid); ?>").datagrid('reload');
		
	});
	$.messager.progress('close');
}
</script><div class="con" id="ReportListDetail<?php echo ($uniqid); ?>" style="-moz-user-select:none;" onselectstart="return false;"><form id="searchForm<?php echo ($uniqid); ?>"><table id="Reports<?php echo ($uniqid); ?>"></table></form></div><div id="selectInputReport<?php echo ($uniqid); ?>" style="display:none"><span style="margin-right:3px;"></span><select id="searchYear<?php echo ($uniqid); ?>" name="year"><option value="0" <?php echo ($selected); ?>>不限年份</option><?php if(is_array($year)): foreach($year as $key=>$t): ?><option value="<?php echo ($t); ?>"><?php echo ($t); ?>年</option><?php endforeach; endif; ?></select><span style="">/</span><select id="searchMonth<?php echo ($uniqid); ?>" name="month"><option value="0" <?php echo ($selected); ?>>不限月份</option><option value="01" <?php echo ($selected); ?>>01月</option><option value="02" <?php echo ($selected); ?>>02月</option><option value="03" <?php echo ($selected); ?>>03月</option><option value="04" <?php echo ($selected); ?>>04月</option><option value="05" <?php echo ($selected); ?>>05月</option><option value="06" <?php echo ($selected); ?>>06月</option><option value="07" <?php echo ($selected); ?>>07月</option><option value="08" <?php echo ($selected); ?>>08月</option><option value="09" <?php echo ($selected); ?>>09月</option><option value="10" <?php echo ($selected); ?>>10月</option><option value="11" <?php echo ($selected); ?>>11月</option><option value="12" <?php echo ($selected); ?>>12月</option></select><select id="searchStatus<?php echo ($uniqid); ?>" name="status"><option value="0" <?php echo ($selected); ?>>状态</option><?php if(is_array($status)): foreach($status as $key=>$t): ?><option value="<?php echo ($t["id"]); ?>"><?php echo ($t["text"]); ?></option><?php endforeach; endif; ?></select><select id="searchLevel<?php echo ($uniqid); ?>" name="level"><option value="0" <?php echo ($selected); ?>>严重性</option><?php if(is_array($level)): foreach($level as $key=>$t): ?><option value="<?php echo ($t["id"]); ?>"><?php echo ($t["text"]); ?></option><?php endforeach; endif; ?></select><select id="searchType<?php echo ($uniqid); ?>" name="type"><option value="0" <?php echo ($selected); ?>>出现位置</option><?php if(is_array($types)): foreach($types as $key=>$t): ?><option value="<?php echo ($t["id"]); ?>"><?php echo ($t["text"]); ?></option><?php endforeach; endif; ?></select><select id="searchHertz<?php echo ($uniqid); ?>" name="hertz"><option value="0" <?php echo ($selected); ?>>频率</option><?php if(is_array($hertz)): foreach($hertz as $key=>$t): ?><option value="<?php echo ($t["id"]); ?>"><?php echo ($t["text"]); ?></option><?php endforeach; endif; ?></select><select id="searchPriority<?php echo ($uniqid); ?>" name="priority"><option value="0" <?php echo ($selected); ?>>优先级</option><?php if(is_array($priority)): foreach($priority as $key=>$t): ?><option value="<?php echo ($t["id"]); ?>"><?php echo ($t["text"]); ?></option><?php endforeach; endif; ?></select><input id="sersSearchReport<?php echo ($uniqid); ?>" style="width:190px;" name="pid" /><a href="javascript:void(0);" onclick="javascript:toReportSearch('<?php echo ($uniqid); ?>')" class="easyui-linkbutton" style="margin:0 2px 0 2px;">搜索</a><span class="datagrid-btn-separator-nofloat" style="margin-right:2px;"></span></div>