<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>通过GET方式与PHP进行交互</title>
</head>
<body>
<script language="javascript">
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
            return xmlHttp;
        }
    }
    function showSimple() {
        createXmlHttpRequestObject();
        var cont = document.getElementById("searchtxt").value;
        if (cont == "") {
            alert("查询关键字不能为空");
            return false;
        }
        xmlHttp.onreadystatechange = statHander;
        xmlHttp.open("GET", 'searchrst.php?cont='+cont,false);
        xmlHttp.send(null);
    }
    function statHander() {
        if (xmlHttp.readyState==4 && xmlHttp.status==200) {
            document.getElementById("webpage").innerHTML = xmlHttp.responseText;
        }
    }
</script>
<form id="searchform" name="searchform" method="get" action="#">
    <table>
        <tr>
            <td height="40">&nbsp;</td>
            <td align="center">请输入关键字: &nbsp;
                <input title="" name="searchtxt" type="text" id="searchtxt" size="30"/>
                <input title="" name="s_search" type="button" id="s_search" value="查询" onclick="return showSimple()">
            </td>
        </tr>
    </table>
</form>
<table>
    <tr>
        <td align="center" valign="top"><div id="webpage"></div></td>
    </tr>
</table>
</body>
</html>








