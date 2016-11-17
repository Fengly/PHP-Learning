<?php  
session_start();   
include "submit_checkuser.php";
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>用户注册</title>
<style type="text/css">
<!--
.style1 {
	font-size: 14px;
	font-family: "宋体";
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #EFF3FF;
}
.style2 {
	font-size: 13px;
	font-family: "宋体";
}
.style3 {font-size: 13px;
	font-family: "宋体";
	font-weight: normal;
}
-->
</style>
<script language=JavaScript src=script/zhuce_check.js type=text/javascript></script>
</head>
<body>
<div align="center"><?php  include"head.php";?></div>
<table width="776" border="0" align="center" cellpadding="0" cellspacing="0" background="image/555.gif">
  <tr>
    <td width="15">&nbsp;</td>
    <td width="760" height="30"><span class="style1">&nbsp;== 用户注册信息填写 == </span></td>
  </tr>
</table>
<table width="776"  border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="5" align="left" valign="top" background="image/zc1.gif">&nbsp;</td>
        <td width="282" height="263" align="center" valign="top"><table width="88%"  border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="55%" height="70">&nbsp;</td>
            <td width="45%">&nbsp;</td>
          </tr>
          <tr align="left" valign="top">
          <td height="355" colspan="2"><ul>
              <li class="style1"> 用 户 名：为用户登录在线论坛的通行证，可使用英文字母、数字或英文字母、数字、下划线的组合，长度控制在6-20个字符之内。</li>
              <li class="style1">真实姓名： 请输入真实的姓名，该项为隐藏项，用户可以放心输入。</li>
              <li class="style1">密码：请设定在6-20位之间，登录密码及确认密码必须一致。</li>
              <li class="style1">生 日：输入您的生日，如果您的生日是1980年7月17日则输入：1980-07-17。</li>
              <li class="style1">联系电话：请输入座机号，如0431-9999**** </li>
              <li class="style1">头 像：可以通过头像下拉列表框选择头像。</li>
              <li class="style1">Email：请填写有效的Email地址，以便与您联系。</li>
            </ul>            
          <p class="style1">&nbsp; </p>
            </td>
          </tr>
        </table></td>
        <td width="10" background="image/zc2.gif">&nbsp;</td>
        <td width="470" align="center" valign="top">
		  <table width="88%"  border="0" cellpadding="0" cellspacing="0">
        <form name="zhuce" method="post" action="zc_ok.php" enctype="multipart/form-data" onSubmit="javascript: return checkit();">
		  <tr>
		    <td width="18%" rowspan="2" align="center" valign="bottom"><span class="style2">用 户 名:</span></td>
		    <td height="16" valign="bottom"></td>
	      </tr>
		  <tr>
            <td height="16" valign="bottom"><input name="zc_username" type="text" id="zc_username" size="20" maxlength="20" value=""> 
              * <a href="javascript:{user_check(zhuce);}" class="style2" ><font color="#FF0000">检测用户名</font></a></td>
          </tr>
          <tr>
            <td height="28" align="center" class="style2">真实姓名:</td>
            <td><input name="zsxm" type="text" id="zsxm" size="20" maxlength="10">
              *</td>
          </tr>
          <tr>
            <td height="28" align="center" class="style2">密&nbsp;&nbsp;&nbsp;&nbsp;码:</td>
            <td><input name="zc_password" type="password" id="zc_password" size="20" maxlength="30">
              *</td>
          </tr>
          <tr>
            <td height="28" align="center" class="style2">密码确认:</td>
            <td><input name="mmqr" type="password" id="mmqr" size="20" maxlength="30">
              *</td>
          </tr>
          <tr>
            <td height="28" align="center" class="style2">性&nbsp;&nbsp;&nbsp;&nbsp;别:</td>
            <td class="style2"><input name="sex" type="radio" value="男" checked>
              男
                <input type="radio" name="sex" value="女">
                女</td>
          </tr>
          <tr>
            <td height="28" align="center" class="style2">生&nbsp;&nbsp;&nbsp;&nbsp;日:</td>
            <td><input name="shengri" type="text" id="shengri" size="20" maxlength="20"></td>
          </tr>
          <tr>
            <td height="28" align="center" class="style2">联系电话:</td>
            <td><input name="lxdh" type="text" id="lxdh" size="15" maxlength="20">
              *</td>
          </tr>
          <tr>
            <td height="28" align="center" class="style2">OICQQ号:</td>
            <td><input name="qq" type="text" id="qq" size="20" maxlength="20"></td>
          </tr>
          <tr>
            <td height="95" align="center" valign="middle" class="style2">选择头像:</td>
            <td align="left" valign="top">			<table width="316" cellpadding="0" cellspacing="0">
              <tr>
                <td width="13" height="47">
   <script language="javascript">
//通过下拉列表选择头像时应用该函数
function showlogo(){
document.images.img.src="image/tx/"+
document.zhuce.ICO.options[document.zhuce.ICO.selectedIndex].value;
}
</script>

                </td>
                <td width="145"><img src="image/tx/1.gif" name="img" width="60" height="60"></td>
                <td width="225">&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
				<td><select size="1" name="ICO" onChange="showlogo()">
                      <option value="1.gif">头像1
                      <option value="2.gif">头像2
                      <option value="3.gif">头像3
				      <option value="4.gif">头像4
                      <option value="5.gif">头像5
                      <option value="6.gif">头像6
                      <option value="7.gif">头像7
                      <option value="8.gif">头像8
                      <option value="9.gif">头像9
                      <option value="10.gif">头像10
                  </select></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="28" align="center" class="style2">Email:</td>
            <td><input name="email" type="text" id="email" size="40" maxlength="50">              
            *</td>
          </tr>
          <tr>
            <td height="28" align="center" class="style2">个人主页:</td>
            <td><input name="grzy" type="text" id="grzy" size="40" maxlength="50"></td>
          </tr>
          <tr>
            <td height="28" align="center" class="style2">联系地址:</td>
            <td><input name="lxdz" type="text" id="lxdz" size="40" maxlength="100">
            *</td>
          </tr>
          <tr>
            <td height="34" align="center">&nbsp;</td>
            <td class="style2"><input name="qrtj" type="submit" id="qrtj" value="确认提交">
              <input type="reset" name="Submit2" value="刷新重置"></td>
          </tr>
		  </form>
        </table>
          
        </td>
        <td width="9" align="right" valign="top" background="image/zc3.gif">&nbsp;</td>
      </tr>
      <tr>
        <td height="10" colspan="5" align="center" valign="top"><img src="image/zc5.gif" width="776" height="10"></td>
      </tr>
</table>
<div align="center"><?php include"under.php";?></div>
</body>
</html>
