<div align="center">
    <img src="wukong.jpg"><p>
    <?php
    $firstname = $_REQUEST['firstname'];
    $lastname = $_REQUEST['lastname'];
    $phone = $_REQUEST['tel'];
    $email = $_REQUEST['email'];


    header("content-type: text/html; charset=utf-8");
    include "conn.php";
//    print_r($_POST);
    if ($_POST['action'] == "updata") {
        if (($firstname && $lastname && $phone && $email)) {
            $sql = "update myUsers set firstname = '$firstname', lastname = '$lastname', phone = '$phone', email = '$email' where id = ".$_POST['id'];
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "修改成功,单击<a href = 'index.php'>这里</a>查看";
            } else {
                echo "修改失败,单击 <a href = 'javascript:onclick = history.go(-1)'>这里</a>返回";
            }
        } else {
            echo "输入不允许为空。单击<a href='javascript:onclick = history.go(-1)'>这里</a>返回";
        }
    }
    ?>
</div>