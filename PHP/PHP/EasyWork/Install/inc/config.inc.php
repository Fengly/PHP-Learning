<?php
/*
 * @varsion		EasyWorkϵͳ
 * @package		������������о���ʱ���Ƽ����޹�˾��ƿ���
 * @copyright	Copyright (c) 2010 - 2015, 95era, Inc.
 * @link		http://www.d-winner.com
 */
 
define('PJINC', str_replace("\\", '/', dirname(__FILE__)));
define('PJROOT', str_replace("\\", '/', dirname(PJINC)));
define('ROOT', str_replace("\\", '/', dirname(dirname(PJINC))));
define('PJDATA', PJROOT.'/data');
define('CONF', ROOT.'/Conf');
define('UPLOAD', ROOT.'/Uploads');
define('RUNTIME', ROOT.'/Runtime');

//����session����·��
session_save_path(CONF.'/Session');

$document = str_replace("\\", '/', $_SERVER['PHP_SELF']);
$get_end = substr($document,1);
$document = substr($document,0,(strcspn($get_end,'/')+1));
define('BASE', strstr(ROOT,$document));
define('HOST', 'http://'.$_SERVER['HTTP_HOST']);
define('URL', HOST.BASE);
// �������趨,�ڿ�����������E_ALL,����ʾ���д�����ʾ
// ϵͳ���к�,�趨ΪE_ALL || ~E_NOTICE,ȡ��������ʾ
// error_reporting(E_ALL);
error_reporting('E_ALL || ~E_NOTICE');

//ת�庯��
function aCslas($str){
	global $nf_m;
	if(ini_get('magic_quotes_gpc')){
		return $str;
	}else{
		return addslashes($str);
	}
	unset($nf_m);
}

