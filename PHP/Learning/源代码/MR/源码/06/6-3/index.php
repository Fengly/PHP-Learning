<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>��ȡ�ı������Ϣ</title>
</head>
<body>
<form name="form1" method="post" action="">
�û�����<input type="text" name="user" size="20" ><p>
��&nbsp;&nbsp;�룺<input name="pwd" type="password" id="pwd" size="20" >
  	<input name="submit" type="submit" id="submit" value="��¼" />
</form>

<?php
if(isset($_POST["submit"]) && $_POST["submit"]=="��¼"){//�ж��ύ�İ�ť�����Ƿ���ڡ���¼��
	echo "��������û���Ϊ��".$_POST['user']."&nbsp;&nbsp;����Ϊ��".$_POST['pwd'];//����û���������
}
?>
</body>
</html>
