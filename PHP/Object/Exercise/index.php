<?php
include "Conn/conn.php";
$conn_db = new ConnDB("localhost", "root", "root", "db_database12", "gbk");
$conn = $conn_db->connect();
$admin_db = new AdminDB();

$sql = "select * from tb_member";
$result = $admin_db->executeSQL($conn, $sql);
for ($i = 0; $i < count($result); $i++) {
    echo $result[$i]["name"];
    echo "<br>";
}

?>