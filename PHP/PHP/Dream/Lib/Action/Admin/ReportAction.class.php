<?php
/*
 * @varsion		Dream缺陷跟踪系统 2.0var
 * @package		程序设计深圳市九五时代科技有限公司设计开发
 * @copyright	Copyright (c) 2010 - 2015, d-winner, Inc.
 * @link		http://www.d-winner.com
 */
 
class ReportAction extends Action {
	/**
		* 项目问题列表
		*@param $pid  传入所属项目ID
		*@param $json    为NULL输出模板。为1时输出列表数据到前端，格式为Json
		*@param $method  为1时，单独输出记录数
		*@examlpe 
	*/
    public function index($pid=NULL,$json=NULL,$method=NULL,$type=NULL){
		$Public = A('Index','Public');
		$role = $Public->check('Report',array('r'));
		$App = A('App','Public');
		
		//main
		if(!is_int((int)$json)){
			$json = NULL;
		}
		$view = C('DATAGRID_VIEW');
		$page_row = C('PAGE_ROW');
		$comyid = $_SESSION['login']['se_comyID'];
		$comy = M('User_company_table');
		$userid = $_SESSION['login']['se_id'];
		$username = $_SESSION['login']['se_user'];
		$pid = intval($pid);
		if($json==1){
			$get_sort = $this->_get('sort');
			$get_order = $this->_get('order');
			$sort = isset($get_sort) ? strval($get_sort) : 't1_new_priority';   
			$sort = str_replace('_new_','_old_',$sort); 
			$order = isset($get_order) ? strval($get_order) : 'desc';
			
			$result = M();
			$Report_table = C('DB_PREFIX').'report_table';
			$Project_table = C('DB_PREFIX').'project_table';
			$Project_baseinfo = C('DB_PREFIX').'project_baseinfo_table';
			$Project_concern = C('DB_PREFIX').'project_concern_table';
			$user = C('DB_PREFIX').'user_table';
			$Linkage = C('DB_PREFIX').'linkage';
						
			$map = array();
			if(cookie('Report') || cookie('aReport')){
				if(cookie('Report')){
					$str_map = cookie('Report');
					$map = unserialize($str_map);
				}else{
					$str_map = cookie('aReport');
					$map = unserialize($str_map);
				}
				unset($str_map);
			}else{
				$map['id'] ='id>0';
				cookie('Report',serialize($map));
			}
			
			$protype = $comy->where('id='.$comyid)->getField('type');
			if($protype){
				$map['client_id'] = ' and client_id='.$comyid.' and view_status=15';
			}
			
			if($type==1){
				$map['tabs'] = ' and user_id='.$userid;
			}elseif($type==2){
				$map['tabs'] = ' and creator='.$userid;
			}elseif($type==3){
				if($role=='all' || in_array('a',$role)){
					unset($map['tabs']);
				}else{
					$sql = $result->table($Project_baseinfo)->field('pro_id as id')->group('pro_id')->order('pro_id')->where('app_handler=\''.$username.'\'')->select(false);
					$sql2 = $result->table($Project_concern)->field('pro_id as id')->group('pro_id')->order('pro_id')->where('user_id='.$userid)->select(false);
					$map['tabs'] = ' and (pid in('.$sql.') or pid in('.$sql2.'))';
				}
			}
			
			if($pid){
				$map['pid'] = ' and pid='.$pid;
			}else{
				unset($map['pid']);
			}
			//dump(unserialize(cookie('aReport')));
			$map = implode($map,' ').$oord;
			
			$get_page = $this->_get('page'); 
			$get_rows = $this->_get('rows');
			$page = isset($get_page) ? intval($get_page) : 1;    
			$rows = isset($get_rows) ? intval($get_rows) : $page_row; 
			$now_page = $page-1;
			$offset = $now_page*$rows;
			
			$arr_flelds = array(
				'id' => 't1.id as id',
				'pid' => 't1.pid as pid',
				'proname' => 't9.name as proname',
				//'proname' => 'concat_ws(\'\',\'<a href=javascript:showTab("项目-\',t9.name,\'"\,\',t9.id,\')>\',t9.name,\'</a>\') as proname',
				'client_id' => 't9.client_id as client_id',
				'bugno' => 't1.bugno as bugno',
				'status' => 't1.status as status',
				'status2' => 'IF(t1.user_id>0,CASE t1.status WHEN 0 THEN \'<div style="background-color: #9F0; width:100%; text-align:center;">待解决</div>\' ELSE t3.val END,\'<div style="background-color: #cf86cf; width:100%; text-align:center;">未指派</div>\') as t1_new_status',
				'status3' => 't3.sort as t1_old_status',
				'level' => 't1.level as level',
				'level2' => 't4.val as t1_new_level',
				'level3' => 't4.sort as t1_old_level',
				'type' => 't1.type as type',
				'type2' => 't5.val as t1_new_type',
				'type3' => 't5.sort as t1_old_type',
				'hertz' => 't1.hertz as hertz',
				'hertz2' => 't6.val as t1_new_hertz',
				'hertz3' => 't6.sort as t1_old_hertz',
				'priority' => 't1.priority as priority',
				'priority2' => 't7.val as t1_new_priority',
				'priority3' => 't7.sort as t1_old_priority',
				'user_id' => 't1.user_id as user_id',
				'to_name' => 'case t1.user_id when 0 then \'无\' else t8.username end as t1_old_user_id',
				'title' => 't1.title as title',
				'creator' => 't1.creator as creator',
				'creator2' => 't2.username as creatorname',
				'addtime' => 't1.addtime as addtime',
			);
			$fields = implode(',',$arr_flelds);
			unset($arr_flelds);
			
			if(!$view){
				$info = $result->table($Report_table.' as t1')->field('SQL_CALC_FOUND_ROWS '.$fields)->join(' '.$user.' as t2 on t2.id = t1.creator')->join(' '.$Linkage.' as t3 on t3.id = t1.status')->join(' '.$Linkage.' as t4 on t4.id = t1.level')->join(' '.$Linkage.' as t5 on t5.id = t1.type')->join(' '.$Linkage.' as t6 on t6.id = t1.hertz')->join(' '.$Linkage.' as t7 on t7.id = t1.priority')->join(' '.$user.' as t8 on t8.id = t1.user_id')->join(' '.$Project_table.' as t9 on t9.id = t1.pid')->having($map)->order($sort.' '.$order)->limit($offset,$rows)->select();
				$count = $result->query('SELECT FOUND_ROWS() as total');
				$count = $count[0]['total'];	
			}else{
				$info = $result->table($Report_table.' as t1')->field($fields)->join(' '.$user.' as t2 on t2.id = t1.creator')->join(' '.$Linkage.' as t3 on t3.id = t1.status')->join(' '.$Linkage.' as t4 on t4.id = t1.level')->join(' '.$Linkage.' as t5 on t5.id = t1.type')->join(' '.$Linkage.' as t6 on t6.id = t1.hertz')->join(' '.$Linkage.' as t7 on t7.id = t1.priority')->join(' '.$user.' as t8 on t8.id = t1.user_id')->join(' '.$Project_table.' as t9 on t9.id = t1.pid')->having($map)->order($sort.' '.$order)->select();
				$count = count($info);
			}
			//dump($info);exit;
			$new_info = array();
			//$items = array();
			$new_info['total'] = $count;
			if($method=='total'){
				echo  json_encode($new_info); exit;
			}
			
			$info = $info?$info:array();
			$new_info['rows'] = $info;
			//dump($new_info);
			echo json_encode($new_info);
		}else{
			$year = array(
				date("Y",strtotime("-5 year")),date("Y",strtotime("-4 year")),date("Y",strtotime("-3 year")),date("Y",strtotime("-2 year")),date("Y",strtotime("-1 year")),date("Y"),date("Y",strtotime("+1 year")),date("Y",strtotime("+2 year")),date("Y",strtotime("+3 year")),date("Y",strtotime("+4 year")),date("Y",strtotime("+5 year")),date("Y",strtotime("+6 year")),
			);
			
			$status = $App->getJson('wentizhuangtai','/Linkage');
			$types = $App->getJson('chuxianweizhi','/Linkage');
			$level = $App->getJson('yanzhongxing','/Linkage');
			$priority = $App->getJson('youxianji','/Linkage');
			$hertz = $App->getJson('chuxianpinlv','/Linkage');
			
			array_unshift($status,array(
				'id'=>-2,
				'text'=>'待解决',
			));
			array_unshift($status,array(
				'id'=>-1,
				'text'=>'未指派',
			));
			
			$this->assign('priority',$priority);
			$this->assign('status',$status);
			$this->assign('types',$types);
			$this->assign('level',$level);
			$this->assign('hertz',$hertz);
			$this->assign('nowyear',date("Y"));
			$this->assign('nowmonth',date("m"));
			$this->assign('year',$year);
			$this->assign('page_row',$page_row);
			$this->assign('uniqid',uniqid());
			$this->assign('type',$type);
			$this->display();
		}
    }
	
