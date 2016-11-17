<?php
/*
 * @varsion		Dream缺陷跟踪系统 2.0var
 * @package		程序设计深圳市九五时代科技有限公司设计开发
 * @copyright	Copyright (c) 2010 - 2015, d-winner, Inc.
 * @link		http://www.d-winner.com
 */
 
class BugAction extends Action {
	/**
		* 问题交流列表
		*@param $json    为NULL输出模板。为1时输出列表数据到前端，格式为Json
		*@param $method  为1时，单独输出记录数
		*@examlpe 
	*/
    public function index($json=NULL,$method=NULL){
		$Public = A('Index','Public');
		$App = A('App','Public');
		$role = $Public->check('Bug',array('r'));
		
		//main
		if(!is_int((int)$json)){
			$json = NULL;
		}
		$view = C('DATAGRID_VIEW');
		$page_row = C('PAGE_ROW');
		$cid = $_SESSION['login']['se_comyID'];
		$nowdate = date("Y-m-d",time());
		$nowyear = '0000-00-00';
		if($json==1){
			$Bug = M('Bug_table');
			$result = M();
			$get_sort = $this->_get('sort');
			$get_order = $this->_get('order');
			$sort = isset($get_sort) ? strval($get_sort) : 'addtime';  
			$sort = str_replace('_new_','_old_',$sort);   
			$order = isset($get_order) ? strval($get_order) : 'desc';
			
			$Bug_table = C('DB_PREFIX').'bug_table';
			$Bug_baseinfo = C('DB_PREFIX').'bug_baseinfo_table';
			$user = C('DB_PREFIX').'user_table';
			$Linkage = C('DB_PREFIX').'linkage';
						
			$map = array();
			if(cookie('Bug') || cookie('aBug')){
				if(cookie('Bug')){
					$str_map = cookie('Bug');
					$map = unserialize($str_map);
				}else{
					$str_map = cookie('aBug');
					$map = unserialize($str_map);
				}
				unset($str_map);
			}else{
				$map['id'] ='id>0';
				cookie('Bug',serialize($map));
			}
			//dump(unserialize(cookie('aBug')));
			$map = implode($map,' ');
			
			$get_page = $this->_get('page'); 
			$get_rows = $this->_get('rows');
			$page = isset($get_page) ? intval($get_page) : 1;    
			$rows = isset($get_rows) ? intval($get_rows) : $page_row; 
			$now_page = $page-1;
			$offset = $now_page*$rows;
			
			
			
			$arr_flelds = array(
				'id' => 't1.id as id',
				'title' => 't1.title as title',
				'username' => 't2.username as username',
				'type' => 't1.type as type',
				'type2' => 't3.val as t1_new_type',
				'type3' => 't3.sort as t1_old_type',
				'project' => 'if(t1.project<>\'\',t1.project,\'无\') as project',
				'os' => 'if(t1.os<>\'\',t1.os,\'无\') as os',
				'addtime' => 't1.addtime as addtime',
			);
			$fields = implode(',',$arr_flelds);
			unset($arr_flelds);
			
			if(!$view){
				$info = $result->table($Bug_table.' as t1')->field('SQL_CALC_FOUND_ROWS '.$fields)->join(' '.$user.' as t2 on t2.id = t1.user_id')->join(' '.$Linkage.' as t3 on t3.id = t1.type')->having($map)->order($sort.' '.$order)->limit($offset,$rows)->select();
				$count = $result->query('SELECT FOUND_ROWS() as total');
				$count = $count[0]['total'];
			}else{		
				$info = $result->table($Bug_table.' as t1')->field($fields)->join(' '.$user.' as t2 on t2.id = t1.user_id')->join(' '.$Linkage.' as t3 on t3.id = t1.type')->having($map)->order($sort.' '.$order)->select();
				$count = count($info);				
			}
			//dump($info);exit;
			$new_info = array();
			$items = array();
			$new_info['total'] = $count;
			if($method=='total'){
				echo  json_encode($new_info); exit;
			}
			//$items = array_sort($items,$sort,$mode='nokeep',$type=$order);
			$arr_type = $App->getJson('wentileixing','Linkage/','arr');
			foreach($info as $t){
				$t['type'] = $arr_type[$t['type']];
				$items[] = $t;
			}
			
			$new_info['rows'] = $items;
			//$new_info['footer'] = '';
			//dump($new_info);
			echo json_encode($new_info);
			
			unset($new_info,$info,$comy,$order,$sort,$count,$items,$fields,$result,$arr_status);
		}else{
			$tinfo = $App->getJson('wentileixing','/Linkage');
			$this->assign('tinfo',$tinfo);
			$this->assign('page_row',$page_row);
			$this->assign('nowdate',$nowdate);
			$this->assign('nowyear',$nowyear);
			$this->display();
			unset($Public);
		}
    }
	
