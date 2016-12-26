<?php
if(isset($_SESSION['user']) && isset($_SESSION['pass'])){
	$top='image/tx/top.gif';		//通过变量来获取专区的图标
	$df='image/tx/df.gif';
	$date=date("Y-m-d h:i:s");		 //获取当前的时间
	if(isset($_POST['zhuijia'])){	//把提交的数据添加到数据库中
		$query="insert into mr_zqfl(bz,zq,tb,cjsj)values('".$_POST['bz']."','".$_POST['zq']."','".$_POST['tb']."','".$date."')";
		$result=mysqli_query($conn,$query);
		if($result){
			echo "<meta http-equiv=\"refresh\" content=\"0;url=$furl\">";
		}else{  
			echo "追加失败!!";
		} 	 
	}
?>
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
	font-weight: normal;
}
-->
</style>
<table width="590" border="1" cellpadding="0" cellspacing="0">

  <form name="myform" method="post" action="index.php?lmbs=栏目管理" enctype="multipart/form-data">
    <tr>
      <td height="30" colspan="2" align="center">栏目管理</td>
      <td width="220">&nbsp;</td>
    </tr>
    <tr>
      <td width="170" height="30" align="center"><span class="style1">版主:
          <input name="bz" type="text" id="bz" size="15">
      </span></td>
      <td width="200" align="center" class="style1">所属专区:
          <select name="zq" size="1" id="zq">
            <option value="asp" selected>ASP</option>
            <option value="jsp">JSP</option>
            <option value="delphi">Delphi</option>
            <option value="visual basic">Visual Basic</option>
            <option value="visual foxpro">Visual Foxpro</option>
            <option value="visual c++">Visual C++ </option>
            <option value="power">Power Buider</option>
            <option value=".net">.net</option>
        </select></td>
      <td align="center" valign="middle" class="style1">图标:
          <input type="radio" name="tb" value="<?php echo $top;?>">
        <img src='../image/tx/top.gif' width='24' height='24'>
          <input type="radio" name="tb" value="<?php echo $df;?>">
		  <img src='../image/tx/df.gif' width='24' height='24'>
      </td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
      <td class="style1"><input name="zhuijia" type="submit" id="zhuijia" value="追加栏目"></td>
    </tr>
  </form>
</table>
<table width="590" border="0" cellpadding="0" cellspacing="0">
	<tr align="center" bgcolor="#D0E8FF" class="style1">
    	<td width="95" height="30">图 标</td>
    	<td width="70">所属专区</td>
    	<td width="145" bgcolor="#D0E8FF">版 主</td>
    	<td width="200">时间</td>
    	<td width="80">是否删除</td>
  	</tr>
<?php 
$query="select * from mr_zqfl where id";		//从数据库中查询出有关栏目专区的信息
$result=mysqli_query($conn,$query);
if($result){
	while($myrow=mysqli_fetch_array($result)){  //通过while循环语句,把这些信息的内容进行输出
?>	
	<tr align="center" class="style1">
    	<td height="30"><img src=../<?php echo $myrow['tb'];?> /></td>
    	<td><?php echo $myrow['zq'];?></td>
    	<td><?php echo $myrow['bz'];?></td>
    	<td><?php echo $myrow['cjsj'];?></td>
	
    	<td>
        	<a href="delete.php?lmbs=<?php echo urlencode('栏目管理');?>&id=<?php echo $myrow['id'];?>">删除</a>
      	</td>   
  	</tr>
<?php 
	}
}
?>
</table>
<?php 
}else{
	echo "<meta http-equiv=\"Refresh\" content=\"2;url=admin.php\">";
	echo "<a href=\"admin.php\">这里</a>";
}
?>