//������ʾ����
function show_msg($type,$msg,$url=NULL){
	if($type==0){
		echo '<html><head><meta http-equiv="Content-Type" content="text/html; charset=gb2312" /><title>EasyWorkϵͳ��ʾ��Ϣ</title></head><body style="padding: 0px; margin: 0px; height:99%; background-color:#DFEAF2; text-align:center; border-top-width: 1px; border-top-style: solid; border-top-color:#91C4F7;"><div style="margin-top:12%;"><div><div style="margin-top: 0px; margin-right: auto; margin-bottom: 0px; margin-left: auto; background-image: url('.NFIVE.'/img/msg.gif); height:190px; width:320px;"><div style=" width:80%; float:left; text-align:left; color:#FFF; font-size:13; padding-left:8px; line-height:28px; height:28px;"><b>EasyWorkϵͳ��ʾ��Ϣ</b></div> <div style=" width:10%; float:right; text-align:right; padding-right:12px; height:28px; margin-top:3%;"><img alt="�ر�" style="cursor:hand;" onclick="javascript:window.opener=null;window.open(\'\',\'_self\');self.close();" border="0" src="'.NFIVE.'/img/close_our.png" width="8" height="8" /></div> <div style=" line-height:30px; color:#344463; padding-top:12%; clear:both; font-size:14;"><b>'.$msg.'</b></div> <div style=" color:#344463; font-size:13;"><a href="javascript:window.location=\''.$url.'\';">2����Զ���ת�����û�з�Ӧ��������</a></div></div></div></div></body></html>';
		echo '<script>setTimeout("window.location=\''.$url.'\'",1200);</script>';
	}elseif($type==1){
		echo '<html><head><meta http-equiv="Content-Type" content="text/html; charset=gb2312" /><title>EasyWorkϵͳ��ʾ��Ϣ</title></head><body style="padding: 0px; margin: 0px; height:99%; background-color:#DFEAF2; text-align:center; border-top-width: 1px; border-top-style: solid; border-top-color:#91C4F7;"><div style="margin-top:12%;"><div><div style="margin-top: 0px; margin-right: auto; margin-bottom: 0px; margin-left: auto; background-image: url('.NFIVE.'/img/msg.gif); height:190px; width:320px;"><div style=" width:80%; float:left; text-align:left; color:#FFF; font-size:13; padding-left:8px; line-height:28px; height:28px;"><b>EasyWorkϵͳ��ʾ��Ϣ</b></div> <div style=" width:10%; float:right; text-align:right; padding-right:12px; height:28px; margin-top:3%;"><img alt="�ر�" style="cursor:hand;" onclick="javascript:window.opener=null;window.open(\'\',\'_self\');self.close();" border="0" src="'.NFIVE.'/img/close_our.png" width="8" height="8" /></div> <div style=" line-height:30px; color:#344463; padding-top:12%; clear:both; font-size:14;"><b>'.$msg.'</b></div> <div style=" color:#344463; font-size:13;"><a href="javascript:history.go(-1);">2����Զ���ת�����û�з�Ӧ��������</a></div></div></div></div></body></html>';
		echo '<script>setTimeout("history.go(-1)",1200);</script>';
	}elseif($type==2){
		echo '<html><head><meta http-equiv="Content-Type" content="text/html; charset=gb2312" /><title>EasyWorkϵͳ��ʾ��Ϣ</title></head><body style="padding: 0px; margin: 0px; height:99%; background-color:#DFEAF2; text-align:center; border-top-width: 1px; border-top-style: solid; border-top-color:#91C4F7;"><div style="margin-top:12%;"><div><div style="margin-top: 0px; margin-right: auto; margin-bottom: 0px; margin-left: auto; background-image: url('.NFIVE.'/img/msg.gif); height:190px; width:320px;"><div style=" width:80%; float:left; text-align:left; color:#FFF; font-size:13; padding-left:8px; line-height:28px; height:28px;"><b>EasyWorkϵͳ��ʾ��Ϣ</b></div> <div style=" width:10%; float:right; text-align:right; padding-right:12px; height:28px; margin-top:3%;"><img alt="�ر�" style="cursor:hand;" onclick="javascript:window.opener=null;window.open(\'\',\'_self\');self.close();" border="0" src="'.NFIVE.'/img/close_our.png" width="8" height="8" /></div> <div style=" line-height:30px; color:#344463; padding-top:12%; clear:both; font-size:14;"><b>'.$msg.'</b></div> <div style=" color:#344463; font-size:13;"><a href="javascript:history.go(-1);">2����Զ���ת�����û�з�Ӧ��������</a></div></div></div></div></body></html>';
	}elseif($type==3){
		echo '<html><head><meta http-equiv="Content-Type" content="text/html; charset=gb2312" /><title>EasyWorkϵͳ��ʾ��Ϣ</title></head><body style="padding: 0px; margin: 0px;  height:99%; background-color:#DFEAF2; text-align:center; border-top-width: 1px; border-top-style: solid; border-top-color:#91C4F7;"><div style="margin-top:12%;"><div><div style="margin-top: 0px; margin-right: auto; margin-bottom: 0px; margin-left: auto; background-image: url('.NFIVE.'/img/msg.gif); height:190px; width:320px;"><div style=" width:80%; float:left; text-align:left; color:#FFF; font-size:13; padding-left:8px; line-height:28px; height:28px;"><b>EasyWorkϵͳ��ʾ��Ϣ</b></div> <div style=" width:10%; float:right; text-align:right; padding-right:12px; height:28px; margin-top:3%;"><img alt="�ر�" style="cursor:hand;" onclick="javascript:window.opener=null;window.open(\'\',\'_self\');self.close();" border="0" src="'.NFIVE.'/img/close_our.png" width="8" height="8" /></div> <div style=" line-height:30px; padding-top:12%; clear:both; color:red; font-size:14;"><b>'.$msg.'</b></div> <div style=" color:#344463; font-size:13;"></div></div></div></div></body></html>';
	}
}