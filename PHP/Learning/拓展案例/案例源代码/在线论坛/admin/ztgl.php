<?php 
if(isset($_SESSION['user']) && isset($_SESSION['pass'])){
?>

<style type="text/css">
<!--
.style1 {
	font-size: 14px;
	font-family: "����";
	font-weight: bold;
}
.style2 {
	font-size: 13px;
	font-family: "����";
	font-weight: bold;
}
.style3 {
	font-size: 12px;
	font-family: "����";
}
.style4 {font-size: 13px;
	font-family: "����";
	font-weight: normal;
}
-->
</style>

<table width="590" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30" colspan="2" align="center"><span class="style1">�� �� �� ��</span></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr align="center" bgcolor="#CEFFCE">
    <td width="190" height="25"><span class="style3">�� ��</span></td>
    <td width="295" class="style3">�� ��</td>
    <td width="65" class="style3">�� ��</td>
    <td width="40" class="style3">ɾ ��</td>
  </tr>
  <?php 
       $page_size=8;
       $query="select * from mr_zqlb where id";
	   $result=mysqli_query($conn,$query);
	   $message_count=mysqli_num_rows($result);
	   $page_count=ceil($message_count/$page_size);
	   $offset=($page-1)*$page_size;
	   $query="select * from mr_zqlb where id order by id desc limit $offset,$page_size";
	   $result=mysqli_query($conn,$query);
	   if($result){
	   while($myrow=mysqli_fetch_array($result)){
  ?>
  <tr align="center" onMouseDown="this.bgColor='#C4E1FF'" onMouseOut="this.bgColor='#FFE1E1'" onMouseMove="this.bgColor='#DDFFFF'">
    <td height="30"><span class="style3"><?php echo $myrow['zhuti'];?></span></td>
    <td align="left" valign="middle" class="style3"><?php echo $myrow['neirong'];?></td>
    <td class="style3"><?php echo $myrow['username'];?></td>
	
    <td class="style2"><a href="delete.php?lmbs=<?php echo urlencode('��̳����');?>&id=<?php echo $myrow['id'];?>" class="style3">ɾ��</a></td>
  </tr>
  <?php }}?>
  <tr>
    <td height="30" colspan="4"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr class="style4">
        <td width="50%" class="#ff0000">&nbsp;&nbsp;ҳ�Σ�<font class="#ff0000"><?php echo $page;?></font> / <font class="#ff0000"><?php echo $page_count;?> </font>ҳ ��¼��<font class="#ff0000"><?php echo $message_count;?> </font>��&nbsp; </td>
        <td width="39%" class="#ff0000"> ��ҳ��
           
           
<a href='index.php?lmbs=��̳����&page=1'>��ҳ</a>
<?php
		if($page >= 2){
?>
			<a href="index.php?lmbs=��̳����&page=<?php echo $page-1;?>">��һҳ</a>
<?php
		
		}
		if($page < $page_count){
?>
			<a href="index.php?lmbs=��̳����&page=<?php echo $page+1;?>">��һҳ</a>
<?php
		}
		if($page >= $page_count){		
?>
			<a href="index.php?lmbs=��̳����&page=<?php echo $page_count;?>">βҳ</a>
            <?php 
		}
			?>
        </td>
      </tr>
    </table></td>
  </tr>
</table>
<?php 
}else{
	echo "<meta http-equiv=\"Refresh\" content=\"2;url=admin.php\">";
	echo "<a href=\"admin.php\">����</a>";
}
?>