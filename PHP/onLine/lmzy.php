<?php 
include("config.php");
$page=(isset($_GET['page']))?$_GET['page']:"1"; 
$zq=(isset($_GET['zq']))?$_GET['zq']:"PHP"; 
?>
<style type="text/css">
<!--
a:link {
	text-decoration: none;
	color: #3333CC;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
	color: #FF0000;
}
.style1 {	font-size: 13px;
	font-family: "����";
	font-weight: normal;
}
.style2 {	font-size: 14px;
	font-family: "����";
}
body {
	background-color: #EFF3FF;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
<div align="center"><?php include("head.php");?></div>
  <table width="776" border="0" align="center" cellpadding="0" cellspacing="0" background="image/2.gif">
    <tr>
      <td width="109" height="25" background="image/2.gif">&nbsp;</td>
      <td width="638" align="right" valign="middle"><div align="center"><marquee direction="left" scrollamount="1" scrolldelay="7" onMouseOver="this.stop();" onMouseOut="this.start();">
      <img src="image/run.gif"  width="19" height="18"><span class="style1">��ӭ�������տƼ���վ��</span> &nbsp;&nbsp;<?php echo date("Y-m-d H:i:s")?>
                        </marquee></div></td>
      <td width="29" >&nbsp;</td>
    </tr>
  </table>
  <table width="776" height="30" border="0" align="center" cellpadding="0" cellspacing="0" background="image/555.gif">
      <tr>
        <td height="30" align="center">== <?php echo $zq;?>ר�� ==</td>
        <td width="584">&nbsp;</td>
      </tr>
    </table>
<?php 
$page_size=1;	//ÿҳ��ʾ1����¼
$query="select * from mr_zqlb where zq='".$zq."'";	//�����ݿ��в�ѯ���з�������������
$result=mysqli_query($conn,$query);
$message_count=mysqli_num_rows($result);		 //������ʾ��ѯ�����������
if($message_count>0){
?>
<table width="776" height="30"  border="1" align="center" cellpadding="1" cellspacing="1">
  <tr align="center">
    <td width="51" height="26" class="style1">״̬</td>
    <td width="54" class="style1">����</td>
    <td width="381" class="style1">��&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ��</td>
    <td width="79" class="style1">����</td>
    <td width="76" class="style1">�ظ�/����</td>
    <td width="135" class="style1">����ʱ�� </td>
  </tr>
<?php  
$page_count=ceil($message_count/$page_size); //������ʾ����ÿҳ1����¼��ʾ���ж��ҳ
$offset=($page-1)*$page_size;    //������ʾ��һҳ�ļ�¼���Ǵ�������¼��ʼ��
$query="select * from mr_zqlb where zq='".$zq."' order by id desc limit $offset ,$page_size ";
$result=mysqli_query($conn,$query);
while($myrow=mysqli_fetch_array($result)){
?>
  <tr>
    <td width="51" height="30" align="center"><img src="image/reader.gif" width="16" height="16"></td>
    <td width="54" align="center"><img src="images.php?recid=<?php echo $myrow['xq'];?>" width="20" height="20"></td>
    <td width="381" align="center" class="style1"><a href="zthf.php?zhuti=<?php echo urlencode($myrow['zhuti']);?>&recid=<?php echo $myrow['id'];?>"><?php echo $myrow['zhuti'];?></a></td>
    <td width="79" align="center" class="style1"><?php echo $myrow['username'];?></td>
    <td width="76" align="center" class="style1">
      <?php $quer="select count(*) as hfjl from mr_hflb where ljid='".$myrow['id']."'";
		      $resul=mysqli_query($conn,$quer);
			  $row=mysqli_fetch_array($resul);
	  		  $hfjl=$row['hfjl'];
			  echo $hfjl;
		   
		   ?>
      /<?php echo $myrow['fwjl'];?> </td>
    <td width="135" align="center" class="style1"><?php echo $myrow['fbsj'];?></td>
  </tr>
  
<?php  }  ?>
</table>
	  <table width="776" height="40" border="0" align="center" cellpadding="0" cellspacing="0" background="image/4.gif">
        <tr>
          <td height="20" colspan="3">&nbsp;</td>
        </tr>
        <tr>
          <td width="240" height="20">&nbsp;</td>
          <td width="480">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr class="style1">
    	<td width="40%">ҳ�Σ�<?php echo $page;?> /<?php echo $page_count;?>ҳ ��¼��<?php echo $message_count;?>��</td>
        <td width="50%"> ��ҳ��
			<a href='lmzy.php?zq=<?php echo urlencode($zq);?>&page=1'>��ҳ</a>
<?php
		if($page >= 2){
?>
			<a href="lmzy.php?zq=<?php echo urlencode($zq);?>&page=<?php echo $page-1;?>">��һҳ</a>
<?php	
		}
		if($page < $page_count){
?>
			<a href="lmzy.php?zq=<?php echo urlencode($zq);?>&page=<?php echo $page+1;?>">��һҳ</a>
<?php
		}
		if($page <= $page_count){		
?>
			<a href="lmzy.php?zq=<?php echo urlencode($zq);?>&page=<?php echo $page_count;?>">βҳ</a>
<?php 
		}
?>
		</td>
	</tr>
</table></td>
          <td width="56">&nbsp;</td>
        </tr>
</table>
	 
<?php 
}else{
?>
 <div align="center">�����ݣ�</div>	
<?php
}
?>
<div align="center"><?php include"under.php"?></div>

