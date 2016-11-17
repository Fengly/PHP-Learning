<?php
/*
 * @varsion		Dream缺陷跟踪系统 2.0var
 * @package		程序设计深圳市九五时代科技有限公司设计开发
 * @copyright	Copyright (c) 2010 - 2015, d-winner, Inc.
 * @link		http://www.d-winner.com
 */

class IndexAction extends Action {
	/**
		* 项目主入口
		*@examlpe 
	*/
    public function index(){
		$Public = A('Index','Public');
		$Public->check('Index',array('r'));
		$Log = A('Log','Public');
		session(NULL);
		
		//main
		$Log->moveLog();
		$uid = $_SESSION['login']['se_id'];
		$gid = $_SESSION['login']['se_groupID'];
		$cid = $_SESSION['login']['se_comyID'];
		$pid = $_SESSION['login']['se_partID'];
		
		$type = $Public->GS('User_company_table',$cid,'type');
		$this->assign('type',$type);
		$this->assign('uid',$uid);
		$this->assign('gid',$gid);
		$this->assign('cid',$cid);
		$this->assign('pid',$pid);
		
		$menu = M('Menu');
   		$info = $menu->cache(true)->where('_parentId=0 and status=1')->order('sort,id')->select();
		//dump($info);exit;
		$group_access = $Public->GS('User_group_table',$gid);
		
		$logo = ROOT.'Skin/'.GROUP_NAME;
		
		$this->assign('group_access',$group_access);
		$this->assign('uniqid',uniqid());
		$this->assign('info',$info);
		$this->display();
		unset($info,$menu,$Public);
    }
	
	/**
		* 获取未读信息数
		*@examlpe 
	*/
	public function getsms(){
		$sms_receive = M('Sms_receive_table');
		$uid = $_SESSION['login']['se_id'];
		$count = $sms_receive->where('user_id='.$uid.' and `status`=0')->count();
		echo $count;
	}
	
	/**
		* 显示信息
		*@examlpe 
	*/
	public function showsms($act=0,$json=NULL){
		$sms_receive = M('Sms_receive_table');
		$uid = $_SESSION['login']['se_id'];
		if($act==0){
			$count = $sms_receive->where('user_id='.$uid.' and status=0')->count();
			echo $count;
		}elseif($act==1){
			if($json==1){
				$sms = D('Sms_table');
				$receive = $sms_receive->field('GROUP_CONCAT(sms_id ORDER BY sms_id) as sms_id')->where('`user_id`='.$uid)->find();
				$info = $sms->relation('user')->where('`id` in ('.$receive['sms_id'].')')->select();
				$item = array();
				foreach($info as $t){
					if($t['status']==0){
						$t['title'] = '<strong>'.$t['title'].'</strong>';
					}
					$item[] = $t;
				}
				echo $info = json_encode($item);
			}else{
				$this->display();
			}	
		}
	}
	
	/**
		* 操作信息表
		*@examlpe 
	*/
	public function smsact($act){
		$sms = M('Sms_table');
		$sms_receive = M('Sms_receive_table');
		$sms_base = M('Sms_baseinfo_table');
		$uid = $_SESSION['login']['se_id'];
		$sql = $sms_receive->field('sms_id as id')->where('`user_id`='.$uid)->select(false);
		if($act=='readed'){
			$data = array(
				'status'=>1
			);
			$edit = $sms->where('`id` in('.$sql.')')->save($data);
			$edit2 = $sms_receive->where('`user_id`='.$uid)->save($data);
			if($edit !== false && $edit2 !== false){
				echo 1;
			}else{
				echo 0;
			}
		}elseif($act=='clear'){
			$del = $sms->where('id in('.$sql.')')->delete();
			if($del){
				$del2 = $sms_base->where('`sms_id` in('.$sql.')')->delete();
				$del3 = $sms_receive->where('`user_id`='.$uid)->delete();
				echo 1;
			}else{
				echo 0;
			}
		}
	}
	
	/**
		* 信息详情
		*@examlpe 
	*/
	public function smsdetail($id){
		$id = intval($id);
		$sms = D('Sms_table');
		$sms_receive = M('Sms_receive_table');
		$map['id'] = array('eq',$id);
		$data = array(
			'status'=>1
		);
		$sms->where($map)->save($data);
		$sms_receive->where('`sms_id`='.$id)->save($data);
		$info = $sms->relation(true)->where($map)->find();
		unset($map);
		$this->assign('uniqid',uniqid());
		$this->assign('info',$info);
		$this->display();
	}
	
	/**
		* 头部区域
		*@examlpe 
	*/
	public function top(){		
		$this->display();
    }
	
	/**
		* 左侧菜单栏区域
		*@examlpe 
	*/
	public function left(){
		$this->display();
    }
	
