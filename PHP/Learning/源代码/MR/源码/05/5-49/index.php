<?php
$array1 = array("asp" => "ʵ��Ӧ��", "php" => "�����ֲ�", "java" => "����Ӧ��");//��������
$array2 = array("asp" => "ʵ����ȫ", "������ȫ", "����Ӧ��");		//��������
$result = array_intersect_key($array1, $array2);		//������������Ľ���
print_r($result);									//��������Ľ���
?>
