<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>ͨ��POST��ʽ��PHP���н���</title>
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
var xmlHttp;									//����XMLHttpRequest����
function createXmlHttpRequestObject(){
		if(window.ActiveXObject){ 					//�����internet Explorer������
			try{
				xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
			}catch(e){
				xmlHttp=false;
			}
		}else{
			try{									//�����Mozilla�������������������
				xmlHttp=new XMLHttpRequest();
			}catch(e){
				xmlHttp=false;
			}
		} 
		if(!xmlHttp) 								//���ش����Ķ������ʾ������Ϣ
			alert("���ش����Ķ������ʾ������Ϣ");
		else
			return xmlHttp;
}
function showsimple(){								//���������ƺ���
	createXmlHttpRequestObject();
	var us = document.getElementById("user").value;		//��ȡ���ύ��ֵ
	var nu = document.getElementById("number").value;
	var ex = document.getElementById("explains").value;
	if(us=="" && nu=="" && ex==""){					//�жϱ��ύ��ֵ����Ϊ��
		alert('��ӵ����ݲ���Ϊ�գ�');
		return false;
	}
	var post_method="users="+us+"&numbers="+nu+"&explaines="+ex;		//����URL����
	xmlHttp.open("POST","searchrst.php",true);						//����ָ��������ļ�
	xmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded;");	 //��������ͷ��Ϣ
	xmlHttp.onreadystatechange=StatHandler;			//�ж�URL���õ�״ֵ̬������
	xmlHttp.send(post_method);						//�����ݷ��͸�������
}
function StatHandler(){								//���崦����
	if(xmlHttp.readyState==4 && xmlHttp.status==200){		//�ж����ִ�гɹ����������������
		if(xmlHttp.responseText!=""){
			alert("������ӳɹ���");
			//�����������ص����ݶ��嵽DIV��
			document.getElementById("webpage").innerHTML=xmlHttp.responseText;	
		}else{
			alert("���ʧ�ܣ�");						//�������ֵΪ��
		}
	}
}
</script>
<body>
<table width="800" height="632" border="0" align="center" cellpadding="0" cellspacing="0" background="images/bj.jpg">
  <tr>
    <td width="260" height="245">&nbsp;</td>
    <td colspan="2" align="center" valign="bottom"><strong>��ѯԱ����Ϣ������Ա��������Ϣ</strong></td>
    <td width="40">&nbsp;</td>
  </tr><form id="searchform" name="searchform" method="post" action="#"> 
  <tr>
    <td height="25">&nbsp;</td>
    <td width="150" align="right">Ա��������      </td>
    <td width="350" align="left"><input name="user" type="text" id="user" size="30" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="25">&nbsp;</td>
    <td align="right">Ա����ţ�      </td>
    <td align="left"><input name="number" type="text" id="number" size="20" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="25">&nbsp;</td>
    <td align="right">����������      </td>
    <td align="left"><textarea name="explains" cols="40" rows="3" id="explains"></textarea></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="25">&nbsp;</td>
    <td colspan="2" align="center">
    <input type="button" name="Submit" value="�ύ" onclick="showsimple();" />&nbsp;&nbsp;
    <input type="reset" name="Submit2" value="����" /></td>
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
