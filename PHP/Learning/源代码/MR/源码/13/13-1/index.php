<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>ͨ��XMLHttpRequest�����ȡHTML�ļ������������ȡ���</title>
</head>
<script>
var xmlHttp;				//����XMLHttpRequest����
function createXmlHttpRequestObject(){
	//�����internet Explorer������
	if(window.ActiveXObject){
		try{
			xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
		}catch(e){
			xmlHttp=false;
		}

	}else{
	//�����Mozilla�������������������
		try{
			xmlHttp=new XMLHttpRequest();
		}catch(e){
			xmlHttp=false;
		}
	}
	 //���ش����Ķ������ʾ������Ϣ
	if(!xmlHttp)
		alert("���ش����Ķ������ʾ������Ϣ");
		else
		return xmlHttp;
}
function ReqHtml(){
	createXmlHttpRequestObject();
	xmlHttp.onreadystatechange=StatHandler;	//�ж�URL���õ�״ֵ̬������
	xmlHttp.open("GET","text.html",true);	//����text.html
	xmlHttp.send(null);

}
function StatHandler(){
	if(xmlHttp.readyState==4 && xmlHttp.status==200){
		document.getElementById("webpage").innerHTML=xmlHttp.responseText;
	}
}
</script>
<body>
<!--������������-->
<a href="#" onclick="ReqHtml();">ͨ��XMLHttpRequest��������HTML�ļ�</a>
<!--ͨ��div��ǩ�����������-->
<div id="webpage"></div>
</body>
</html>
