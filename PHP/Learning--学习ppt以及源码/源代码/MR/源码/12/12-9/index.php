<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<?php
	abstract class cate{
		abstract function decocts($a,$b);
		abstract function stir_frys($a,$b);
		abstract function cooks($a,$b);
		abstract function frys($a,$b);
	}
	class JL_Cate extends cate{
		public function decocts($a,$b){
			echo "您点的菜是：".$a."<br>";
			echo "价格是：".$b."<br>";
		}
		public function stir_frys($a,$b){
			echo "您点的菜是：".$a."<br>";
			echo "价格是：".$b."<br>";
		}
		public function cooks($a,$b){
			echo "您点的菜是：".$a."<br>";
			echo "价格是：".$b."<br>";
		}
		public function frys($a,$b){
			echo "您点的菜是：".$a."<br>";
			echo "价格是：".$b."<br>";
		}
	}
	class SD_Cate extends cate{
		public function decocts($a,$b){
			echo "您点的菜是：".$a."<br>";
			echo "价格是：".$b."<br>";
		}
		public function stir_frys($a,$b){
			echo "您点的菜是：".$a."<br>";
			echo "价格是：".$b."<br>";
		}
		public function cooks($a,$b){
			echo "您点的菜是：".$a."<br>";
			echo "价格是：".$b."<br>";
		}
		public function frys($a,$b){
			echo "您点的菜是：".$a."<br>";
			echo "价格是：".$b."<br>";
		}
	}
	class SC_Cate extends cate{
		public function decocts($a,$b){
			echo "您点的菜是：".$a."<br>";
			echo "价格是：".$b."<br>";
		}
		public function stir_frys($a,$b){
			echo "您点的菜是：".$a."<br>";
			echo "价格是：".$b."<br>";
		}
		public function cooks($a,$b){
			echo "您点的菜是：".$a."<br>";
			echo "价格是：".$b."<br>";
		}
		public function frys($a,$b){
			echo "您点的菜是：".$a."<br>";
			echo "价格是：".$b."<br>";
		}
	}
	class G_Cate extends cate{
		public function decocts($a,$b){
			echo "您点的菜是：".$a."<br>";
			echo "价格是：".$b."<br>";
		}
		public function stir_frys($a,$b){
			echo "您点的菜是：".$a."<br>";
			echo "价格是：".$b."<br>";
		}
		public function cooks($a,$b){
			echo "您点的菜是：".$a."<br>";
			echo "价格是：".$b."<br>";
		}
		public function frys($a,$b){
			echo "您点的菜是：".$a."<br>";
			echo "价格是：".$b."<br>";
		}
	}
	$jl=new JL_Cate();
	$jl->decocts("小鸡炖粉条","39元");
?>


