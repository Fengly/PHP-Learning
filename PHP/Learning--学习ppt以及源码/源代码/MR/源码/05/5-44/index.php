<?php
$array1 = array("asp" => "ʵ��Ӧ��", "php" => "�����ֲ�", "java" => "����Ӧ��");//��������
$array2 = array("asp" => "ʵ��Ӧ��", "������ȫ", "����Ӧ��");		//��������
$result = array_diff ($array1, $array2);		//������������Ĳ
print_r($result);									//��������Ĳ
?>
