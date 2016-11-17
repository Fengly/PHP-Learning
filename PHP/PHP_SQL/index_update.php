<meta charset="utf-8">
<body bgcolor="#00ffff">
<div align="center">
    <img src="wukong.jpg">
    <?php
    echo "<p>";
    $ti = array("ID", "姓名", "别名", "电话", "邮箱");
    include "select.php";
    $result = select();
    while ($rows = mysqli_fetch_row($result)) {
        echo "<tr>";
        for ($i = 0; $i<count($rows); $i++) {
            echo "<td height='25' align='center' class='m_td'>".$ti[$i].":"." ".$rows[$i]." "."</td>";
        }
        echo "<td class='m_id'><a href=update.php?action=updata&id=".$rows[0].">修改</a>/<a href=delete.php?action=delete&id=".$rows[0].">删除</a></td>>";
        echo "<p>";
        echo "</tr>";
    }
    ?>
</div>

</body>