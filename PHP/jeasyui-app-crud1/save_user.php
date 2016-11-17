<?php

$firstname = $_REQUEST['firstname'];
$lastname = $_REQUEST['lastname'];
$phone = $_REQUEST['phone'];
$email = $_REQUEST['email'];

include 'conn.php';

$sql = "insert into users(firstname,lastname,phone,email) values('$firstname','$lastname','$phone','$email')";
$result = mysqli_query($conn, $sql);
echo "<script>alert('ssasa')</script>";
if ($result){
	echo json_encode(array('success'=>true));
    ?>
    <script>
        alert("success");
    </script>
<?php
} else {
    ?>
    <script>
        alert("fail");
    </script>
    <?php
	echo json_encode(array('msg'=>'Some errors occured.'));
}
?>