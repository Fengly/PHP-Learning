<?php session_start();?>
<?php
$query="select * from mr_gly where user='$user'and pass='$pass'";
$login=mysqli_query($conn,$query);
$myrow_cg=mysqli_fetch_array($login);
$record=mysqli_num_rows($login);
?>
