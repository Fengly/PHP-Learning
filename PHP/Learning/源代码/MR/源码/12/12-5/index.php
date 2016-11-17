<?php
	class Fruit{						
		var $apple="苹果";				//定义变量
		var $banana="香蕉";
		var $orange="橘子";
	}
	class FruitType extends Fruit{			//类之间继承
		var $grape="葡萄";				//定义子类变量
	}
	$fruit=new FruitType();				//实例化对象
	echo $fruit->apple."，".$fruit->banana."，".$fruit->orange."，".$fruit->grape;
?>
