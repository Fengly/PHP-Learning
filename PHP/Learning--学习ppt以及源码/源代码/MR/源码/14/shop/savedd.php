<?php
header ( "Content-type: text/html; charset=gb2312" ); //�����ļ������ʽ
session_start();//��ʼ��session����
include("conn/conn.php");//�������ݿ��ļ�
$sql=mysqli_query($conn,"select * from tb_user where name='".$_SESSION['username']."'");
$info=mysqli_fetch_array($sql);//�����û����ݱ��е���Ϣ
$dingdanhao=date("YmjHis").$info['id'];//������=��ǰ����ʱ��+�û���id��
$spc=$_SESSION['producelist'];//���û��������Ʒ���ƴ���������$spc
$slc= $_SESSION['quatity'];//���û��������Ʒ��������������$slc
$shouhuoren=$_POST['name2'];//��ȡ�ջ�������
$sex=$_POST['sex'];//��ȡ�ջ����Ա�
$dizhi=$_POST['dz'];//��ȡ�ջ��˵�ַ
$youbian=$_POST['yb'];//��ȡ�ջ����ʱ�
$tel=$_POST['tel'];//��ȡ�ջ��˵绰
$email=$_POST['email'];//��ȡ�ջ���E-mail��ַ
$shff=$_POST['shff'];//��ȡ�ͻ���ʽ
$zfff=$_POST['zfff'];//��ȡ֧����ʽ
if(trim($_POST['ly'])==""){//����û�����Ϊ��
   $leaveword="";//��$leaveword������Ϊ��
 }
 else{//�����ȡ�û���������Ϣ
   $leaveword=$_POST['ly'];
 }
 $xiadanren=$_SESSION['username'];//��ȡ�µ������ƣ�����ǰ�û�
 $time=date("Y-m-j H:i:s");//��ȡϵͳ��ǰʱ��
 $zt="δ���κδ���";
 $total=$_SESSION['total'];//��ȡ���ﳵ��������Ʒ���ۼƽ��
 mysqli_query($conn,"insert into tb_dingdan(dingdanhao,spc,slc,shouhuoren,sex,dizhi,youbian,tel,email,shff,zfff,leaveword,time,xiadanren,zt,total) values ('$dingdanhao','$spc','$slc','$shouhuoren','$sex','$dizhi','$youbian','$tel','$email','$shff','$zfff','$leaveword','$time','$xiadanren','$zt','$total')"); //����Ϣ��ӵ�tb_dingdan��
 header("location:gouwu2.php?dingdanhao=$dingdanhao");//���¶�λ������̨
?>
