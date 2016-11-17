<?php 
if(isset($_SESSION['user']) && isset($_SESSION['pass'])){
?>
<style type="text/css">
<!--
.style1 {font-size: 13px;
	font-family: "宋体";
	font-weight: normal;
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
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
.style2 {font-size: 12px}
-->
</style>

       <table width="593"  border="1" align="center" cellpadding="0" cellspacing="0">
		   <?php 
			    $page_size=10;
				$quer="select * from mr_hflb where id";
				$resul=mysqli_query($conn,$quer);
				$message_count=mysqli_num_rows($resul);
				$page_count=ceil($message_count/$page_size);
				$offset=($page-1)*$page_size;
				$quer="select * from mr_hflb where id order by id desc limit $offset ,$page_size";
				$resul=mysqli_query($conn,$quer);
				if($resul){
				while($myrow=mysqli_fetch_array($resul)){
				?>
         <tr onMouseMove="this.bgColor='#62B0FF'" onMouseOut="this.bgColor='#FFFFBF'">
              <td height="28" colspan="2" align="center" class="style1"> <table width="500" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="555" class="style1">&nbsp;&nbsp;主题:<?php echo $myrow['zhuti'];?> </td>
                    <td width="112">&nbsp;</td>
                    <td width="87" class="style1"><a href="delete.php?lmbs=<?php echo urlencode('回复主题');?>&id=<?php echo $myrow['id']?>;">删 除</a></td>
                  </tr>
                </table></td>
              <td>&nbsp;</td>
         </tr>
            <tr>
			<?php
			$query="select * from mr_user where username='".$myrow['username']."'";
		    $result=mysqli_query($conn,$query);
		    $xq=mysqli_fetch_array($result);    
			   ?> 
			  <td width="115" height="119" align="center"><table width="115" height="110" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="26" align="center" valign="middle" class="style1"><?php echo $myrow['username'];?></td>
                </tr>
                <tr>
                  <td height="64" align="center" valign="middle"><img src="../<?php echo $xq['tx'];?>"width="60" height="60"></td>
                </tr>
              </table>
		      </td>
              <td width="480" align="left" valign="top"><table width="100%"  border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="90%" height="30" class="style1">&nbsp;回复主题:<?php echo $myrow['hfzt'];?>&nbsp;&nbsp;</td>
                  <td width="10">&nbsp;</td>
                </tr>
                <tr>
                  <td height="20" align="right" valign="middle" bgcolor="#CCCCCC" class="style1">发表时间:<?php echo $myrow['hfsj'];?></td>
                  <td bgcolor="#CCCCCC">&nbsp;</td>
                </tr>
                <tr valign="middle">
                
                  <td colspan="2" class="style2"><span class="style2">&nbsp;回复内容：&nbsp;<?php echo $myrow['hfnr'];?></span></td>
                </tr>
              </table></td>
              <td width="1">&nbsp;</td>
            </tr>
             <?php }}?>
			  <tr>
              <td height="25" colspan="2" align="center"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr class="style1">
                  <td width="50%" class="#ff0000">&nbsp;&nbsp;页次：<font class="#ff0000"><?php echo $page;?></font> / <font class="#ff0000"><?php echo $page_count;?> </font>页 记录：<font class="#ff0000"><?php echo $message_count;?> </font>条&nbsp; </td>
                  <td width="39%" class="#ff0000"> 分页：
                     <a href='index.php?lmbs=回复主题&page=1'>首页</a>
<?php
		if($page >= 2){
?>
			<a href="index.php?lmbs=回复主题&page=<?php echo $page-1;?>">上一页</a>
<?php
		
		}
		if($page < $page_count){
?>
			<a href="index.php?lmbs=回复主题&page=<?php echo $page+1;?>">下一页</a>
<?php
		}
		if($page >= $page_count){		
?>
			<a href="index.php?lmbs=回复主题&page=<?php echo $page_count;?>">尾页</a>
            <?php 
		}
			?>
                  </td>
                </tr>
              </table></td>
              <td>&nbsp;</td>
            </tr>
</table>
	<?php 
}else{
	echo "<meta http-equiv=\"Refresh\" content=\"2;url=admin.php\">";
	echo "<a href=\"admin.php\">这里</a>";
}
?>