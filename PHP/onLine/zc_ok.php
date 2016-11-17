<?php 
session_start();	//初始化session变量
include "config.php";	//包含数据库文件
$furl=getenv("HTTP_REFERER");		//
echo $furl;
print_r($_POST);
if(isset($_POST['qrtj'])){		//对提交按钮进行判断
     	$username=$_POST['zc_username'];
	$password=$_POST['zc_password'];
     	$zsxm=$_POST['zsxm'];
	$sex=$_POST['sex'];
	$shengri=$_POST['shengri'];
	$lxdh=$_POST['lxdh'];
	$qq=$_POST['qq'];
	$tp=$_POST['ICO'];
	$email=$_POST['email'];
	$grzy=$_POST['grzy'];
	$lxdz=$_POST['lxdz'];
	$query="select * from mr_user where username='$username'";		//在数据库中查询提交的用户名
	$result=mysqli_query($conn,$query);
	if(mysqli_num_rows($result)>0){		//对查询的记录数进行判断
	 	echo $username."已经被注册!</font>";	//用户名注册过给出提示
   		echo "<meta http-equiv=\"Refresh\" content=\"3;url=$furl\">3秒钟转入注册页,请稍等...";		//跳转回注册页
	 }else{
		$passwords=md5($password);
		$tp="image/tx/".$_POST['ICO']; 
	 	$query="insert into mr_user (username,zsxm,password,sex,shengri,lxdh,qq,tx,email,grzy,lxdz)values('$username','$zsxm','$passwords','$sex','$shengri','$lxdh','$qq','$tp','$email','$grzy','$lxdz')";
	 	if(mysqli_query($conn,$query)){
	 		$_SESSION['username']=$username;	//通过session获取提交的用户名
	 		$_SESSION['password']=$password;    //通过session获取提交的密码
	  		echo "<font class=\"red\">您注册的信息如下！</font><br>";
			echo "<li class=\"huise03\">用户名:<font color=red>".$username."<br>";		//输出注册的用户名
			echo "<li class=\"huise03\">E-Mail:<font color=red>".$email."<br>";   //输出注册的邮箱
			echo "<li class=\"huise03\"><font color=red>".$username."</font>恭喜您注册成功！";
			echo "<meta http-equiv=\"Refresh\" content=\"3;url=index.php\">5秒钟转入主页,请稍等...";
	 	}else{
	 		echo "<font class='#ff0000'>注册失败!!!</font>";
	 		echo mysqli_error();
		} 
	}
}

?>
