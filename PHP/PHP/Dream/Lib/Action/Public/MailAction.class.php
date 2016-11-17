<?php
/*
 * @varsion		Dream缺陷跟踪系统 2.0var
 * @package		程序设计深圳市九五时代科技有限公司设计开发
 * @copyright	Copyright (c) 2010 - 2015, d-winner, Inc.
 * @link		http://www.d-winner.com
 */
 
class MailAction extends Action {
	/**
		* 邮件发送主方法
		*@param $mode 区分不同的邮件发送模板
		*@param $id  传人数据id
		*@examlpe 
	*/
    public function index($mode,$id=NULL,$pid=NULL){
		$Public = A('Index','Public');
		
		//main
		$id = intval($id);
		$pid = intval($pid);
		$type = intval($type);
		$user = M('User_table');
		$comy = M('User_company_table');
		$part = M('User_part_table');
		$userid = $_SESSION['login']['se_id'];
		$mailpwd = $user->where('id='.$userid)->getField('MailPwd');
		$this->assign('id',$id);
		$this->assign('pid',$pid);
		$this->assign('type',$type);
		$this->assign('mailpwd',$mailpwd);
		$this->assign('userid',$userid);
		$this->assign('uniqid',uniqid());
		unset($comy,$cinfo);
		if($mode==1){
			$this->display();
		}elseif($mode==2){
			$project = D('Project_table');
			$usermain = M('User_main_table');
			$info = $project->relation(true)->where('id='.$pid)->find();
			$constr = '';
			foreach($info['concern_user'] as $t){
				$constr .= '<option id="0" cid="0" value="'.$t['id'].'">'.$t['username'].' ： '.$t['email'].'</option>';
			}
			
			$this->assign('constr',$constr);
			
			$constr = '';
			$this->assign('info',$info);
			$this->display('progress');
		}elseif($mode==3){
			$project = D('Project_table');
			$usermain = M('User_main_table');
			$info = $project->relation(true)->where('id='.$pid)->find();
			$constr = '';
			foreach($info['concern_user'] as $t){
				$constr .= '<option id="0" cid="0" value="'.$t['id'].'">'.$t['username'].' ： '.$t['email'].'</option>';
			}
			
			$this->assign('constr',$constr);
			
			$constr = '';
			$this->assign('info',$info);
			$this->display('detail');
		}elseif($mode==4){
			$Report = M('Report_table');
			$user = D('User_table');
			$user_id = $Report->where('id='.$id)->getField('user_id');
			$info = $user->relation(true)->where('id='.$user_id)->select();
			$constr = '';
			foreach($info as $t){
				$constr .= '<option id="'.$t['user_main']['part_id'].'" cid="'.$t['user_main']['company_id'].'" value="'.$t['id'].'">'.$t['username'].' ： '.$t['email'].'</option>';
			}
			
			$this->assign('constr',$constr);
			
			$constr = '';
			//$this->assign('info',$info);
			$this->display('report');
		}
		
	}
	
	
	//选择框控制
	public function defInfo($act){
		$Public = A('Index','Public');
		
		//main
		if($act=='comy'){
			$comy = M('User_company_table');
			$cinfo = $comy->cache(true)->where("`status`=1 and `type`=0")->field('id,name')->select();
			$str = '';
			foreach($cinfo as $t){
				$str .= '<option value="100'.$t['id'].'">'.$t['name'].'</option>';
			}
			echo $str;
			$str = '';
			unset($comy,$cinfo);
		}elseif($act=='part'){
			$part = M('User_part_table');
			$pinfo = $part->cache(true)->where("`status`=1")->field('id,name')->select();
			foreach($pinfo as $t){
				$str .= '<option value="'.$t['id'].'">'.$t['name'].'</option>';
			}
			echo $str;
			$str = '';
			unset($part,$pinfo);
		}elseif($act=='user'){
			$uinfo = $this->getAllUser();
			foreach($uinfo as $t){
				if($t['type']!=1){
					$str .= '<option id="'.$t['part_id'].'" value="'.$t['id'].'" cid="100'.$t['company_id'].'" mail="'.$t['email'].'">'.$t['username'].'</option>';
				}
			}
			echo $str;
			$str = '';
			unset($uinfo);
		}
		unset($Public);
	}
	
