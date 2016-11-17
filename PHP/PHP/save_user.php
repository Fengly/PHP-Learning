<?php

$firstname = $_REQUEST['firstname'];
$lastname = $_REQUEST['lastname'];
$phone = $_REQUEST['phone'];
$email = $_REQUEST['email'];

include 'conn.php';

$sq = "select myUsers FROM MyDB";
if (!@mysqli_query($conn, $sq)) {
    $sql2 = "CREATE TABLE `myUsers` (`id` int(11) NOT NULL auto_increment,`firstname` varchar(50) default NULL,`lastname` varchar(50) default NULL,`phone` varchar(200) default NULL,`email` varchar(200) default NULL,PRIMARY KEY (`id`)) ENGINE=InnoDB DEFAULT CHARSET=utf8";
    @mysqli_query($conn, $sql2);
}

$sql = "insert into myUsers(firstname,lastname,phone,email) values('$firstname','$lastname','$phone','$email')";
$result = @mysqli_query($conn, $sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Some errors occured.'));
}
?>