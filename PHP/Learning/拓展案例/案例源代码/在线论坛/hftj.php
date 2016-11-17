<?php 
session_start(); 
include("config.php");
if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){
	echo "请先登录,才可以回复信息!!";
	echo "<meta http-equiv=\"Refresh\" content=\"2;url=index.php\">";
}else{
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>明日科技论坛</title>
<style type="text/css">
<!--
.style1 {
	font-size: 14px;
	font-family: "宋体";
}
.style2 {
	font-size: 13px;
	font-family: "宋体";
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #EFF3FF;
}
.style3 {font-size: 13px;
	font-family: "宋体";
	font-weight: normal;
}
-->
</style>
</head>
<script language="javascript" src="script/zc_check.js" type="text/javascript"></script>
<body>
<?php include"head.php";?>
<table width="776" border="0" align="center" cellpadding="0" cellspacing="0" background="image/555.gif">
  <tr>
    <td width="15">&nbsp;</td>
    <td width="760" height="30"><span class="style1">&nbsp;&nbsp;== 回复主题信息 == </span></td>
  </tr>
</table>
<table width="776" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="776">
	<table width="776"  border="0" align="center" cellpadding="0" cellspacing="0">
	<?php  
             $query="select * from mr_zqlb where id='".$_GET['recid']."'";
             $result=mysqli_query($conn,$query); 
             $row=mysqli_fetch_array($result);
    ?>
        <tr>
          <td width="5" height="418" align="center" valign="top" background="image/zc1.gif">&nbsp;</td>
          <td width="230" align="center" valign="top">
		  <table width="88%"  border="0" cellpadding="0" cellspacing="0">
		  
			  <?php $query="select * from mr_user where  username='".$_SESSION['username']."'";
			         $result=mysqli_query($conn,$query);
					 $user1=mysqli_fetch_array($result); 
					 $ip=getenv('REMOTE_ADDR');
			  ?>
              <tr>
                <td height="30" align="center" valign="middle" class="style2"><span class="style2">==回复人信息==</span></td>
              </tr>
              <tr>
                <td height="24" align="center" valign="middle" class="style2"><?php echo $user1['username'];?></td>
              </tr>
              <tr>
                <td height="65" align="center" valign="middle"><img src="<?php echo $user1['tx'];?>" width="60" height="60"></td>
              </tr>
              <tr>
                <td height="22" align="center" valign="middle" class="style2">我是:<?php echo $user1['sex'];?>生</td>
              </tr>
              <tr>
                <td height="20" align="center" valign="middle" class="style2"><?php echo $user1['email'];?></td>
              </tr>
              <tr>
                <td height="20" align="center" valign="middle" class="style2"><?php echo $user1['qq'];?></td>
              </tr>
              <tr>
                <td height="20" align="center" valign="middle" class="style2">IP:<?php echo $ip;?></td>
              </tr>
          </table></td>
          <td width="10" background="image/zc2.gif">&nbsp;</td>
          <td width="522" align="center" valign="top"><table width="88%%" height="52"  border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td class="style2">主题:<?php echo $_GET['zhuti'];?></td>
            </tr>
          </table>
            <table width="88%"  border="0" cellpadding="0" cellspacing="0">
			 <form name="myform" method="post" action="fbzt_ok.php" enctype="multipart/form-data" onSubmit="javascript:return hftj_check();">
              <tr>
                <td width="18%" height="35" align="center" class="style2">回复主题:</td>
                <td><input name="hfzt" type="text" id="hfzt" size="50" maxlength="100">
				
				</td>
              </tr>
              <tr>
                <td height="235" align="center" class="style2">回复内容:</td>
                <td align="left" valign="top" class="style2"><textarea name="hfnr" cols="48" rows="15" wrap="PHYSICAL" id="hfnr"></textarea>                  
				  <input name="ljid" type="hidden" id="ljid" value="<?php echo $row['id'];?>">
				  <input name="zq" type="hidden" id="zq" value="<?php echo $row['zq'];?>">  
				  <input name="zt" type="hidden" id="zt" value="<?php echo $_GET['zhuti'];?>">               </td>
              </tr>
              <tr>
                <td height="35" align="center" class="style2">字节:</td>
                <td class="style2"><span class="style3">字数不要超过200个</span></td>
              </tr>
              <tr>
                <td height="35" align="center">&nbsp;</td>
                <td class="style2"><input name="hftj" type="submit" id="hftj" value="回复提交">
                <input type="reset" name="Submit2" value="信息重置"></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
		      </form>
          </table>          </td>
          <td width="9" align="center" valign="top" background="image/zc3.gif">&nbsp;</td>
        </tr>
        <tr>
          <td height="5" colspan="5"><img src="image/zc5.gif" width="776" height="10"></td>
        </tr>
    </table></td>
  </tr>
</table>
<div align="center"><?php include"under.php"?></div>
</body>
</html>
<?php }?>