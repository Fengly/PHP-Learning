<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <title>获取数据库查询结果集中的记录数</title>
</head>
<body bgcolor="#00ffff">
<div align="center">
    <img src="MAMP-PRO-Logo.png">
    <h3>获取数据库查询结果集中的记录数</h3>
    <?php
    include "select.php";
    $result = select();
    $nums = mysqli_num_rows($result);
    echo $nums."条查询记录,如下:";
    echo "<p>";
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
        while ($myrow = mysqli_fetch_assoc($result)) {
//        print_r($myrow);
            echo "<p>";
            ?>
            <tr>
                <td width="50" align="center"><span class="STYLE2"><?php echo $myrow['id'];?></span></td>
                <td width="100" align="center"><span class="STYLE2"><?php echo $myrow['firstname'];?></span></td>
                <td width="100" align="center"><span class="STYLE2"><?php echo $myrow['lastname'];?></span></td>
                <td width="200" align="center"><span class="STYLE2"><?php echo $myrow['phone'];?></span></td>
                <td width="300" align="center"><span class="STYLE2"><?php echo $myrow['email'];?></span></td>
            </tr>
            <?php
        }
        ?>

<!--        <tr>-->
<!--            <td height="50" bgcolor="#00ffff"></td>-->
<!--            <td bgcolor="#00ffff"></td>-->
<!--            <td bgcolor="#00ffff"></td>-->
<!--            <td bgcolor="#00ffff"></td>-->
<!--            <td bgcolor="#00ffff"  align="right">-->
<!--                <form method="post" action="recordCount.php">-->
<!--                    <input type="submit" value="NEXT">-->
<!--                </form>-->
<!--            </td>-->
<!--        </tr>-->
    </table>
    <?php
    mysqli_free_result($result);   // 释放内存
    mysqli_close($conn);    // 关闭与数据库的连接
    ?>
    <video src="vidio.mp3" controls="controls" poster="wukong.jpg">
        您的浏览器不支持 video 标签。
    </video>
</div>
</body>
</html>