	public function change($act,$mode=NULL){
		$id = I('id');
		$main_user = C('DB_PREFIX').'user_main_table';
		$user_table = C('DB_PREFIX').'user_table';
		if($act=='comy'){
			$htm = '';
			$htms = '';		
			$part = M('User_part_table');
			$user = M('User_table');
			$pinfo = $part->cache(true)->field('id,name')->where('_parentId='.$id.' and `status`=1')->order('_parentId,convert(name using gbk)')->select();
			$map[$user_table.'.status'] = array('eq',1);
			if($id==0){
				$map[$user_table.'.id'] = array('neq',1);
			}else{
				$map[$main_user.'.company_id'] = array('eq',substr($id,3,strlen($id)));
			}
			$uinfo = $user->field($user_table.'.id,'.$user_table.'.email,'.$user_table.'.username,'.$main_user.'.part_id,'.$main_user.'.company_id')->join(' join '.$main_user.' on '.$main_user.'.user_id='.$user_table.'.id')->where($map)->order('convert(username using gbk)')->select();
			unset($map);
			
			if($mode==1){
				foreach($uinfo as $t){
					$htms .= '<option id="'.$t['part_id'].'" value="'.$t['id'].'" cid="100'.$t['company_id'].'" mail="'.$t['email'].'">'.$t['username'].'</option>'."\r\n";
				}
				echo $htms;
			}else{
				foreach($pinfo as $t){
					$htm .= '<option  id="'.$id.'" value="'.$t['id'].'">'.$t['name'].'</option>'."\r\n";
				}
				echo $htm;
			}
			
			unset($part,$uinfo,$pinfo,$id,$htm,$htms);
		}elseif($act=='part'){
			$htm = '';		
			$user = M('User_table');
			$map[$user_table.'.status'] = array('eq',1);
			if($id==0){
				$map[$user_table.'.id'] = array('neq',1);
			}else{
				$map[$main_user.'.part_id'] = array('eq',$id);
			}
			$uinfo = $user->field($user_table.'.id,'.$user_table.'.email,'.$user_table.'.username,'.$main_user.'.part_id,'.$main_user.'.company_id')->join(' join '.$main_user.' on '.$main_user.'.user_id='.$user_table.'.id')->where($map)->order('convert(username using gbk)')->select();
			unset($map);
			
			foreach($uinfo as $t){
				$htm .= '<option id="'.$t['part_id'].'" value="'.$t['id'].'" cid="100'.$t['company_id'].'" mail="'.$t['email'].'">'.$t['username'].'</option>'."\r\n";
			}
			echo $htm;
			unset($user,$uinfo,$id,$htm);
		}
	}
	
	public function getAllUser(){
		$user = M('User_table');
		$comy_user = C('DB_PREFIX').'user_company_table';
		$main_user = C('DB_PREFIX').'user_main_table';
		$user_table = C('DB_PREFIX').'user_table';
		$map[$user_table.'.status'] = array('eq',1);
		$info = $user->field($user_table.'.id,'.$user_table.'.email,'.$user_table.'.username,'.$main_user.'.part_id,'.$main_user.'.company_id,'.$comy_user.'.type')->join(' join '.$main_user.' on '.$main_user.'.user_id='.$user_table.'.id')->join('left join '.$comy_user.' on '.$comy_user.'.id='.$main_user.'.company_id')->where($map)->order('convert(username using gbk)')->select();
		//dump($info);
		return $info;
	}
	
