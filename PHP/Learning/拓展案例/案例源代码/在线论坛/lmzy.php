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
	font-family: "宋体";
	font-weight: normal;
}
.style2 {	font-size: 14px;
	font-family: "宋体";
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
      <img src="image/run.gif"  width="19" height="18"><span class="style1">欢迎访问明日科技网站！</span> &nbsp;&nbsp;<?php echo date("Y-m-d H:i:s")?>
                        </marquee></div></td>
      <td width="29" >&nbsp;</td>
    </tr>
  </table>
  <table width="776" height="30" border="0" align="center" cellpadding="0" cellspacing="0" background="image/555.gif">
      <tr>
        <td height="30" align="center">== <?php echo $zq;?>专区 ==</td>
        <td width="584">&nbsp;</td>
      </tr>
    </table>
<?php 
$page_size=1;	//每页显示1条记录
$query="select * from mr_zqlb where zq='".$zq."'";	//从数据库中查询所有符合条件的数据
$result=mysqli_query($conn,$query);
$message_count=mysqli_num_rows($result);		 //变量表示查询出结果的数量
if($message_count>0){
?>
<table width="776" height="30"  border="1" align="center" cellpadding="1" cellspacing="1">
  <tr align="center">
    <td width="51" height="26" class="style1">状态</td>
    <td width="54" class="style1">心情</td>
    <td width="381" class="style1">主&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 题</td>
    <td width="79" class="style1">作者</td>
    <td width="76" class="style1">回复/人气</td>
    <td width="135" class="style1">发表时间 </td>
  </tr>
<?php  
$page_count=ceil($message_count/$page_size); //变量表示按照每页1条记录显示共有多个页
$offset=($page-1)*$page_size;    //变量表示下一页的记录数是从那条记录开始的
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
    	<td width="40%">页次：<?php echo $page;?> /<?php echo $page_count;?>页 记录：<?php echo $message_count;?>条</td>
        <td width="50%"> 分页：
			<a href='lmzy.php?zq=<?php echo urlencode($zq);?>&page=1'>首页</a>
<?php
		if($page >= 2){
?>
			<a href="lmzy.php?zq=<?php echo urlencode($zq);?>&page=<?php echo $page-1;?>">上一页</a>
<?php	
		}
		if($page < $page_count){
?>
			<a href="lmzy.php?zq=<?php echo urlencode($zq);?>&page=<?php echo $page+1;?>">下一页</a>
<?php
		}
		if($page <= $page_count){		
?>
			<a href="lmzy.php?zq=<?php echo urlencode($zq);?>&page=<?php echo $page_count;?>">尾页</a>
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
 <div align="center">无数据！</div>	
<?php
}
?>
<div align="center"><?php include"under.php"?></div>

