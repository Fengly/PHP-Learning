<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<?php
class MrSoft{
	public function MingRi(){							//方法MingRi()
		echo '调用的方法存在，直接执行此方法。<p>';
	}
	public function __call($method, $parameter) {				//__call()方法
		echo '如果方法不存在，则执行__call()方法。<br>';
		echo '方法名为：'.$method.'<br>';				//输出第一个参数，即方法名
		echo '参数有：';
		var_dump($parameter);						//输出第二个参数，是一个参数数组
	}
}
$mrsoft = new MrSoft();									//实例化对象$mrsoft
$mrsoft -> MingRi();									//调用存在的方法MingRi()
$mrsoft -> MingR('how','what','why');							//调用不存在的方法MingR()
?>