	/**
		* 新增与更新数据
		*@param $act add为新增、edit为编辑
		*@param $go  为1时，获取post
		*@param $id  传人数据id
		*@param $pid  传人数据项目id
		*@examlpe 
	*/
	public function add($act=NULL,$go=false,$id=NULL,$pid=NULL){
		$app = A('App','Public');
		import('ORG.Net.FileSystem');
		$sys = new FileSystem();
		import('ORG.Net.UploadFile');
		$up = new UploadFile();
		$arr_type = C('UPLOAD_TYPE');
		$arr_type = explode(',',$arr_type);
		$up->allowExts = $arr_type;
		$upload = C('TMPL_PARSE_STRING.__UPLOAD__');
		$up->savePath = ROOT.'/'.$upload.'/';
		$up->maxSize = C('UPLOAD_SIZE');
		$up->charset = 'UTF-8';
		$up->autoSub = true;
		$up->allowNull = true;
		$sms = A('Sms','Public');
		$Log = A('Log','Public');
		
		//main
		$Report = D('Report_table');
		$Report_baseinfo = D('Report_baseinfo_table');
		$userid = $_SESSION['login']['se_id'];
		$username = $_SESSION['login']['se_user'];
		if($go==false){
			$this->assign('pid',$pid);
			$this->assign('uniqid',uniqid());
			if($act=='add'){
				$bugno = $Report->Max('id');
				$bugno = $bugno+1;
				$bugno = 'E'.str_pad($bugno,8,'0',STR_PAD_LEFT);
				$this->assign('bugno',$bugno);
				$this->assign('username',$username);
				$this->assign('act','add');
				if($pid){
					$this->display();
				}else{
					$this->display('addfull');
				}
			}else{
				if(!is_int((int)$id)){
					$id = NULL;
					$this->show('无法获取ID');
				}else{
					$map['id'] = array('eq',$id);
					$info = $Report->relation(array('baseinfo','create'))->where($map)->find();
					//dump($info);
					$bugno = 'E'.str_pad($info['id'],8,'0',STR_PAD_LEFT);
					$this->assign('bugno',$bugno);
					$this->assign('id',$id);
					$this->assign('username',$info['createname']);
					$this->assign('act','edit');
					$this->assign('info',$info);
					$this->display();
					unset($info,$uinfo,$map);
				}
			}	
		}else{
			$nowtime = date("Y-m-d H:i:s",time());
			$data = $Report->create();
			$base = $Report_baseinfo->create();
			if(!$data['user_id']){
				$data['user_id'] = 0;
			}
			$data['baseinfo'] = $base;
			if($up->upload()){
				$info = $up->getUploadFileInfo();
				$data['files'][] = array(
					'user_id'=>$userid,
					'path'=>$info[0]['savename'],
					'addtime'=>$nowtime,
				);
			}else{
				$errorNo = $up->getErrorNo();
				if($errorNo!=2){
					echo $info = $up->getErrorMsg();
					exit;
				}
			}
			//dump($data);exit;
			if($act=='add'){
				$Public = A('Index','Public');
				$role = $Public->check('Report',array('c'));
				if($role<0){
					echo $role; exit;
				}
				$data['creator'] = $userid;
				$data['addtime'] = $nowtime;
				$data['uptime'] = $nowtime;
				$add = $Report->relation(true)->add($data);
				if($add>0){
					
					if($data['user_id']){
						$toname = $Public->GS('User_table',$data['user_id'],'username');
						$descrtption = $username.'提交了一条BUG，并指派了'.$toname.'为负责人，编号为：'.$data['bugno'];
					}else{
						$descrtption = $username.'提交了一条BUG，编号为：'.$data['bugno'];
					}
					$log_data = array(
						'pro_id'=>$data['pid'],
						'descrtption'=>$descrtption,
					);
					$Log->actLog($log_data);
					
					//信息提醒功能
					$proname = $Public->GS('Project_table',$data['pid'],'name');
					$title = '项目：'.$proname.' BUG指派通知';
					$content = $username.'指派了您为关于项目：“<a href="javascript:showTab(\'项目-'.$proname.'\','.$data['pid'].');">'.$proname.'</a>”，BUG编号为：'.$data['bugno'].'的负责人。';
					$sms->sendsms(array(
						'title'=>$title,
						'description'=>$content,
					),$data['user_id']);
					
					echo 1;
				}else{
					$path = ROOT.'/'.$upload.'/'.$info[0]['savename'];
					if($info[0]['savename'] && file_exists($path)){
						$sys->delFile($path);
					}
					echo 0;
				}
				unset($data,$Public);
			}elseif($act=='edit'){
				$Public = A('Index','Public');
				$role = $Public->check('Report',array('u'));
				if($role<0){
					echo $role; exit;
				}
				
				if(!is_int((int)$id)){
					echo 0;
				}else{
					if($role!='all' && !in_array('a',$role) ){
						$user_id = $Report->where('id='.$id)->getField('creator');
						if($userid!=$user_id){
							echo 2; exit;
						}
					}
					$data['uptime'] = $nowtime;
					$map['id'] = array('eq',$id);
					$olduser = $Report->where($map)->getField('user_id');
					$edit = $Report->relation(true)->where($map)->save($data);
					unset($map);
					if($edit !== false){
						if($data['user_id']!=$olduser){
							$toname = $Public->GS('User_table',$data['user_id'],'username');
							$descrtption = $username.'修改了编号为：'.$data['bugno'].'的BUG，并指派了'.$toname.'为负责人';
							
							//信息提醒功能
							$proname = $Public->GS('Project_table',$data['pid'],'name');
							$title = '项目：'.$proname.' BUG指派通知';
							$content = $username.'指派了您为关于项目：“<a href="javascript:showTab(\'项目-'.$proname.'\','.$data['pid'].');">'.$proname.'</a>”，BUG编号为：'.$data['bugno'].'的负责人。';
							$sms->sendsms(array(
								'title'=>$title,
								'description'=>$content,
							),$data['user_id']);
							
						}else{
							$descrtption = $username.'修改了编号为：'.$data['bugno'].'的BUG';
						}
						$log_data = array(
							'pro_id'=>$data['pid'],
							'descrtption'=>$descrtption,
						);
						$Log->actLog($log_data);
						
						echo 1;
					}else{
						echo 0;
					}
					unset($data,$Public);
				}
			}
		}
		unset($Report);
	}
	
