<?php if (!defined('THINK_PATH')) exit();?><script language="javascript">if(!isset(que)){
	var que = new Array();
}
var idd = '';
function onSend(idd){
	$.messager.progress();
	$("#searchFormProject"+idd).form('submit',{
		url:'__URL__/advsearch/act/1',
		success:function(data){
			$.messager.progress('close');
			cancel['ProjectNames'].datagrid('reload');
			var sa = '<?php echo (C("SEARCH_ADV_ACTION")); ?>';
			if(sa==1){
				$("#searchProject").dialog('close',true);
			}
		}
	});
}

var acon = $("#dd<?php echo ($uniqid); ?>").html();

//插行
que['add_<?php echo ($uniqid); ?>'] = new actRow();
que['add_<?php echo ($uniqid); ?>'].boxid = 'toadd<?php echo ($uniqid); ?>';
que['add_<?php echo ($uniqid); ?>'].content = '<TR>'+acon+'</TR>';
</script><div class="con-tb"><form id="searchFormProject<?php echo ($uniqid); ?>" method="post"><table class="infobox" width="100%" border="0" cellspacing="0" cellpadding="0" ><tbody id="toadd<?php echo ($uniqid); ?>"><tr><td width="3%" height="32" align="center"><img onclick="que['add_<?php echo ($uniqid); ?>'].a()" style="cursor:pointer" src="__ITEM__/__ADMIN.IMG__/add_tr.gif" class="addtr" title="插入行" /></td><td width="9%" align="center"><select name="field[]" data-options="editable:false"><option  value="t1_old_title">项目标题</option><option  value="t1_old_code">项目代码</option><option  value="t2_old_startdate">开始日期</option><option  value="t2_old_enddate">完成日期</option><option  value="t3_old_username">负责人</option><option  value="t1_new_pass">项目进度</option></select></td><td width="9%" align="center"><select name="mod[]" data-options="editable:false"><option  value="like">包含</option><option value="=">等于</option><option  value=">">大于</option><option  value="<">小于</option><option  value=">=">大于等于</option><option  value="<=">小于等于</option><option  value="<>">不等于</option><option  value="not like">不包含</option></select></td><td width="70%" align="center"><input name="keys[]" id="keyword" class="easyui-validatebox" style="width:98%" data-options="" /></td><td width="9%" align="center"><select name="type[]" data-options="editable:false"><option value="AND" selected="selected">并且</option><option  value="OR">或者</option></select></td></tr></tbody><tr id="dd<?php echo ($uniqid); ?>" style="display:none"><td width="3%" height="32" align="center"><img onclick="que['add_<?php echo ($uniqid); ?>'].d()" style="cursor:pointer" src="__ITEM__/__ADMIN.IMG__/del_tr.gif" class="deltr" title="删除行" /></td><td width="9%" align="center"><select class="easyui-combobox" name="field[]" data-options="editable:false"><option  value="t1_old_title">项目标题</option><option  value="t1_old_code">项目代码</option><option  value="t2_old_startdate">开始日期</option><option  value="t2_old_enddate">完成日期</option><option  value="t3_old_username">负责人</option><option  value="t1_new_pass">项目进度</option></select></td><td width="9%" align="center"><select class="easyui-combobox" name="mod[]" data-options="editable:false"><option  value="like">包含</option><option value="=">等于</option><option  value=">">大于</option><option  value="<">小于</option><option  value=">=">大于等于</option><option  value="<=">小于等于</option><option  value="<>">不等于</option><option  value="not like">不包含</option></select></td><td width="70%" align="center"><input name="keys[]" id="keyword" class="easyui-validatebox" style="width:98%" data-options="" /></td><td width="9%" align="center"><select name="type[]" data-options="editable:false"><option value="AND" selected="selected">并且</option><option  value="OR">或者</option></select></td></tr><tr><td height="35" colspan="5" align="center"><a href="#" onclick="javascript:onSend('<?php echo ($uniqid); ?>')" id="su" class="easyui-linkbutton" data-options="iconCls:'icon-search'">立即查詢</a></td></tr></table></form></div>