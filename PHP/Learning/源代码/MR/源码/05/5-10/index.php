<?php
$a = array('asp图书','php图书','jsp图书');	//声明数组$a
$b = array('50','62','65');					//声明数组$b
$c = array_combine($a, $b);			//应用array_combine()函数合并数组$a和数组$b
print_r($c);							//输出合并后的数组$c
?>