	/**
		* 删除数据
		*@examlpe 
	*/
	public function del(){
		import('ORG.Net.FileSystem');
		$sys = new FileSystem();
		$Public = A('Index','Public');
		$Log = A('Log','Public');
		$role = $Public->check('Report',array('d'));
		if($role<0){
			echo $role; exit;
		}
		
		//main
		$str_id = I('id');
		$str_id = strval($str_id);
		$str_id = substr($str_id,0,-1);
		$arr_id = explode(',',$str_id);
		$Report = D('Report_table');
		$files_report = D('Report_files_table');
		$upload = C('TMPL_PARSE_STRING.__UPLOAD__');
		$pass = 0;$fail = 0;
		$uid = $_SESSION['login']['se_id'];
		$username = $_SESSION['login']['se_user'];
		$arr_ids = $arr_id;
		if($role!='all' && !in_array('a',$role) ){
			foreach($arr_ids as $k=>$id){
				$user_id = $Report->where('id='.$id)->getField('creator');
				if($uid!=$user_id){
					echo 2; exit;
				}
			}
		}
		foreach($arr_id as $id){
			$files = $files_report->field('path')->where('rid='.$id)->find();
			$info = $Report->where('id='.$id)->find();
			$del = $Report->relation(true)->delete($id);
			if($del){
				foreach($files as $t){
					$path = ROOT.'/'.$upload.'/'.$t['path'];
					if($t['path'] && file_exists($t['path'])){
						$sys->delFile($path);
					}
				}
				
				$descrtption = $username.'删除了编号为：'.$info['bugno'].'的BUG';
				$log_data = array(
					'pro_id'=>$info['pid'],
					'descrtption'=>$descrtption,
				);
				$Log->actLog($log_data);
				
				$pass++;
			}else{
				$fail++;
			}
		}
		unset($str_id,$arr_id,$arr_ids,$arr_creator);
		if($pass==0){
			echo 0;
		}else{
			echo 1;
		}
		$pass = 0; $fail = 0;
		unset($Report,$Public);
	}
	
