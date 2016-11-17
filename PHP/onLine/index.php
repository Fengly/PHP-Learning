<?php 
session_start();
include("config.php");
$furl=getenv("http_referer");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>明日科技论坛</title>
<style type="text/css">
<!--
a:link {
	color: #FF0000;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #000000;
}
a:hover {
	text-decoration: none;
	color: #FF0000;
}
a:active {
	text-decoration: none;
	color: #000000;
}
.style1 {
	font-size: 13px;
	font-family: "宋体";
	font-weight: normal;
}
.style2 {
	font-size: 14px;
	font-family: "宋体";
}
.style3 {
	font-size: 12px;
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
</style>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->
</script>
</head>
<body>
<table width="773"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="middle"><?php include("head.php");?></td>
  </tr>
  <tr>
    <td align="left" valign="middle"><?php include"dljm.php";?></td>
  </tr>
  <tr>
    <td align="center" valign="middle"><table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0" background="image/55.gif">
      <tr>
        <?php $date=date("Y-m-d");?>
        <td height="30">&nbsp;</td>
        <td width="580"><div align="center"><marquee direction="left" scrollamount="1" scrolldelay="7">
          <img src="image/run.gif"  width="19" height="18"><span class="style1">欢迎访问明日科技网站！ &nbsp;&nbsp;<?php echo $date;?> </span>
        </marquee></div></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="776" height="60"  border="0" align="center" cellpadding="0" cellspacing="0" background="image/66.gif">
  <?php 
	$query="select * from mr_zqfl ";
	$result=mysqli_query($conn,$query);
	if($result){
	while ($myrow=mysqli_fetch_array($result)){
	?>
  <tr>
    <td width="61" height="60" align="right" valign="top"><img src="<?php echo $myrow['tb'];?>"></td>
    <td width="525" height="60" align="center" valign="middle"><table width="100%" height="60"  border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td height="33" align="left" valign="middle" class="style1">&nbsp;<img src="image/greendot2.gif" width="11" height="13"><a href="lmzy.php?zq=<?php echo urlencode($myrow['zq']);?>" target="_self">明日科技出版的[<?php echo $myrow['zq'];?>]类图书专区</a></td>
      </tr>
      <tr>
        <td height="27" align="left" valign="middle"><span class="style1">&nbsp;&nbsp;版主:<?php echo $myrow['bz'];?></span></td>
      </tr>
    </table></td>
    <td width="180" align="center" valign="middle"><table width="100%" height="60"  border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td height="20" valign="bottom"><span class="style3">&nbsp;创建日期:<?php echo $myrow['cjsj'];?></span></td>
      </tr>
	  <tr>
	    <td height="20" valign="middle"><span class="style3">&nbsp;主题总数: 
	<?php 
	  $quer="select count(*)zts from mr_zqlb where zq='".$myrow['zq']."' ";
	  $resul=mysqli_query($conn,$quer);
	  $row=mysqli_fetch_array($resul);
	  echo $row['zts'];
	  ?></span></td>
      </tr>
      <tr>
        <td height="20" valign="top"><span class="style3">&nbsp;今日主题总数:
	<?php 
	  $jrzt="select count(*)jrzts from mr_zqlb where zq='".$myrow['zq']."' and fbsj='$date'";
	  $res=mysqli_query($conn,$jrzt);
	  $row=mysqli_fetch_array($res);
	  echo $row['jrzts'];
	?>	
	</span></td>
      </tr>
    </table></td>
  </tr>
  <?php }
	}?>
</table>
<div align="center"><?php include"under.php"?></div>
</body>
</html>