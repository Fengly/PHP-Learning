<?php 
session_start();
include("config.php");
if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){
	echo "请先登录,才可以发布主题!!";
	echo "<meta http-equiv=\"Refresh\" content=\"2;url=index.php\">";
}else{
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>主题发布</title>
<style type="text/css">
<!--
.style1 {font-size: 13px;
	font-family: "宋体";
	font-weight: normal;
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
</head>
<script language="javascript" src="script/zc_check.js" type="text/javascript"></script>
<body>

<div align="center"><?php  include"head.php";?></div>
<table width="776" border="0" align="center" cellpadding="0" cellspacing="0" background="image/555.gif">
  <tr>
    <td width="15">&nbsp;</td>
    <td width="760" height="30">&nbsp;&nbsp;== 发布主题 == </td>
  </tr>
</table>
<table width="776" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="776"><table width="776" height="500"  border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td align="center" valign="top" background="image/zc1.gif">&nbsp;</td>
        <td align="center" valign="top">&nbsp;</td>
        <td background="image/zc2.gif">&nbsp;</td>
        <td align="center" valign="top">&nbsp;</td>
        <td align="center" valign="top" background="image/zc3.gif">&nbsp;</td>
      </tr>
      <tr>
        <td width="5" align="center" valign="top" background="image/zc1.gif">&nbsp;</td>
        <td width="230" align="center" valign="top"><table width="88%"  border="0" cellpadding="0" cellspacing="0">
          <tr>
		  <?php 
		  $query="select * from mr_user where username='".$_SESSION['username']."'";
		  $result=mysqli_query($conn,$query);
		  $myrow=mysqli_fetch_array($result);
		  $ip=getenv('remote_addr');
		  ?>
            <td align="center"><p>==发帖人信息==</p>
              <p><?php echo $myrow['username'];?></p>
			
              <p><img src="<?php echo $myrow['tx'];?>"></p>
              <p class="style1">我是:<?php echo $myrow['sex'];?>生</p>
              <p><?php echo $myrow['email'];?></p>
             
              <p>IP:<?php echo $ip;?></p>
              <p>&nbsp;</p></td>
          </tr>
        </table></td>
        <td width="10" background="image/zc2.gif">&nbsp;</td>
        <td width="522" align="center" valign="top">
		  <table width="88%"  border="0" cellpadding="0" cellspacing="0">
		<form name="myform" method="post" action="fbzt_ok.php" enctype="multipart/form-data"  onSubmit="javascript:return fbzt_check();">
          <tr>
            <td width="18%" height="30" align="center" class="style1">类别:</td>
			
            <td>  
			<select name="zq" size="1" id="zq"> 
			<?php 
			$query="select * from mr_zqfl order by id desc";
			$result=mysqli_query($conn,$query);
			while($row=mysqli_fetch_array($result)){
			?>
              <option value="<?php echo $row['zq'];?>"><?php echo $row['zq'];?></option>
       
			<?php }?> </select>	              </td>
          </tr>
          <tr>
            <td height="30" align="center" class="style1">主题:</td>
            <td><input name="zhuti" type="text" id="zhuti" size="20" maxlength="80"></td>
          </tr>
          <tr>
            <td height="90" align="center" class="style1">表情:</td>
            <td align="left" valign="top">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<?php  for($i=1; $i<=4; $i++) {  //如果变量<=4,按照行进行循环,输出行
            echo "<tr>";    ?>  
        <?php  if($i==1){
                  $query="select * from mr_lttb ";  //从数据表mr_lttb中获取表情图			
				  $lttb=mysqli_query($conn,$query); 
				}
				  $j=1;					     //设置变量$j=1
				  while ($lttb_row=mysqli_fetch_array($lttb)){   //进行while循环输出
						 if ($j<=8)  {   //每行的表情图个数<=8,输出如下内容
						  
		?>
  <td height="26" align="center" valign="middle">
<input name="xq" type="radio" value="<?php echo $lttb_row['id'];?>" checked="checked">          
<img src="images.php?recid=<?php echo $lttb_row['id'];?>" width="16" height="16" border="0"></a></td>
      <?php  }
		      $c=1;								  
			  ++$j;           //当表情图的个数增加时
			  if($j==9){  break;  }   //当表情图的个数等于9时,跳转到下一行重新进行循环
		                    }
	        echo "</tr>";
		}
?>
</table></td>
          </tr>
          <tr>
            <td height="235" align="center" class="style1">内容:</td>
            <td align="left" valign="top">              <span class="huise09-20">
              <input name="user" type="hidden" id="user" value="<?php echo $_SESSION['username'];?>">
              <input name="pass" type="hidden" id="pass" value="<?php echo $_SESSION['password'];?>">
              <textarea name="neirong" cols="50" rows="15" wrap="PHYSICAL" id="neirong"></textarea>
</span></td>
          </tr>
          <tr>
            <td height="30" align="center">字节:</td>
            <td class="style1">字数不要超过200个</td>
          </tr>
          <tr>
            <td height="30" align="center">&nbsp;</td>
            <td><input name="zttj" type="submit" id="zttj" value="主题提交">
              <input type="reset" name="Submit" value="重置信息">             </td>
          </tr>
          <tr>
            <td height="30" align="center">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
		   </form>
        </table>		</td>
        <td width="9" align="center" valign="top" background="image/zc3.gif">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
<?php 
include"under.php";
?>
</body>
</html>
<?php 
}
?>