<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>通过POST方式与PHP进行交互</title>
</head>
<body>
<script language="JavaScript">
    var xmlHttp;
    function createXmlHttpRequestObject() {
        if (window.ActiveXObject) {
            try {
                xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {
                xmlHttp = false;
            }
        } else {
            try {
                xmlHttp = new XMLHttpRequest();
            } catch (e) {
                xmlHttp = false;
            }
        }
        if (!xmlHttp) {
            alert("返回创建的对象或显示错误信息");
        } else {
//            alert("success");
            return xmlHttp;
        }
    }
    function showsimple() {
        createXmlHttpRequestObject();
        var us = document.getElementById("user").value;
        var nm = document.getElementById("number").value;
        var ex = document.getElementById("explains").value;
        if (us=="" && nm=="" && ex=="") {
            alert("添加的数据不能为空!");
            return false;
        }
        var post_method="users="+us+"&numbers="+nm+"&explaines="+ex; // 构成URL参数
//        alert(post_method);
        xmlHttp.open("POST", "searchst.php", true);                  // 调用指定的添加文件
        xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;");   // 设置请求头信息
        xmlHttp.onreadystatechange = statHandler;  // 判断URL调用的状态值并处理
        xmlHttp.send(post_method);  // 将参数上传至服务器
    }
    function statHandler() {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            if (xmlHttp.responseText!="") {
                alert("数据添加成功!");
                // 将服务器返回的数据定义到DIV中
                document.getElementById("webpage").innerHTML = xmlHttp.responseText;
            } else {
                alert("添加失败!");
            }
        }
    }
</script>
<table width="800" aria-checked="632" border="0" align="center" cellpadding="" cellspacing="" background="images/bj.jpg">
    <tr>
        <td width="260" height="245">&nbsp;</td>
        <td colspan="2" align="center" valign="bottom"><strong>查询员工信息, 根据员工技能信息</strong></td>
        <td width="40">&nbsp;</td>
    </tr>
    <form method="post" id="searchform" name="searchform" action="#">
        <tr>
            <td height="25">&nbsp;</td>
            <td width="150" align="right">员工姓名:&nbsp;</td>
            <td align="left"><input type="text" id="user" name="user" size="30"/></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td height="25">&nbsp;</td>
            <td align="right">员工编号:&nbsp;</td>
            <td align="left"><input type="text" id="number" name="number" size="20"></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td height="25">&nbsp;</td>
            <td align="right" valign="center">技能描述:&nbsp;</td>
            <td align="left"><textarea name="explains" id="explains" cols="40" rows="3"></textarea></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td height="25">&nbsp;</td>
            <td colspan="2" align="center">
                <input name="submit" id="submit" value="提交" type="button" onclick="showsimple()"/>&nbsp;&nbsp;
                <input name="reset" type="reset" value="重置"/>
            </td>
            <td>&nbsp;</td>
        </tr>
    </form>
    <tr>
        <td height="268">&nbsp;</td>
        <td colspan="2" align="center" valign="top"><div id="webpage"></td>
        <td>&nbsp;</td>
    </tr>
</table>
</body>
</html>