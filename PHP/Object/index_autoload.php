<?php
    function __autoload($class_name) {
        $class_path = $class_name.'/inc.php';
        if (file_exists($class_path)) {
            include_once($class_path);
        } else {
            echo "类路径错误";
        }
    }
    $mrsoft = new People();
    echo $mrsoft;
?>