	/**
		* 右键快速搜索
		*@param $pid  传入所属项目ID
		*@param $field  传入搜索字段
		*@param $json 为1时，输出json数据
		*@param $act   为1时，获取post
		*@examlpe 
	*/
	/*public function search($pid=NULL,$field=NULL,$json=NULL,$act=NULL){	
		$App = A('App','Public');
	
		//main
		$field = strval($field);
		$result = M();
		$Report_table = C('DB_PREFIX').'report_table';
		$Report_baseinfo = C('DB_PREFIX').'report_baseinfo_table';
		$user = C('DB_PREFIX').'user_table';
		
		if($act==1){
			$keyfield = I('field');
			$mod = I('mod');
			$keyword = I('keyreport');
			
			if($mod=='like' || $mod=='notlike'){
				$keyword = '%'.$keyword.'%';
			}	
			
			$map = array();
			if(cookie('Report')){
				$str_map = cookie('Report');
				$map = unserialize($str_map);		
			}
			$mod = htmlspecialchars_decode($mod);
			$map[$keyfield] = " and ".$keyfield." ".$mod." '".$keyword."'";	
			if($keyword=='clearThisValue'){
				unset($map[$keyfield]);
			}
			cookie('aReport',NULL);
			cookie('Report',serialize($map));
			unset($str_map,$map,$keyfield,$keyword,$mod,$table);
			echo 1;
		}else{
			if($json==1){
				$map = array();
				if(cookie('Report') || cookie('aReport')){
					if(cookie('Report')){
						$str_map = cookie('Report');
						$map = unserialize($str_map);
					}else{
						$str_map = cookie('aReport');
						$map = unserialize($str_map);
					}
					unset($str_map);
				}else{
					$map['id'] ='id>0';
				}
				if($pid){
					$map['pid'] =' and pid='.$pid;
				}else{
					unset($map['pid']);
				}
				
				$map[$field] = ' and '.$field.'<>\'\'';
				$map = implode($map,' ');
				$arr_status = $App->getJson('wentizhuangtai','Linkage/','arr',NULL,1);
				$arr_type = $App->getJson('chuxianweizhi','Linkage/','arr',NULL,1);
				$arr_priority = $App->getJson('youxianji','Linkage/','arr',NULL,1);
				
				$arr_flelds = array(
					'id' => 't1.id as id',
					'pid' => 't1.pid as pid',
					'bugno' => 't1.bugno as bugno',
					'status' => 't1.status as status',
					'user_id' => 'if(t2.username<>\'\',t2.username,\'无\') as user_id',
					'type' => 't1.type as type',
					'level' => 't1.level as level',
					'hertz' => 't1.hertz as hertz',
					'priority' => 't1.priority as priority',
					'os' => 'if(t1.os<>\'\',t1.os,\'无\') as os',
					'title' => 't1.title as title',
					'creator' => 't4.username as creator',
					'addtime' => 't1.addtime as addtime',
				);
				$fields = implode(',',$arr_flelds);
				unset($arr_flelds);
				
				$info_sql = $result->table($Report_table.' as t1')->field($fields)->join(' '.$user.' as t2 on t2.id = t1.user_id')->join(' '.$Report_baseinfo.' as t3 on t3.report_id = t1.id')->join(' '.$Report_fulltext.' as t4 on t4.report_id = t1.id')->select(false);
				
				switch($field){
					case 'type':
						$text = 'ELT('.$field.','.implode(',',$arr_type).') as text';
					break;		
					case 'status':
						$text = 'ELT('.$field.','.implode(',',$arr_status).') as text';
					break;	
					case 'priority':
						$text = 'ELT('.$field.','.implode(',',$arr_priority).') as text';
					break;	
					default:
						$text = $field.' as text';
					break;
				}
				$info_sql = $result->table($Report_table.' as t1')->field($fields)->join(' '.$user.' as t2 on t2.id = t1.user_id')->join(' '.$Report_baseinfo.' as t3 on t3.rid = t1.id')->join(' '.$user.' as t4 on t4.id = t1.creator')->select(false);
				$info = $result->query('select '.$field.' as id,'.$text.' from '.$info_sql.' as rows where '.$map.' group by text order by convert('.$field.' using gbk) asc');
				
				//dump($info);
				array_unshift($info,array('id'=>"clearThisValue",'text'=>"所有"));
				echo json_encode($info);
				unset($info,$result,$field,$map);
			}else{
				$this->assign('uniqid',uniqid());
				$this->assign('field',$field);
				$this->display();
			}	
		}
	}*/
	
