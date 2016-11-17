<?php
/*
 * @varsion		Dream缺陷跟踪系统 2.0var
 * @package		程序设计深圳市九五时代科技有限公司设计开发
 * @copyright	Copyright (c) 2010 - 2015, d-winner, Inc.
 * @link		http://www.d-winner.com
 */
 
class BusinessAction extends Action {
	/**
		* 出差日志列表
		*@param $json    为NULL输出模板。为1时输出列表数据到前端，格式为Json
		*@param $method  为1时，单独输出记录数
		*@examlpe 
	*/
    public function index($json=NULL,$method=NULL){
		$Public = A('Index','Public');
		$role = $Public->check('Business',array('r'));
		
		//main
		if(!is_int((int)$json)){
			$json = NULL;
		}
		$view = C('DATAGRID_VIEW');
		$page_row = C('PAGE_ROW');
		if($json==1){
			$Business = M('Trip_daily');
			$result = M();
			$get_sort = $this->_get('sort');
			$get_order = $this->_get('order');
			$sort = isset($get_sort) ? strval($get_sort) : 't1_old_status'; 
			$sort = str_replace('_new_','_old_',$sort);   
			$order = isset($get_order) ? strval($get_order) : 'asc';
			
			$Business_table = C('DB_PREFIX').'trip_daily';
			$user = C('DB_PREFIX').'user_table';
						
			$map = array();
			if(cookie('Business') || cookie('aBusiness')){
				if(cookie('Business')){
					$str_map = cookie('Business');
					$map = unserialize($str_map);
				}else{
					$str_map = cookie('aBusiness');
					$map = unserialize($str_map);
				}
				unset($str_map);
			}else{
				$map['daily_date'] ='TO_DAYS(NOW()) - TO_DAYS(DATE_FORMAT(daily_date,\'%Y-%m-%d\')) <= 30';
				cookie('Business',serialize($map));
			}
			//dump(unserialize(cookie('Business')));
			$map = implode($map,' ');
			
			$get_page = $this->_get('page'); 
			$get_rows = $this->_get('rows');
			$page = isset($get_page) ? intval($get_page) : 1;    
			$rows = isset($get_rows) ? intval($get_rows) : $page_row; 
			$now_page = $page-1;
			$offset = $now_page*$rows;
			
			$sql = $result->table($user.' as tt1')->field('GROUP_CONCAT(tt1.username)')->where('tt1.id in (t1.user_id)')->select(false);
			
			$arr_flelds = array(
				'id' => 't1.id as id',
				'user_id' => 't1.user_id as user_id',
				'status' => 't1.status as t1_old_status',
				'status2' => 'CASE t1.status WHEN 1 THEN \'<div style="background-color: #9F0; width:100%; text-align:center;">正在出差</div>\' WHEN 2 THEN \'<div style="background-color: #fe6c6c; width:100%; text-align:center;">总结出差</div>\' WHEN 3 THEN \'<div style="background-color: #83a6fe; width:100%; text-align:center;">结束出差</div>\' END as t1_new_status',
				'username' => 'concat_ws(\' \','.$sql.') as username',
				'customer' => 'if(t1.customer<>\'\',t1.customer,\'无>\') as customer',
				'daily_date' => 't1.daily_date as t1_old_daily_date',
				'show_date' => 'if(HOUR(t1.daily_date)<14,concat(\'\',DATE_FORMAT(t1.daily_date,\'%Y-%m-%d\'),\' 上午\'),concat(\'\',DATE_FORMAT(t1.daily_date,\'%Y-%m-%d\'),\' 下午\')) as show_date',
				'project' => 't1.project as project',
				'purpose' => 't1.purpose as purpose',
				'day_count' => 't1.day_count as t1_old_day_count',
				'day_count2' => 'CONCAT(t1.day_count,\'天\') as t1_new_day_count',
				'result' => 't1.result as result',
				'checker' => 'if(t2.username<>\'\',t2.username,\'<span class="up-font-over">未审核</span>\') as checker',
			);
			$fields = implode(',',$arr_flelds);
			unset($arr_flelds);
			
			if($sort=='daily_date'){
				$new_order = $sort.' '.$order;
			}else{
				$new_order = 'convert('.$sort.' using gbk) '.$order;
			}
			if(!$view){
				$info = $result->table($Business_table.' as t1')->field('SQL_CALC_FOUND_ROWS '.$fields)->having($map)->order($sort.' '.$order)->join(' '.$user.' as t2 on t2.id = t1.checker')->limit($offset,$rows)->select();
				$count = $result->query('SELECT FOUND_ROWS() as total');
				$count = $count[0]['total'];
			}else{
				$info = $result->table($Business_table.' as t1')->field($fields)->having($map)->order($sort.' '.$order)->join(' '.$user.' as t2 on t2.id = t1.checker')->select();
				$count = count($info);
				
			}
			//dump($info);exit;
			$new_info = array();
			$items = array();
			$new_info['total'] = $count;
			if($method=='total'){
				echo  json_encode($new_info); exit;
			}
			
			foreach($info as $t){
				if(strstr($t['username'],',')){
					$t['username_one'] = '<span title="'.htmlspecialchars($t['username']).'">'.substr($t['username'],0,strpos($t['username'],',')).'...</span>';
				}else{
					$t['username_one'] = $t['username'];
				}
				
				if((strlen(strip_tags($t['purpose'])) + mb_strlen(strip_tags($t['purpose']),'UTF8'))/2>35){
					 $d_len = '...';
				}else{
					 $d_len = '';
				}
				
				$t['purpose'] = htmlspecialchars(cSubstr(strip_tags($t['purpose']),0,35).$d_len);
				
				if((strlen(strip_tags($t['result'])) + mb_strlen(strip_tags($t['result']),'UTF8'))/2>35){
					 $d_len = '...';
				}else{
					 $d_len = '';
				}
				if(strip_tags($t['result'])==''){
					$t['result'] = '暂无';
				}else{
					$t['result'] = htmlspecialchars(cSubstr(strip_tags($t['result']),0,35).$d_len);
				}
				
				$items[] = $t;
			}
			$new_info['rows'] = $items;
			echo json_encode($new_info);
		}else{
			$this->assign('page_row',$page_row);
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
			
		//main
		$Business = D('Trip_daily');
		$userid = $_SESSION['login']['se_id'];
		$username = $_SESSION['login']['se_user'];
		if($go==false){
			$this->assign('uniqid',uniqid());
			if($act=='add'){
				$constr .= '<option id="0" cid="0" value="'.$userid.'">'.$username.'</option>';
				$this->assign('constr',$constr);
				$this->assign('act','add');
				$this->display();
			}else{
				if(!is_int((int)$id)){
					$id = NULL;
					$this->show('无法获取ID');
				}else{
					$map['id'] = array('eq',$id);
					$info = $Business->relation(true)->where($map)->find();
					$info['daily_date'] = date("Y-m-d",strtotime($info['daily_date']));
					
					$arr_user = $this->getUserStr($info['user_id'],1);
					$constr = '';
					foreach($arr_user as $t){
						$constr .= '<option id="0" cid="0" value="'.$t['id'].'">'.$t['username'].'</option>';
					}
					
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
			$data = $Business->create();
			$arr_user = I('touser');
			$days = I('days');
			$over = I('over');
			if($days=='9'){
				$data['daily_date'] = $data['daily_date'].' 09:00:00';
			}else{
				$data['daily_date'] = $data['daily_date'].' 14:00:00';
			}
			$data['user_id'] = implode(',',$arr_user);
			if($over==1){
				$data['status'] = 2;
				if(!$data['day_count']){
					$data['day_count'] = 0;
				}
			}else{
				$data['status'] = 1;
				unset($data['day_count'],$data['result']);
			}
			
			if($act=='add'){
				$Public = A('Index','Public');
				$role = $Public->check('Business',array('c'));
				if($role<0){
					echo $role; exit;
				}
				$data['creator'] = $userid;
				$add = $Business->add($data);
				if($add>0){
					echo 1;
				}else{
					echo 0;
				}
				unset($data,$Public);
			}elseif($act=='edit'){
				$Public = A('Index','Public');
				$role = $Public->check('Business',array('u'));
				if($role<0){
					echo $role; exit;
				}
				
				if(!is_int((int)$id)){
					echo 0;
				}else{
					if($role!='all' && !in_array('a',$role) ){
						if(!in_array($userid,$arr_user)){
							echo 2; exit;
						}
					}
					
					$map['id'] = array('eq',$id);
					$status = $Business->where($map)->getField('status');
					if($status==3){
						echo 3; exit;
					}
					
					if($over==1){
						$data['status'] = 2;
						if(!$data['day_count']){
							$data['day_count'] = 0;
						}
					}else{
						$data['status'] = 1;
						unset($data['day_count'],$data['result']);
					}
					$edit = $Business->where($map)->save($data);
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
		unset($Business);
	}
	
	/**
		* 删除数据
		*@examlpe 
	*/
	public function del(){
		$Public = A('Index','Public');
		$role = $Public->check('Business',array('d'));
		if($role<0){
			echo $role; exit;
		}
		
		//main
		$str_id = I('id');
		$str_id = strval($str_id);
		$str_id = substr($str_id,0,-1);
		$arr_id = explode(',',$str_id);
		$Business = M('Trip_daily');
		$pass = 0;$fail = 0;
		$uid = $_SESSION['login']['se_id'];
		$arr_ids = $arr_id;
		if($role!='all' && !in_array('a',$role) ){
			foreach($arr_ids as $k=>$id){
				$creator = $Business->field('creator')->where('id='.$id)->find();
				$arr_creator = explode(',',$creator);
				if(!in_array($uid,$arr_creator)){
					echo 2; exit;
				}
			}
		}
		foreach($arr_id as $id){
			$del = $Business->delete($id);
			if($del){
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
		unset($Business,$Public);
	}
	
	/**
		* 右键快速搜索
		*@param $field  传入搜索字段
		*@param $json 为1时，输出json数据
		*@param $act   为1时，获取post
		*@examlpe 
	*/
	/*public function search($field=NULL,$json=NULL,$act=NULL){	
		//main
		$field = strval($field);
		$result = M();
		$Business_table = C('DB_PREFIX').'trip_daily';
		$user = C('DB_PREFIX').'user_table';
		$arr_status = array(
			1=>'正在出差',
			2=>'总结出差',
			3=>'结束出差',
		);
		
		if($act==1){
			$keyfield = I('field');
			$mod = I('mod');
			$keyword = I('keybusiness');
			
			if($keyfield=='status'){
				$keyword = array_search($keyword,$arr_status);
			}
			
			if($mod=='like' || $mod=='notlike'){
				$keyword = '%'.$keyword.'%';
			}	
			
			$map = array();
			if(cookie('Business')){
				$str_map = cookie('Business');
				$map = unserialize($str_map);		
			}
			$mod = htmlspecialchars_decode($mod);
			$map[$keyfield] = " and ".$keyfield." ".$mod." '".$keyword."'";	
			if($keyword=='clearThisValue'){
				unset($map[$keyfield]);
			}
			cookie('aBusiness',NULL);
			cookie('Business',serialize($map));
			unset($str_map,$map,$keyfield,$keyword,$mod,$table);
			echo 1;
		}else{
			if($json==1){
				$map = array();
				if(cookie('Business') || cookie('aBusiness')){
					if(cookie('Business')){
						$str_map = cookie('Business');
						$map = unserialize($str_map);
					}else{
						$str_map = cookie('aBusiness');
						$map = unserialize($str_map);
					}
					unset($str_map);
				}else{
					$map['daily_date'] ='TO_DAYS(NOW()) - TO_DAYS(DATE_FORMAT(daily_date,\'%Y-%m-%d\')) <= 30';
				}
				
				$map[$field] = ' and '.$field.'<>\'\'';
				$map = implode($map,' ');
				
				$arr_flelds = array(
					'id' => 't1.id as id',
					'user_id' => 't1.user_id as user_id',
					'status' => 'ELT(t1.status,\'正在出差\',\'总结出差\',\'结束出差\') as status',
					'customer' => 'if(t1.customer<>\'\',t1.customer,\'无>\') as customer',
					'daily_date' => 't1.daily_date as daily_date',
					'show_date' => 'if(HOUR(t1.daily_date)<14,concat(\'\',DATE_FORMAT(t1.daily_date,\'%Y-%m-%d\'),\' 上午\'),concat(\'\',DATE_FORMAT(t1.daily_date,\'%Y-%m-%d\'),\' 下午\')) as show_date',
					'project' => 't1.project as project',
					'day_count' => 't1.day_count as day_count',
					'checker' => 'if(t2.username<>\'\',t2.username,\'未审核\') as checker',
				);
				$fields = implode(',',$arr_flelds);
				unset($arr_flelds);
				
				$info_sql = $result->table($Business_table.' as t1')->field($fields)->join(' '.$user.' as t2 on t2.id = t1.checker')->select(false);
				$info = $result->query('select '.$field.' as id,'.$field.' as text from '.$info_sql.' as rows where '.$map.' group by text order by convert('.$field.' using gbk) asc');
				
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
			
			cookie('Business',NULL);
			cookie('aBusiness',serialize($map));
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
    	cookie('Business',NULL);
		cookie('aBusiness',NULL);
		cookie('tBusiness',NULL);
	}
	
	/**
		* 查看详情
		*@param $id  数据id值
		*@examlpe 
	*/
	public function detail($id){
		$Public = A('Index','Public');
		$role = $Public->check('Business',array('r'));
		$Business = D('Trip_daily');
		$arr_status = array(
			1=>'<div style="background-color: #9F0; width:100%; text-align:center;">正在出差</div>',
			2=>'<div style="background-color: #fe6c6c; width:100%; text-align:center;">总结出差</di',
			3=>'<div style="background-color: #83a6fe; width:100%; text-align:center;">结束出差</div>',
		);
		
		$map['id'] = array('eq',$id);
		$this->assign('uniqid',uniqid());
		$info = $Business->relation(true)->where($map)->find();
		$daily_time = strtotime($info['daily_date']);
		$hour = date("H",$daily_time);
		if($hour<14){
			$info['daily_date'] = date("Y-m-d",$daily_time).' 上午';
		}else{
			$info['daily_date'] = date("Y-m-d",$daily_time).' 下午';
		}
		$info['day_count'] = $info['day_count'].'天';
		$str_user = $this->getUserStr($info['user_id']);
		$this->assign('id',$id);
		$this->assign('role',$role);
		$this->assign('info',$info);
		$this->assign('arr_status',$arr_status);
		$this->assign('str_user',$str_user);
		$this->display();
		unset($Public,$role,$Business,$arr_status);
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
		*@param $id  传入的的值
		*@examlpe 
	*/
	public function change($act,$mode=NULL){
		if(cookie('Business')){
			$str_map = cookie('Business');
			$map = unserialize($str_map);
		}
		unset($str_map);
		$id = strval(I('val'));
		switch($act){
			case 'status':
				if(!$id){
					unset($map['status']);
				}else{
					$map['status'] = ' and t1_old_status='.$id;
				}
			break;
			
			case 'daily_date':
				if(!$id){
					$map['daily_date'] ='daily_date>0';
				}elseif($id=='ny'){
					$map['daily_date'] ='YEAR(daily_date)=YEAR(NOW())';
				}elseif($id=='ly'){
					$map['daily_date'] ='YEAR(daily_date)=YEAR(NOW())-1';
				}else{
					$map['daily_date'] ='TO_DAYS(NOW()) - TO_DAYS(DATE_FORMAT(daily_date,\'%Y-%m-%d\')) <= '.$id;
				}
			break;
			
			default:
				if($mode=='like'){
					$map['like'] = "and ".$act." like '%".$id."%'";
				}else{
					$map['like'] = "and ".$act." = '".$id."'";
				}
			break;
		}
		
		cookie('Business',serialize($map));
	}
	
	/**
		* 审核数据
		*@param $act  为1时审核，反之为反审核
		*@param $id  数据id值
		*@examlpe 
	*/
	public function ck($act=0,$id){
		$Public = A('Index','Public');
		$role = $Public->check('Business',array('ck'));
		if($role<0){
			echo $role; exit;
		}
		
		//main
		$userid = $_SESSION['login']['se_id'];
		$Business = D('Trip_daily');
		if($act==1){
			$data = array(
				'status'=>2,
				'checker'=>''
			);
			$edit = $Business->where('id='.$id)->save($data);
		}else{
			$data = array(
				'status'=>3,
				'checker'=>$userid
			);
			$edit = $Business->where('id='.$id)->save($data);
		}
		
		if($edit !== false){
			echo 1;
		}else{
			echo 0;
		}
		unset($Public,$role,$Business,$data);
	}
	
	/**
		* 获取所有项目列表数据
		*@param $act  为json返回json数据
		*@param $mode  为1返回带所有机型
		*@param $val  
		*@examlpe 
	*/
	public function getProject($act=NULL,$mode=NULL,$val='id'){
		$Public = A('Index','Public');
		$role = $Public->check('Project',array('r'));
		
		//main
		$cid = $_SESSION['login']['se_comyID'];
		$project = M('Project_table');
		$comy = M('User_company_table');
		$st = $comy->where('id='.$cid)->getField('type');
		if($role!='all'){
			if($st==1){
				$map['client_id'] = array('eq',$cid);
				$map['view_state'] = array('eq',3);
			}
		}else{
			$map = array();
		}
		$info = $project->field($val.' as id, name as text')->order('convert(text using gbk) asc')->where($map)->select();
		if($mode==1){
			array_unshift($info,array(
				'id'=>0,
				'text'=>'所有机型'
			));
		}
		if($act=='json'){
			echo json_encode($info);
		}else{
			return $info;
		}
		unset($project,$info,$map);
	}
}