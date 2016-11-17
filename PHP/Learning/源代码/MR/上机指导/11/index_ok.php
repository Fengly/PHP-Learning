<?php
    session_start();//开启SESSION
	header("content-type:text/html;charset=utf-8");//设置编码格式
	include("conn/conn.php");//包含数据库连接文件
	$name=$_POST['user'];
    $pwd=$_POST['pwd'];
	$sql=mysqli_query($conn,"select * from tb_member where name='".$name."' and password='".$pwd."'");//执行sql语句
	if(mysqli_num_rows($sql)>0){//判断数据库中是否有记录	  
	  $_SESSION['name']=$name;//为SESSION变量赋值
	  $_SESSION['time']=time();//为SESSION变量赋值
	  echo "<script>alert('登录成功！');location='show.php';</script>";//提示登录成功
	}else{
	  echo "<script>alert('用户名或密码错误！');location='index.php';</script>";//提示用户名或密码错误
	}
?>