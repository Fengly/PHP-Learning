<?php
session_start();
if(isset($_SESSION['name'])){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>假日发布系统</title>
<style type="text/css">
<!--
.STYLE1 {
	font-size: 36px;
	font-weight: bold;
	color: #990033;
}
.STYLE2 {font-size: 14px}
-->
</style>
</head>

<body>
<div align="center" class="STYLE1">
  <table id="__01" width="800" height="481" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="3"><img src="images/indexs_01.gif" width="800" height="139" alt="" /></td>
    </tr>
    <tr>
      <td rowspan="6"><img src="images/indexs_02.gif" width="544" height="342" alt="" /></td>
      <td><a href="promulgation.php"><img src="images/indexs_03.gif" alt="" width="163" height="53" border="0" /></a></td>
      <td rowspan="6"><img src="images/indexs_04.gif" width="93" height="342" alt="" /></td>
    </tr>
    <tr>
      <td><img src="images/indexs_05.gif" width="163" height="9" alt="" /></td>
    </tr>
    <tr>
      <td><a href="cancel.php"><img src="images/indexs_06.gif" alt="" width="163" height="53" border="0" /></a></td>
    </tr>
    <tr>
      <td><img src="images/indexs_07.gif" width="163" height="13" alt="" /></td>
    </tr>
    <tr>
      <td><a href="manage.php"><img src="images/indexs_08.gif" alt="" width="163" height="51" border="0" /></a></td>
    </tr>
    <tr>
      <td><img src="images/indexs_09.gif" width="163" height="163" alt="" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
</div>
<script src="js/jquery.js"></script>
<script>

     function showLayerNotice(){
	     $("#Layer110").slideToggle(1000);
     }
     $(document).ready(function(){
 
         $("#Layer110").css("left", (screen.width-520)/2);

     
         setTimeout("showLayerNotice()", 1300) ;    
      });

</script>

<?php 
include("conn/conn.php");
$result=mysqli_query($conn,"select perform from tb_01");
$myrow=mysqli_fetch_array($result);
if($myrow['perform']==1){
?>
<div id="Layer110"
	style="position: absolute; border:3px solid #CCCCCC; left: 50px; top: 50px; z-index: 1; font-size: 0px; display: none">
<?php 
	include("upfile/www.html");
?>
</div>
<?php }?>

</body>
</html>
<?php
}else{
	echo "<script>alert('请先登录！');window.location.href='user.php';</script>";
}
?>