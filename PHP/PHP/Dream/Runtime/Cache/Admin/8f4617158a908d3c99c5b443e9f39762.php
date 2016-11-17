<?php if (!defined('THINK_PATH')) exit();?><script language="javascript">var sdate = '<?php echo ($nowyear); ?>';
var edate = '<?php echo ($nowdate); ?>';
$(function(){
	var cw = $("#BugCon").width();
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
	$("#Bug").datagrid({
		//title:'BUG百科',	
		height:wh,
		autoRowHeight:false,
		singleSelect:true,
		striped:true,
		rownumbers:true,
		pagination:pn,
		showFooter:true,
		prototype:true,
		pageSize:pr,
		pageList:[30,50,80,100,100000000000],
		method:'get',
		sortName:'addtime',
		sortOrder:'desc',
		url:'__ACTION__/json/1',
		fitColumns:Number('<?php echo (C("DG_FIT_COLUMNS")); ?>'),
		nowrap:Number('<?php echo (C("DATA_NOWRAP")); ?>'),
		selectOnCheck:false,
		checkOnSelect:true,
		onBeforeLoad: function(){  
			 if($("#BugCon .datagrid-toolbar table tr #sersSearchBug").length==0){
				 var grid = $("#BugCon .datagrid-toolbar table tr");  
				 var ldata = '<td>'+$("#selectInputBug").html()+'</td>'; 
				 grid.append(ldata);
				 
				 $("#sersSearchBug").change(function(){
					var idd = $(this).val();
					$.post('__URL__/change/act/type', {val:idd}, function(data){
						$("#Bug").datagrid('reload');
					});
				}); 
				
				$("#seleBugAddtimeST").datebox({
					 onSelect:function(date){ 
						var gen = $("#seleBugAddtimeEN").datebox('getValue');
						var en = gen?gen:'<?php echo ($nowdate); ?>';
						sdate = date.getFullYear()+"-"+pad((date.getMonth()+1),2)+"-"+pad(date.getDate(),2);
						var idd = sdate+'|'+en;
						$.post('__URL__/change/act/addtime', {val:idd}, function(data){
							$("#Bug").datagrid('reload');
						});
					 }
					 
				 });
				 
				 $("#seleBugAddtimeEN").datebox({
					 onSelect:function(date){
						var gst = $("#seleBugAddtimeST").datebox('getValue');
						var st = gst?gst:'<?php echo ($nowyear); ?>';
						edate = date.getFullYear()+"-"+pad((date.getMonth()+1),2)+"-"+pad(date.getDate(),2);
						var idd = st+'|'+edate;
						$.get('__URL__/change/act/addtime', {val:idd}, function(data){
							$("#Bug").datagrid('reload');
						});
					 }
				 });
				 
				  $('#BugSearch').searchbox({   
					searcher:function(value,name){
						$.post('__URL__/change/act/'+name+'/mode/like', {val:value}, function(data){
							$("#Bug").datagrid('reload');
						});
					},   
					menu:'#BugSearchSon',   
					prompt:'请输入关键字'  
				 }); 
			 }
						 
			 //$("#seleBugAddtimeST").datebox('setValue',sdate);
			// $("#seleBugAddtimeEN").datebox('setValue',edate);
		},
		/*onHeaderContextMenu:function(e,f){
			if(f!='title'){
				$("#searchBug").dialog({
					title:'快速搜索',
					resizable:true,
					width:430,
					height:80,
					href:'__APP__?g=<?php echo GROUP_NAME; ?>&m=<?php echo MODULE_NAME; ?>&a=search&field='+f
				});
			}
			e.preventDefault();
		},*/
		onDblClickRow:function(e,rowIndex,rowData){
			//var se = $(this).datagrid('getSelected');
			var se = $("#Bug").datagrid('getChecked');
			var se_len = se.length;
			var idd = se[0]['id'];
			if(se_len==1){
				$("<div/>").dialog({
					title:'百科详情',
					resizable:true,
					width:955,
					height:ch-80,
					href:'__URL__/detail/id/'+idd,
					onOpen:function(){
						cancel['BugDetail'] = $(this);
					},
					onClose:function(){
						//$("#Bug").datagrid('reload');
						$(this).dialog('destroy');
						cancel['BugDetail'] = null;
					}
				});
			}
		},
		onUncheck:function(i,d){
			$("#Bug").datagrid('unselectRow',i);
		},
		toolbar:[{
		iconCls: 'icon-add',
			text : '新增',
			handler: function(){
				$("#addBug").dialog({
					title:'新增百科',
					resizable:true,
					width:885,
					height:ch-80,
					href:'__URL__/add/act/add',
					onOpen:function(){
						cancel['Bug'] = $(this);
					},
					onClose:function(){
						//$(this).dialog('destroy');
						//$("#Bug").datagrid('reload');
						cancel['Bug'] = null;
					}
				});
			}
		},'-',{
			iconCls: 'icon-edit',
			text : '编辑',
			handler: function(){
				//var se = $("#Bug").datagrid('getSelected');
				var se = $("#Bug").datagrid('getChecked');
				var se_len = se.length;
				var idd = se[0]['id'];
				if(se_len==1){
					$("#addBug").dialog({
						title:'编辑百科',
						resizable:true,
						width:885,
						height:ch-80,
						href:'__URL__/add/act/edit/id/'+idd,
						onOpen:function(){
							cancel['Bug'] = $(this);
						},
						onClose:function(){
							//$(this).dialog('destroy');
							//$("#Bug").datagrid('reload');
							cancel['Bug'] = null;
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
				var se = $("#Bug").datagrid('getChecked');
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
										$("#Bug").datagrid('reload');
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
				$("#searchBug").dialog({
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
					$("#sersSearchBug").val(0);
					 $("#seleBugAddtimeST").datebox('setValue','');
					 $("#seleBugAddtimeEN").datebox('setValue','');
					 $("#BugSearch").searchbox('setValue','');
					 $("#Bug").datagrid('reload');
				});
			}
		}],
		frozenColumns:[[
			{checkbox:true},
			{field:'title',title:'问题描述',width:550,sortable:true}
		]],
		columns:[[ 
			{field:'t1_new_type',title:'问题类型',width:100,sortable:true},
			{field:'project',title:'代表机型',width:180,sortable:true},
			{field:'os',title:'相关平台',width:110,sortable:true},
			{field:'username',title:'作者',width:60,sortable:true},
			{field:'addtime',title:'创建时间',width:150,sortable:true}
		]]
	});
	
	
	 var dataview = '<?php echo C("DATAGRID_VIEW") ?>';
	 if(dataview!='0'){
		var pager = $('#Bug').datagrid('getPager');
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
			if(t=='BUG百科'){
				$.get('__URL__/clear', function(data){});
			}	
			$.ajaxSetup({  
				async : true  
			});
		}
	});
	
	$("#rightTabs").tabs('select','BUG百科');
});
</script><div id="BugCon" class="con" onselectstart="return false;" style="-moz-user-select:none;"><?php if(C('DATAGRID_VIEW')!='0'){ ?><table id="Bug" data-options="view:<?php echo C("DATAGRID_VIEW") ?>"></table><?php }else{ ?><table id="Bug"></table><?php } ?></div><div id="searchBug"></div><div id="addBug"></div><div id="selectInputBug" style="display:none"><span class="datagrid-btn-separator-nofloat"  style="margin-right:1px;"></span><input id="BugSearch" AUTOCOMPLETE="off" style="width:280px;"></input><div id="BugSearchSon" style="width:120px"><div data-options="name:'title'">问题描述</div><div data-options="name:'project'">代表机型</div><div data-options="name:'os'">相关平台</div></div><span class="datagrid-btn-separator-nofloat"  style="margin-right:1px;"></span><select id="sersSearchBug" ><option value="0" style="color:#7d7d7d">所有类型</option><?php if(is_array($tinfo)): foreach($tinfo as $key=>$t): ?><option value="<?php echo ($t["id"]); ?>"><?php echo ($t["text"]); ?></option><?php endforeach; endif; ?></select><span class="datagrid-btn-separator-nofloat"  style="margin-right:1px;"></span><input  id="seleBugAddtimeST" name="addtime[]" size="10" type="text"></input> &nbsp;至&nbsp;
 <input  id="seleBugAddtimeEN" name="addtime[]" size="10" type="text"></input></div>