<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>通过POST方式与PHP进行交互</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 00px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style></head>
<script>
var xmlHttp;									//定义XMLHttpRequest对象
function createXmlHttpRequestObject(){
		if(window.ActiveXObject){ 					//如果在internet Explorer下运行
			try{
				xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
			}catch(e){
				xmlHttp=false;
			}
		}else{
			try{									//如果在Mozilla或其他的浏览器下运行
				xmlHttp=new XMLHttpRequest();
			}catch(e){
				xmlHttp=false;
			}
		} 
		if(!xmlHttp) 								//返回创建的对象或显示错误信息
			alert("返回创建的对象或显示错误信息");
		else
			return xmlHttp;
}
function showsimple(){								//创建主控制函数
	createXmlHttpRequestObject();
	var us = document.getElementById("user").value;		//获取表单提交的值
	var nu = document.getElementById("number").value;
	var ex = document.getElementById("explains").value;
	if(us=="" && nu=="" && ex==""){					//判断表单提交的值不能为空
		alert('添加的数据不能为空！');
		return false;
	}
	var post_method="users="+us+"&numbers="+nu+"&explaines="+ex;		//构造URL参数
	xmlHttp.open("POST","searchrst.php",true);						//调用指定的添加文件
	xmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded;");	 //设置请求头信息
	xmlHttp.onreadystatechange=StatHandler;			//判断URL调用的状态值并处理
	xmlHttp.send(post_method);						//将数据发送给服务器
}
function StatHandler(){								//定义处理函数
	if(xmlHttp.readyState==4 && xmlHttp.status==200){		//判断如果执行成功，则输出下面内容
		if(xmlHttp.responseText!=""){
			alert("数据添加成功！");
			//将服务器返回的数据定义到DIV中
			document.getElementById("webpage").innerHTML=xmlHttp.responseText;	
		}else{
			alert("添加失败！");						//如果返回值为空
		}
	}
}
</script>
<body>
<table width="800" height="632" border="0" align="center" cellpadding="0" cellspacing="0" background="images/bj.jpg">
  <tr>
    <td width="260" height="245">&nbsp;</td>
    <td colspan="2" align="center" valign="bottom"><strong>查询员工信息，根据员工技能信息</strong></td>
    <td width="40">&nbsp;</td>
  </tr><form id="searchform" name="searchform" method="post" action="#"> 
  <tr>
    <td height="25">&nbsp;</td>
    <td width="150" align="right">员工姓名：      </td>
    <td width="350" align="left"><input name="user" type="text" id="user" size="30" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="25">&nbsp;</td>
    <td align="right">员工编号：      </td>
    <td align="left"><input name="number" type="text" id="number" size="20" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="25">&nbsp;</td>
    <td align="right">技能描述：      </td>
    <td align="left"><textarea name="explains" cols="40" rows="3" id="explains"></textarea></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="25">&nbsp;</td>
    <td colspan="2" align="center">
    <input type="button" name="Submit" value="提交" onclick="showsimple();" />&nbsp;&nbsp;
    <input type="reset" name="Submit2" value="重置" /></td>
    <td>&nbsp;</td>
  </tr>  </form>
  <tr>
    <td height="268">&nbsp;</td>
    <td colspan="2" align="center" valign="top"><div id="webpage"></div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

</body>
</html>
