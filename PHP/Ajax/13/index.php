<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>删除图书信息</title>
<link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
<body>
<script type="text/javascript">

    function del(id){
//        alert("sdsd");
        var xml;
        if(window.ActiveXObject){//如果是浏览器支持ActiveXObjext则创建ActiveXObject对象
            xml=new ActiveXObject('Microsoft.XMLHTTP');
        }else if(window.XMLHttpRequest){//如果浏览器支持XMLHttpRequest对象则创建XMLHttpRequest对象
            xml=new XMLHttpRequest();
        }
        xml.open("GET","del.php?id="+id,true);//使用GET方法调用del.php并传递参数的值
//        alert("sdsd");
        xml.onreadystatechange=function(){//当服务器准备就绪执行回调函数
            if(xml.readystate==4 && xml.status==200){//如果服务器已经传回信息并未发生错误
                var msg=xml.responseText;//把服务器传回的值赋给变量msg
                if(msg==1){//如果服务器传回的值为1则提示删除成功
                    alert("删除成功！");
                    location.reload();
                }else{//否则提示删除失败
                    alert("删除失败！");
                    return false;
                }
            }
        }
        xml.send(null);//不发送任何数据，因为数据已经使用请求URL通过GET方法发送
    }
</script>
<center>
<!--banner-->
<table width="798" border="0" cellpadding="0" cellspacing="0">
    <tr>
    	<td  height="112" background="images/banner.jpg">&nbsp;</td>
    </tr>
</table>
<?php
include_once("conn/conn.php");
?>
<table width="780"  border="0" cellpadding="0" cellspacing="0">
<form name="form1" id="form1" method="post" action="deletes.php">
  <tr>
  	<td height="20" width="5%" class="top">&nbsp;</td>
    <td width="5%" class="top">id</td>
    <td width="30%" class="top">书名</td>
    <td width="10%" class="top">价格</td>
    <td width="20%" class="top">出版时间</td>
    <td width="10%" class="top">类别</td>
	<td width="10%" class="top">操作</td>
  </tr>
<?php
	$sqlstr1 = "select * from tb_demo02 order by id";//按id的升序查询表tb_demo02的数据
	$result = mysqli_query($conn,$sqlstr1);//执行查询语句
	while ($rows = mysqli_fetch_array($result)){//循环输出查询结果
?>
  <tr>
    <td height="25" align="center" class="m_td">
	<input type=checkbox name="chk[]" id="chk" value=".$rows['id'].">
	</td>
	<td height="25" align="center" class="m_td"><?php echo $rows['id'];?></td>
	<td height="25" align="center" class="m_td"><?php echo $rows['bookname'];?></td>
    <td height="25" align="center" class="m_td"><?php echo $rows['price'];?></td>
	<td height="25" align="center" class="m_td"><?php echo $rows['f_time'];?></td>
	<td height="25" align="center" class="m_td"><?php echo $rows['type'];?></td>
	<td class="m_td"><a href="#" onClick="del(<?php echo $rows['id'];?>)">删除</a></td>
  </tr>
<?php
	}
?>
<tr>
	<td height="25" colspan="7" class="m_td" align="left">&nbsp;&nbsp;</td>
</tr>
</form>
</table>
<!--show-->

 <table width="798" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td height="48" background="images/bottom.jpg">&nbsp;</td>
    </tr>
</table>
</center>
</body>
</html>

