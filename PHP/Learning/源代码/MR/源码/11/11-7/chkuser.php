<?php
header ( "Content-type: text/html; charset=gb2312" ); //�����ļ������ʽ
include("conn/conn.php");
$username=$_POST['username'];
$userpwd=md5($_POST['userpwd']);
$yz=$_POST['yz'];
$num=$_POST['num'];
if(strval($yz)!=strval($num)){
  echo "<script>alert('��֤���������!');history.go(-1);</script>";
  exit;
 }
class chkinput{
   var $name;
   var $pwd;

   function chkinput($x,$y){
     $this->name=$x;
     $this->pwd=$y;
    }

   function checkinput(){
     include("conn/conn.php");
     $sql=mysqli_query($conn,"select * from tb_user where name='".$this->name."'");
     $info=mysqli_fetch_array($sql);
     if($info==false){
          echo "<script language='javascript'>alert('�����ڴ��û���');history.back();</script>";
          exit;
       }
      else{
	      if($info['dongjie']==1){
			   echo "<script language='javascript'>alert('���û��Ѿ������ᣡ');history.back();</script>";
               exit;
			}
          
          if($info['pwd']==$this->pwd)
            {  
			   session_start();
	           $_SESSION['username']=$info['name'];
               header("location:top.php");
               exit;
            }
          else {
             echo "<script language='javascript'>alert('�����������');history.back();</script>";
             exit;
           }

      }    
   }
 }

    $obj=new chkinput(trim($username),trim($userpwd));
    $obj->checkinput();
?>