<?php
if(isset($_SESSION['user']) && isset($_SESSION['pass'])){
	$top='image/tx/top.gif';		//ͨ����������ȡר����ͼ��
	$df='image/tx/df.gif';
	$date=date("Y-m-d h:i:s");		 //��ȡ��ǰ��ʱ��
	if(isset($_POST['zhuijia'])){	//���ύ��������ӵ����ݿ���
		$query="insert into mr_zqfl(bz,zq,tb,cjsj)values('".$_POST['bz']."','".$_POST['zq']."','".$_POST['tb']."','".$date."')";
		$result=mysqli_query($conn,$query);
		if($result){
			echo "<meta http-equiv=\"refresh\" content=\"0;url=$furl\">";
		}else{  
			echo "׷��ʧ��!!";
		} 	 
	}
?>
<style type="text/css">
<!--
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
.style1 {
	font-size: 13px;
	font-family: "����";
	font-weight: normal;
}
-->
</style>
<table width="590" border="1" cellpadding="0" cellspacing="0">

  <form name="myform" method="post" action="index.php?lmbs=��Ŀ����" enctype="multipart/form-data">
    <tr>
      <td height="30" colspan="2" align="center">��Ŀ����</td>
      <td width="220">&nbsp;</td>
    </tr>
    <tr>
      <td width="170" height="30" align="center"><span class="style1">����:
          <input name="bz" type="text" id="bz" size="15">
      </span></td>
      <td width="200" align="center" class="style1">����ר��:
          <select name="zq" size="1" id="zq">
            <option value="asp" selected>ASP</option>
            <option value="jsp">JSP</option>
            <option value="delphi">Delphi</option>
            <option value="visual basic">Visual Basic</option>
            <option value="visual foxpro">Visual Foxpro</option>
            <option value="visual c++">Visual C++ </option>
            <option value="power">Power Buider</option>
            <option value=".net">.net</option>
        </select></td>
      <td align="center" valign="middle" class="style1">ͼ��:
          <input type="radio" name="tb" value="<?php echo $top;?>">
        <img src='../image/tx/top.gif' width='24' height='24'>
          <input type="radio" name="tb" value="<?php echo $df;?>">
		  <img src='../image/tx/df.gif' width='24' height='24'>
      </td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
      <td class="style1"><input name="zhuijia" type="submit" id="zhuijia" value="׷����Ŀ"></td>
    </tr>
  </form>
</table>
<table width="590" border="0" cellpadding="0" cellspacing="0">
	<tr align="center" bgcolor="#D0E8FF" class="style1">
    	<td width="95" height="30">ͼ ��</td>
    	<td width="70">����ר��</td>
    	<td width="145" bgcolor="#D0E8FF">�� ��</td>
    	<td width="200">ʱ��</td>
    	<td width="80">�Ƿ�ɾ��</td>
  	</tr>
<?php 
$query="select * from mr_zqfl where id";		//�����ݿ��в�ѯ���й���Ŀר������Ϣ
$result=mysqli_query($conn,$query);
if($result){
	while($myrow=mysqli_fetch_array($result)){  //ͨ��whileѭ�����,����Щ��Ϣ�����ݽ������
?>	
	<tr align="center" class="style1">
    	<td height="30"><img src=../<?php echo $myrow['tb'];?> /></td>
    	<td><?php echo $myrow['zq'];?></td>
    	<td><?php echo $myrow['bz'];?></td>
    	<td><?php echo $myrow['cjsj'];?></td>
	
    	<td>
        	<a href="delete.php?lmbs=<?php echo urlencode('��Ŀ����');?>&id=<?php echo $myrow['id'];?>">ɾ��</a>
      	</td>   
  	</tr>
<?php 
	}
}
?>
</table>
<?php 
}else{
	echo "<meta http-equiv=\"Refresh\" content=\"2;url=admin.php\">";
	echo "<a href=\"admin.php\">����</a>";
}
?>