	/**
		* 高级搜索
		*@param $act   为1时，获取post
		*@examlpe 
	*/
	public function advsearch($act=NULL){
		$App = A('App','Public');
			
		//main
		$field = strval($field);
		if($act==1){
			$field = I('field');
			$mod = I('mod');
			$keyword = I('keys');	
			$type = I('type');
			array_pop($field); array_pop($mod); array_pop($keyword); array_pop($type);
			
			$del = array_pop($type);
			
			$arr = array();
			$num = 0;
			$map['id'] ='id>0';
			foreach($field as $key=>$val){
				if($mod[$key]=='like' || $mod[$key]=='notlike'){
					$keyword[$key] = '%'.$keyword[$key].'%';
				}
				$tt = trim($type[$key]);
				$n = $key+1;
				$l = $key-1;
				$nt = trim($type[$n]);
				$lt = trim($type[$l]);
				$lf = $field[$l];
				$step = 1;
				
				if($val==$lf){
					$str = $val.$step;
					$step++;
				}else{
					$str = $val;
				}
				
				if($tt=='OR'){
					if($keyword[$key]){
						$mod[$key] = htmlspecialchars_decode($mod[$key]);
						$arr[$num]['k'][] = $val;
						$arr[$num]['v'][] = $val." ".$mod[$key]." '".$keyword[$key]."'";
					}
					if($nt=='AND'){
						$mod[$n] = htmlspecialchars_decode($mod[$n]);
						if($mod[$n]=='like' || $mod[$n]=='notlike'){
							$keyword[$n] = '%'.$keyword[$n].'%';
						}
						if($keyword[$n]){
							$arr[$num]['k'][] = $val;
							$arr[$num]['v'][] = $val." ".$mod[$n]." '".$keyword[$n]."'";
						}
						$num++;
					}
				}else{
					if($lt!='OR' && $tt=='AND'){
						$mod[$key] = htmlspecialchars_decode($mod[$key]);
						if($keyword[$key]){
							$map[$str] = ' and '.$val." ".$mod[$key]." '".$keyword[$key]."'";
						}
					}
				}
				
				if(!isset($type[$key]) && $lt=='OR'){
					$mod[$key] = htmlspecialchars_decode($mod[$key]);
					if($keyword[$key]){
						$arr[$num]['k'][] = $val;
						$arr[$num]['v'][] = $val." ".$mod[$key]." '".$keyword[$key]."'";
					}
				}else{
					if(!isset($type[$key]) && $lt!='OR'){
						$mod[$key] = htmlspecialchars_decode($mod[$key]);
						if($keyword[$key]){
							$map[$str] = ' and '.$val." ".$mod[$key]." '".$keyword[$key]."'";
						}
					}
				}
			}
			$num = 0;
			unset($key,$val,$ntable,$table,$field,$mod,$type,$keyword);
			
			foreach($arr as $key=>$val){
				$str = $val['k'][0];
				for($i=0;$i<count($val['v']);$i++){
					if($i==0){
						$map[$str] .= ' and ('.$val['v'][$i];
					}elseif($i==count($val['v'])-1){
						$map[$str] .= ' or '.$val['v'][$i].')';
					}else{
						$map[$str] .= ' or '.$val['v'][$i];
					}
				}	
			}
			unset($arr);
			
			cookie('Report',NULL);
			cookie('aReport',serialize($map));
			echo 1;
			unset($map);
		}else{
			$this->assign('uniqid',uniqid());
			$this->assign('field',$field);
			$this->display();
		}	
	}
	
