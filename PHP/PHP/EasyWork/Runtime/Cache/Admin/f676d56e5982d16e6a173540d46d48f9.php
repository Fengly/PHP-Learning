<?php if (!defined('THINK_PATH')) exit();?><script language="javascript">$(function(){
	var th = $(".top").height();
	th = 111-th;
	var wh = $(window).height()-th;
	var cw = $("#NoticeCon").width();
	var ch = $("body").height();
	var pr = '<?php echo $page_row ?>';
	var pn = false;
	if(pr>0){
		pn = true;
	}
	$("#Notice").datagrid({
		//title:'公告列表',	
		height:wh,
		autoRowHeight:true,
		singleSelect:true,
		striped:true,
		rownumbers:true,
		pagination:pn,
		pageSize:pr,
		pageList:[30,50,80,100,1000],
		method:'get',
		sortName:'t1_old_addtime',
		sortOrder:'desc',
		url:'__ACTION__/json/1',
		fitColumns:Number('<?php echo (C("DG_FIT_COLUMNS")); ?>'),
		nowrap:Number('<?php echo (C("DATA_NOWRAP")); ?>'),
		selectOnCheck:false,
		checkOnSelect:true,
		onBeforeLoad: function () {  
			 if($("#NoticeCon .datagrid-toolbar table tr #sersSearchNotice").length==0){
				 var grid = $("#NoticeCon .datagrid-toolbar table tr");  
				 var date = '<td>'+$("#selectInputNotice").html()+'</td>';    
				 grid.append(date); 
				 $("#sersSearchNotice").combotree({
					url:'__ITEM__/__RUNTIME__/Data/Json/User_tree_data.json',
					editable:true,
					method:'get',
					valueField:'id',
					textField:'text',
					/*filter: function(q,r){
						var opts = $(this).combobox('options');
						var v = r[opts.textField];
						var vu = v.toUpperCase();
						var vp = String(getPinYin(v));
						var qp = q.toUpperCase();
						if(vp.indexOf(qp)>=0 || vu.indexOf(qp) >= 0){
							return r[opts.textField];
						}
					},*/
					keyHandler: {
						query : function(q) {
							queryComboTree(q, "sersSearchNotice", 0);
						}
					},
					onBeforeSelect:function(node){
						if(isset(node.children)){
							$("#sersSearchNotice").tree("unselect");
						}
					},
					onClick:function(q){
						$.post('__URL__/change/act/user_id', {val:q.id}, function(data){
							$("#Notice").datagrid('reload');
						});
					}
				 });
			 }
		},
		/*
		onHeaderContextMenu:function(e,f){
			if(f!='contents'){
				$("#searchNotice").dialog({
					title:'快速搜索',
					resizable:true,
					width:430,
					height:80,
					href:'__URL__/search/field/'+f
				});
			}
			
			e.preventDefault();
		},
		*/
		onDblClickRow:function(e,rowIndex,rowData){
			//var se = $(this).datagrid('getSelected');
			var se = $("#Notice").datagrid('getChecked');
			var se_len = se.length;
			var idd = se[0]['id'];
			var has = $("#detailFormNotice").length;
			if(se_len==1 && !has){
				$("<div/>").dialog({
					title:'公告详情',
					resizable:true,
					width:720,
					height:480,
					href:'__URL__/detail/id/'+idd,
					onOpen:function(){
						cancel['NoticeDetail'] = $(this);
					},
					onClose:function(){
						$(this).dialog('destroy');
						cancel['NoticeDetail'] = null;
					}
				});
			}
		},
		onUncheck:function(i,d){
			$("#Notice").datagrid('unselectRow',i);
		},
		toolbar:[{
		iconCls: 'icon-add',
			text : '新增',
			handler: function(){
				$("#addNotice").dialog({
					title:'新增公告',
					resizable:true,
					width:720,
					height:480,
					href:'__URL__/add/act/add',
					onOpen:function(){
						cancel['Notice'] = $(this);
					},
					onClose:function(){
						//$(this).dialog('destroy');
						//$("#Notice").datagrid('reload');
						cancel['Notice'] = null;
					}
				});
			}
		},'-',{
			iconCls: 'icon-edit',
			text : '编辑',
			handler: function(){
				//var se = $("#Project").datagrid('getSelected');
				var se = $("#Notice").datagrid('getChecked');
				var se_len = se.length;
				var idd = se[0]['id'];
				if(se_len==1){
					$("#addNotice").dialog({
						title:'编辑公告',
						resizable:true,
						width:720,
						height:480,
						href:'__URL__/add/act/edit/id/'+idd,
						onOpen:function(){
							cancel['Notice'] = $(this);
						},
						onClose:function(){
						//	$(this).dialog('destroy');
							//$("#Notice").datagrid('reload');
							cancel['Notice'] = null;
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
				var se = $("#Notice").datagrid('getChecked');
				var s = "";  
				for (var property in se) {  
					s = s + se[property]['id']+',' ;  
				}
				//var se = $("#Notice").datagrid('getSelected');
				//var idd = se['id'];
				if(s){
					$.messager.confirm('提示','确定删除吗！',function(r){
						if(r==true){
							$.messager.progress();
							$.post('__URL__/del', {id:s}, function(data){
								$.messager.progress('close');
								if(data==1){
									$.messager.alert('提示','删除公告成功！','info',function(){
										$("#Notice").datagrid('reload');
									});
								}else if(data==0){
									$.messager.alert('提示','删除公告失败！','warning');
								}else{
									$.messager.alert('提示','您没有删除权限！','warning');
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
				$("#searchNotice").dialog({
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
					$("#sersSearchNotice").combotree('setValue','');
					$("#Notice").datagrid('reload');
				});
			}
		}],
		frozenColumns:[[
			{checkbox:true},
			{field:'t2_old_username',title:'创建人',width:100,sortable:true},
			{field:'t1_old_title',title:'标题',width:850,sortable:true}
		]],
		columns:[[  
			{field:'t1_new_status',title:'状态',width:60,sortable:true},
			{field:'t1_old_addtime',title:'创建日期',width:120,sortable:true}
		]]
	});
	
	 var dataview = '<?php echo C("DATAGRID_VIEW") ?>';
	 if(dataview!='0'){
		var pager = $('#Notice').datagrid('getPager');
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
			if(t=='公告列表'){
				$.get('__URL__/clear', function(data){});
			}
			$.ajaxSetup({  
				async : true  
			});
		}
	});
	
	$("#rightTabs").tabs('select','公告列表');
});
</script><div class="con" id="NoticeCon" onselectstart="return false;" style="-moz-user-select:none;"><?php if(C('DATAGRID_VIEW')!='0'){ ?><table id="Notice" data-options="view:<?php echo C("DATAGRID_VIEW") ?>"></table><?php }else{ ?><table id="Notice"></table><?php } ?></div><div id="searchNotice"></div><div id="addNotice"></div><div id="selectInputNotice" style="display:none"><span class="datagrid-btn-separator-nofloat"  style="margin-right:2px;"></span><input id="sersSearchNotice" style="width:128px; margin-left:3px" /></div>