<?php 
if(isset($_SESSION['user']) && isset($_SESSION['pass'])){
?>

<style type="text/css">
<!--
.style1 {
	font-size: 14px;
	font-family: "宋体";
	font-weight: bold;
}
.style2 {
	font-size: 13px;
	font-family: "宋体";
	font-weight: bold;
}
.style3 {
	font-size: 12px;
	font-family: "宋体";
}
.style4 {font-size: 13px;
	font-family: "宋体";
	font-weight: normal;
}
-->
</style>

<table width="590" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30" colspan="2" align="center"><span class="style1">主 题 管 理</span></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr align="center" bgcolor="#CEFFCE">
    <td width="190" height="25"><span class="style3">主 题</span></td>
    <td width="295" class="style3">内 容</td>
    <td width="65" class="style3">作 者</td>
    <td width="40" class="style3">删 除</td>
  </tr>
  <?php 
       $page_size=8;
       $query="select * from mr_zqlb where id";
	   $result=mysqli_query($conn,$query);
	   $message_count=mysqli_num_rows($result);
	   $page_count=ceil($message_count/$page_size);
	   $offset=($page-1)*$page_size;
	   $query="select * from mr_zqlb where id order by id desc limit $offset,$page_size";
	   $result=mysqli_query($conn,$query);
	   if($result){
	   while($myrow=mysqli_fetch_array($result)){
  ?>
  <tr align="center" onMouseDown="this.bgColor='#C4E1FF'" onMouseOut="this.bgColor='#FFE1E1'" onMouseMove="this.bgColor='#DDFFFF'">
    <td height="30"><span class="style3"><?php echo $myrow['zhuti'];?></span></td>
    <td align="left" valign="middle" class="style3"><?php echo $myrow['neirong'];?></td>
    <td class="style3"><?php echo $myrow['username'];?></td>
	
    <td class="style2"><a href="delete.php?lmbs=<?php echo urlencode('论坛主题');?>&id=<?php echo $myrow['id'];?>" class="style3">删除</a></td>
  </tr>
  <?php }}?>
  <tr>
    <td height="30" colspan="4"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr class="style4">
        <td width="50%" class="#ff0000">&nbsp;&nbsp;页次：<font class="#ff0000"><?php echo $page;?></font> / <font class="#ff0000"><?php echo $page_count;?> </font>页 记录：<font class="#ff0000"><?php echo $message_count;?> </font>条&nbsp; </td>
        <td width="39%" class="#ff0000"> 分页：
           
           
<a href='index.php?lmbs=论坛主题&page=1'>首页</a>
<?php
		if($page >= 2){
?>
			<a href="index.php?lmbs=论坛主题&page=<?php echo $page-1;?>">上一页</a>
<?php
		
		}
		if($page < $page_count){
?>
			<a href="index.php?lmbs=论坛主题&page=<?php echo $page+1;?>">下一页</a>
<?php
		}
		if($page >= $page_count){		
?>
			<a href="index.php?lmbs=论坛主题&page=<?php echo $page_count;?>">尾页</a>
            <?php 
		}
			?>
        </td>
      </tr>
    </table></td>
  </tr>
</table>
<?php 
}else{
	echo "<meta http-equiv=\"Refresh\" content=\"2;url=admin.php\">";
	echo "<a href=\"admin.php\">这里</a>";
}
?>