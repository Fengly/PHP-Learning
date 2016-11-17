<?php if (!defined('THINK_PATH')) exit();?><script language="javascript">var role = '<?php echo ($role); ?>';
if(role==-2){
	$.messager.alert('提示','您没有新增权限！','warning');
}

var act = '<?php echo ($act); ?>';
$(function(){
	var th = $(".top").height();
	th = 111-th;
	var wh = $(window).height()-th-202;
	$("#notes<?php echo ($uniqid); ?>").height(wh);
	
	var pid = '<?php echo ($pid); ?>';
	$("#pid<?php echo ($uniqid); ?>").combobox({
		url:'__GROUP__/Project/getProject/act/json',
		editable:true,
		method:'get',
		valueField:'id',
		textField:'text',
		required:true,
		filter: function(q,r){
			var opts = $(this).combobox('options');
			var v = r[opts.textField];
			var vq = v.toUpperCase();
			var vp = String(getPinYin(v));
			var qp = q.toUpperCase();
			if(vp.indexOf(qp)>=0 || vq.indexOf(qp) >= 0){
				return r[opts.textField];
			}
		},
		onLoadSuccess:function(){
			if(act=='add'){
				$("#pid<?php echo ($uniqid); ?>").combobox('setValue',pid);
			}
		}
	});
	
	$("#priority<?php echo ($uniqid); ?>").combobox({
		url:'__ITEM__/__RUNTIME__/Data/Json/Linkage/youxianji_data.json',
		editable:false,
		method:'get',
		required:true,
		valueField:'id',
		textField:'text'
	});
	
	$("#status<?php echo ($uniqid); ?>").combobox({
		url:'__ITEM__/__RUNTIME__/Data/Json/Linkage/wentizhuangtai_data.json',
		editable:false,
		method:'get',
		required:true,
		valueField:'id',
		textField:'text'
	});
	
	$("#hertz<?php echo ($uniqid); ?>").combobox({
		url:'__ITEM__/__RUNTIME__/Data/Json/Linkage/chuxianpinlv_data.json',
		editable:false,
		method:'get',
		required:true,
		valueField:'id',
		textField:'text'
	});
	
	$("#type<?php echo ($uniqid); ?>").combobox({
		url:'__ITEM__/__RUNTIME__/Data/Json/Linkage/chuxianweizhi_data.json',
		editable:false,
		method:'get',
		required:true,
		valueField:'id',
		textField:'text'
	});
	
	$("#level<?php echo ($uniqid); ?>").combobox({
		url:'__ITEM__/__RUNTIME__/Data/Json/Linkage/yanzhongxing_data.json',
		editable:false,
		method:'get',
		required:true,
		valueField:'id',
		textField:'text'
	});
	
	$("#user_id<?php echo ($uniqid); ?>").combotree({
		required:true,
		url:'__ITEM__/__RUNTIME__/Data/Json/User_tree_data.json',
		editable:true,
		method:'get',
		required:false,
		valueField:'id',
		textField:'text',
		keyHandler: {
			query : function(q) {
				queryComboTree(q, "user_id<?php echo ($uniqid); ?>", 0);
			}
		},
		onBeforeSelect:function(node){
			if(isset(node.children)){
				$("#user_id<?php echo ($uniqid); ?>").tree("unselect");
			}
		}
	});
});

function onSubmitReport(idd){
	$.messager.progress();
	$("#toUser"+idd+" option").attr("selected",true);
	$("#addFormReport"+idd).form('submit',{
		url:'__URL__/add/act/add/go/1',
		onSubmit: function(){
			var isValid = $(this).form('validate');
			if (!isValid){
				$.messager.progress('close');
			}
			return isValid;
		},
		success:function(data){
			$.messager.progress('close');
			$("#toUser"+idd+" option").attr("selected",false);
			if(data==1){
				$.messager.alert('提示','新增数据成功！','info',function(){
					onResetReport(idd);
				});
			}else if(data==0){
				$.messager.alert('提示','新增数据失败！','warning');
			}else{
				//alert(data);
				$.messager.alert('提示','您没有新增权限！','warning');
			}
		}
	});
}

