<?php 
if(isset($_SESSION['user']) && isset($_SESSION['pass'])){
?>
<style type="text/css">
<!--
a:link {
	color: #000000;
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
	color: #000000;
}
.style4 {font-size: 13px;
	font-family: "����";
	font-weight: normal;
}
.style5 {font-size: 12px}
-->
</style><table width="590" border="0" cellpadding="0" cellspacing="0" bgcolor="#EFF3FF">
  <tr>
    <td width="90" height="30">&nbsp;</td>
    <td width="90">�û�����</td>
    <td width="90">&nbsp;</td>
    <td width="110">&nbsp;</td>
    <td width="40">&nbsp;</td>
    <td width="100">&nbsp;</td>
    <td width="70">&nbsp;</td>
  </tr>
  <tr align="center">
    <td height="30" class="style4">�û���</td>
    <td class="style4">��ʵ����</td>
    <td colspan="2" class="style4">��ַ</td>
    <td class="style4">�Ա�</td>
    <td class="style4">�绰</td>
    <td class="style4">�Ƿ�ɾ��</td>
  </tr>
  <?php 
     $page_size=15;
	 $query="select * from mr_user where id";
	 $result=mysqli_query($conn,$query);
	 $message_count=mysqli_num_rows($result);
	 $page_count=ceil($message_count/$page_size);
	 $offset=($page-1)*$page_size;
	 $query="select * from mr_user where id order by id desc limit $offset,$page_size";
	 $result=mysqli_query($conn,$query);
	 if($result){
	 while($myrow=mysqli_fetch_array($result)){
  ?>
  <tr align="center" onMouseMove="this.bgColor='#D7F2FF'" onMouseOut="this.bgColor='#FFD9D9'">
    <td height="30"><span class="style5"><?php echo $myrow['username'];?></span></td>
    <td class="style5"><?php echo $myrow['zsxm'];?></td>
    <td colspan="2" class="style5"><?php echo $myrow['lxdz'];?></td>
    <td class="style5"><?php echo $myrow['sex'];?></td>
    <td class="style5"><?php echo $myrow['lxdh']?></td>
    <td><a href="delete.php?lmbs=<?php echo urlencode('�û�����');?>&id=<?php echo $myrow['id'];?>" class="style5">ɾ��</a></td>
  </tr>
  <?php }}?>
  <tr>
    <td height="30" colspan="7"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr class="style4">
        <td width="50%" class="#ff0000">&nbsp;&nbsp;ҳ�Σ�<font class="#ff0000"><?php echo $page;?></font> / <font class="#ff0000"><?php echo $page_count;?> </font>ҳ ��¼��<font class="#ff0000"><?php echo $message_count;?> </font>��&nbsp; </td>
        <td width="39%" class="#ff0000"> ��ҳ��
      
<a href='index.php?lmbs=<?php echo urlencode('�û�����');?>&page=1'>��ҳ</a>
<?php
		if($page >= 2){
?>
			<a href="index.php?lmbs=<?php echo urlencode('�û�����');?>&page=<?php echo $page-1;?>">��һҳ</a>
<?php
		
		}
		if($page < $page_count){
?>
			<a href="index.php?lmbs=<?php echo urlencode('�û�����');?>&page=<?php echo $page+1;?>">��һҳ</a>
<?php
		}
		if($page >= $page_count){		
?>
			<a href="index.php?lmbs=<?php echo urlencode('�û�����');?>&page=<?php echo $page_count;?>">βҳ</a>
            <?php 
		}
			?>
        </td>
      </tr>
    </table></td>
  </tr>
</table>
<?php }else{
include "yzdl.php";
}
?>
