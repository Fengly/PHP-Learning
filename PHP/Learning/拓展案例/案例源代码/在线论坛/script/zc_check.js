//���ⷢ��
function fbzt_check(){
		 if (myform.zq.value==""){
				alert("��ѡ����Ҫ����������ר��!!");
				myform.zq.focus();
				return false;
		}
	        if (myform.zhuti.value==""){
				alert("��������Ҫ����������!!");
				myform.zhuti.focus();
				return false;
		}
		  
	        if (myform.neirong.value==""){
				alert("�����������������������!!");
				myform.neirong.focus();
				return false;
		}
		if (myform.neirong.value.length<=1 || myform.neirong.value.length>=1500){
				alert(" �������ݼȲ�������1����Ҳ���ܶ���1500����!!");
				myform.neirong.focus();
				return false;
		}
}
//��������
function hftj_check(){
	        if (myform.hfzt.value==""){
				alert("��������Ҫ�ظ�����!!");
				myform.hfzt.focus();
				return false;
		}
	        if (myform.hfnr.value==""){
				alert("�����������ظ�������!!");
				myform.hfnr.focus();
				return false;
		}
		if (myform.hfnr.value.length<=1 || myform.hfnr.value.length>=1500){
				alert(" �ظ����ݼȲ�������1����Ҳ���ܶ���200����!!");
				myform.hfnr.focus();
				return false;
		}
}
