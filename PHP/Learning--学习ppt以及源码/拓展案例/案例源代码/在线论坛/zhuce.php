<?php  
session_start();   
include "submit_checkuser.php";
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>�û�ע��</title>
<style type="text/css">
<!--
.style1 {
	font-size: 14px;
	font-family: "����";
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
	font-family: "����";
}
.style3 {font-size: 13px;
	font-family: "����";
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
    <td width="760" height="30"><span class="style1">&nbsp;== �û�ע����Ϣ��д == </span></td>
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
              <li class="style1"> �� �� ����Ϊ�û���¼������̳��ͨ��֤����ʹ��Ӣ����ĸ�����ֻ�Ӣ����ĸ�����֡��»��ߵ���ϣ����ȿ�����6-20���ַ�֮�ڡ�</li>
              <li class="style1">��ʵ������ ��������ʵ������������Ϊ������û����Է������롣</li>
              <li class="style1">���룺���趨��6-20λ֮�䣬��¼���뼰ȷ���������һ�¡�</li>
              <li class="style1">�� �գ������������գ��������������1980��7��17�������룺1980-07-17��</li>
              <li class="style1">��ϵ�绰�������������ţ���0431-9999**** </li>
              <li class="style1">ͷ �񣺿���ͨ��ͷ�������б��ѡ��ͷ��</li>
              <li class="style1">Email������д��Ч��Email��ַ���Ա�������ϵ��</li>
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
		    <td width="18%" rowspan="2" align="center" valign="bottom"><span class="style2">�� �� ��:</span></td>
		    <td height="16" valign="bottom"></td>
	      </tr>
		  <tr>
            <td height="16" valign="bottom"><input name="zc_username" type="text" id="zc_username" size="20" maxlength="20" value=""> 
              * <a href="javascript:{user_check(zhuce);}" class="style2" ><font color="#FF0000">����û���</font></a></td>
          </tr>
          <tr>
            <td height="28" align="center" class="style2">��ʵ����:</td>
            <td><input name="zsxm" type="text" id="zsxm" size="20" maxlength="10">
              *</td>
          </tr>
          <tr>
            <td height="28" align="center" class="style2">��&nbsp;&nbsp;&nbsp;&nbsp;��:</td>
            <td><input name="zc_password" type="password" id="zc_password" size="20" maxlength="30">
              *</td>
          </tr>
          <tr>
            <td height="28" align="center" class="style2">����ȷ��:</td>
            <td><input name="mmqr" type="password" id="mmqr" size="20" maxlength="30">
              *</td>
          </tr>
          <tr>
            <td height="28" align="center" class="style2">��&nbsp;&nbsp;&nbsp;&nbsp;��:</td>
            <td class="style2"><input name="sex" type="radio" value="��" checked>
              ��
                <input type="radio" name="sex" value="Ů">
                Ů</td>
          </tr>
          <tr>
            <td height="28" align="center" class="style2">��&nbsp;&nbsp;&nbsp;&nbsp;��:</td>
            <td><input name="shengri" type="text" id="shengri" size="20" maxlength="20"></td>
          </tr>
          <tr>
            <td height="28" align="center" class="style2">��ϵ�绰:</td>
            <td><input name="lxdh" type="text" id="lxdh" size="15" maxlength="20">
              *</td>
          </tr>
          <tr>
            <td height="28" align="center" class="style2">OICQQ��:</td>
            <td><input name="qq" type="text" id="qq" size="20" maxlength="20"></td>
          </tr>
          <tr>
            <td height="95" align="center" valign="middle" class="style2">ѡ��ͷ��:</td>
            <td align="left" valign="top">			<table width="316" cellpadding="0" cellspacing="0">
              <tr>
                <td width="13" height="47">
   <script language="javascript">
//ͨ�������б�ѡ��ͷ��ʱӦ�øú���
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
                      <option value="1.gif">ͷ��1
                      <option value="2.gif">ͷ��2
                      <option value="3.gif">ͷ��3
				      <option value="4.gif">ͷ��4
                      <option value="5.gif">ͷ��5
                      <option value="6.gif">ͷ��6
                      <option value="7.gif">ͷ��7
                      <option value="8.gif">ͷ��8
                      <option value="9.gif">ͷ��9
                      <option value="10.gif">ͷ��10
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
            <td height="28" align="center" class="style2">������ҳ:</td>
            <td><input name="grzy" type="text" id="grzy" size="40" maxlength="50"></td>
          </tr>
          <tr>
            <td height="28" align="center" class="style2">��ϵ��ַ:</td>
            <td><input name="lxdz" type="text" id="lxdz" size="40" maxlength="100">
            *</td>
          </tr>
          <tr>
            <td height="34" align="center">&nbsp;</td>
            <td class="style2"><input name="qrtj" type="submit" id="qrtj" value="ȷ���ύ">
              <input type="reset" name="Submit2" value="ˢ������"></td>
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