	/**
		* 右侧系统信息页
		*@examlpe 
	*/
	public function main($json=NULL){
		$Public = A('Index','Public');
		$role = $Public->check('Main',array('r'));
		import('ORG.Net.FileSystem');
		$sys = new FileSystem();
		$sys->root = ITEM;
		$sys->charset = C('CFG_CHARSET');
		$App = A('App','Public');
		
		//main
		$nowtime = time();
		$notice = M('Notice_table');
		if($role=='all'){
			$isadmin = 1;
		}elseif($role['user_group'][0]['access']=='999'){
			$isadmin = 2;
		}else{
			$isadmin = 0;
		}
		
		$pro_status = $App->getJson('xiangmuzhuangtai','Linkage/','arr');
		$ninfo = $notice->where('status>0')->order('status asc,addtime desc')->select();
		$this->assign('app',$App);
		$this->assign('ninfo',$ninfo);
		$nowdate = date("Y-m-d",$nowtime);
		$path = CONF_PATH.'version.txt';
		$ver = $sys->getFile($path);
		$ver = preg_replace("/;[\r\n]/iu",";\n",$ver);
		$arr_ver = explode(";\n",$ver);
		$arr_ver = array_filter($arr_ver);
		$config = M('config');
		$serial = $config->where("keyword='CFG_APPID'")->getField('vals');
		$this->assign('serial',$serial);
		$this->assign('ver',$arr_ver);
		$this->assign('nowtime',$nowtime);
		$this->assign('pro_status',$pro_status);
		$this->display();
		
		unset($Public,$role);
    }
	
	/**
		* 最新更跟进列表
		*@examlpe 
	*/
	public function myview($json=NULL,$self=NULL){
		$Public = A('Index','Public');
		$role = $Public->check('Myview',array('r'));
		//main
		if($json==1){
			if(cookie('view')){
				$days = cookie('view');
			}else{
				$days = C('VIEW_GRESS');
			}
			//dump($days);
			$cid = $_SESSION['login']['se_comyID'];
			$progress = D('Project_progress_table');
			$project_table = C('DB_PREFIX').'project_table';
			$project_concern = C('DB_PREFIX').'project_concern_table';
			$progress_table = C('DB_PREFIX').'project_progress_table';
			$comy = M('User_company_table');
			$st = $comy->where('id='.$cid)->getField('type');
			$gid = $_SESSION['login']['se_groupID'];
			$userid = $_SESSION['login']['se_id'];
			$access = $Public->GS('User_group_table',$gid);
			$tabs = explode('|',C('PRO_TABS'));
			$isclient = 0; $isshow = 0;
			if($role!='all' && !in_array('a',$role)){
				if($st==1){
					$where = " and t2.`client_id`='".$cid."' and  t2.`view_state`=3";
					$isclient = 1;
				}else{
					$where = "";
					$isclient = 0;
				}
			}else{
				$where = "";
				if($self==1){
					$isshow = 0;
				}else{
					$isshow = 1;
				}	
			}
			$result = M();
			
			$concern = $result->table($project_concern.' as tt1')->field('GROUP_CONCAT(tt1.user_id ORDER BY tt1.user_id)')->where('tt1.pro_id=t2.id')->select(false);
			$concern = ',concat_ws(\'\','.$concern.') as concern';
			$ids = $result->table($progress_table.' as t1')->field('t1.pro_id as pro_id,MAX(t1.addtime) as addtime,t2.client_id,t2.view_state'.$concern)->join(' join '.$project_table.' as t2 on t2.id=t1.pro_id')->where('TO_DAYS(NOW()) - TO_DAYS(DATE_FORMAT(t1.addtime,\'%Y-%m-%d\'))<='.$days.$where)->order('addtime desc,pro_id desc')->group('pro_id')->select();
			//dump($ids);exit;
			foreach($ids as $k=>$t){
				$id = $t['pro_id'];
				$arr_concern = explode(',',$t['concern']);
				//dump($arr_concern);
				if($isshow || in_array($userid,$arr_concern) || $isclient){
					if($isclient){
						$client = ' and `user_id`='.$userid;
					}else{
						$client = '';
					}
					foreach($tabs as $ke=>$va){
						$phinfo = $progress->relation(true)->where('pro_id='.$id.' and type='.$ke.' and status=0 and TO_DAYS(NOW()) - TO_DAYS(DATE_FORMAT(addtime,\'%Y-%m-%d\'))<='.$days.$client)->order('addtime desc')->limit(0,1)->find();
						$info[$k][] = $phinfo;
					}
				}
			}
			
			//dump($info);
			$userid = $_SESSION['login']['se_id'];
			$tc = $progress->where('pro_id='.$id)->count();
			$this->assign('role',$role);
			$this->assign('tabs',$tabs);
			$this->assign('userid',$userid);
			$this->assign('ainfo',$info);
			$this->assign('minfo',$minfo);
			$this->assign('days',$days);
			$this->display('myview_info');
		}else{
			$this->display();
		}
		unset($Public,$role);
    }
	
