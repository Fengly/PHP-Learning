<?php 
if(isset($_SESSION['user']) && isset($_SESSION['pass'])){
?>
<style type="text/css">
<!--
.style1 {font-size: 13px;
	font-family: "����";
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
                    <td width="555" class="style1">&nbsp;&nbsp;����:<?php echo $myrow['zhuti'];?> </td>
                    <td width="112">&nbsp;</td>
                    <td width="87" class="style1"><a href="delete.php?lmbs=<?php echo urlencode('�ظ�����');?>&id=<?php echo $myrow['id']?>;">ɾ ��</a></td>
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
                  <td width="90%" height="30" class="style1">&nbsp;�ظ�����:<?php echo $myrow['hfzt'];?>&nbsp;&nbsp;</td>
                  <td width="10">&nbsp;</td>
                </tr>
                <tr>
                  <td height="20" align="right" valign="middle" bgcolor="#CCCCCC" class="style1">����ʱ��:<?php echo $myrow['hfsj'];?></td>
                  <td bgcolor="#CCCCCC">&nbsp;</td>
                </tr>
                <tr valign="middle">
                
                  <td colspan="2" class="style2"><span class="style2">&nbsp;�ظ����ݣ�&nbsp;<?php echo $myrow['hfnr'];?></span></td>
                </tr>
              </table></td>
              <td width="1">&nbsp;</td>
            </tr>
             <?php }}?>
			  <tr>
              <td height="25" colspan="2" align="center"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr class="style1">
                  <td width="50%" class="#ff0000">&nbsp;&nbsp;ҳ�Σ�<font class="#ff0000"><?php echo $page;?></font> / <font class="#ff0000"><?php echo $page_count;?> </font>ҳ ��¼��<font class="#ff0000"><?php echo $message_count;?> </font>��&nbsp; </td>
                  <td width="39%" class="#ff0000"> ��ҳ��
                     <a href='index.php?lmbs=�ظ�����&page=1'>��ҳ</a>
<?php
		if($page >= 2){
?>
			<a href="index.php?lmbs=�ظ�����&page=<?php echo $page-1;?>">��һҳ</a>
<?php
		
		}
		if($page < $page_count){
?>
			<a href="index.php?lmbs=�ظ�����&page=<?php echo $page+1;?>">��һҳ</a>
<?php
		}
		if($page >= $page_count){		
?>
			<a href="index.php?lmbs=�ظ�����&page=<?php echo $page_count;?>">βҳ</a>
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
	echo "<a href=\"admin.php\">����</a>";
}
?>