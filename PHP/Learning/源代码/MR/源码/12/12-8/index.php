<?php
	class Web{
		static $num="1";							  //定义静态属性
		static function change(){					  //定义change方法
			echo "您是本站第".self::$num."位访客.\t";//输出静态属性的值
			self::$num++;							  //静态属性做自增运算
		}
	}
	$web=new Web();								  //实例化对象
	echo "第一次通过对象调用：<br>";
	$web->change();								//通过对象调用
	$web->change();
	$web->change();
	echo "<br>第二次通过类名调用：<br>";
	Web::change();									//通过类名调用
	Web::change();
?>
