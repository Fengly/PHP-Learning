<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>字符串操作</title>
</head>
<body bgcolor="#00ffff">
<h1 align="center">字符串操作</h1>
<div align="middle">
    <img src="MAMP-PRO-Logo.png">
    <?php
    $str1 = "I like PHP";
    $str2 = 'I like PHP';
    echo "<p>".$str1."<br>";
    echo $str2."<br>";
    $str3 = "PHP";
    $str = "s $str1";
    $str_str = 's $str1';
    echo $str."<br>";
    echo $str_str."<br>";
    ?>
    <?php
    $str_1 = "PHP程序设计";
    echo <<<strmark
    <font color = "#FF0099">$str 上市了,</font>
strmark;
    echo "<p>";
    ?>
<!--    编码 -->
    <?php
    $a = "编程体验网";
    $b = addcslashes($a, "编程体验网");
    echo "转义字符串: ".$b;
    echo "<br>";
    $c = stripcslashes($b);
    echo "还原字符串: ".$c;
    echo "<p>";
    ?>

    <form name="form1" method="post" action="index_ok.php">
        <table width="300" bgcolor="#dcdcdc">
            <tr>
                <td height="66" align="left" valign="center">
<!--                    &nbsp;&nbsp; PHP-->
                </td>
            </tr>
            <tr>
                <td align="center"><span class="style1">用户名</span>:</td>
                <td>
                    <input type="text" name="user" title="" id="user" size="15">
                </td>
                <td align="center">
                    <input type="image" src="MAMP-PRO-Logo.png" name="imageField" width="50" height="20" border="0"/>
                </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
<!--                <td height="27">&nbsp;</td>-->
                <td align="center"><span class="style1">密码</span>:</td>
                <td>
                    <input type="password" id="pass" size="15" name="pwd"/>
                </td>
                <td colspan="2" align="left"><font size="1" color="red">*&nbsp;密码长度不能少于6位</font></td>
            </tr>
            <tr>
                <td height="33" align="left" valign="center">
<!--                    &nbsp;&nbsp; PHP-->
                </td>
            </tr>
        </table>
    </form>

    <font size="12">字符串的截取</font>
    <?php
    echo "<p>";
    $strr = "In order to further enrich the content of programming dictionary and view and admire a gender, the company decided to 
    organize the awaken of spring is abundant cup photography competition, all the entry requirements for spring, intended to show 
    the vibrant spring scenery in north China";
    $strrr = "为进一步丰富编程词典的内容及观赏性,公司决定组织春意盎然杯摄影大赛, 本次参赛作品要求全部为春季拍摄, 旨在展示我国北方地区春季生机盎然的景色";
    if (strlen($strr) > 40){
        echo substr($strr, 0, 40)."..."."<p>";
        echo mb_substr($strrr, 0, 40, "UTF-8")."..."."<p>";
    } else {
        echo $strr;
    }
    ?>


<!--    字符串按字节比较大小 -->
    <?php
    $string1 = "PHP程序设计";
    $string2 = "PHP程序设计";
    $string3 = "mrsoft";
    $string4 = "MRSOFT";
    echo strcmp($string1, $string2)."...";          // 区分大小写
    echo strcmp($string3, $string4)."...";
    echo strcmp($string4, $string3)."...";
    echo strcasecmp($string3, $string4)."<p>";      // 不区分大小写
    ?>


<!--    按自然排序法比较-->
    <?php
    $str_s1 = "str2.jpg";
    $str_s2 = "str10.jpg";
    $str_s3 = "mrbook1";
    $str_s4 = "MRBOOK2";
    echo strcmp($str_s1, $str_s2)."...";
    echo strcmp($str_s3, $str_s4)."...";
    echo strnatcmp($str_s1, $str_s2)."...";
    echo strnatcmp($str_s3, $str_s4)."<p>";
    ?>



<!--    指定从源字符串的位置比较-->
    <?php
    $str_str1 = "I like PHP!";
    $str_str2 = "i like my book!";
    echo strncmp($str_str1, $str_str2, 6)."<p>";
    ?>

    <form method="post" action="next.php">
        <input size="12" type="submit" value="下一页"/>
    </form>
</div>
</body>
</html>