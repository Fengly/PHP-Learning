<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>switch���</title>
<style type="text/css">
<!--
body,td,th {
	font-size: 12px;
}
body {
	margin-left: 10px;
	margin-top: 10px;
	margin-right: 10px;
	margin-bottom: 10px;
}
-->
</style></head>
<body>
<div align="center">
<?php
setlocale(LC_TIME,"chs");								//���ñ��ػ���
$weekday = strftime("%A");								//��������$weekday��ֵ
switch ($weekday){										//switch��䣬�ж�$weekday��ֵ
	case "����һ":										//���������ֵΪ������һ��
		echo "������$weekday ���µ�һ�ܿ�ʼ�ˣ�";
		break;
	case "���ڶ�":										//���������ֵΪ�����ڶ���
		echo "������$weekday ��ʱ�̱������õĹ���״̬!";
		break;
	case "������":										//���������ֵΪ����������
		echo "������$weekday ���Ͷ������������ˣ�Ŭ������Ӵ��";
		break;
	case "������":										//���������ֵΪ�������ġ�
		echo "������$weekday ���ڷܲ��ܴ��켨Ч�����ͣ�";
		break;
	case "������":										//���������ֵΪ�������塱
		echo "������$weekday ��һ��Ҫ��ɫ����ɱ��ܹ���Ӵ��";
		break;
	case "������":										//���������ֵΪ����������
		echo "������$weekday ������˯����Ȼ�ѣ�";
		break;
	default:											//Ĭ��ֵ
		echo "������$weekday , �Ǻǣ����ɵ�����һ�죡";
		break;
}
?>
</div>
</body>
</html>
