<?php if (!defined('THINK_PATH')) exit();?><script language="javascript">$(function(){
	var cw = $("#BusinessCon").width();
	var th = $(".top").height();
	th = 111-th;
	var wh = $(window).height()-th;
	var ch = $("body").height();
	var pr = '<?php echo $page_row ?>';
	var pn = false;
	var tit = '';
	if(pr>0){
		pn = true;
	}
	$("#Business").datagrid({
		//title:'出差日志',	
		height:wh,
		autoRowHeight:false,
		singleSelect:true,
		striped:true,
		rownumbers:true,
		pagination:pn,
		showFooter:true,
		prototype:true,
		pageSize:pr,
		sortName:'t1_new_status',
		sortOrder:'asc',
		pageList:[30,50,80,100,100000000000],
		method:'get',
		url:'__ACTION__/json/1',
		fitColumns:Number('<?php echo (C("DG_FIT_COLUMNS")); ?>'),
		nowrap:Number('<?php echo (C("DATA_NOWRAP")); ?>'),
		selectOnCheck:false,
		checkOnSelect:true,
		onBeforeLoad: function(){  
			 if($("#BusinessCon .datagrid-toolbar table tr #sersSearchBusiness").length==0){
				 var grid = $("#BusinessCon .datagrid-toolbar table tr");  
				 var date = '<td>'+$("#selectInputBusiness").html()+'</td>';    
				 grid.append(date); 
				 $("#sersSearchBusiness").change(function(){
					var idd = $(this).val();
					$.post('__URL__/change/act/status', {val:idd}, function(data){
						$("#Business").datagrid('reload');
					});
				}); 
				
				$("#sersSearchDate").change(function(){
					var idd = $(this).val();
					$.post('__URL__/change/act/daily_date', {val:idd}, function(data){
						$("#Business").datagrid('reload');
					});
				}); 
				
				$('#BusinessSearch').searchbox({   
					searcher:function(value,name){
						$.post('__URL__/change/act/'+name+'/mode/like', {val:value}, function(data){
							$("#Business").datagrid('reload');
						});
					},   
					menu:'#BusinessSearchSon',   
					prompt:'请输入关键字'  
				 });
			 }
		},
		onDblClickRow:function(e,rowIndex,rowData){
			//var se = $(this).datagrid('getSelected');
			var se = $("#Business").datagrid('getChecked');
			var se_len = se.length;
			var idd = se[0]['id'];
			if(se_len==1){
				$("<div/>").dialog({
					title:'出差详情',
					resizable:true,
					width:885,
					height:ch-80,
					href:'__URL__/detail/id/'+idd,
					onOpen:function(){
						cancel['BusinessDetail'] = $(this);
					},
					onClose:function(){
						//$("#Business").datagrid('reload');
						$(this).dialog('destroy');
						cancel['BusinessDetail'] = null;
					}
				});
			}
		},
		onUncheck:function(i,d){
			$("#Business").datagrid('unselectRow',i);
		},
		toolbar:[{
		iconCls: 'icon-add',
			text : '新增',
			handler: function(){
				$("#addBusiness").dialog({
					title:'新增出差',
					resizable:true,
					width:885,
					height:ch-80,
					href:'__URL__/add/act/add',
					onOpen:function(){
						cancel['Business'] = $(this);
					},
					onClose:function(){
						//$(this).dialog('destroy');
						//$("#Business").datagrid('reload');
						cancel['Business'] = null;
					}
				});
			}
		},'-',{
			iconCls: 'icon-edit',
			text : '编辑',
			handler: function(){
				//var se = $("#Business").datagrid('getSelected');
				var se = $("#Business").datagrid('getChecked');
				var se_len = se.length;
				var idd = se[0]['id'];
				if(se_len==1){
					$("#addBusiness").dialog({
						title:'编辑出差',
						resizable:true,
						width:885,
						height:ch-80,
						href:'__URL__/add/act/edit/id/'+idd,
						onOpen:function(){
							cancel['Business'] = $(this);
						},
						onClose:function(){
							//$(this).dialog('destroy');
							//$("#Business").datagrid('reload');
							cancel['Business'] = null;
						}
					});
				}else if(se_len>1){
					$.messager.alert('提示','不能同时编辑两行数据！','warning');
				}
			}
		},'-',{
			iconCls: 'icon-cancel',
			text : '删除',
			handler: function(){
				var se = $("#Business").datagrid('getChecked');
				var s = "";  
				for (var property in se) {  
					s = s + se[property]['id']+',' ;  
				}
				if(s){
					$.messager.confirm('提示','确定删除吗！',function(r){
						if(r==true){
							$.messager.progress();
							$.post('__URL__/del',{id:s}, function(data){
								$.messager.progress('close');
								if(data==1){
									$.messager.alert('提示','删除数据成功！','info',function(){
										$("#Business").datagrid('reload');
									});
								}else if(data==0){
									$.messager.alert('提示','删除数据失败！','warning');
								}else if(data==2){
									$.messager.alert('提示','只能删除自己所新增的数据！','warning');
								}else{
									$.messager.alert('提示','您没有删除权限','warning');
								}
							});
						}
					});
				}
			}
		},'-',{
			iconCls: 'icon-search',
			text : '高级搜索',
			handler: function(){
				$("#searchBusiness").dialog({
					title:'高级搜索',
					resizable:true,
					width:500,
					height:220,
					href:'__URL__/advsearch'
				});
			}
		},'-',{
			iconCls: 'icon-reload',
			text : '重载',
			handler: function(){
				$.get('__URL__/clear', function(data){
					$("#sersSearchBusiness").val(0);
					$("#sersSearchDate").val(30);
					$("#Business").datagrid('reload');
				});
			}
		}],
		frozenColumns:[[
			{checkbox:true},
			{field:'username_one',title:'出差人员',width:65},
			{field:'t1_new_status',title:'状态',width:80,sortable:true}
		]],
		columns:[[ 
			{field:'customer',title:'目标客户',width:90,sortable:true},
			{field:'show_date',title:'出差时间',width:115,sortable:true},
			{field:'project',title:'对应项目',width:150,sortable:true},
			{field:'purpose',title:'出差目的',width:250},
			{field:'t1_new_day_count',title:'天数',width:55,sortable:true},
			{field:'result',title:'出差总结',width:250},
			{field:'checker',title:'审核人',width:55,sortable:true}
		]]
	});
	
	
	 var dataview = '<?php echo C("DATAGRID_VIEW") ?>';
	 if(dataview!='0'){
		var pager = $('#Business').datagrid('getPager');
		pager.pagination({
			layout: 'list,sep,first,prev,sep,manual,sep,next,last,sep,refresh',
			displayMsg: '共{total}记录'
		});
	 }
	
	$("#rightTabs").tabs({
		onClose:function(t,i){
			$.ajaxSetup({  
				async : false  
			});
			if(t=='出差日志'){
				$.get('__URL__/clear', function(data){});
			}	
			$.ajaxSetup({  
				async : true  
			});
		}
	});
	
	$("#rightTabs").tabs('select','出差日志');
});
</script><div id="BusinessCon" class="con" onselectstart="return false;" style="-moz-user-select:none;"><?php if(C('DATAGRID_VIEW')!='0'){ ?><table id="Business" data-options="view:<?php echo C("DATAGRID_VIEW") ?>"></table><?php }else{ ?><table id="Business"></table><?php } ?></div><div id="searchBusiness"></div><div id="addBusiness"></div><div id="selectInputBusiness" style="display:none"><span class="datagrid-btn-separator-nofloat"  style="margin-right:2px;"></span><input id="BusinessSearch" AUTOCOMPLETE="off" style="width:280px;"></input><div id="BusinessSearchSon" style="width:120px"><div data-options="name:'customer'">目标客户</div><div data-options="name:'project'">对应项目</div><div data-options="name:'pro_creator'">出差人员</div></div><span class="datagrid-btn-separator-nofloat"  style="margin-right:1px;"></span><select id="sersSearchBusiness" ><option value="0" style="color:#7d7d7d">所有状态</option><option value="1">正在出差</option><option value="2">总结出差</option><option value="3">结束出差</option></select><span class="datagrid-btn-separator-nofloat"  style="margin-right:1px;"></span><select id="sersSearchDate" ><option value="0" style="color:#7d7d7d">所有时间</option><option value="30" selected="selected">最近30天</option><option value="60">最近60天</option><option value="90">最近90天</option><option value="180">最近半年</option><option value="365">最近一年</option><option value="ny">今年</option><option value="ly">去年</option></select></div>