<?php
header ( "Content-type: text/html; charset=gb2312" ); //�����ļ������ʽ
 class chkinput{
   var $name;
   var $pwd;

   function chkinput($x,$y)
    {
     $this->name=$x;
     $this->pwd=$y;
    }

   function checkinput()
   {
     include("conn/conn.php");
     $sql=mysqli_query($conn,"select * from tb_admin where name='".$this->name."'");
     $info=mysqli_fetch_array($sql);
     if($info==false)
       {
          echo "<script language='javascript'>alert('�����ڴ˹���Ա��');history.back();</script>";
          exit;
       }
      else
       {
          if($info['pwd']==$this->pwd){
               header("location:default.php");
            }
          else
           {
             echo "<script language='javascript'>alert('�����������');history.back();</script>";
             exit;
           }

      }    
   }
 }


    $obj=new chkinput(trim($_POST['name']),md5(trim($_POST['pwd'])));
    $obj->checkinput();

?>