function onResetReport(idd){
	var tab = $("#rightTabs").tabs('getSelected');
	$("#rightTabs").tabs('update',{
		tab:tab,
		options:{
			title : '提交BUG',
			href : '__URL__/add/act/add',
			closable : true
		} 
	});
}
</script><div class="con"><form method="post" enctype="multipart/form-data" id="addFormReport<?php echo ($uniqid); ?>"><table class="infobox table-border" width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse;"><tbody><tr><td width="11%" class="rebg"><label for="bugno">问题编号</label><input id="ids<?php echo ($uniqid); ?>" type="hidden" value="<?php echo ($id); ?>" /></td><td width="23%"><?php echo ($bugno); ?><input name="bugno" type="hidden" value="<?php echo ($bugno); ?>" /></td><td width="11%" class="rebg"><label for="creator">创建人</label></td><td width="22%"><?php echo ($username); ?></td><td width="11%" class="rebg"><label for="level">严重性</label></td><td width="22%"><input name="level" id="level<?php echo ($uniqid); ?>" class="relo" size="24" /></td></tr><tr><td width="11%" class="rebg"><label for="type">出现位置</label></td><td width="23%"><input name="type" id="type<?php echo ($uniqid); ?>" class="relo" size="26" /></td><td width="11%" class="rebg"><label for="hertz">频率</label></td><td width="22%"><input name="hertz" id="hertz<?php echo ($uniqid); ?>" class="relo" size="24" /></td><td width="11%" class="rebg"><label for="priority">优先级</label></td><td width="22%"><input name="priority" id="priority<?php echo ($uniqid); ?>" class="relo" size="24" /></td></tr><tr><td class="rebg"><label for="user_id">指派给</label></td><td><input name="user_id" id="user_id<?php echo ($uniqid); ?>" class="relo" size="26" /></td><td class="rebg"><label for="pid">所属项目</label></td><td colspan="3"><input name="pid" id="pid<?php echo ($uniqid); ?>" class="relo" size="60" /></td></tr><tr><td class="rebg"><label for="title">摘要</label></td><td colspan="5"><input name="title" type="text" id="title<?php echo ($uniqid); ?>" class="easyui-validatebox" data-options="validType:'ptext'" style="width:99.8%" autocomplete="off" /></td></tr><tr><td class="rebg"><label for="notes">详细现象</label></td><td height="265" colspan="5" style="padding:3px"><textarea name="notes" id="notes<?php echo ($uniqid); ?>"  rows="18" data-options="uploadJson:'__APP__/Public/Upload/save/act/Report'" class="easyui-kindeditor" style="width:99.8%; height:260px;"><?php echo ($info["baseinfo"]["notes"]); ?></textarea></td></tr><tr><td class="rebg"><label for="comment">备注</label></td><td colspan="5"><input name="comment" type="text" id="comment<?php echo ($uniqid); ?>" class="easyui-validatebox" data-options="validType:'ptext'" style="width:99.8%" autocomplete="off" /></td></tr><?php if($act=='add'){ ?><tr><td class="rebg"><label for="path">附件</label></td><td colspan="5"><input name="path" type="file" />&nbsp;<font class="up-font-over">(上传类型：<?php echo C('UPLOAD_TYPE'); ?>)</font></td></tr><?php } ?></tbody><tr><td height="38" colspan="6" align="center"><?php if($act=='add'){ ?><a href="javascript:void(0);" onclick="javascript:onSubmitReport('<?php echo ($uniqid); ?>')" id="su" class="easyui-linkbutton" data-options="iconCls:'icon-save'">保存</a><?php }else{ ?><a href="javascript:void(0);" onclick="javascript:return onUploadReport('<?php echo ($uniqid); ?>')" id="sue" class="easyui-linkbutton" data-options="iconCls:'icon-save'">保存</a><?php } ?>        &nbsp; <a href="javascript:void(0);" onclick="javascript:onResetReport('<?php echo ($uniqid); ?>')" id="re" class="easyui-linkbutton" data-options="iconCls:'icon-reload'">刷新</a></td></tr></table></form></div><div id="addApp"></div>