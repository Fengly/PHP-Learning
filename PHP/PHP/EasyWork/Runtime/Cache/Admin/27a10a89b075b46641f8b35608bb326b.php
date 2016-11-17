<?php if (!defined('THINK_PATH')) exit();?><script language="javascript">$(function(){
	var th = $(".top").height();
	th = 111-th;
	var wh = $(window).height()-th;
	$("#ProjectDetail").width();
    $("#leftTask").height(wh);
	$(".panelson").height(wh);
	
});

function onClickTask(node){
	var idpa = isset(node._parentId);
	var id = node.id;
	if(idpa){
		$("#proDetailCon").panel('refresh','__URL__/content/id/<?php echo ($id); ?>/tid/'+id);
	}else{
		$("#proDetailCon").panel('refresh','__URL__/content/id/'+id);
	}
}

function onCheckTree(){
	var tid = '<?php echo ($tid); ?>';
	if(tid){
		var node = $('#taskTree').tree('find',tid);
		$('#taskTree').tree('check', node.target);
	}
}
</script><div class="easyui-layout" data-options="fit:true"><div data-options="region:'west',border:false" style="width:248px"><div id="leftTask" class="easyui-accordion" style="width:238px;"><div title="项目任务分解" data-options="selected:true"><ul id="taskTree" class="easyui-tree left-tree" data-options="url:'__URL__/getTask/pid/<?php echo ($id); ?>',editable:false,lines:true,method:'get',onClick:function(node){onClickTask(node);},onLoadSuccess:function(node){onCheckTree();}"></ul></div></div></div><div data-options="region:'center',border:false"><div class="task-right"><?php if($tid){ ?><div id="proDetailCon" class="easyui-panel panelson" data-options="href:'__URL__/content/id/<?php echo ($id); ?>/tid/<?php echo ($tid); ?>',border:false"></div><?php }else{ ?><div id="proDetailCon" class="easyui-panel panelson" data-options="href:'__URL__/content/id/<?php echo ($id); ?>',border:false"></div><?php } ?></div></div></div>