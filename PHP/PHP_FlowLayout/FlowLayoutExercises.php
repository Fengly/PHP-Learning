<?php
/**
 * Created by PhpStorm.
 * User: Riches
 * Date: 2016/11/2
 * Time: 14:24
 */
// 闰年的判断

    $year = 2000;
    if (($year % 4 == 0 && $year % 100 != 0) || $year % 400 == 0) {
        echo $year."年, 是闰年";
    } else {
        echo $year."年, 不是是闰年";
    }

?>