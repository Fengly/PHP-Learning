<?php
	class Web{
		static $num=1;
		static function change(){
			echo self::$num;
			self::$num++;
		}
	}
	$web=new Web();
	$web->change();
	$web->change();
	$web->change();


?> 
