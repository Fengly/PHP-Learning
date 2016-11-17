<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>在电子商务平台网中应用Ajax技术检测用户名</title>
</head>
<body bgcolor="#00ffff">
<link rel="stylesheet" type="text/css" href="css/font.css">
<script language="JavaScript">
    function chknc(nc) {
        var xmlhttp;
        if (window.ActiveXObject) {
            try {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            } catch(e) {
                xmlhttp = false;
            }
        } else {
            try {
                xmlhttp = new XMLHttpRequest();
            } catch(e) {
                xmlhttp = false;
            }
        }
        if (xmlhttp) {
            xmlhttp.open("GET", "chkusernc.php?nc="+nc, true);
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                    var msg = xmlhttp.responseText;
                    if (msg == 0) {
                        alert("请输入昵称! ");
                    } else if (msg == 1) {
                        alert("该昵称已被使用! ");
                    } else {
                        alert("该昵称可以使用! ");
                    }
                }
            }
        }
        xmlhttp.send(null);
    }
</script>
<script language="JavaScript">
    function chkinput(form) {
        if (form.usernc.value == "") {
            alert("用户名不能为空!");
            form.usernc.select();
            return false;
        }
        if (form.p1.value == "") {
            alert("密码不能为空!");
            form.p1.select();
            return false;
        }
        if (form.p2.value == "") {
            alert("请输入确认密码!");
            form.p2.select();
            return false;
        }
        if (form.p1.value.length < 6) {
            alert("密码长度不能小于6!");
            form.p1.select();
            return false;
        }
        if (form.p1.value != form.p2.value) {
            alert("两次输入密码不匹配!");
            form.p1.select();
            return false;
        }
        if (form.email.value == "") {
            alert("请输入E_mail");
            form.email.select();
            return false;
        }
        if (!isEmail(form.email.value)) {
            alert("请输入正确的E_mail编号");
            form.email.select();
            return false;
        }
        if (form.tel.value == "") {
            alert("联系方式不能为空!");
            form.tel.select();
            return false;
        }
        if (!isTelephone(form.tel.value)) {
            alert("请输入正确的联系方式!");
            form.tel.select();
            return false;
        }
        if (form.name.value == "") {
            alert("真实姓名不能为空");
            form.name.select();
            return false;
        }
        if (form.ID_card.value == "") {
            alert("省份证号不能为空");
            form.ID_card.select();
            return false;
        }
        if (!isID_Card(form.ID_card.value)) {
            alert("请输入正确的省份证号码!");
            form.ID_card.select();
            return false;
        }
        if (form.address.value == "") {
            alert("地址不能为空! ");
            form.address.select();
            return false;
        }
        if (form.select_qustion.value == 1 && form.select_qustion2.value == "") {
            alert("请选择密码提示问题或输入密码提示问题! ");
            return false;
        }
        if (form.answer.value == "") {
            alert("提示答案不能为空!");
            form.answer.select();
            return false;
        }
    }
    function isEmail(email){
        var reg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/;
        return reg.test(email);
    }
    function isTelephone(telephone) {
        var reg = /^1[3|5|8][0-9]\d{4,8}$/;
        return reg.test(telephone);
    }
    function isID_Card(id_card) {
        var reg = /(^\d{15}$)|(^\d{17}([0-9]|X)$)/;
        return reg.test(id_card);
    }
