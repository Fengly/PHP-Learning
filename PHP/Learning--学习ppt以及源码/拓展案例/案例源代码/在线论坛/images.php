<?php         
include('config.php');
$recid=$_GET['recid'];
$query="select * from mr_lttb where id='".$recid ."'";
$result=mysqli_query($conn,$query);
if(!$result) die("error: mysql query"); 
	$num=mysqli_num_rows($result); 
    if($num<1) die("error: no this recorder");  
		$row=mysqli_fetch_array($result);
		$data=$row["xq"];   
mysqli_close($id); 
echo $data;
?> 