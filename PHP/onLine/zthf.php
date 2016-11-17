<?php
session_start();
include("config.php");
$page=(isset($_GET['page']))?$_GET['page']:"1"; 
$zhuti=(isset($_GET['zhuti']))?$_GET['zhuti']:"PHP"; 
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>明日科技论坛</title>
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
	font-family: "宋体";
}
.style2 {
	font-size: 12px;
	font-family: "宋体";
}
.style3 {font-size: 13px;
	font-family: "宋体";
	font-weight: normal;
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #EFF3FF;
}
td{
font-size:9pt;
}
-->
</style></head>
<body>
<div align="center"><?php include("head.php");?></div>
<table width="776" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="776" height="25" background="image/2.gif"><?php include"dljm.php";?></td>
  </tr>
</table>


<table width="776" height="177" border="0" align="center" cellpadding="0" cellspacing="0" background="image/6.gif">
  <tr>
      <td width="776" height="30"><span class="style1">&nbsp;&nbsp;&nbsp;&nbsp;主题：『<?php echo $zhuti;?>』</span></td>
  </tr>
  <tr>
      <td height="147" colspan="3" align="left" valign="top">
	     <table width="100%" height="145"  border="0" cellpadding="0" cellspacing="0">
<?php 
$query="select * from mr_zqlb where id='".$_GET['recid']."'";
$result=mysqli_query($conn,$query);
$ztrow=mysqli_fetch_array($result); 
?>
            <tr>
<?php
$update="update mr_zqlb set fwjl=fwjl+1 where id='".$_GET['recid']."'"; 
$result=mysqli_query($conn,$update);
$query="select * from mr_user where username='".$ztrow['username']."'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);  
?>
               <td width="136" height="145" align="left" valign="top">
                  <table width="136" height="145" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                       <td height="24" align="center" valign="middle" class="style1"><?Php echo $ztrow['username'];?></td>
                    </tr>
                    <tr>
                       <td height="64" align="center" valign="middle"><img src="<?php echo $row['tx'];?>"width="60" height="60"></td>
                    </tr>
                    <tr>
                       <td height="26" align="center" valign="middle" class="style1">我是:<?php echo $row['sex'];?>生</td>
                    </tr>
                    <tr>
                       <td height="30" align="center" valign="middle"><img src="images.php?recid=<?php echo $ztrow['xq'];?>"></td>
                    </tr>
                 </table>
			   </td>
               <td width="1">&nbsp;</td>
               <td width="643" align="left" valign="top"><table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
               <td width="80%" height="24" class="style1">&nbsp;Email:<?php echo $row['email'];?>&nbsp; QQ:<?php echo $row['qq'];?> &nbsp; 发表时间：<?php echo $ztrow['fbsj'];?></td>
               <td width="20%" class="style1"><a href="hftj.php?zhuti=<?php echo urlencode($zhuti);?>&recid=<?php echo $_GET['recid'];?>">回复</a></td>
            </tr>
            <tr>
               <td height="3" colspan="2">&nbsp;</td>
            </tr>
            <tr>
               <td width="505" class="style2"> <?php echo $ztrow['neirong'];?> </td>
            </tr>
         </table></td>
      </tr>
    </table></td>
  </tr>
</table>
<?php 
$page_size=2;
$query="select * from mr_hflb where ljid='".$_GET['recid']."'";
$result=mysqli_query($conn,$query);
$message_count=mysqli_num_rows($result);
if($message_count>0){
?>
<table width="776" border="0" align="center" cellpadding="0" cellspacing="0">
<?php	
$page_count=ceil($message_count/$page_size);
$offset=($page-1)*$page_size;
$quer="select * from mr_hflb where ljid='".$_GET['recid']."' order by id desc limit $offset ,$page_size";
$resul=mysqli_query($conn,$quer);
while($myrow=mysqli_fetch_array($resul)){
?>
  <tr>
    <td height="28" colspan="3" valign="middle" background="image/5.gif" class="style1"> &nbsp;&nbsp;回 复:<?php echo $myrow['hfzt'];?></td>
  </tr>
  <tr>
    <td height="100" align="left" valign="top"><table width="776" height="100" border="0" cellpadding="0" cellspacing="0" background="image/7.gif">
       <?php $query="select * from mr_user where username='".$myrow['username']."'";
			          $result=mysqli_query($conn,$query);
					  $xq=mysqli_fetch_array($result);
			   ?>
	  <tr>
        <td width="136" align="center" valign="top"><table width="136" height="88" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td height="24" align="center" valign="middle" class="style1"><?php echo $myrow['username'];?></td>
          </tr>
          <tr>
            <td height="64" align="center" valign="middle"><img src="<?php echo $xq['tx'];?>"width="60" height="60"></td>
          </tr>
        </table></td>
        <td align="left" valign="top"><table width="100%"  border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="80%" height="24" class="style1">&nbsp;Email:<?php echo $xq['email'];?>&nbsp;QQ:<?php echo $xq['qq'];?>&nbsp;发表时间：<?php echo $myrow['hfsj'];?></td>
            <td width="20%">&nbsp;</td>
          </tr>
          <tr>
            <td height="3" colspan="2">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2" class="style2">&nbsp;&nbsp;<?php echo $myrow['hfnr'];?></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
    <?php 
  }
  ?>
</table>


<table width="776" height="40" border="0" align="center" cellpadding="0" cellspacing="0" background="image/4.gif">
  <tr>
    <td height="20" colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td width="260" height="20">&nbsp;</td>
    <td width="460"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td class="style3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr class="style3">
                <td width="45%" class="#ff0000">&nbsp;&nbsp;页次：<font class="#ff0000"><?php echo $page;?></font> / <font class="#ff0000"><?php echo $page_count;?> </font>页 记录：<font class="#ff0000"><?php echo $message_count;?> </font>条&nbsp; </td>
                <td width="45%" class="#ff0000"> 分页：<a href='zthf.php?zhuti=<?php echo $zhuti; ?>&recid=<?php echo $_GET['recid'];?>&page=1'>首页</a>
<?php
		if($page >= 2){
?>
			<a href="zthf.php?zhuti=<?php echo $zhuti; ?>&recid=<?php echo $_GET['recid'];?>&page=<?php echo $page-1;?>">上一页</a>
<?php
		
		}
		if($page < $page_count){
?>
			<a href="zthf.php?zhuti=<?php echo $zhuti; ?>&recid=<?php echo $_GET['recid'];?>&page=<?php echo $page+1;?>">下一页</a>
<?php
		}
		if($page >= $page_count){		
?>
			<a href="zthf.php?zhuti=<?php echo $zhuti; ?>&recid=<?php echo $_GET['recid'];?>&page=<?php echo $page_count;?>">尾页</a>
            <?php 
		}
			?>                </td>
              </tr>
          </table></td>
        </tr>
    </table></td>
    <td width="56">&nbsp;</td>
  </tr>
</table>
<?php 
}else{
	?>
    <table width="776" height="40" border="0" align="center" cellpadding="0" cellspacing="0" background="image/4.gif">
  <tr>
    <td height="20" colspan="3">无回复</td>
  </tr>
</table>
<?php
}
?>
<?php include("under.php");?>
</body>
</html>
