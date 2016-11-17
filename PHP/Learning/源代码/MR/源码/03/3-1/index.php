<?php
/*使用define函数来定义名为MESSAGE的常量，并为其赋值为“能看到一次”，然后分别输出常量MESSAGE和Message，因为没有设置Case_sensitive参数为true，所以表示大小写敏感，因此执行程序时，解释器会认为没有定义该常量而输出提示，并将Message做为普通字符串输出 */
define("MESSAGE","能看到一次");		
echo MESSAGE;           			
echo Message;  
/*使用define函数来定义名为COUNT的常量，并为其赋值为“能看到多次”，并设置Case_sensitive参数为true，表示大小写不敏感，分别输出常量COUNT和Count，因为设置了大小不敏感，因此程序会认为它和COUNT是同一个常量，同样会输出值*/               
define("COUNT","能看到多次",true);  	
echo "<br>";               			
echo COUNT;             			
echo "<br>";                    		
echo Count;              			
echo "<br>";                 		
echo constant("Count");			//使用constant函数来获取名为Count常量的值，并输出
echo "<br>";                  		//输出空行符
echo (defined("MESSAGE"));  		//判断MESSAGE常量是否已被赋值，如果已被赋值输出“1”，如果未被赋值则返回false
?>
