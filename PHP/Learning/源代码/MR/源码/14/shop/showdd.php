<?php
header ( "Content-type: text/html; charset=gb2312" ); //�����ļ������ʽ
session_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>��Ʒ����</title>
<link rel="stylesheet" type="text/css" href="css/font.css">
<style type="text/css">
<!--
.style5 {
	color: #000000;
	font-weight: bold;
}
.style6 {color: #000000}
.style7 {color: #990000}
-->
</style>
</head>
<?php
  include("conn/conn.php");
  $dingdanhao=$_GET['dd'];
  $sql=mysqli_query($conn,"select * from tb_dingdan where dingdanhao='".$dingdanhao."'");
  $info=mysqli_fetch_array($sql);
  $spc=$info['spc'];
  $slc=$info['slc'];
  $arraysp=explode("@",$spc);
  $arraysl=explode("@",$slc);
?>
<body topmargin="0" leftmargin="0" bottommargin="0" class="scrollbar">
<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="306" bgcolor="#FFFFFF"><table width="600"  border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="20" bgcolor="#FFEDBF"><div align="center" class="style7">��ϲ<?php echo $_SESSION['username'];?>�����ѳɹ����ύ�˴˶���!��ϸ��Ϣ����:</div></td>
      </tr>
      <tr>
        <td height="20" bgcolor="#FFFFFF"><div align="left"><span class="style5">&nbsp;�����ţ�</span><?php echo $dingdanhao;?></div></td>
      </tr>
      <tr>
        <td height="20" bgcolor="#FFFFFF"><div align="left" class="style5">&nbsp;��Ʒ�б�(����)��</div></td>
      </tr>
    </table>
      <table width="500" height="60" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td bgcolor="#666666"><table width="500" border="0" align="center" cellpadding="0" cellspacing="1">
              <tr bgcolor="#FFEDBF">
                <td width="153" height="20"><div align="center" class="style7">��Ʒ����</div></td>
                <td width="80"><div align="center" class="style7">�г���</div></td>
                <td width="80"><div align="center" class="style7">��Ա��</div></td>
                <td width="80"><div align="center" class="style7">����</div></td>
                <td width="101"><div align="center" class="style7">С��</div></td>
              </tr>
              <?php
	  $total=0;
	  for($i=0;$i<count($arraysp)-1;$i++){
		 if($arraysp[$i]!=""){
	     $sql1=mysqli_query($conn,"select * from tb_shangpin where id='".$arraysp[$i]."'");
	     $info1=mysqli_fetch_array($sql1);
		 $total=$total+=$arraysl[$i]*$info1['huiyuanjia'];
	  ?>
              <tr bgcolor="#FFFFFF">
                <td height="20"><div align="center"><?php echo $info1['mingcheng'];?></div></td>
                <td height="20"><div align="center"><?php echo $info1['shichangjia'];?></div></td>
                <td height="20"><div align="center"><?php echo $info1['huiyuanjia'];?></div></td>
                <td height="20"><div align="center"><?php echo $arraysl[$i];?></div></td>
                <td height="20"><div align="center"><?php echo $arraysl[$i]*$info1['huiyuanjia'];?></div></td>
              </tr>
              <?php
	   }
	   }
	 ?>
              <tr bgcolor="#FFFFFF">
                <td height="20" colspan="5">
                  <div align="right"><span class="style5">�ܼƷ���:</span><?php echo $total;?> </div></td>
              </tr>
          </table></td>
        </tr>
      </table>
      <table width="480" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr bgcolor="#FFFFFF">
          <td width="81" height="20" align="center"><div align="left" class="style6">&nbsp;�µ��ˣ�</div></td>
          <td colspan="3"><div align="left"><?php echo $_SESSION['username'];?></div></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td height="20" align="center"><div align="left" class="style6">&nbsp;�ջ��ˣ�</div></td>
          <td height="20" colspan="3"><div align="left"><?php echo $info['shouhuoren'];?></div></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td height="20" align="center"><div align="left" class="style6">&nbsp;�ջ��˵�ַ��</div></td>
          <td height="20" colspan="3"><div align="left"><?php echo $info['dizhi'];?></div></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td height="20" align="center"><div align="left" class="style6">&nbsp;��&nbsp;&nbsp;�ࣺ</div></td>
          <td width="145" height="20"><div align="left"><?php echo $info['youbian'];?></div></td>
          <td width="66"><div align="left" class="style6">&nbsp;��&nbsp;&nbsp;����</div></td>
          <td width="158"><div align="left"><?php echo $info['tel'];?></div></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td height="20" align="center"><div align="left" class="style6">&nbsp;E-mail:</div></td>
          <td height="20"><div align="left"><?php echo $info['email'];?></div></td>
          <td height="20">&nbsp;</td>
          <td height="20">&nbsp;</td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td height="20" align="center"><div align="left" class="style6">&nbsp;�ͻ���ʽ��</div></td>
          <td height="20"><div align="left"><?php echo $info['shff'];?></div></td>
          <td height="20"><div align="left" class="style6">&nbsp;֧����ʽ��</div></td>
          <td height="20"><div align="left"><?php echo $info['zfff'];?></div></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td height="20" colspan="4"><div align="left" class="style6">&nbsp;������һ���ڰ�����֧����ʽ���л��,���ʱע�����Ķ�����!�����뼰ʱ֪ͨ����</div></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td height="20">&nbsp;</td>
          <td height="20"><div align="center">
              <input name="button" type="button" class="buttoncss" onClick="window.close()" value="�رմ���">
          </div></td>
          <td height="20"><div align="center" class="style6">����ʱ�䣺</div></td>
          <td height="20"><div align="left"><?php echo $info['time'];?></div></td>
        </tr>
      </table>
<?php
$_SESSION['producelist']="";
$_SESSION['quatity']=""; 
?></td>
  </tr>
</table>
</body>
</html>
