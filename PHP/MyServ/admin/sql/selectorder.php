<?php
$sql = "select count(*) as total from tb_dingdan";
$result = mysqli_query($conn, $sql);
$info = mysqli_fetch_array($result);
$total = $info['total'];
if ($total == 0) {
    echo "<table style='width: 100%; height: 100%;'><tr><td align='center' valign='center'><font size='10'>本站暂无订单</font></td></tr></table>";
} else {
    $page_size = 15;
    if ($total <= $page_size) {
        $page_count = 1;
    }
    if ($total % $page_size != 0) {
        $page_count = intval($total / $page_size) + 1;
    } else {
        $page_count = $total / $page_size;
    }
//    var_dump($_GET);
    $page=$_GET['page'];
    $page=empty($page)?1:intval($page);
    $sql1 = "select * from tb_dingdan order by time desc limit ".($page - 1) * $page_size.", $page_size";
    $result2 = mysqli_query($conn, $sql1);
    $info2 = mysqli_fetch_array($result2);
}
?>