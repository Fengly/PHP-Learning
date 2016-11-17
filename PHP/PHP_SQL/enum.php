<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <title>从数据库查询结果中获取一行作为枚举数组</title>
</head>
<body bgcolor="#00ffff">
<div align="center">
    <img src="MAMP-PRO-Logo.png">
    <h3>从数据库查询结果中获取一行作为枚举数组</h3>
    <?php
    include "select.php";
    $result = select();
    ?>
    <table align="center" cellpadding="0" cellspacing="0" bgcolor="#f0f8ff">
        <!--    <tr>-->
        <!--        <td height="50" bgcolor="#00ffff"></td>-->
        <!--        <td bgcolor="#00ffff"></td>-->
        <!--        <td bgcolor="#00ffff"></td>-->
        <!--        <td bgcolor="#00ffff"></td>-->
        <!--        <td bgcolor="#00ffff"></td>-->
        <!--    </tr>-->
        <tr>
            <td width="50" height="30" align="center"><span class="STYLE2"><font style="size: 12px; border: 2px"><?php echo "ID"?></font></span></td>
            <td width="100" align="center"><span class="STYLE2"><font style="size: 12px"><?php echo "用户名"?></font></span></td>
            <td width="100" align="center"><span class="STYLE2"><font style="size: 12px"><?php echo "别名"?></font></span></td>
            <td width="200" align="center"><span class="STYLE2"><font style="size: 12px"><?php echo "电话"?></font></span></td>
            <td width="300" align="center"><span class="STYLE2"><font style="size: 12px"><?php echo "邮箱"?></font></span></td>
        </tr>
        <?php
        while ($myrow = mysqli_fetch_row($result)) {
//        print_r($myrow);
            echo "<p>";
            ?>
            <tr>
                <td width="50" align="center"><span class="STYLE2"><?php echo $myrow[0];?></span></td>
                <td width="100" align="center"><span class="STYLE2"><?php echo $myrow[1];?></span></td>
                <td width="100" align="center"><span class="STYLE2"><?php echo $myrow[2];?></span></td>
                <td width="200" align="center"><span class="STYLE2"><?php echo $myrow[3];?></span></td>
                <td width="300" align="center"><span class="STYLE2"><?php echo $myrow[4];?></span></td>
            </tr>
            <?php
        }
        ?>
        <tr>
            <td height="50" bgcolor="#00ffff"></td>
            <td bgcolor="#00ffff"></td>
            <td bgcolor="#00ffff"></td>
            <td bgcolor="#00ffff"></td>
            <td bgcolor="#00ffff"  align="right">
                <form method="post" action="assoc.php">
                    <input type="submit" value="NEXT">
                </form>
            </td>
        </tr>
    </table>
</div>
</body>
</html>