<?php if (!defined('THINK_PATH')) exit();?><script language="javascript">$(function(){
	var th = $(".top").height();
	th = 111-th;
	var wh = $(window).height()-th;
	
	$("#Client").datagrid({
		//title:'客户列表',	
		height:wh,
		autoRowHeight:false,
		singleSelect:true,
		striped:true,
		rownumbers:true,
		method:'get',
		url:'__ACTION__/json/1',
		fitColumns:true,
		nowrap:Number('<?php echo (C("DATA_NOWRAP")); ?>'),
		onDblClickRow:function(e,rowIndex,rowData){
			var se = $("#Client").datagrid('getSelected');
			var idd = se['id'];
			$("#addClient").dialog({
				title:'编辑客戶',
				resizable:true,
				width:450,
				height:190,
				href:'__URL__/add/act/edit/id/'+idd,
				onOpen:function(){
					cancel['Client'] = $(this);
				},
				onClose:function(){
					//$(this).dialog('destroy');
					//$("#Client").datagrid('reload');
					cancel['Client'] = null;
				}
			});
		},
		onUncheck:function(i,d){
			$("#Client").datagrid('unselectRow',i);
		},
		toolbar:[{
		iconCls: 'icon-add',
			text : '新增',
			handler: function(){
				$("#addClient").dialog({
					title:'新增客戶',
					resizable:true,
					width:450,
					height:190,
					href:'__URL__/add/act/add',
					onOpen:function(){
						cancel['Client'] = $(this);
					},
					onClose:function(){
						//$(this).dialog('destroy');
						//$("#Client").datagrid('reload');
						cancel['Client'] = null;
					}
				});
			}
		},'-',{
			iconCls: 'icon-edit',
			text : '编辑',
			handler: function(){
				var se = $("#Client").datagrid('getSelected');
				var idd = se['id'];
				$("#addClient").dialog({
					title:'编辑客戶',
					resizable:true,
					width:450,
					height:190,
					href:'__URL__/add/act/edit/id/'+idd,
					onOpen:function(){
						cancel['Client'] = $(this);
					},
					onClose:function(){
						//$(this).dialog('destroy');
						//$("#Client").datagrid('reload');
						cancel['Client'] = null;
					}
				});
			}
		},'-',{
			iconCls: 'icon-cancel',
			text : '删除',
			handler: function(){
				var se = $("#Client").datagrid('getSelected');
				var idd = se['id'];
				if(idd){
					$.messager.confirm('提示','确定刪除吗！',function(r){
						if(r==true){
							$.messager.progress();
							$.get('__URL__/del/id/'+idd, function(data){
								$.messager.progress('close');
								if(data==1){
									$.messager.alert('提示','删除数据成功！','info',function(){
										$("#Client").datagrid('reload');
									});
								}else if(data==0){
									$.messager.alert('提示','删除数据失败！','warning');
								}else{
									$.messager.alert('提示','您没有删除权限！','warning');
								}
							});
						}
					});	
				}
			}
		},'-',{
			iconCls: 'icon-json',
			text : '更新緩存',
			handler: function(){
				$.get('__URL__/json', function(data){
					if(data==1){
						$.messager.alert('提示','更新緩存成功！','info');
					}else{
						$.messager.alert('提示','更新緩存失败！','warning');
					}
				});
			}
		},'-',{
			iconCls: 'icon-reload',
			text : '重载',
			handler: function(){
				$("#Client").datagrid('reload');
			}
		}
		],
		columns:[[   
			{field:'name',title:'客戶名称',width:220},
			{field:'access',title:'权限值',width:80},   
			{field:'comment',title:'备注',width:100},
			{field:'status',title:'状态',width:90}
		]]
	});
});
</script><div class="con" id="ClientCon" onselectstart="return false;" style="-moz-user-select:none;"><table id="Client"></table></div><div id="addClient"></div>