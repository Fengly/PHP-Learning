//主题发布
function fbzt_check(){
		 if (myform.zq.value==""){
				alert("请选择您要发布的主题专区!!");
				myform.zq.focus();
				return false;
		}
	        if (myform.zhuti.value==""){
				alert("请输入您要发布的主题!!");
				myform.zhuti.focus();
				return false;
		}
		  
	        if (myform.neirong.value==""){
				alert("请输入您所发布主题的内容!!");
				myform.neirong.focus();
				return false;
		}
		if (myform.neirong.value.length<=1 || myform.neirong.value.length>=1500){
				alert(" 主题内容既不能少于1个字也不能多于1500个字!!");
				myform.neirong.focus();
				return false;
		}
}
//评论主题
function hftj_check(){
	        if (myform.hfzt.value==""){
				alert("请输入您要回复主题!!");
				myform.hfzt.focus();
				return false;
		}
	        if (myform.hfnr.value==""){
				alert("请输入您所回复的内容!!");
				myform.hfnr.focus();
				return false;
		}
		if (myform.hfnr.value.length<=1 || myform.hfnr.value.length>=1500){
				alert(" 回复内容既不能少于1个字也不能多于200个字!!");
				myform.hfnr.focus();
				return false;
		}
}
