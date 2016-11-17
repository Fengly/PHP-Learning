<?php
session_start();
header("content-type:text/html;charset=utf-8");
?>
<script>
    function button_action() {
//        alert("你确定退出?");
        <?php
        session_destroy();
        ?>
        location='index.php';
    }
</script>
<?php
if (!isset($_SESSION["time"])) {
//    echo "<script>alert('你无权查看本页面,请先登录');location='index.php'</script>";
} else if (time() - $_SESSION["time"] < 600) {
    $_SESSION['time'] = time();
    ?>
    <table width="469" border="0" align="center">
        <tr>
            <td colspan="3" width="464" height="139" background="images/mysql_01.gif"></td>
        </tr>
        <tr>
            <td width="78" height="136" background="images/mysql_02.gif"></td>
            <td width="311" align="center" style="font-size: 24px;color: #cc9ba7;font-weight: bolder">欢迎登录学涯在线!</td>
            <td width="74" height="136" background="images/mysql_04.jpg"></td>
        </tr>
        <tr>
            <td colspan="3" background="images/mysql_05.gif" width="464" height="61"></td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td><input type="button" onclick="button_action()" value="退出系统"></td>
        </tr>
    </table>
<?php
} else {
    echo "<script>alert('登录超时,请重新登录');location='index.php'</script>";
}
?>