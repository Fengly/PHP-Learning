<?php
header('Content-Type: text/html;charset=utf8');
include_once "Conn/conn.php";
//$user = iconv('UTF-8', 'gb2312', $_POST['user']);
$user = $_POST['users'];
//$number = iconv('UTF-8', 'gb2312', $_POST['number']);
$number = $_POST['numbers'];
//$explains = iconv('UTF-8', 'gb2312', $_POST['explains']);
$explains = $_POST['explaines'];
$sql = "insert into tb_administrator(`user`, `number`, `explains`)values('".$user."','".$number."','".$explains."')";
$result = mysqli_query($conn, $sql);
if ($result) {
    $sqles = "select * from tb_administrator";
    $results = mysqli_query($conn, $sqles);
    echo "<table width='500' border='1' cellpadding='1' cellspacing='1' bordercolor='#FFFFCC' bgcolor='#666666'>";
    echo "<tr>
            <td height='30' align='center' bgcolor='#FFFFFF'>ID</td>
            <td align='center' bgcolor='#FFFFFF'>USER</td>
            <td align='center' bgcolor='#FFFFFF'>NUMBER</td>
            <td align='center' bgcolor='#FFFFFF'>EXPLAINS</td>
          </tr>";
    while($myrow=mysqli_fetch_array($results)){ 			//Ñ­»·Êä³ö²éÑ¯½á¹û
        echo "<tr><td height='22' bgcolor='#FFFFFF'>".$myrow['id']."</td>";
        echo "<td bgcolor='#FFFFFF'>".$myrow['user']."</td>";
        echo "<td bgcolor='#FFFFFF'>".$myrow['number']."</td>";
        echo "<td bgcolor='#FFFFFF'>".$myrow['explains']."</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "sasa";
}
?>