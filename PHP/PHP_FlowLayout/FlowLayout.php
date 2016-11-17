<html>
<head>
    <title>流程控制语句</title>
</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: FLNuo
 * Date: 2016/11/1
 * Time: 16:12
 */
    setlocale(LC_TIME, "chs");   // 设置本地环境
    $week_day = strftime("%A");  // 声明变量, 并赋值
    switch ($week_day) {
        case "Monday":
            echo "今天是$week_day";
            break;
        case "Tuesday":
            echo "今天是$week_day";
            break;
        case "Wednesday":
            echo "今天是$week_day";
            break;
        case "Thursday":
            echo "今天是$week_day";
            break;
        case "Friday":
            echo "今天是$week_day";
            break;
        case "Saturday":
            echo "今天是$week_day";
            break;
        case "Sunday":
            echo "今天是$week_day";
            break;
        default:
            echo "哈哈: $week_day";
            break;
    }

?>
</body>
</html>