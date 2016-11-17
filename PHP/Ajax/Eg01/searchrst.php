<meta charset="UTF-8">
<?php
header('Content-type: text/html;charset=utf8');
include_once "Conn/conn.php";
$cont = $_GET["cont"];
if (!empty($cont)) {
    $sql = "select * from tb_administrator where explains like '%".$cont."%'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "<table width='500' border='1' cellspacing='1' cellpadding='1' bordercolor='#FFFFCC' bgcolor='#666666'>";
        echo "<tr><td height='30' align='center' bgcolor='#FFFFFF'>ID</td><td align='center' bgcolor='#FFFFFF'>名称</td><td align='center' bgcolor='#FFFFFF'>编号</td><td align='center' bgcolor='#FFFFFF'>描述</td></tr>";
        while ($myrows = mysqli_fetch_array($result)) {
            echo "<tr><td align='center' height='22' bgcolor='#FFFFFF'>".$myrows['id']."</td>";
            echo "<td align='center' height='22' bgcolor='#FFFFFF'>".$myrows['user']."</td>";
            echo "<td align='center' height='22' bgcolor='#FFFFFF'>".$myrows['number']."</td>";
            echo "<td align='center' height='22' bgcolor='#FFFFFF'>".$myrows['explains']."</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "没有符合条件的数据"."<p>";
    }
}
?>