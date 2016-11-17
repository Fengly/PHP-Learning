<?php
session_start();
session_unset();
session_destroy();
echo "<script>alert('ÄúÒÑÍË³öµÇÂ¼£¡');location.href='login.php';</script>";
?>