	/**
		* 清空所以搜索产生的cookies
		*@examlpe 
	*/
	public function clear(){
    	cookie('Report',NULL);
		cookie('aReport',NULL);
		cookie('tReport',NULL);
	}
	
	/**
		* 查看详情
		*@param $id  数据id值
		*@examlpe 
	*/
	public function detail($id){
		$Public = A('Index','Public');
		$role = $Public->check('Report',array('r'));
		
		//main
		$this->assign('id',$id);
		$this->display();
	}
	
	/**
		* 查看详情
		*@param $id  数据id值
		*@examlpe 
	*/
	public function reportdetail($id){
		$Public = A('Index','Public');
		$App = A('App','Public');
		
		//main
		$Report = D('Report_table');
		$uid = $_SESSION['login']['se_id'];
		$map['id'] = array('eq',$id);
		$this->assign('uniqid',uniqid());
		$info = $Report->relation(true)->where($map)->find();
		$arr_level = $App->getJson('yanzhongxing','Linkage/','arr');
		$arr_type = $App->getJson('chuxianweizhi','Linkage/','arr');
		$arr_hertz = $App->getJson('chuxianpinlv','Linkage/','arr');
		$arr_priority = $App->getJson('youxianji','Linkage/','arr');
		$info['type'] = $Public->searchArr($arr_type,'id',$info['type']);
		$info['level'] = $Public->searchArr($arr_level,'id',$info['level']);
		$info['hertz'] = $Public->searchArr($arr_hertz,'id',$info['hertz']);
		$info['priority'] = $Public->searchArr($arr_priority,'id',$info['priority']);
		if($info['user_id']==0 and $info['status']==0){
			$info['statusname'] = '<div style="background-color: #cf86cf; width:100%; text-align:center;">未指派</div>';
		}elseif($info['user_id']>0 and $info['status']==0){
			$info['statusname'] = '<div style="background-color: #9F0; width:100%; text-align:center;">待解决</div>';
		}
		//dump($info);
		if($role=='all' || in_array('a',$role) ){
			$isadmin = 1;
		}else{
			$isadmin = 0;
		}
		//dump($info);
		$this->assign('isadmin',$isadmin);
		$this->assign('uid',$uid);
		$this->assign('id',$id);
		$this->assign('info',$info);
		$this->display();
		unset($Public,$role,$Report);
	}
	
	/**
		* 工具栏搜索控制
		*@param $pid  传入所属项目ID
		*@param $act  传入的字段名
		*@param $mode  为like时，模糊搜索
		*@examlpe 
	*/
	public function change($act,$mode=NULL,$pid=NULL){
		if(cookie('Report')){
			$str_map = cookie('Report');
			$map = unserialize($str_map);
		}else{
			$map['id'] ='id>0';
		}
		unset($str_map);
		$id = strval(I('val'));
		switch($act){
			case 'status':
				if($id==0){
					unset($map['status']);
				}else{
					if($id==-1){
						$map['status'] = " and `user_id`=0 and `status`=0";
					}elseif($id==-2){
						$map['status'] = " and `user_id`>1 and `status`=0";
					}else{
						$map['status'] = " and `status`=".$id;
					}
					
				}
			break;
			
			default:
				if($mode=='like'){
					$map['like'] = " and ".$act." like '%".$id."%'";
				}else{
					$map['like'] = " and ".$act." = '".$id."'";
				}
			break;
		}
		cookie('Report',serialize($map));
	}
	
	/**
		* 附件下载
		*@param $filename  文件路径
		*@examlpe 
	*/
	public function down($id){
		load("@.download");
		
		//main
		$report_files = M('Report_files_table');
		$id = intval($id);
		$filename = $report_files->where('id='.$id)->getField('path');
		$upload = C('TMPL_PARSE_STRING.__UPLOAD__');
		$path = ROOT.'/'.$upload.'/'.$filename;
		if($filename){
			download($path,$filename);
		}
	}
	
