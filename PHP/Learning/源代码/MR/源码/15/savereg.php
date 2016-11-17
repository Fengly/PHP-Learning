<?php
session_start();
 include_once("conn.php");
 $usernc=$_POST["usernc"];
 $sql=mysqli_query($conn,"select usernc from tb_user where usernc='".$usernc."'");
 $info=mysqli_fetch_array($sql);
 if($info){
   echo "<script>alert('对不起，你的昵称已经被占用！');history.back();</script>";
   exit;
 }
 $ip=$_SERVER["REMOTE_ADDR"];
 if(mysqli_query($conn,"insert into tb_user(usernc,userpwd,truename,email,qq,tel,ip,address,face,regtime,sex,usertype) values('".$usernc."','".md5(trim($_POST["userpwd"]))."','".$_POST["truename"]."','".$_POST["email"]."','".$_POST["qq"]."','".$_POST["tel"]."','".$ip."','".$_POST["address"]."','".$_POST["face"]."','".date("Y-m-d H:i:s")."','".$_POST["sex"]."','0')")){

   if($_SESSION["unc"]!=""){
    session_unset();
   }
   $_SESSION["unc"]=$usernc;   
   echo "<script>alert('注册成功！');history.back();</script>";
 }else{
   echo "<script>alert('注册失败！');history.back();</script>";
 }
?>