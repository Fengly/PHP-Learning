<meta charset="utf-8">
<div align="center">
    <img src="wukong.jpg">
    <?php
    include "select.php";
    if ($_REQUEST['action'] == 'updata') {
        $rows = mysqli_fetch_row(select_where($_GET['id']));  // 获取数据列表
    }
    echo "<p>";
    ?>
    <form name="form1" method="post" action="update_ok.php">
        姓名: <input title="" type="text" name="firstname" value="<?php echo $rows[1]?>"/>
        别名: <input title="" type="text" name="lastname" value="<?php echo $rows[2]?>"/>
        电话: <input title="" type="text" name="tel" value="<?php echo $rows[3]?>"/>
        邮箱: <input title="" type="text" name="email" value="<?php echo $rows[4]?>"/>
        <input title="" type="hidden" name="action" value="updata"/>
        <input title="" type="hidden" name="id" value="<?php echo $rows[0]?>"/><p>
        <input title="" type="submit" name="submit" value="修改"/>
        <input title="" type="reset" name="reset" value="重置"/>
    </form>
</div>