	/**
		* 新增反馈
		*@param $id  数据id值
		*@examlpe 
	*/
	public function reply($id){
		$Public = A('Index','Public');
		$role = $Public->check('Project',array('gc'));
		if($role<0){
			echo $role; exit;
		}
		
		//main
		$rid =  intval($id);
		$description = addcslashes($_POST['description'],"'");
		$reply = M('Report_reply_table');
		$userid = $_SESSION['login']['se_id'];
		$username = $_SESSION['login']['se_user'];
		$data = array(
			'rid'=>$rid,
			'user_id'=>$userid,
			'username'=>$username,
			'description'=>$description,
			'replytime'=>date("Y-m-d H:i:s"),
		);
		$add = $reply->add($data);
		if($add>0){
			echo 1;
		}else{
			echo 0;
		}
	}
	
	/**
		* 上传附件
		*@param $id  数据id值
		*@examlpe 
	*/
	public function upfile($id){
		$Public = A('Index','Public');
		$Log = A('Log','Public');
		$role = $Public->check('Report',array('c'));
		if($role<0){
			echo $role; exit;
		}
		import('ORG.Net.FileSystem');
		$sys = new FileSystem();
		import('ORG.Net.UploadFile');
		$up = new UploadFile();
		$arr_type = C('UPLOAD_TYPE');
		$arr_type = explode(',',$arr_type);
		$up->allowExts = $arr_type;
		$upload = C('TMPL_PARSE_STRING.__UPLOAD__');
		$up->savePath = ROOT.'/'.$upload.'/';
		$up->maxSize = C('UPLOAD_SIZE');
		$up->charset = 'UTF-8';
		$up->autoSub = true;
		$up->allowNull = true;
		
		//main
		$files_table = M('Report_files_table');
		$report_table = M('Report_table');
		$rid =  intval($id);
		$uid = $_SESSION['login']['se_id'];
		$username = $_SESSION['login']['se_user'];
		$report = $report_table->where('id='.$rid)->find();
		if($up->upload()){
			$info = $up->getUploadFileInfo();
			$data = array(
				'rid'=>$rid,
				'user_id'=>$uid,
				'path'=>$info[0]['savename'],
				'addtime'=>date("Y-m-d H:i:s",time()),
			);
			$add = $files_table->add($data);
		}else{
			$errorNo = $up->getErrorNo();
			if($errorNo!=2){
				echo $info = $up->getErrorMsg();
				exit;
			}
		}
		if($add>0){
			$descrtption = $username.'上传了关于BUG编号为：'.$report['bugno'].'的附件';
			$log_data = array(
				'pro_id'=>$report['pid'],
				'descrtption'=>$descrtption,
			);
			$Log->actLog($log_data);
			
			echo 1;
		}else{
			echo 0;
		}
	}
	
	/**
		* 删除附件
		*@examlpe 
	*/
	public function delfile(){
		$Public = A('Index','Public');
		$Log = A('Log','Public');
		$role = $Public->check('Report',array('d'));
		if($role<0){
			echo $role; exit;
		}
		import('ORG.Net.FileSystem');
		$sys = new FileSystem();
		
		//main
		$upload = C('TMPL_PARSE_STRING.__UPLOAD__');
		$files_table = M('Report_files_table');
		$report_table = M('Report_table');
		$id =  intval(I('id'));
		$uid =  intval(I('uid'));
		$file =  I('path');
		$path = ROOT.$upload.'/'.$file;
		$userid = $_SESSION['login']['se_id'];
		$username = $_SESSION['login']['se_user'];
		if($userid!=$uid){
			echo 2;
			exit;
		}
		$rid = $files_table->where('id='.$id)->getField('rid');
		$info = $report_table->where('id='.$rid)->find();
		$del = $files_table->delete($id);
		if($del==1){
			if($file && file_exists($path)){
				$sys->delFile($path);
			}
			
			$descrtption = $username.'删除了关于BUG编号为：'.$info['bugno'].'的附件';
			$log_data = array(
				'pro_id'=>$info['pid'],
				'descrtption'=>$descrtption,
			);
			$Log->actLog($log_data);
			
			echo 1;
		}else{
			echo 0;
		}
	}
	