	/**
		* 升级检查
		*@examlpe 
	*/
	public function upver(){
		$nowtime = time();
		import('ORG.Net.FileSystem');
		$sys = new FileSystem();
		$sys->root = ITEM;
		$sys->charset = C('CFG_CHARSET');
		$App = A('App','Public');
		
		//main
		$nowdate = date("Y-m-d H:i:s",$nowtime);
		$path = CONF_PATH.'version.txt';
		$ver = $sys->getFile($path);
		$arr_ver = explode(";\r\n",$ver);
		$arr_ver = array_filter($arr_ver);
		$content = $arr_ver[0].";\r\n"
		 .$nowdate.";\r\n"
		 .$arr_ver[2].";\r\n";
		$sys->putFile($path,$content);
		echo "当前版本：$arr_ver[0]&nbsp;&nbsp;&nbsp;&nbsp;最后检测时间：$nowdate";
	}
	
	/**
		* 下载升级包
		*@examlpe 
	*/
	public function downver(){
		load("@.download");
		
		//main
		$soft = I('soft');
		download($soft,$name);
	}
	
	/**
		* 系统登录方法
		*@examlpe 
	*/
	public function login(){
		//main
		if($this->isPost()){
			$users = D('User_table');	
			$user = check_sql(I('username'));
			$pwd = $this->_post('password','md5');
			$code = check_sql(I('code'));
			$fields = array(
				'username'=>$user,
				'password'=>$pwd,
				'_logic'=>'AND'
			);
			$info = $users->relation(true)->where($fields)->find();
			unset($fields);
			if($user==''){
				 $this->error('用户名不能为空！');
			}
			if($this->_post('password')==''){
				 $this->error('密码不能为空！');
			}
			if($code=='' && C('CODE_ON')==1){
				 $this->error('验证码不能为空！');
			}
			
			if(C('CODE_ON')){
				if(md5($code)==session('verify')){
					$check_code = 1;
				}
			}else{
				$check_code = 1;
			}
			
			if($check_code){
				if(!count($info)>0){
					$this->error('账号或密码不正确！');
				}else{
					session(array('path'=>CONF_PATH.'/Session','prefix'=>'login'));
					session('se_user',$info['username']);
					session('se_id',$info['id']);
					session('se_group',$info['user_group'][0]['name']);
					session('se_groupID',$info['user_main']['group_id']);
					session('se_comyID',$info['user_main']['company_id']);
					session('se_partID',$info['user_main']['part_id']);
					$fields = array(
						'login_count'=>$info['login_count']+1,
						'last_visit'=>time(),
					);
					$up = $users->where("id=".$info['id'])->save($fields);
					unset($fields);
					header('Location:'.ITEM.'/index.php');
				}
			}else{
				$this->error('验证码不正确！');
			}
		}
		$this->display();
	}
	
	/**
		* 注销用户
		*@examlpe 
	*/
	public function safe(){
		session(array('prefix'=>'login'));
		session('[destroy]');
		redirect(ITEM.'/index.php?s=/'.GROUP_NAME.'/Index/login',0);
    }
	
	/**
		* 获取验证码
		*@examlpe 
	*/
	public function verify(){
    	import('ORG.Util.Image');
		$model = C('CODE_MODEL');
		$len = C('CODE_LEN');
    	Image::buildImageVerify($len,$model);
	}
	
	/**
		* 转换左侧菜单栏数据格式，并输出Json
		*@examlpe 
	*/
	public function json($mid){
		$Left = A('Left','Public');
		$Left->table = 'Menu';
		
		//main
		if(is_int((int)$mid)){
			$user = D('User_table');
			$uid = $_SESSION['login']['se_id'];
			$sele = $user->relation('user_group')->where('id='.$uid)->find();
			$Left->access = $sele['user_group'][0]['access'];
			$info = $Left->rowMenu($mid,$uid);
			echo json_encode($info);
			unset($info,$sele,$user,$Left);
		}
		
	}
	
	/**
		* 清空所以搜索产生的cookies
		*@examlpe 
	*/
	public function clear($act=NULL){
		if($act=='view'){
			cookie('view',NULL);
		}else{
			cookie(NULL,'map');
		}
	}
	
	/**
		* 清空所以缓存数，并重新生成Json
		*@examlpe 
	*/
	public function cache(){
		import('ORG.Net.FileSystem');
		$sys = new FileSystem();
		
		//main
    	$temp_path = RUNTIME_PATH.'/';
		if(file_exists($temp_path)){
			$dt = $sys->delFile($temp_path);
			R(GROUP_NAME.'/User/json',array(NULL));
			R(GROUP_NAME.'/Comy/json',array(NULL));
			R(GROUP_NAME.'/Part/json',array(NULL));
			R(GROUP_NAME.'/Client/json',array(NULL));
			R(GROUP_NAME.'/Linkage/json',array(NULL));
			R(GROUP_NAME.'/Group/json',array(NULL));
			R(GROUP_NAME.'/Menu/json',array(NULL));
		}
		echo 1;
		unset($sys,$field_path,$temp_path);
	}
	
	/**
		* 首页搜索控制
		*@examlpe 
	*/
	public function change(){
		//main
		$val = I('val');
		cookie('view',$val);
	}
}