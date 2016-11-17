<?php
/**
 * Created by PhpStorm.
 * User: Riches
 * Date: 2016/11/4
 * Time: 18:50
 */

$firstname = $_REQUEST['firstname'];
$lastname = $_REQUEST['lastname'];
$phone = $_REQUEST['phone'];
$email = $_REQUEST['email'];

include 'conn.php';
echo "<script type='text/javascript'>alert('hello')</script>";
$sql = "insert into myUsers(firstname,lastname,phone,email) values('$firstname','$lastname','$phone','$email')";
$result = @mysqli_query($conn, $sql);
if ($result){
    echo json_encode(array('success'=>true));
} else {
    echo json_encode(array('msg'=>'Some errors occured.'));
}

?>