	/**
		* 修改指定人
		*@examlpe 
	*/
	public function setuser(){
		$Public = A('Index','Public');
		$sms = A('Sms','Public');
		$Log = A('Log','Public');
		$role = $Public->check('Report',array('u'));
		
		//main
		$id = intval(I('id'));
		$comy = intval(I('comy'));
		$uid = intval(I('uid'));
		$userid = $_SESSION['login']['se_id'];
		$username = $_SESSION['login']['se_user'];
		$Report = M('Report_table');
		$data = array(
			'comy'=>$comy,
			'user_id'=>$uid,
		);
		$edit = $Report->where('`id`='.$id)->save($data);
		if($edit !== false){
			
			$olduser = I('olduser');
			$data = $Report->field('bugno,pid,user_id')->where('id='.$id)->find();
			if($data['user_id']!=$olduser){
				$toname = $Public->GS('User_table',$data['user_id'],'username');
				$descrtption = $username.'指派了'.$toname.'为BUG编号为：'.$data['bugno'].'的负责人';
				$log_data = array(
					'pro_id'=>$data['pid'],
					'descrtption'=>$descrtption,
				);
				$Log->actLog($log_data);
				
				//信息提醒功能
				$title = '项目：'.$proname.' BUG指派通知';
				$content = $username.'指派了您为关于项目：“<a href="javascript:showTab(\'项目-'.$proname.'\','.$data['pid'].');">'.$proname.'</a>”，BUG编号为：'.$data['bugno'].'的负责人。';
				$sms->sendsms(array(
					'title'=>$title,
					'description'=>$content,
				),$data['user_id']);
			}
			
			echo 1;
		}else{
			echo 0;
		}
	}
	
	/**
		* 修改状态
		*@examlpe 
	*/
	public function setstatus(){
		$Public = A('Index','Public');
		$App = A('App','Public');
		$sms = A('Sms','Public');
		$Log = A('Log','Public');
		$role = $Public->check('Report',array('u'));
		
		//main
		$id = intval(I('id'));
		$status = intval(I('val'));
		$userid = $_SESSION['login']['se_id'];
		$username = $_SESSION['login']['se_user'];
		$Report = M('Report_table');
		$data = array(
			'status'=>$status,
		);
		$edit = $Report->where('id='.$id)->save($data);
		if($edit !== false){
			$oldstatus = I('oldstatus');
			$arr_status = $App->getJson('wentizhuangtai','/Linkage');
			$data = $Report->field('bugno,pid,status,user_id')->where('id='.$id)->find();
			if($data['status']!=$oldstatus){
				$descrtption = $username.'修改了BUG编号为：'.$data['bugno'].'的状态，状态为：'.$Public->searchArr($arr_status,'id',$status);
				$log_data = array(
					'pro_id'=>$data['pid'],
					'descrtption'=>$descrtption,
				);
				$Log->actLog($log_data);
				
				//信息提醒功能
				$proname = $Public->GS('Project_table',$data['pid'],'name');
				$title = '项目：'.$proname.' BUG状态更改通知';
				$content = $username.'修改了关于项目：“<a href="javascript:showTab(\'项目-'.$proname.'\','.$data['pid'].');">'.$proname.'</a>”，BUG编号为：'.$data['bugno'].'的状态，状态为：'.$Public->searchArr($arr_status,'id',$status).'。';
				$sms->sendsms(array(
					'title'=>$title,
					'description'=>$content,
				),$data['user_id']);
			}
			
			echo 1;
		}else{
			echo 0;
		}
	}
	
	/**
		* 删除反馈
		*@param $id  数据id值
		*@examlpe 
	*/
	public function delreply(){
		$Public = A('Index','Public');
		$role = $Public->check('Project',array('gd'));
		if($role<0){
			echo $role; exit;
		}
		
		//main
		$id = intval(I('val'));
		$reply = M('Report_reply_table');
		
		$uid = $_SESSION['login']['se_id'];
		if($role!='all' && !in_array('a',$role) ){
			$user_id = $reply->where('id='.$id)->getField('user_id');
			if($uid!=$user_id){
				echo 2; exit;
			}
		}
		$del = $reply->delete($id);
		if($del>0){
			echo 1;
		}else{
			echo 0;
		}
	}
	
	/**
		* 搜索
		*@examlpe 
	*/
	
	public function search(){
		$data = I();
		$map['id'] ='id>0';
		if($data['year']){
			$map['year'] = ' and YEAR(addtime)=\''.$data['year'].'\'';
		}
		if($data['month']){
			$map['month'] = ' and MONTH(addtime)=\''.$data['month'].'\'';
		}
		if($data['type']){
			$map['type'] = ' and type=\''.$data['type'].'\'';
		}
		if($data['status']){
			if($data['status']==-1){
				$map['status'] = " and `user_id`=0 and `status`=0";
			}elseif($data['status']==-2){
				$map['status'] = " and `user_id`>0 and `status`=0";
			}else{
				$map['status'] = ' and status=\''.$data['status'].'\'';
			}
		}
		if($data['level']){
			$map['level'] = ' and level=\''.$data['level'].'\'';
		}
		if($data['hertz']){
			$map['hertz'] = ' and hertz=\''.$data['hertz'].'\'';
		}
		if($data['priority']){
			$map['priority'] = ' and priority=\''.$data['priority'].'\'';
		}
		if($data['pro_id']){
			$map['pro_id'] = ' and pid=\''.$data['pro_id'].'\'';
		}
		cookie('Report',NULL);
		cookie('aReport',serialize($map));
	}
}