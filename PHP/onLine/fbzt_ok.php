<?php
session_start(); 					//��ʼ��SESSION����
include("config.php");				//�������ݿ������ļ�
$time=date("Y")."-".date("m")."-".date("d");		//��ȡϵͳ��ǰʱ��
if(isset($_SESSION['username']) && isset($_SESSION['password'])){		//�ж��û��Ƿ�������¼
	if(isset($_POST['zhuti'])){										//�ж������Ƿ��ύ
		$zhuti=htmlspecialchars($_POST['zhuti']);					//���ַ������и�ʽ
		$neirong=htmlspecialchars($_POST['neirong']);
		$zq=$_POST['zq'];
		$xq=$_POST['xq'];								//��ȡϵͳ�ύ����
		$username=$_SESSION['username'];							
	    $query="insert into mr_zqlb (zq,xq,zhuti,neirong,username,fbsj)values('$zq','$xq','$zhuti','$neirong','$username','$time')";
		$result=mysqli_query($conn,$query);  			//ִ��������
		if($result){
			echo "<meta http-equiv=\"Refresh\" content=\"2;url=lmzy.php?zq=".urlencode($zq)."\">";
			echo "�����ɹ�!";
		}else{ 
			echo "��������ʧ��!!";
		}    
	}
	if(isset($_POST['hftj'])){
		$date=date("y:m:d h:i:s");
	    $hfzt=htmlspecialchars($_POST['hfzt']);
		$hfnr=htmlspecialchars($_POST['hfnr']);	
		$query="insert into mr_hflb (hfzt,hfnr,hfsj,username,ljid,zq,zhuti)values('$hfzt','$hfnr','$date','".$_SESSION['username']."','".$_POST['ljid']."','".$_POST['zq']."','".$_POST['zt']."')";
		$result=mysqli_query($conn,$query);  //�ͳ�һ��query�ַ���
		if($result){		
			echo "�ظ��ɹ�!!";
			echo "<meta http-equiv=\"Refresh\" content=\"2;url=zthf.php?zhuti=".$_POST['zt']."&recid=".$_POST['ljid']."\">";
		}else{
			echo "�ظ�ʧ��!!!";
		}
	}
}else{ 
	echo "���ȵ�¼!!"; 
}
?>