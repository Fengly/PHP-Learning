<?php
header("Content-type:text/html;charset=utf-8");
session_start();
if(isset($_SESSION['name'])){
?>
<style type="text/css">
<!--
.STYLE1 {	font-size: 36px;
	color: #990000;
	font-weight: bold;
}
body,td,th {
	font-size: 12px;
}
-->
</style>
  <table width="800" height="600" border="0" align="center" cellpadding="0" cellspacing="0" id="__01">
    <tr>
      <td colspan="3"><a href="indexs.php"><img src="images/manage_01.gif" alt="" width="800" height="201" border="0" /></a></td>
    </tr>
    <tr>
      <td><img src="images/manage_02.gif" width="140" height="251" alt="" /></td>
      <td width="523" height="251" align="center" valign="top" background="images/manage_03.gif"><table width="491" height="66" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="382" height="30">假日名称</td>
          <td width="109"><div align="center">操作</div></td>
        </tr>
<?php
include("conn/conn.php");
$select=mysqli_query($conn,"select * from tb_01");
while($array=mysqli_fetch_array($select)){
?>
        <tr>
          <td height="30"><?php echo $array['name'];?> </td>
          <td><div align="center"><a href="update.php?abrogation=<?php echo $array['id'];?>">取消</a></div></td>
        </tr>
<?php
}
?>
      </table></td>
      <td><img src="images/manage_04.gif" width="137" height="251" alt="" /></td>
    </tr>
    <tr>
      <td colspan="3"><img src="images/manage_05.gif" width="800" height="148" alt="" /></td>
    </tr>
  </table>
 <?php
 }else{
	echo "<script>alert('请先登录！');window.location.href='user.php';</script>";
 }
 ?>
  