	private function getUserStr($uid,$act=NULL){
		$user = M('User_table');
		if($act==1){
			$info = $user->field('id,username')->where('id in('.$uid.')')->select();
			return $info;
		}else{
			$info = $user->field('GROUP_CONCAT(username) as username')->where('id in('.$uid.')')->select();
			return $info[0]['username'];
		}
		
		unset($user,$info);
	}
	
	public function sendnow(){
		$Public = A('Index','Public');
		$Mailer = A('Mail','Public');
		
		//main
		$user = M('User_table');
		$title = strval(I('title'));
		$uid = I('touser');
		$mail_cfg = $Public->MC();
		$contents = I('content');
		$send = $Mailer->set($title,$contents,$mail_cfg);
		foreach($uid as $t){
			$t = intval($t);
			$info = $user->field('username,email')->where('id='.$t)->find();
			$to = $info['email'];
			$name = $info['username'];
			$Mailer->mailObj->AddAddress($to, $name);
		}
		$send = $Mailer->mailObj->send();
		if($send==1){
			echo 1;
		}else{
			$mail = $Mailer->mailObj->ErrorInfo;
		}
		$Mailer->mailObj->ClearAddresses();
	}
	
	public function sendProject($id,$mode=NULL){
		$Public = A('Index','Public');
		$App = A('App','Public');
		$Mailer = A('Mail','Public');
		set_time_limit(500);
		//mian
		$id = intval($id);
		$project = D('Project_table');
		$user = M('User_table');
		$part = M('User_part_table');
		$result = M();
		$Project = D('Project_table');
		$Project_concern = C('DB_PREFIX').'project_concern_table';
		$Project_table = C('DB_PREFIX').'project_table';
		$User_table = C('DB_PREFIX').'user_table';
		$Project_info = C('DB_PREFIX').'project_baseinfo_table';
		
		$map['id'] = array('eq',$id);
		$rinfo = $Project->relation(array('pro_info','concern_user','pro_client','status','itemtype','view_state'))->where($map)->find();
		$cinfo = $result->table($Project_concern.' as t1')->field('GROUP_CONCAT(t2.username) as concern')->join(' join '.$User_table.' as t2 on t2.id=t1.user_id')->where('t1.pro_id='.$id)->find();
		$rinfo['pro_info']['app_handler'] = $rinfo['pro_info']['app_handler']?$rinfo['pro_info']['app_handler']:'无';
		$rinfo['pro_info']['pro_creator'] = $rinfo['pro_info']['pro_creator']?$rinfo['pro_info']['pro_creator']:'无';
		$rinfo['pro_info']['client_name'] = $rinfo['pro_info']['client_name']?$rinfo['pro_info']['client_name']:'无';
		$rinfo['pro_info']['pro_progress'] = $rinfo['pro_info']['pro_progress']?$rinfo['pro_info']['pro_progress']:'暂无';
		$rinfo['pro_info']['description'] = $rinfo['pro_info']['description']?$rinfo['pro_info']['description']:'无';
		$rinfo['concern'] = $cinfo['concern'];
		
		$userid = $_SESSION['login']['se_id'];
		$username = $_SESSION['login']['se_user'];
		$uid = I('touser');
		$mail_cfg = $Public->MC();
		 
		$contents = '<div style="line-height:26px; color:blue;">'.$username.'向您发送关于项目：<span style="color:blue">'.$rinfo['name'].'</span> 的邮件提醒。<br/><span style="color: rgb(51, 51, 51); font-family: verdana, Tahoma, Arial, 宋体, sans-serif; font-size: 14px; ">了解详细信息，请登录：</span><a target="_blank" href="'.C('CFG_HOST').'">'.C('CFG_HOST').'</a><br/><br/></div>'
		.'<div>'
		.'<table class="infobox" width="100%" border="1" cellspacing="0" cellpadding="0" style="border-style:hidden; border-style:none\9; line-height:25px; padding:3px;">'
		.'  <tbody>'
		.'<tr>'
		.'	<td width="11%" style="background-color:#e5eeff"><label for="name">&nbsp;项目名称</label></td>'
		.'	<td width="23%">&nbsp;'.$rinfo['name'].'</td>'
		.'	<td width="11%" style="background-color:#e5eeff"><label for="status">&nbsp;状态</label></td>'
		.'	<td width="22%">'.$rinfo['status_name'].'</td>'
		.'	<td width="11%" style="background-color:#e5eeff"><label for="view_state">&nbsp;查看权限</label></td>'
		.'	<td width="22%">&nbsp;'.$rinfo['view_state_name'].'</td>'
		.'  </tr>'
		.'	<td width="11%" style="background-color:#e5eeff"><label for="client_id">&nbsp;所属客户</label></td>'
		.'	<td width="23%">&nbsp;'.$rinfo['client_name'].'</td>'
		.'	<td width="11%" style="background-color:#e5eeff"><label for="app_handler">&nbsp;负责人</label></td>'
		.'	<td width="22%">&nbsp;'.$rinfo['pro_info']['app_handler'].'</td>'
		.'	<td width="11%" style="background-color:#e5eeff"><label for="itemtype">&nbsp;项目类型</label></td>'
		.'	<td width="22%">&nbsp;'.$rinfo['itemtype_name'].'</td>'
		.'  </tr>'
		.'  <tr>'
		.'	<td style="background-color:#e5eeff"><label for="description">&nbsp;说明</label></td>'
		.'	<td colspan="5">&nbsp;'.$rinfo['pro_info']['description'].'</td>'
		.'	</tr>'
		.'  <tr>'
		.'	<td style="background-color:#e5eeff"><label for="pro_progress">&nbsp;进度</label></td>'
		.'	<td colspan="3">&nbsp;'.$rinfo['pro_info']['pro_progress'].'</td>'
		.'	<td style="background-color:#e5eeff"><label for="pro_creator">&nbsp;创建</label></td>'
		.'	<td>&nbsp;'.$rinfo['pro_info']['pro_creator'].'</td>'
		.'  </tr>'
		.'  <tr>'
		.'	<td style="background-color:#e5eeff"><label for="concern">&nbsp;项目关注人</label></td>'
		.'	<td colspan="3">&nbsp;'.$rinfo['concern'].'</td>'
		.'	<td style="background-color:#e5eeff"><label for="pro_creatdate">&nbsp;创建日期</label></td>'
		.'	<td>&nbsp;'.$rinfo['pro_info']['pro_creatdate'].'</td>'
		.'	</tr>'
		.'  </tbody>'
		.'</table>'  
		.'</div>';
		$contents = preg_replace("/\r\n/","<br />",$contents);
		$title = '项目：'.$rinfo['name'].' 项目提醒';
		$Mailer->set($title,$contents,$mail_cfg);
		foreach($uid as $t){
			$t = intval($t);
			$info = $user->field('username,email')->where('id='.$t)->find();
			$to = $info['email'];
			$name = $info['username'];
			$Mailer->mailObj->AddAddress($to, $name);
		}
		$send = $Mailer->mailObj->send();
		if($send!=1){
			$getinfo = $Mailer->mailObj->ErrorInfo;
		}else{
			echo 1;
		}	
		$Mailer->mailObj->ClearAddresses();
	}
	