	/**
		* 新增与更新数据
		*@param $act add为新增、edit为编辑
		*@param $go  为1时，获取post
		*@param $id  传人数据id
		*@examlpe 
	*/
	public function add($act=NULL,$go=false,$id=NULL){
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
			
		//main
		$Bug = D('Bug_table');
		$userid = $_SESSION['login']['se_id'];
		$username = $_SESSION['login']['se_user'];
		if($go==false){
			$this->assign('uniqid',uniqid());
			if($act=='add'){
				$this->assign('act','add');
				$this->display();
			}else{
				if(!is_int((int)$id)){
					$id = NULL;
					$this->show('无法获取ID');
				}else{
					$map['id'] = array('eq',$id);
					$info = $Bug->relation(true)->where($map)->find();
					$this->assign('constr',$constr);
					$constr = '';
					$this->assign('id',$id);
					$this->assign('act','edit');
					$this->assign('info',$info);
					$this->display();
					unset($info,$uinfo,$map);
				}
			}	
		}else{
			$data = $Bug->create();
			$content = $_POST['content'];
			$fulltext = strip_tags($content);
			$fulltext = preg_replace("/[\n\r\t\v]/iu","",$fulltext);
			$fulltext = pinyin($fulltext,' ');
			$fulltext = preg_replace("/\s+/u"," ",$fulltext);
			$fulltext = trim($fulltext);
			$solution = $_POST['solution'];
			$data['baseinfo'] = array(
				'content'=>$content,
				'solution'=>$solution,
			);
			$data['fulltext'] = array(
				'content_index'=>$fulltext,
			);
			$ischg = 0;
			if($up->upload()){
				$info = $up->getUploadFileInfo();
				$data['files'] = $info[0]['savename'];
				$ischg = 1;
			}else{
				$errorNo = $up->getErrorNo();
				if($errorNo!=2){
					echo $info = $up->getErrorMsg();
					exit;
				}
			}
			if($act=='add'){
				$Public = A('Index','Public');
				$role = $Public->check('Bug',array('c'));
				if($role<0){
					echo $role; exit;
				}
				$data['user_id'] = $userid;
				$data['addtime'] = date("Y-m-d H:i:s",time());
				$add = $Bug->relation(true)->add($data);
				if($add>0){
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
				$role = $Public->check('Bug',array('u'));
				if($role<0){
					echo $role; exit;
				}
				if(!is_int((int)$id)){
					echo 0;
				}else{
					if($role!='all' && !in_array('a',$role) ){
						$user_id = $Bug->where('id='.$id)->getField('user_id');
						if($userid!=$user_id){
							echo 2; exit;
						}
					}
					
					if($ischg==1){
						$oldfile = I('oldfile');
						$path = ROOT.'/'.$upload.'/'.$oldfile;
						if($oldfile && file_exists($path)){
							$sys->delFile($path);
						}	
					}
					$map['id'] = array('eq',$id);
					$edit = $Bug->relation(true)->where($map)->save($data);
					unset($map);
					if($edit !== false){
						echo 1;
					}else{
						echo 0;
					}
					unset($data,$Public);
				}
			}
		}
		unset($Bug);
	}
	
	/**
		* 删除数据
		*@examlpe 
	*/
	public function del(){
		import('ORG.Net.FileSystem');
		$sys = new FileSystem();
		$Public = A('Index','Public');
		$role = $Public->check('Bug',array('d'));
		if($role<0){
			echo $role; exit;
		}
		
		//main
		$str_id = I('id');
		$str_id = strval($str_id);
		$str_id = substr($str_id,0,-1);
		$arr_id = explode(',',$str_id);
		$Bug = D('Bug_table');
		$upload = C('TMPL_PARSE_STRING.__UPLOAD__');
		$pass = 0;$fail = 0;
		$uid = $_SESSION['login']['se_id'];
		$arr_ids = $arr_id;
		if($role!='all' && !in_array('a',$role) ){
			foreach($arr_ids as $k=>$id){
				$user_id = $Bug->where('id='.$id)->getField('user_id');
				if($uid!=$user_id){
					echo 2; exit;
				}
			}
		}
		foreach($arr_id as $id){
			$files = $Bug->where('id='.$id)->getField('files');
			$del = $Bug->relation(true)->delete($id);
			if($del){
				$path = ROOT.'/'.$upload.'/'.$files;
				if($files && file_exists($path)){
					$sys->delFile($path);
				}
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
		unset($Bug,$Public);
	}
	
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
			
			cookie('Bug',NULL);
			cookie('aBug',serialize($map));
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
    	cookie('Bug',NULL);
		cookie('aBug',NULL);
		cookie('tBug',NULL);
	}
	
	/**
		* 查看详情主页
		*@param $id  数据id值
		*@examlpe 
	*/
	public function detail($id){
		$Public = A('Index','Public');
		$role = $Public->check('Bug',array('r'));
		
		//main
		$this->assign('id',$id);
		$this->display();
	}
	
	/**
		* 查看详情框架页
		*@param $id  数据id值
		*@examlpe 
	*/
	public function replydetail($id){
		$Public = A('Index','Public');
		
		//main
		$Bug = D('Bug_table');
		$uid = $_SESSION['login']['se_id'];
		$map['id'] = array('eq',$id);
		$info = $Bug->relation(true)->where($map)->find();
		if($role=='all' || in_array('a',$role) ){
			$isadmin = 1;
		}else{
			$isadmin = 0;
		}
		
		//dump($info);
		$this->assign('uniqid',uniqid());
		$this->assign('isadmin',$isadmin);
		$this->assign('uid',$uid);
		$this->assign('id',$id);
		$this->assign('info',$info);
		$this->display();
	}
	
	/**
		* 获取用户名称
		*@param $uid  用户ID
		*@param $act  1时返回数组，NULL时返回字符串
		*@examlpe 
	*/
	public function getUserStr($uid,$act=NULL){
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
	
	/**
		* 工具栏搜索控制
		*@param $act  传入的字段名
		*@param $mode  为like时，模糊搜索
		*@examlpe 
	*/
	public function change($act,$mode=NULL){
		if(cookie('Bug')){
			$str_map = cookie('Bug');
			$map = unserialize($str_map);
		}
		unset($str_map);
		$id = strval(I('val'));
		switch($act){
			case 'type':
				$map['type'] = " and type='".$id."'";
				if(!$id){
					unset($map['type']);
				}
			break;
			
			case 'addtime':
				$arr_date = explode('|',$id);
				$map['addtime'] = " and (addtime between '".$arr_date[0]." 00:00:00' and '".$arr_date[1]." 23:59:59')";
			break;
			
			default:
				if($mode=='like'){
					$map['like'] = " and ".$act." like '%".$id."%'";
				}else{
					$map['like'] = " and ".$act." = '".$id."'";
				}
			break;
		}
		cookie('Bug',serialize($map));
	}
	
	/**
		* 附件下载
		*@param $filename  文件路径
		*@examlpe 
	*/
	public function down($id){
		load("@.download");
		
		//main
		$Bug = M('Bug_table');
		$id = intval($id);
		$filename = $Bug->where('id='.$id)->getField('files');
		$upload = C('TMPL_PARSE_STRING.__UPLOAD__');
		$path = ROOT.'/'.$upload.'/'.$filename;
		if($filename){
			download($path,$filename);
		}
	}
	
	/**
		* 新增回复
		*@param $id  数据id值
		*@examlpe 
	*/
	public function reply($id){
		$Public = A('Index','Public');
		$role = $Public->check('Bug',array('c'));
		if($role<0){
			echo $role; exit;
		}
		
		//main
		$bug_id =  intval($id);
		$description = addcslashes($_POST['description'],"'");
		$reply = M('Bug_reply_table');
		$userid = $_SESSION['login']['se_id'];
		$username = $_SESSION['login']['se_user'];
		$data = array(
			'bug_id'=>$bug_id,
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
		* 删除回复
		*@param $id  数据id值
		*@examlpe 
	*/
	public function delreply(){
		$Public = A('Index','Public');
		$role = $Public->check('Bug',array('d'));
		if($role<0){
			echo $role; exit;
		}
		
		//main
		$id = intval(I('val'));
		$reply = M('Bug_reply_table');
		
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
}