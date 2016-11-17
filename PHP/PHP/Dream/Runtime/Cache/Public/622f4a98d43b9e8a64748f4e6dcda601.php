<?php if (!defined('THINK_PATH')) exit();?><script type="text/javascript">if(!isset(que)){
	var que = new Array();
}
var mc = Number('<?php echo C("MORE_COMY"); ?>');
if(mc){
	var mode = 3;
}else{
	var mode = 2;
}
que['mail_<?php echo ($uniqid); ?>'] = new acrossClass();
que['mail_<?php echo ($uniqid); ?>'].act = '__GROUP__/Mail';
que['mail_<?php echo ($uniqid); ?>'].show({
	id:'<?php echo ($uniqid); ?>',
	mail:0,
	cls:'mail-height325',
	mode:mode
});

$(document).ready(function(){
	$("#submitMail<?php echo ($uniqid); ?>").linkbutton({
		iconCls:'icon-save'
	});
	
	$("#resetMail<?php echo ($uniqid); ?>").linkbutton({
		iconCls:'icon-cancel'
	});
	
	$("#content<?php echo ($uniqid); ?>").kindeditor({
		uploadJson:'__GROUP__/Upload/save/act/mail',
		border:0
	});
});



function onSubmitMail(idd){
	var tu = $("#toUser"+idd+" option").length;
	if(tu>0){
		$.messager.progress();
		$("#toUser"+idd+" option").attr("selected",true);
		$("#selectSendMail"+idd).form('submit',{
			url:'__URL__/sendnow',
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
					$.messager.alert('提示','邮件发送成功！','info',function(){
						var sa = '<?php echo (C("SUBMIT_ACTION")); ?>';
						if(sa==1){
							cancel['Sendmail'].dialog('close');
							cancel['Sendmail'].dialog('destroy');
							cancel['Sendmail'] = null;
						}
					});
					return false;
				}if(data==2){
					var mp = '<?php echo ($mailpwd); ?>';
					if(!mp){
						$.messager.prompt('提示','请输入邮箱密码：',function(r){
							if(isset(r) && r){
								var uid = Number('<?php echo ($userid); ?>');
								$.post('__APP__/Admin/User/setmail', {mailpwd:r,id:uid},function(data){
									if(data==1){
										$.messager.alert('提示','邮箱密码设置成功，请点击重新发送！','info');
									}else if(data==0){
										$.messager.alert('提示','邮箱密码设置失败，请重新设置密码！','warning');
									}
								});
							}
						});
					}else{
						$.messager.alert('提示','无法发送邮件，请检查邮箱设置！','warning');
					}
					
				}else{
					$.messager.alert('提示','邮箱设置失败！','warning');
				}
			}
		});
	}else{
		return false;
	}
}

function onResetMail(idd){
	cancel['Sendmail'].dialog('close');
	cancel['Sendmail'].dialog('destroy');
	cancel['Sendmail'] = null;
}
</script><div class="con-tb"><form  class="selectSendMail" id="selectSendMail<?php echo ($uniqid); ?>" method="post" enctype="multipart/form-data"><table class="infobox" width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td width="48%" rowspan="2" id="<?php echo ($uniqid); ?>" style="padding:3px">&nbsp;</td><td width="8%"><label>标题</label></td><td width="44%"><input name="title" id="title<?php echo ($uniqid); ?>" class="easyui-validatebox" style="width:99%" type="text" AUTOCOMPLETE="off" data-options="required:true" /></td></tr><tr><td colspan="2"><textarea name="content" id="content<?php echo ($uniqid); ?>" rows="18" style="width:99%; height:320px"><?php echo ($info["description"]); ?></textarea></td></tr><tr><td height="38" colspan="3" align="center"><a href="javascript:void(0);" onclick="javascript:return onSubmitMail('<?php echo ($uniqid); ?>')" id="submitMail<?php echo ($uniqid); ?>">立即发送</a> &nbsp; <a href="javascript:void(0);" onclick="javascript:onResetMail('<?php echo ($uniqid); ?>')" id="resetMail<?php echo ($uniqid); ?>">关闭</a></td></tr></table></form></div>