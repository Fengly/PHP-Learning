<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>��������</title>
</head>

<body>
<?php
	//������һ������a�������������ĺͣ���Ҫ�������Ͳ��������ؼ�����ֵ
	function a($a,$b){
		return $a+$b;
	}
	//������һ������b��������������ƽ���ͣ���Ҫ�������Ͳ��������ؼ�����ֵ
	function b($a,$b){
		return $a*$a+$b*$b;
	}
	//������һ������c�������������������ͣ���Ҫ�������Ͳ��������ؼ�����ֵ
	function c($a,$b){
		return $a*$a*$a+$b*$b*$b;
	}
	$result="a";		//����������a����ֵ������$result��ִ��$result()ʱ����ú���a()
	//$result="b";	����������b����ֵ������$result��ִ��$result()ʱ����ú���b()
	//$result="c";	����������c����ֵ������$result��ִ��$result()ʱ����ú���c()
	echo"�������ǣ�".$result(2,3);
?>

</body>
</html>
