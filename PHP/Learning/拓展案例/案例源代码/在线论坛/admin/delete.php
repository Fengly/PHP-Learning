<?php 
session_start(); 
include("config.php");
$furl=getenv("http_referer");
if(isset($_SESSION['user']) && isset($_SESSION['pass'])){
	if(isset($_GET['lmbs']) && $_GET['lmbs']=="用户管理"){
		$id=$_GET['id'];			//获得将被删除的用户ID
		$query="delete from mr_user where id='$id'";	//将要删除的用户从mr_user表中删除
		$result=mysqli_query($conn,$query);
		if($result){
  			echo "删除成功!!";
  			echo "<meta http-equiv=\"Refresh\" content=\"2;url=$furl\">";
		}else{
			echo "删除失败!";
		}
	}
	if(isset($_GET['lmbs']) && $_GET['lmbs']=="栏目管理"){
		$id=$_GET['id'];
		$query="delete from mr_zqfl where id='$id'";
		$result=mysqli_query($conn,$query);
  		if($result){
     		echo "<font color=\"#ff0000\">删除成功!!</font>";
     		echo "<meta http-equiv=\"refresh\" content=\"2; url=$furl\">";
		}
	}
	if(isset($_GET['lmbs']) && $_GET['lmbs']=="论坛主题"){
   		$id=$_GET['id'];
   		$query="delete from mr_zqlb where id='$id'";
   		$result=mysqli_query($conn,$query);
   		if($result){
      		echo "成功删除!!";
      		echo "<meta http-equiv=\"refresh\" content=\"2; url=$furl\">"; 
		}
	}
	if(isset($_GET['lmbs']) && $_GET['lmbs']=="回复主题"){
   		$id=$_GET['id'];
   		$query="delete from mr_hflb where id='$id'";
   		$result=mysqli_query($conn,$query);
   		if($result){
     		echo "<font color=\"#ff0000\">删除成功!!</font>";
	 		echo "<meta http-equiv=\"refresh\" content=\"2; url=$furl\">"; 
		}
	} 
}else{
	echo "<meta http-equiv=\"Refresh\" content=\"2;url=admin.php\">";
	echo "<a href=\"admin.php\">这里</a>";
}
?>