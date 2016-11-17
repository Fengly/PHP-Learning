<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<?php
	class People{
		public function __toString(){
			return "我是toString的方法体";
		}
	}
	$peo=new People();
	echo $peo;
?>
