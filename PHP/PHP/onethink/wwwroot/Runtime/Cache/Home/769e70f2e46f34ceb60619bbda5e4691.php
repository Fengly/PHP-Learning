<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>后台管理</title>
    <link rel="stylesheet" type="text/css" href="<?php echo __ESUI__;?>/themes/color.css">
    <link rel="stylesheet" type="text/css" href="<?php echo __ESUI__;?>/themes/mobile.css">
    <link rel="stylesheet" type="text/css" href="<?php echo __ESUI__;?>/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="<?php echo __ESUI__;?>/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="<?php echo __ESUI__;?>/demo/demo.css">

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
            <div title="人员管理" class="easyui-panel"  style="border:none; padding:5px">
                <ul class="easyui-tree " checkbox="false"  data-options="url:'<?php echo __ESUI__;?>/menu.json',method:'get',lines:true,"iconCls="icon-no">

                </ul>
            </div>
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
        

    <div id="toolbar">
        <a href="#"  class="easyui-linkbutton hidden" iconCls="icon-add" plain="true" onclick="$('#w').window('open')">新建</a>
        <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="javascript:$('#dg').edatagrid('destroyRow')">删除</a>
        <a href="#" class="easyui-linkbutton" iconCls="icon-save" plain="true" onclick="editUser()">编辑</a>
        <a href="#" class="easyui-linkbutton" iconCls="icon-undo" plain="true" onclick="javascript:$('#dg').edatagrid('reload')">重载数据</a>
        <a href="#" class="easyui-linkbutton" iconCls="icon-search" plain="true" onclick="$('#dgll').window('open')">高级搜索</a>
    </div>



            <div id="div" class="hide"  data-options="region:'center'" title="员工管理" style="padding: 5px;width:1400px;">
                <div id="tb" style="padding:3px">
                    <span>ID:</span>
                    <input id="itemid" style="line-height:26px;border:1px solid #ccc">
                    <span>用户名:</span>
                    <input id="productid" style="line-height:26px;border:1px solid #ccc">
                    <a href="#" class="easyui-linkbutton" plain="true" onclick="doSearch()">提交</a>
                </div>


                    <table id="dg"  class="easyui-datagrid" style="width:1400px;height:500px"

                       toolbar="#toolbar"  pagination="true"
                       rownumbers="true" fitColumns="true" singleSelect="true">
                    <thead>
                    <tr>
                        <th field="uid" width="50"  editor="{options:{required:true}}">关联ID</th>
                        <th field="nickname" width="50"  editor="{options:{required:true}}">用户名称</th>
                        <th field="score" width="50" editor="{options:{required:true}}">积分</th>
                        <th field="mobile" width="50" editor="">联系电话</th>
                        <th field="email" width="50" editor="">邮箱</th>
                        <th field="type" width="50" editor="">状态</th>
                        <th field="time" width="50" editor="{options:{required:true}}">更新时间</th>

                    </tr>
                    </thead>
                </table>

            </div>


    <div id="w" class="easyui-window " title="新增用户"  data-options="closed:true,modal:false,iconCls:'icon-save'" style="width:400px;height:400px;padding:5px;">
        <div class="easyui-layout" data-options="fit:true">

            <div data-options="region:'center'" style="padding:10px;">
                <form id="ff"  method="post">
                    <table cellpadding="10" id="sv" title="新增用户"
                           toolbar="#toolbar" pagination="true" idField="id"
                           rownumbers="true" fitColumns="true" singleSelect="true" >
                        <tr>
                            <td>Name:</td>
                            <td><input  type="text" name="username" placeholder="请输入6-16位用户名" data-options="required:true"></td>
                        </tr>
                        <tr>
                            <td>password:</td>
                            <td><input  type="password" placeholder="请输入密码" name="password" data-options="required:true'"></td>
                        </tr>
                        <tr>
                            <td>repassword:</td>
                            <td><input  type="password" placeholder="请输入密码" name="repassword" data-options="required:true"></td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td><input  type="text" placeholder="请输入正确的邮箱" name="email" data-options="required:true"></td>
                        </tr>

                    </table>
                </form>
            </div>
            <div data-options="region:'south',border:false" style="text-align:right;padding:5px 0 0;">
                <a onclick="saveUser()" class="easyui-linkbutton" data-options="iconCls:'icon-ok'"  plain="true"  style="width:80px">Ok</a>
                <a class="easyui-linkbutton" data-options="iconCls:'icon-cancel'" href="javascript:void(0)" onclick="$('#w').window('close')" style="width:80px">Cancel</a>
            </div>
        </div>
    </div>

    <div id="dgl" class="easyui-window " title="编辑员工"  data-options="closed:true,modal:false,iconCls:'icon-save'" style="width:400px;height:400px;padding:5px;">
        <div class="easyui-layout" data-options="fit:true">

            <div data-options="region:'center'" style="padding:10px;">
                <form id="ff1"  method="post">
                    <table id="table" cellpadding="10"  title="编辑员工">

                        <tr>
                            <td >Name:</td>
                            <td><input class="" type="text" name="nickname" data-options="required:true"></td>
                        </tr>
                        <tr>
                            <td>Mobile:</td>
                            <td><input  type="text" placeholder="请输入手机号" name="mobile" data-options="required:true'"></td>
                        </tr>
                        <tr>
                            <input type="hidden" name="id">
                            <td>QQ号码:</td>
                            <td><input  type="text" placeholder="请输入QQ号码" name="qq" data-options="required:true"></td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td><input  type="text" placeholder="请输入正确的邮箱" name="email" data-options="required:true"></td>
                        </tr>
                        <tr>
                            <td>Birthday:</td>
                            <td><input  class="easyui-datebox" type="text" placeholder="请选择您的生日" name="birthday" data-options="required:true"></td>
                        </tr>

                    </table>
                </form>
            </div>
            <div data-options="region:'south',border:false" style="text-align:right;padding:5px 0 0;">
                <a onclick="Update()" class="easyui-linkbutton" data-options="iconCls:'icon-ok'"  plain="true"  style="width:80px">Ok</a>
                <a class="easyui-linkbutton" data-options="iconCls:'icon-cancel'" href="javascript:void(0)" onclick="$('#dgl').window('close')" style="width:80px">Cancel</a>
            </div>
        </div>
    </div>
    <div id="dgll" class="easyui-window " title="高级搜索"  data-options="closed:true,modal:false,iconCls:'icon-save'" style="width:800px;height:400px;padding:5px;">
        <div class="easyui-layout" data-options="fit:true">
            <div data-options="region:'center'" style="padding:10px;">
                <form id="ff2"  method="post">

                </form>
            </div>
            <div data-options="region:'south',border:false" style="text-align:right;padding:5px 0 0;">
                <a onclick="souSuo()" class="easyui-linkbutton" data-options="iconCls:'icon-ok'"  plain="true"  style="width:80px">Ok</a>
                <a class="easyui-linkbutton" data-options="iconCls:'icon-cancel'" href="javascript:void(0)" onclick="$('#dgll').window('close')" style="width:80px">Cancel</a>
            </div>
        </div>
    </div>



        </div>
    </div>
</div>
</body>



    <script>
        function doSearch(){
            $('#dg').edatagrid('load',{
                'uid': $('#itemid').val(),
                'nickname': $('#productid').val()
            });
        }

        var url;
        //修改信息
        function editUser(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                $('#dgl').dialog('open').dialog('setTitle','Edit User');
                $('#ff1').form('load',row);
                url = 'index?id='+row.id;
            }
        }
        function Update(){

            $('#ff1').form('submit',{
            
                url: "<?php echo U('update');?>",
                onSubmit: function(){
                    return $(this).form('validate');
                },
                success: function(result){

                    var result = eval('('+result+')');
                    if(result == 1){
                        $('#dgl').dialog('close');
                        alert('成功');
                    }else{
                        alert(result);
                    }
                    if (result.errorMsg){
                        $.messager.show({
                            title: 'Error',
                            msg: result.errorMsg
                        });

                    } else {

                        $('#dlg').dialog('close');		// close the dialog
                        $('#dg').datagrid('reload');	// reload the user data
                    }
                },
                error:function () {

                }

            });
        }

$(function() {

    //初始化表格数据
        $('#dg').edatagrid({
            url: "<?php echo U('user');?>"
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