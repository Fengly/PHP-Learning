<?php
class ConnDB {
    private $localhost;
    private $user_name;
    private $pwd;
    private $db_name;
    private $code;
    private $conn;
    function __construct($localhost, $user_name, $pwd, $db_name, $code = "utf8") {
        $this->localhost = $localhost;
        $this->user_name = $user_name;
        $this->pwd = $pwd;
        $this->db_name = $db_name;
        $this->code = $code;
    }
    function connect() {
        echo $this->localhost.", ".$this->user_name.", ".$this->pwd.", ".$this->db_name."<p>";
        $this->conn = mysqli_connect($this->localhost, $this->user_name, $this->pwd, $this->db_name) or die("数据库连接失败".mysqli_error($this->conn));
        mysqli_query($this->conn, "set name $this->code");
        return $this->conn;
    }
}

class AdminDB {
    function executeSQL($conn, $sql) {
        $sqlType = strtolower(substr(trim($sql), 0, 6));
        $result = mysqli_query($conn, $sql);
//        $array_data = array();
        if ($sqlType == 'select') {
            while ($array = mysqli_fetch_array($result)){
                $array_data[] = $array;
            }
            if (count($array_data) == 0|| $result == false) {
                return false;
            } else {
                return $array_data;
            }
        } elseif ($sqlType == 'insert' || $sqlType == 'update' || $sqlType == 'delete') {
            return $result;
        } else {
            return false;
        }
    }
}
?>