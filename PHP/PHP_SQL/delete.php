<?php
header("content-type: text/html; charset=utf-8");
include "conn.php";
if ($_GET['action'] == "delete") {
    $sql = "delete from myUsers where id = ".$_GET['id'];
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>alert('删除成功');location='index.php'</script>";
    } else {
        echo "删除失败,单击 <a href = 'javascript:onclick = history.go(-1)'>这里</a>返回";
    }
}
?>