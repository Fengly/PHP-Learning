<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title></title>
</head>
<body>
<?php
	$str="Ϊ��һ���ḻ��̴ʵ�����ݺ͹����ԣ���˾������֯��������Ȼ������Ӱ���������β�����ƷҪ��ȫ��Ϊ�������㣬ּ��չʾ�ҹ�������������������Ȼ�ľ�ɫ��";
	if(strlen($str)>40){ 						//����ı����ַ������ȴ���70
		echo substr($str,0,40)."...";				//����ı���ǰ70���ַ�����Ȼ�����ʡ�Ժ�
	}else{									//����ı����ַ�������С��70
		echo $str; 							//ֱ������ı�
	}
?>

</body>
</html>
