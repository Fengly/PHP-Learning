<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
    <meta content="text/html" http-equiv="content-type; charset=utf8">
    <title>电子商务平台</title>
    <link rel="stylesheet" type="text/css" href="css/font.css">
</head>
<script language="JavaScript">
    function openspg() {
        if (document.all.spgl.style.display == "none") {
            document.all.spgl.style.display = "";
            document.all.d1.src = "images/point3.gif";
        } else {
            document.all.spgl.style.display = "none";
            document.all.d1.src = "images/point1.gif";
        }
    }
    function openyhgl(){
        if(document.all.yhgl.style.display=="none"){
            document.all.yhgl.style.display="";
            document.all.d2.src="images/point3.gif";
        }
        else{
            document.all.yhgl.style.display="none";
            document.all.d2.src="images/point1.gif";
        }
    }
    function openddgl(){
        if(document.all.ddgl.style.display=="none"){
            document.all.ddgl.style.display="";
            document.all.d3.src="images/point3.gif";
        }
        else{
            document.all.ddgl.style.display="none";
            document.all.d3.src="images/point1.gif";
        }
    }
    function opengggl(){
        if(document.all.gggl.style.display=="none"){
            document.all.gggl.style.display="";
            document.all.d4.src="images/point3.gif";
        }
        else{
            document.all.gggl.style.display="none";
            document.all.d4.src="images/point1.gif";
        }
    }
</script>
<body topmargin="0" leftmargin="0" bottommargin="0">
<table width="212" border="0" cellpadding="0" cellspacing="0" background="images/left_bg.gif">
    <tr>
        <td height="490" valign="top" background="images/left_bg.gif">
            <div align="center">
                <td valign="top">
                    <table width="212" height="20" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="212" height="32" background="images/default_09.gif" onclick="openspg()">
                                <div align="center">
                                    <a href="#">
                                        <img src="images/point3.gif" id="d1" width="10" height="10" alt="">&nbsp;&nbsp;商品管理
                                    </a>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <table width="212" border="0" cellpadding="0" cellspacing="0" id="spgl" style="display: ">
                        <tr>
                            <td height="20" background="images/default_10.gif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="managegoods/addgoods.php" target="main">添加商品</a>
                            </td>
                        </tr>
                        <tr>
                            <td height="20" background="images/default_10.gif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="managegoods/editgoods.php" target="main">修改商品</a>
                            </td>
                        </tr>
                        <tr>
                            <td height="20" background="images/default_10.gif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="managegoods/managergoodstype.php" target="main">商品类别管理</a>
                            </td>
                        </tr>
                        <tr>
                            <td height="24" background="images/default_12.gif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="managegoods/addgoodstype.php" target="main">添加商品类别</a>
                            </td>
                        </tr>
                    </table>

                    <table width="212" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="212" height="32" background="images/default_09.gif" onclick="openyhgl()">
                                <div align="center">
                                    <a href="#">
                                        <img src="images/point3.gif" id="d2" width="10" height="10" alt="">&nbsp;&nbsp;用户管理
                                    </a>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <table width="212" border="0" cellspacing="0" cellpadding="0" id="yhgl" style="display: ">
                        <tr>
                            <td height="20" background="images/default_10.gif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="manageusers/edituser.php" target="main">用户信息管理</a>
                            </td>
                        </tr>
                        <tr>
                            <td height="20" background="images/default_10.gif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="manageusers/usermessage.php" target="main">用户留言管理</a>
                            </td>
                        </tr>
                        <tr>
                            <td height="24" background="images/default_12.gif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="manageusers/managerinfo.php" target="main">更改管理员信息</a>
                            </td>
                        </tr>
                    </table>

                    <table width="212" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="212" height="32" background="images/default_09.gif" onclick="openddgl()">
                                <div align="center">
                                    <a href="#">
                                        <img src="images/point3.gif" id="d3" width="10" height="10" alt="">&nbsp;&nbsp;订单管理
                                    </a>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <table width="212" border="0" cellpadding="0" cellspacing="0" id="ddgl" style="display: ">
                        <tr>
                            <td height="20" background="images/default_10.gif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="manageorder/editorder.php" target="main">编辑订单</a>
                            </td>
                        </tr>
                        <tr>
                            <td height="24" background="images/default_12.gif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="manageorder/selectorder.php" target="main">查询订单</a>
                            </td>
                        </tr>
                    </table>

                    <table width="212" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="212" height="32" background="images/default_09.gif" onclick="opengggl()">
                                <div align="center">
                                    <a href="#">
                                        <img src="images/point3.gif" id="d4" width="10" height="10" alt="">&nbsp;&nbsp;信息管理
                                    </a>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <table width="212" border="0" cellpadding="0" cellspacing="0" id="gggl" style="display: ">
                        <tr>
                            <td height="20" background="images/default_10.gif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="managerinformation/announcement.php" target="main">公告管理</a>
                            </td>
                        </tr>
                        <tr>
                            <td height="20" background="images/default_10.gif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="managerinformation/addannounce.php" target="main">添加公告</a>
                            </td>
                        </tr>
                        <tr>
                            <td height="24" background="images/default_12.gif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="managerinformation/comment.php" target="main">评论管理</a>
                            </td>
                        </tr>
                    </table>
                    <table width="212" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td height="80" background="images/left_bottom.gif">&nbsp;</td>
                        </tr>
                        <tr>
                            <td height="3" background="images/left_stop.gif"></td>
                        </tr>
                    </table>
                </td>
            </div>
        </td>
    </tr>
</table>
</body>
</html>



































