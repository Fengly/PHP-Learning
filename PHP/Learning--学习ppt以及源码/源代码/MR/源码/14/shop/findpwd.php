<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>�һ�����</title>
<link rel="stylesheet" type="text/css" href="css/font.css">
</head>
<?php
 include("conn/conn.php");
?>
<body topmargin="0" leftmargin="0" bottommargin="0">
<table width="200" height="100" border="0" align="center" cellpadding="0" cellspacing="0">
 <script language="javascript">
   function chkinput(form)
   {
     if(form.da.value=="")
	 {
	  alert('������������ʾ��!');
	  form.da.select();
	  return(false);
	 }
	  return(true);
   }
 </script>
  <form name="form2" method="post" action="showpwd.php" onSubmit="return chkinput(this)">
  <tr bgcolor="#FFEDBF">
    <td height="25" colspan="2"><div align="center">�һ�����</div></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td width="67" height="25"><div align="center">&nbsp;������ʾ��</div></td>
    <td width="133"><div align="left">
	<?php
	  $nc=$_POST['nc'];
	  $sql=mysqli_query($conn,"select * from tb_user where name='".$nc."'");
	  $info=mysqli_fetch_array($sql);
	  if($info==false)
	   {
	     echo "<script>alert('�޴��û�!');history.back();</script>";
		 exit;
	   }
	   else
	   {
	     echo $info['tishi'];
	   }
	   
	?>
	</div></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td height="25"><div align="center">&nbsp;��ʾ�𰸣�</div></td>
    <td height="25"><div align="left"><input type="text" name="da" class="inputcss" size="20">
	  <input type="hidden" name="nc" value="<?php echo $nc;?>">
	</div></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td height="25" colspan="2"><div align="center"><input type="submit" value="ȷ��" class="buttoncss"></div></td>
  </tr>
  </form>
</table>
<p>&nbsp;</p>
</body>
</html>
