<?php
header ( "Content-type: text/html; charset=gb2312" ); //�����ļ������ʽ
session_start();
$p1=md5(trim($_POST['p1']));
$p2=trim($_POST['p2']);

$name=$_SESSION['username'];
class chkchange
   {
	   var $name;
	   var $p1;
	   var $p2;
	   function chkchange($x,$y,$z)
	    {
		  $this->name=$x;
		  $this->p1=$y;
		  $this->p2=$z;
		
		}
	   function changepwd()
	   {include("conn/conn.php");
	    $sql=mysqli_query($conn,"select * from tb_user where name='".$this->name."'");
	    $info=mysqli_fetch_array($sql);
		if($info['pwd']!=$this->p1)
		 {
		   echo "<script>alert('ԭ�����������!');history.back();</script>";
		   exit;
		 }
		 else
		 {
		   mysqli_query($conn,"update tb_user set pwd='".md5($this->p2)."' ,pwd1='$this->p2' where name='$this->name'");
		   echo "<script>alert('�����޸ĳɹ�!');history.back();</script>";
		   exit;
		 }
	   }
  }
 $obj=new chkchange($name,$p1,$p2); 
 $obj->changepwd() 
?>