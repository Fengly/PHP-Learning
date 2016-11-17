<?php 
if(isset($_SESSION['user']) && isset($_SESSION['pass'])){
?>
<style type="text/css">
<!--
a:link {
	color: #000000;
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
	color: #000000;
}
.style4 {font-size: 13px;
	font-family: "宋体";
	font-weight: normal;
}
.style5 {font-size: 12px}
-->
</style><table width="590" border="0" cellpadding="0" cellspacing="0" bgcolor="#EFF3FF">
  <tr>
    <td width="90" height="30">&nbsp;</td>
    <td width="90">用户管理</td>
    <td width="90">&nbsp;</td>
    <td width="110">&nbsp;</td>
    <td width="40">&nbsp;</td>
    <td width="100">&nbsp;</td>
    <td width="70">&nbsp;</td>
  </tr>
  <tr align="center">
    <td height="30" class="style4">用户名</td>
    <td class="style4">真实姓名</td>
    <td colspan="2" class="style4">地址</td>
    <td class="style4">性别</td>
    <td class="style4">电话</td>
    <td class="style4">是否删除</td>
  </tr>
  <?php 
     $page_size=15;
	 $query="select * from mr_user where id";
	 $result=mysqli_query($conn,$query);
	 $message_count=mysqli_num_rows($result);
	 $page_count=ceil($message_count/$page_size);
	 $offset=($page-1)*$page_size;
	 $query="select * from mr_user where id order by id desc limit $offset,$page_size";
	 $result=mysqli_query($conn,$query);
	 if($result){
	 while($myrow=mysqli_fetch_array($result)){
  ?>
  <tr align="center" onMouseMove="this.bgColor='#D7F2FF'" onMouseOut="this.bgColor='#FFD9D9'">
    <td height="30"><span class="style5"><?php echo $myrow['username'];?></span></td>
    <td class="style5"><?php echo $myrow['zsxm'];?></td>
    <td colspan="2" class="style5"><?php echo $myrow['lxdz'];?></td>
    <td class="style5"><?php echo $myrow['sex'];?></td>
    <td class="style5"><?php echo $myrow['lxdh']?></td>
    <td><a href="delete.php?lmbs=<?php echo urlencode('用户管理');?>&id=<?php echo $myrow['id'];?>" class="style5">删除</a></td>
  </tr>
  <?php }}?>
  <tr>
    <td height="30" colspan="7"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr class="style4">
        <td width="50%" class="#ff0000">&nbsp;&nbsp;页次：<font class="#ff0000"><?php echo $page;?></font> / <font class="#ff0000"><?php echo $page_count;?> </font>页 记录：<font class="#ff0000"><?php echo $message_count;?> </font>条&nbsp; </td>
        <td width="39%" class="#ff0000"> 分页：
      
<a href='index.php?lmbs=<?php echo urlencode('用户管理');?>&page=1'>首页</a>
<?php
		if($page >= 2){
?>
			<a href="index.php?lmbs=<?php echo urlencode('用户管理');?>&page=<?php echo $page-1;?>">上一页</a>
<?php
		
		}
		if($page < $page_count){
?>
			<a href="index.php?lmbs=<?php echo urlencode('用户管理');?>&page=<?php echo $page+1;?>">下一页</a>
<?php
		}
		if($page >= $page_count){		
?>
			<a href="index.php?lmbs=<?php echo urlencode('用户管理');?>&page=<?php echo $page_count;?>">尾页</a>
            <?php 
		}
			?>
        </td>
      </tr>
    </table></td>
  </tr>
</table>
<?php }else{
include "yzdl.php";
}
?>