	public function sendProgress($id,$mode){
		$Public = A('Index','Public');
		$Mailer = A('Mail','Public');
		set_time_limit(500);
		
		//main
		$id = intval($id);
		$pid = intval($mode);
		//echo $pid;exit;
		$progress = M('Project_progress_table');
		$user = M('User_table');
		$project = M('Project_table');
		$userid = $_SESSION['login']['se_id'];
		$username = $_SESSION['login']['se_user'];
		$mail_cfg = $Public->MC();
		$uid = I('touser');
		
		$pname = $project->where('id='.$pid)->getField('name');
		$description = $progress->where('id='.$id)->getField('description');
		$str_uid = implode(',',$uid);
		$uinfo = $user->field('GROUP_CONCAT(username) as name')->where('id in('.$str_uid.')')->find();
		$contents = '<div style="line-height:26px">'.$username.'发送跟进提醒给：<span class="up-font-over"> '.$uinfo['name'].' </span><br/><span style="color: rgb(51, 51, 51); font-family: verdana, Tahoma, Arial, 宋体, sans-serif; font-size: 14px; ">了解详细信息，请登录：</span><a target="_blank" href="'.C('CFG_HOST').'">'.C('CFG_HOST').'</a><br/><br/></div>'.$description;
		//dump($uid);
		
		$title = '跟进提醒-项目：'.$pname.'，提醒时间：'.date("Y-m-d",time());
		$Mailer->set($title,$contents,$mail_cfg);
		foreach($uid as $t){
			$t = intval($t);
			$info = $user->field('username,email')->where('id='.$t)->find();
			$to = $info['email'];
			$name = $info['username'];
			$Mailer->mailObj->AddAddress($to, $name);
		}
		$send = $Mailer->mailObj->send();
		if($send!=1){
			$getinfo = $Mailer->mailObj->ErrorInfo;
		}else{
			echo 1;
		}	
		$Mailer->mailObj->ClearAddresses();
	}
	
