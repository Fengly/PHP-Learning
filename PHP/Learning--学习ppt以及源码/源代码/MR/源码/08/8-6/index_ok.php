<?php 
if(strlen($_POST["pwd"])<6){						 //����û�����ĳ����Ƿ�С��6
	echo "<script>alert('�û�����ĳ��Ȳ�������6λ!����������'); history.back();</script>";
}
else{
	echo "�û���Ϣ����Ϸ���";
}
?>
