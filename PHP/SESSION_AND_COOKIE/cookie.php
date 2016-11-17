<?php
/**
 * Created by PhpStorm.
 * User: Riches
 * Date: 2016/11/10
 * Time: 11:20
 */
foreach ($_COOKIE['user'] as $key => $value) {
    echo $key."=>".$value."<br>";
}
?>