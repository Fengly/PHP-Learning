<?php
session_start();					//初始化SESSION变量
include_once("conn.php");			//包含数据库连接文件
$sql=mysqli_query($conn,"select id from tb_user where usernc='".$_SESSION["unc"]."'");	//执行查询语句
$info=mysqli_fetch_array($sql);			//获取查询结果
$userid=$info['id'];					//获取用户ID	
$createtime=date("Y-m-d H:i:s");		//获取系统当前时间
//执行添加语句
if(mysqli_query($conn,"insert into tb_leaveword(userid,createtime,title,content)values('$userid','$createtime','".$_POST['title']."','".$_POST['content']."')")){
	echo "<script>alert('留言发表成功！');history.back();</script>";
}else{
  	echo "<script>alert('留言发表失败！');history.back();</script>";
}
?>