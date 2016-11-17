<?php
/*
		构造函数：当类被实例化后构造函数自动执行，所以如果用户希望在实例化的同时调用某个方法可以把此方法通过this关键字调用。
*/
	class Mysql{// 定义类名称
		var $localhost;// 定义成员变量
		var $name;
		var $pwd;
		var $db;
		var $conn;
		public function __construct($localhost,$name,$pwd,$db="db_database12"){// 构造函数
			$this->localhost=$localhost;
			$this->name=$name;
			$this->pwd=$pwd;
			$this->db=$db;
			$this->connect();
		}
		public function connect(){//定义connect()方法
			$this->conn=mysqli_connect($this->localhost,$this->name,$this->pwd,$this->db)or die("CONNECT MYSQL FALSE");
			mysqli_query($this->conn,"SET NAMES utf8");
		}
		public function GetId(){//定义GetId()方法
			echo "MySQL服务器的用户名：".$this->name."<br>";
			echo "MySQL服务器的密码：".$this->pwd;
		}
	}
	$msl=new Mysql("127.0.0.1","root","111");// 实例化对象
	$msl->GetId();// 调用指定的方法
?>
