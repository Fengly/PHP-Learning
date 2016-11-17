<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>后台管理</title>
    <link rel="stylesheet" href="<?php echo __ESUI__;?>/themes/color.css">
    <link rel="stylesheet" href="<?php echo __ESUI__;?>/themes/mobile.css">
    <link rel="stylesheet" href="<?php echo __ESUI__;?>/themes/icon.css">
    <link rel="stylesheet" href="<?php echo __ESUI__;?>/demo/demo.css">
    <link rel="stylesheet" href="<?php echo __ESUI__;?>/themes/default/easyui.css">
    <script type="text/javascript" src="<?php echo __ESUI__;?>/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo __ESUI__;?>/easyloader.js"></script>
    <script type="text/javascript" src="<?php echo __ESUI__;?>/locale/easyui-lang-zh_CN.js"></script>
    <script type="text/javascript" src="<?php echo __ESUI__;?>/jquery.easyui.min.js"></script>
    <script type="text/javascript" src="<?php echo __ESUI__;?>/jquery.edatagrid.js"></script>
</head>
<body class="easyui-layout">

<div region="north" border="true" split="true" style="overflow: hidden;background:#0081D2; height: 120px;">
    <span class="span" style="font-size:40px;position: absolute;top: 30px;left:700px;color:#fff;">欢迎来到管理系统</span>
</div>
<div data-options="region:'south',split:true" style="height:50px;"></div>
<div data-options="region:'west',split:true" title="导航菜单" style="width:200px;">
    <div class="easyui-accordion" data-options="fit:true,border:false">
        <div title="员工中心"    style="padding:10px;">
            <a href="<?php echo U('index');?>">用户列表</a>
            <a href="<?php echo U('register');?>">用户列表</a>
            <a href="<?php echo U('index');?>">用户列表</a>
        </div>
        <div title="用户中心"    style="padding:10px;"></div>
        <div title="订单中心"    style="padding:10px;"></div>
        <div title="商品中心"    style="padding:10px;"></div>
        <div title="系统中心"    style="padding:10px;"></div>

    </div>
</div>





<div data-options="region:'center',iconCls:'icon-ok'">
    <div class="easyui-tabs" data-options="fit:true,border:false,plain:true">
        <div title="员工管理"  style="padding:5px">
        
        </div>
    </div>
</div>
<div style="margin:20px 0;">
</div>





</body>


<script>

    $(function(){
        /* $('#ff1').form({
         url:"<?php echo U('userList?id='.$id);?>",
         success:function(data){
         alert(data);
         $.messager.alert('Info', data, 'info');
         }
         });*/
        $('#dg').edatagrid({
            url: "<?php echo U('user');?>",
            saveUrl: "<?php echo U('update');?>",
            updateUrl: "<?php echo U('update');?>",
            destroyUrl: "<?php echo U('delete');?>"
        });

    });


    function saveUser(){
        $('#ff').form('submit',{
            url: "<?php echo U('user/register');?>",
            dataType:'json',
            onSubmit: function(){
                return $(this).form('validate');
            },
            success: function(result){

                var result = eval('('+result+')');
                if(/(^[1-9][0-9]*)$/.test(result)){
                    $('#ff').form('clear');
                    alert('成功');
                }else{
                    alert(result);
                }
                if (result.errorMsg){
                    $.messager.show({
                        title: 'Error',
                        msg: result.errorMsg
                    });
                    //alert(msg);
                } else {
                    $('#dlg').dialog('close');		// close the dialog
                    $('#dg').datagrid('reload');	// reload the user data
                }
            }

        });
    }


</script>


</html>