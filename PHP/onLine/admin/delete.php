<?php 
session_start(); 
include("config.php");
$furl=getenv("http_referer");
if(isset($_SESSION['user']) && isset($_SESSION['pass'])){
	if(isset($_GET['lmbs']) && $_GET['lmbs']=="�û�����"){
		$id=$_GET['id'];			//��ý���ɾ�����û�ID
		$query="delete from mr_user where id='$id'";	//��Ҫɾ�����û���mr_user����ɾ��
		$result=mysqli_query($conn,$query);
		if($result){
  			echo "ɾ���ɹ�!!";
  			echo "<meta http-equiv=\"Refresh\" content=\"2;url=$furl\">";
		}else{
			echo "ɾ��ʧ��!";
		}
	}
	if(isset($_GET['lmbs']) && $_GET['lmbs']=="��Ŀ����"){
		$id=$_GET['id'];
		$query="delete from mr_zqfl where id='$id'";
		$result=mysqli_query($conn,$query);
  		if($result){
     		echo "<font color=\"#ff0000\">ɾ���ɹ�!!</font>";
     		echo "<meta http-equiv=\"refresh\" content=\"2; url=$furl\">";
		}
	}
	if(isset($_GET['lmbs']) && $_GET['lmbs']=="��̳����"){
   		$id=$_GET['id'];
   		$query="delete from mr_zqlb where id='$id'";
   		$result=mysqli_query($conn,$query);
   		if($result){
      		echo "�ɹ�ɾ��!!";
      		echo "<meta http-equiv=\"refresh\" content=\"2; url=$furl\">"; 
		}
	}
	if(isset($_GET['lmbs']) && $_GET['lmbs']=="�ظ�����"){
   		$id=$_GET['id'];
   		$query="delete from mr_hflb where id='$id'";
   		$result=mysqli_query($conn,$query);
   		if($result){
     		echo "<font color=\"#ff0000\">ɾ���ɹ�!!</font>";
	 		echo "<meta http-equiv=\"refresh\" content=\"2; url=$furl\">"; 
		}
	} 
}else{
	echo "<meta http-equiv=\"Refresh\" content=\"2;url=admin.php\">";
	echo "<a href=\"admin.php\">����</a>";
}
?>