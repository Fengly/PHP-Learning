<?php 
$str1 = array ("图书"=>"PHP从入门到精通",10);				//声明数组
$str2 = array ("图书"=>"PHP自学教程","PHP"=>"95元",10); 	//声明数组
$result = array_merge ( $str1,$str2 );					//合并数组	
print_r ($result);
?>
