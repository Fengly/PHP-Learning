<?php
/*
		���캯�������౻ʵ�������캯���Զ�ִ�У���������û�ϣ����ʵ������ͬʱ����ĳ���������԰Ѵ˷���ͨ��this�ؼ��ֵ��á�
*/
	class Mysql{// ����������
		var $localhost;// �����Ա����
		var $name;
		var $pwd;
		var $db;
		var $conn;
		public function __construct($localhost,$name,$pwd,$db="db_database12"){// ���캯��
			$this->localhost=$localhost;
			$this->name=$name;
			$this->pwd=$pwd;
			$this->db=$db;
			$this->connect();
		}
		public function connect(){//����connect()����
			$this->conn=mysqli_connect($this->localhost,$this->name,$this->pwd,$this->db)or die("CONNECT MYSQL FALSE");
			mysqli_query($this->conn,"SET NAMES utf8");
		}
		public function GetId(){//����GetId()����
			echo "MySQL���������û�����".$this->name."<br>";
			echo "MySQL�����������룺".$this->pwd;
		}
	}
	$msl=new Mysql("127.0.0.1","root","111");// ʵ��������
	$msl->GetId();// ����ָ���ķ���
?>