	public function sendReport($id,$mode){
		$Public = A('Index','Public');
		$Mailer = A('Mail','Public');
		$App = A('App','Public');
		set_time_limit(500);
		
		//main
		$id = intval($id);
		$pid = intval($mode);
		//echo $pid;exit;
		$Report = D('Report_table');
		$user = M('User_table');
		$project = M('Project_table');
		$userid = $_SESSION['login']['se_id'];
		$username = $_SESSION['login']['se_user'];
		$mail_cfg = $Public->MC();
		$uid = I('touser');
		$pname = $project->where('id='.$pid)->getField('name');
		$rinfo = $Report->relation(true)->where('id='.$id)->find();
		$arr_level = $App->getJson('yanzhongxing','Linkage/','arr');
		$arr_type = $App->getJson('chuxianweizhi','Linkage/','arr');
		$arr_hertz = $App->getJson('chuxianpinlv','Linkage/','arr');
		$arr_priority = $App->getJson('youxianji','Linkage/','arr');
		$rinfo['type'] = $Public->searchArr($arr_type,'id',$rinfo['type']);
		$rinfo['level'] = $Public->searchArr($arr_level,'id',$rinfo['level']);
		$rinfo['hertz'] = $Public->searchArr($arr_hertz,'id',$rinfo['hertz']);
		$rinfo['priority'] = $Public->searchArr($arr_priority,'id',$rinfo['priority']);
		if($rinfo['user_id']==0 and $rinfo['status']==0){
			$rinfo['statusname'] = '<div style="background-color: #cf86cf; width:100%; text-align:center;">未指派</div>';
		}elseif($rinfo['user_id']>0 and $rinfo['status']==0){
			$rinfo['statusname'] = '<div style="background-color: #9F0; width:100%; text-align:center;">待解决</div>';
		}

		$contents = '<div style="line-height:26px; color:blue;">'.$username.'向您发送关于项目：<span style="color:blue">'.$pname.'</span> 的BUG提醒<br/><span style="color: rgb(51, 51, 51); font-family: verdana, Tahoma, Arial, 宋体, sans-serif; font-size: 14px; ">了解详细信息，请登录：</span><a target="_blank" href="'.C('CFG_HOST').'">'.C('CFG_HOST').'</a><br/><br/></div>'
		.'<div>'
		.'<table class="infobox" width="100%" border="1" cellspacing="0" cellpadding="0" style="border-style:hidden; border-style:none\9; line-height:25px; padding:3px;">'
		.'  <tbody>'
		.'<tr>'
		.'	<td width="11%" style="background-color:#e5eeff"><label for="name">&nbsp;问题编号</label></td>'
		.'	<td width="23%">&nbsp;'.$rinfo['bugno'].'</td>'
		.'	<td width="11%" style="background-color:#e5eeff"><label for="status">&nbsp;创建人</label></td>'
		.'	<td width="22%">&nbsp;'.$rinfo['createname'].'</td>'
		.'	<td width="11%" style="background-color:#e5eeff"><label for="view_state">&nbsp;创建时间</label></td>'
		.'	<td width="22%">&nbsp;'.$rinfo['addtime'].'</td>'
		.'  </tr>'
		.'	<td width="11%" style="background-color:#e5eeff"><label for="client_id">&nbsp;严重性</label></td>'
		.'	<td width="23%">&nbsp;'.$rinfo['level'].'</td>'
		.'	<td width="11%" style="background-color:#e5eeff"><label for="app_handler">&nbsp;所属项目</label></td>'
		.'	<td width="22%">&nbsp;'.$rinfo['proname'].'</td>'
		.'	<td width="11%" style="background-color:#e5eeff"><label for="itemtype">&nbsp;修改时间</label></td>'
		.'	<td width="22%">&nbsp;'.$rinfo['uptime'].'</td>'
		.'  </tr>'
		.'  </tr>'
		.'	<td width="11%" style="background-color:#e5eeff"><label for="client_id">&nbsp;出现位置</label></td>'
		.'	<td width="23%">&nbsp;'.$rinfo['type'].'</td>'
		.'	<td width="11%" style="background-color:#e5eeff"><label for="app_handler">&nbsp;频率</label></td>'
		.'	<td width="22%">&nbsp;'.$rinfo['hertz'].'</td>'
		.'	<td width="11%" style="background-color:#e5eeff"><label for="itemtype">&nbsp;优先级</label></td>'
		.'	<td width="22%">&nbsp;'.$rinfo['priority'].'</td>'
		.'  </tr>'
		.'  <tr>'
		.'	<td style="background-color:#e5eeff"><label for="pro_progress">&nbsp;摘要</label></td>'
		.'	<td colspan="5">&nbsp;'.$rinfo['title'].'</td>'
		.'  </tr>'
		.'  <tr>'
		.'	<td style="background-color:#e5eeff"><label for="pro_progress">&nbsp;指派给</label></td>'
		.'	<td colspan="3">&nbsp;'.$rinfo['username'].'</td>'
		.'	<td style="background-color:#e5eeff"><label for="pro_creator">&nbsp;状态</label></td>'
		.'	<td>'.$rinfo['statusname'].'</td>'
		.'  </tr>'
		.'  <tr>'
		.'	<td style="background-color:#e5eeff"><label for="description">&nbsp;详细现象</label></td>'
		.'	<td colspan="5">&nbsp;'.$rinfo['baseinfo']['notes'].'</td>'
		.'	</tr>'
		.'  <tr>'
		.'	<td style="background-color:#e5eeff"><label for="description">&nbsp;备注</label></td>'
		.'	<td colspan="5">&nbsp;'.$rinfo['baseinfo']['comment'].'</td>'
		.'	</tr>'
		.'  </tbody>'
		.'</table>'  
		.'</div>';
		$contents = preg_replace("/\r\n/","<br />",$contents);
		//dump($uid);
		
		$title = '问题提醒-项目：'.$pname.'，提醒时间：'.date("Y-m-d",time());
		$Mailer->set($title,$contents,$mail_cfg);
		foreach($uid as $t){
			$t = intval($t);
			$info = $user->field('username,email')->where('id='.$t)->find();
			$to = $info['email'];
			$name = $info['username'];
			$Mailer->mailObj->AddAddress($to, $name);
		}
		$send = $Mailer->mailObj->send();
		if($send!=1){
			$getinfo = $Mailer->mailObj->ErrorInfo;
		}else{
			echo 1;
		}	
		$Mailer->mailObj->ClearAddresses();
	}
}