<?php
session_start(); 					//初始化SESSION变量
include("config.php");				//包含数据库连接文件
$time=date("Y")."-".date("m")."-".date("d");		//获取系统当前时间
if(isset($_SESSION['username']) && isset($_SESSION['password'])){		//判断用户是否正常登录
	if(isset($_POST['zhuti'])){										//判断主题是否提交
		$zhuti=htmlspecialchars($_POST['zhuti']);					//对字符串进行格式
		$neirong=htmlspecialchars($_POST['neirong']);
		$zq=$_POST['zq'];
		$xq=$_POST['xq'];								//获取系统提交数据
		$username=$_SESSION['username'];							
	    $query="insert into mr_zqlb (zq,xq,zhuti,neirong,username,fbsj)values('$zq','$xq','$zhuti','$neirong','$username','$time')";
		$result=mysqli_query($conn,$query);  			//执行添加语句
		if($result){
			echo "<meta http-equiv=\"Refresh\" content=\"2;url=lmzy.php?zq=".urlencode($zq)."\">";
			echo "发布成功!";
		}else{ 
			echo "发布主题失败!!";
		}    
	}
	if(isset($_POST['hftj'])){
		$date=date("y:m:d h:i:s");
	    $hfzt=htmlspecialchars($_POST['hfzt']);
		$hfnr=htmlspecialchars($_POST['hfnr']);	
		$query="insert into mr_hflb (hfzt,hfnr,hfsj,username,ljid,zq,zhuti)values('$hfzt','$hfnr','$date','".$_SESSION['username']."','".$_POST['ljid']."','".$_POST['zq']."','".$_POST['zt']."')";
		$result=mysqli_query($conn,$query);  //送出一个query字符串
		if($result){		
			echo "回复成功!!";
			echo "<meta http-equiv=\"Refresh\" content=\"2;url=zthf.php?zhuti=".$_POST['zt']."&recid=".$_POST['ljid']."\">";
		}else{
			echo "回复失败!!!";
		}
	}
}else{ 
	echo "请先登录!!"; 
}
?>