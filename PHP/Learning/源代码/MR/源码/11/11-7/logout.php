<?php
session_start();
session_unset();
session_destroy();
echo "<script>alert('�����˳���¼��');location.href='login.php';</script>";
?>