</script>
<table width="566" height="350" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
        <td width="561" align="center" valign="top" bgcolor="#FFFFFF">
            <table width="557" height="15" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                    <td width="500">
                        <table width="557" bgcolor="0" align="center" cellspacing="0" cellpadding="0">
                            <tr>
                                <td width="557" height="46" background="images/user.gif">
                                    <div align="center" style="color: #ffffff"></div>
                                </td>
                            </tr>
                            <tr>
                                <td bgcolor="#555555">
                                    <table width="557" bgcolor="0" align="center" cellpadding="0" cellspacing="0">
                                        <form name="form1" method="post" action="savereg.php" onsubmit="return chkinput(this)">
                                            <tr>
                                                <td width="100" height="20" bgcolor="#FFFFFF">
                                                    <div align="center">&nbsp;&nbsp;用户昵称:</div>
                                                </td>
                                                <td width="397" bgcolor="#FFFFFF">
                                                    <div align="left">
                                                        <input title="" type="text" name="usernc" id="usernc" size="25" class="inputcss"
                                                               style="background-color: #e8f4ff" onmouseover="this.style.backgroundColor='#ffffff'"
                                                               onmouseout="this.style.backgroundColor='#e8f4ff'"
                                                        />
                                                        <span style="color: #FF0000">&nbsp;*</span>&nbsp;
                                                        <input name="button2" type="button" class="buttoncss" onclick="chknc(form1.usernc.value)" value="查看昵称是否已用"/>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="20" bgcolor="#FFFFFF">
                                                    <div align="center">&nbsp;&nbsp;注册密码:</div>
                                                </td>
                                                <td height="20" bgcolor="#FFFFFF">
                                                    <div align="left">
                                                        <input type="password" name="p1" size="25" class="inputcss" style="background-color:#e8f4ff "
                                                               onMouseOver="this.style.backgroundColor='#ffffff'"
                                                               onMouseOut="this.style.backgroundColor='#e8f4ff'"
                                                        />
                                                        <span style="color: #FF0000">&nbsp;*</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="20" bgcolor="#FFFFFF">
                                                    <div align="center">&nbsp;&nbsp;确认密码:</div>
                                                </td>
                                                <td height="20" bgcolor="#FFFFFF">
                                                    <div align="left">
                                                        <input type="password" name="p2" size="25" class="inputcss" style="background-color:#e8f4ff "
                                                               onMouseOver="this.style.backgroundColor='#ffffff'"
                                                               onMouseOut="this.style.backgroundColor='#e8f4ff'"
                                                        />
                                                        <span style="color: #FF0000">&nbsp;*</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="20" bgcolor="#FFFFFF">
                                                    <div align="center">&nbsp;&nbsp;E-mail:</div>
                                                </td>
                                                <td height="20" bgcolor="#ffffff">
                                                    <div align="left">
                                                        <input type="text" name="email" size="25" class="inputcss" style="background-color:#e8f4ff "
                                                               onMouseOver="this.style.backgroundColor='#ffffff'"
                                                               onMouseOut="this.style.backgroundColor='#e8f4ff'"
                                                        />
                                                        <span style="color: #FF0000">&nbsp;*</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="20" bgcolor="#FFFFFF">
                                                    <div align="center">&nbsp;&nbsp;QQ 号码:</div>
                                                </td>
                                                <td bgcolor="#FFFFFF">
                                                    <div align="left">
                                                        <input  type="text" name="qq" size="25" class="inputcss" style="background-color:#e8f4ff "
                                                                onMouseOver="this.style.backgroundColor='#ffffff'"
                                                                onMouseOut="this.style.backgroundColor='#e8f4ff'"
                                                        />
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="20" bgcolor="#FFFFFF">
                                                    <div align="center">&nbsp;&nbsp;邮政编码:</div>
                                                </td>
                                                <td bgcolor="#FFFFFF">
                                                    <div align="left">
                                                        <input  type="text" name="yb" size="25" class="inputcss" style="background-color:#e8f4ff "
                                                                onMouseOver="this.style.backgroundColor='#ffffff'"
                                                                onMouseOut="this.style.backgroundColor='#e8f4ff'"
                                                        />
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="20" bgcolor="#FFFFFF">
                                                    <div align="center">&nbsp;&nbsp;联系方式:</div>
                                                </td>
                                                <td bgcolor="#FFFFFF">
                                                    <div align="left">
                                                        <input  type="text" name="tel" size="25" class="inputcss" style="background-color:#e8f4ff "
                                                                onMouseOver="this.style.backgroundColor='#ffffff'"
                                                                onMouseOut="this.style.backgroundColor='#e8f4ff'"
                                                        />
                                                        <span style="color: #FF0000">&nbsp;(手机号)*</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="20" bgcolor="#FFFFFF">
                                                    <div align="center">&nbsp;&nbsp;真实姓名:</div>
                                                </td>
                                                <td bgcolor="#FFFFFF">
                                                    <div align="left">
                                                        <input  type="text" name="name" size="25" class="inputcss" style="background-color:#e8f4ff "
                                                                onMouseOver="this.style.backgroundColor='#ffffff'"
                                                                onMouseOut="this.style.backgroundColor='#e8f4ff'"
                                                        />
                                                        <span style="color: #FF0000">&nbsp;*</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="20" bgcolor="#FFFFFF">
                                                    <div align="center">&nbsp;&nbsp;身份证号:</div>
                                                </td>
                                                <td bgcolor="#FFFFFF">
                                                    <div align="left">
                                                        <input  type="text" name="ID_card" size="25" class="inputcss" style="background-color:#e8f4ff "
                                                                onMouseOver="this.style.backgroundColor='#ffffff'"
                                                                onMouseOut="this.style.backgroundColor='#e8f4ff'"
                                                        />
                                                        <span style="color: #FF0000">&nbsp;*</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="20" bgcolor="#FFFFFF">
                                                    <div align="center">&nbsp;&nbsp;家庭住址:</div>
                                                </td>
                                                <td bgcolor="#FFFFFF">
                                                    <div align="left">
                                                        <input  type="text" name="address" size="25" class="inputcss" style="background-color:#e8f4ff "
                                                                onMouseOver="this.style.backgroundColor='#ffffff'"
                                                                onMouseOut="this.style.backgroundColor='#e8f4ff'"
                                                        />
                                                        <span style="color: #FF0000">&nbsp;*</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="20" bgcolor="#FFFFFF">
                                                    <div align="center">&nbsp;&nbsp;密码提示:</div>
                                                </td>
                                                <td bgcolor="#FFFFFF">
                                                    <div align="left">
                                                        <select name="select_qustion" class="inputcss">
                                                            <option selected value=1>请选择问题</option>
                                                            <option value="您的生日">您的生日</option>
                                                            <option value="你的爱好">你的爱好</option>
                                                            <option value="您母亲的名字">您母亲的名字</option>
                                                            <option value="您父亲的名字">您父亲的名字</option>
                                                            <option value="您最喜欢的花">您最喜欢的花</option>
                                                        </select>
                                                        &nbsp;&nbsp;其他:&nbsp;&nbsp;
                                                        <input type="text" name="select_qustion2" class="inputcss"  size="15" style="background-color:#e8f4ff "
                                                               onMouseOver="this.style.backgroundColor='#ffffff'"
                                                               onMouseOut="this.style.backgroundColor='#e8f4ff'"
                                                        />
                                                        <span style="color: #FF0000">*</span></div></td>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="20" bgcolor="#FFFFFF">
                                                    <div align="center">&nbsp;&nbsp;提示答案:</div>
                                                </td>
                                                <td bgcolor="#FFFFFF">
                                                    <div align="left">
                                                        <input  type="text" name="answer" size="25" class="inputcss" style="background-color:#e8f4ff "
                                                                onMouseOver="this.style.backgroundColor='#ffffff'"
                                                                onMouseOut="this.style.backgroundColor='#e8f4ff'"
                                                        />
                                                        <span style="color: #FF0000">&nbsp;*</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" height="5" bgcolor="#ffffff"></td>
                                            </tr>
                                            <tr>
                                                <td height="20" colspan="2" bgcolor="#FFFFFF"><div align="center">
                                                        <input name="submit2" type="submit" class="buttoncss" value="提交">
                                                        &nbsp;&nbsp;
                                                        <input name="reset" type="reset" class="buttoncss" value="重置">
                                                    </div></td>
                                            </tr>
                                        </form>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        <table width="557" height="25" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                                <td width="547"><div align="center" style="color: #FF0000">注意：带*为必填内容!
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>









