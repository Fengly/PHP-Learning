<?php
include "conn.php";

function select($table_name = "myUsers") {
    $sql = "select * from ".$table_name;
    global $conn;
    $result = mysqli_query($conn, $sql);
    return $result;
}


function select_where($where, $table_name = "myUsers") {
    $sql = "select * from ".$table_name." where id = ".$where;
    global  $conn;
    $result = mysqli_query($conn, $sql);
    return $result;
}

?>


