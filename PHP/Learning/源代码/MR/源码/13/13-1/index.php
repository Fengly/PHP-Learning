<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>通过XMLHttpRequest对象读取HTML文件，并且输出读取结果</title>
</head>
<script>
var xmlHttp;				//定义XMLHttpRequest对象
function createXmlHttpRequestObject(){
	//如果在internet Explorer下运行
	if(window.ActiveXObject){
		try{
			xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
		}catch(e){
			xmlHttp=false;
		}

	}else{
	//如果在Mozilla或其他的浏览器下运行
		try{
			xmlHttp=new XMLHttpRequest();
		}catch(e){
			xmlHttp=false;
		}
	}
	 //返回创建的对象或显示错误信息
	if(!xmlHttp)
		alert("返回创建的对象或显示错误信息");
		else
		return xmlHttp;
}
function ReqHtml(){
	createXmlHttpRequestObject();
	xmlHttp.onreadystatechange=StatHandler;	//判断URL调用的状态值并处理
	xmlHttp.open("GET","text.html",true);	//调用text.html
	xmlHttp.send(null);

}
function StatHandler(){
	if(xmlHttp.readyState==4 && xmlHttp.status==200){
		document.getElementById("webpage").innerHTML=xmlHttp.responseText;
	}
}
</script>
<body>
<!--创建超级链接-->
<a href="#" onclick="ReqHtml();">通过XMLHttpRequest对象请求HTML文件</a>
<!--通过div标签输出请求内容-->
<div id="webpage"></div>
</body>
</html>
