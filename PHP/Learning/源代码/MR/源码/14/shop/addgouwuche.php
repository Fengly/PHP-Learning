<?php
header ( "Content-type: text/html; charset=gb2312" ); //�����ļ������ʽ
session_start();
include("conn/conn.php");
if(!isset($_SESSION['username'])){
  echo "<script>alert('���ȵ�¼����!');history.back();</script>"; 
  exit;
 }
$id=strval($_GET['id']);
$sql=mysqli_query($conn,"select * from tb_shangpin where id='".$id."'"); 
$info=mysqli_fetch_array($sql);
if($info['shuliang']<=0){
   echo "<script>alert('����Ʒ�Ѿ�����!');history.back();</script>";
   exit;
 }
$array=explode("@",isset($_SESSION['producelist'])?$_SESSION['producelist']:"");
if(count($array)==1){
  	$_SESSION['producelist']=$_SESSION['producelist'].$id."@";
  	$_SESSION['quatity']=$_SESSION['quatity']."1@";
}
if(count($array)!=1){
	if(!in_array($id,$array)){
	    $_SESSION['producelist']=$_SESSION['producelist'].$id."@";
  		$_SESSION['quatity']=$_SESSION['quatity']."1@";
	}else{
	  	$arrayquatity=explode("@",$_SESSION['quatity']);
		$key=array_search($id,$array);
		$arrayquatity[$key]=$arrayquatity[$key]+1;
		$_SESSION['quatity']=implode("@",$arrayquatity);
	}
}
header("location:gouwu1.php");
?> 