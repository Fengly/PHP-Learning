<?php
/*
 * @varsion		Dream缺陷跟踪系统 2.0var
 * @package		程序设计深圳市九五时代科技有限公司设计开发
 * @copyright	Copyright (c) 2010 - 2015, d-winner, Inc.
 * @link		http://www.d-winner.com
 */
 
class ProjectAction extends Action {
	/**
		* 项目列表
		*@param $json    为NULL输出模板。为1时输出列表数据到前端，格式为Json
		*@param $method  为1时，单独输出记录数
		*@examlpe 
	*/
    public function index($json=NULL,$method=NULL){
		$Public = A('Index','Public');
		$App = A('App','Public');
		$role = $Public->check('Project',array('r'));
		
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
		$access = $Public->GS('User_group_table',$gid);
		$Project = M('Project_table');
		if($json==1){
			$result = M();
			$get_sort = $this->_get('sort');
			$get_order = $this->_get('order');
			$sort = isset($get_sort) ? strval($get_sort) : 't1_old_status'; 
			$sort = str_replace('_new_','_old_',$sort);
			$order = isset($get_order) ? strval($get_order) : 'asc';
			cookie('sort_Project',$sort);
			cookie('order_Project',$order);
			
			$Project_table = C('DB_PREFIX').'project_table';
			$Project_concern = C('DB_PREFIX').'project_concern_table';
			$Project_baseinfo = C('DB_PREFIX').'project_baseinfo_table';
			$Comy_table = C('DB_PREFIX').'user_company_table';
			$Linkage = C('DB_PREFIX').'linkage';
						
			$map = array();
			if(cookie('Project') || cookie('aProject')){
				if(cookie('Project')){
					$str_map = cookie('Project');
					$map = unserialize($str_map);
				}else{
					$str_map = cookie('aProject');
					$map = unserialize($str_map);
				}
				unset($str_map);
			}else{
				$map['id'] ="id>0";
				cookie('Project',serialize($map));
			}
			
			$protype = $comy->where('id='.$comyid)->getField('type');
			if($protype){
				$map['client_id'] = ' and client_id='.$comyid.' and view_state=15';
			}
			if($role=='all' || in_array('a',$role)){
				unset($map['order_where']);
			}else{
				$sql = $result->table($Project_concern.' as tt1')->field('GROUP_CONCAT(tt1.pro_id ORDER BY tt1.pro_id) as pid')->where('tt1.user_id='.$userid)->find();
				$map['order_where'] = " and (app_handler='".$username."' or pro_creator='".$username."' or id in(".$sql['pid']."))";
			}
			
			//dump(unserialize(cookie('Project')));
			$map = implode($map,' ');
			
			$get_page = $this->_get('page'); 
			$get_rows = $this->_get('rows');
			$page = isset($get_page) ? intval($get_page) : 1;    
			$rows = isset($get_rows) ? intval($get_rows) : $page_row; 
			$now_page = $page-1;
			$offset = $now_page*$rows;
			
			$arr_flelds = array(
				'id' => 't1.id as id',
				'name' => 't1.name as name',
				'status' => 't1.status as status',
				'status2' => 't3.val as t1_new_status',
				'status3' => 't3.sort as t1_old_status',
				'view_state' => 't1.view_state as view_state',
				'itemtype' => 't1.itemtype as itemtype',
				'itemtype2' => 't4.val as t1_new_itemtype',
				'itemtype3' => 't4.sort as t1_old_itemtype',
				'client_id' => 't1.client_id as client_id',
				'app_handler' => 'case t2.app_handler when \'\' then \'无\' else t2.app_handler end as app_handler',
				'pro_creator' => 'case t2.pro_creator when \'\' then \'无\' else t2.pro_creator end as pro_creator',
				'pro_creatdate' => 'case t2.pro_creatdate when \'\' then \'无\' else t2.pro_creatdate end as pro_creatdate',
				'pro_progress' => 'case t2.pro_progress when \'\' then \'暂无\' else t2.pro_progress end as pro_progress',
				'description' => 'case t2.description when \'\' then \'无\' else t2.description end as description',
			);
			$fields = implode(',',$arr_flelds);
			if(!$view){
				$info = $result->table($Project_table.' as t1')->field('SQL_CALC_FOUND_ROWS '.$fields)->join(' '.$Project_baseinfo.' as t2 on t2.pro_id = t1.id')->join(' '.$Linkage.' as t3 on t3.id = t1.status')->join(' '.$Linkage.' as t4 on t4.id = t1.itemtype')->having($map)->order($sort.' '.$order)->limit($offset,$rows)->select();
				$count = $result->query('SELECT FOUND_ROWS() as total');
				$count = $count[0]['total'];
			}else{
				$info = $result->table($Project_table.' as t1')->field('SQL_CALC_FOUND_ROWS '.$fields)->join(' '.$Project_baseinfo.' as t2 on t2.pro_id = t1.id')->join(' '.$Linkage.' as t3 on t3.id = t1.status')->join(' '.$Linkage.' as t4 on t4.id = t1.itemtype')->having($map)->order($sort.' '.$order)->select();
				$count = count($info);
			}
			//dump($info);exit;
			$new_info = array();
			$items = array();
			
			//$items = array_sort($items,$sort,$mode='nokeep',$type=$order);
			foreach($info as $t){
				if((strlen(strip_tags($t['description'])) + mb_strlen(strip_tags($t['description']),'UTF8'))/2>45){
					 $d_len = '...';
				}else{
					 $d_len = '';
				}
				$t['description'] = '<span title="'.htmlspecialchars($t['description']).'">'.htmlspecialchars(cSubstr(strip_tags($t['description']),0,45).$d_len).'</span>';
				$t['pro_progress'] = '<span title="'.htmlspecialchars($t['pro_progress']).'">'.htmlspecialchars($t['pro_progress']).'</span>';
				$items[] = $t;
			}
			$new_info['total'] = $count;	
			if($method=='total'){
				echo  json_encode($new_info); exit;
			}
			$new_info['rows'] = $items;
			$new_info['footer'] = '';
			//dump($new_info);
			echo json_encode($new_info);
			
			unset($new_info,$info,$comy,$order,$sort,$count,$items,$fields,$result,$arr_status,$arr_plan);
		}else{
			$iinfo = $App->getJson('xiangmuleixing','Linkage/');
			$sinfo = $App->getJson('xiangmuzhuangtai','Linkage/');
			$this->assign('page_row',$page_row);
			$this->assign('iinfo',$iinfo);
			$this->assign('sinfo',$sinfo);
			$this->assign('cid',$cid);
			$this->display();
			unset($Public,$comy,$cinfo,$Project,$sinfo,$pinfo,$cinfo);
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
		$Public = A('Index','Public');
		$Log = A('Log','Public');
		$Sms = A('Sms','Public');
			
		//main
		$Project = D('Project_table');
		$result = M();
		$Project_table = C('DB_PREFIX').'project_table';
		$Project_info = C('DB_PREFIX').'project_baseinfo_table';
		$username = $_SESSION['login']['se_user'];
		$userid = $_SESSION['login']['se_id'];
		if($go==false){
			$this->assign('uniqid',uniqid());
			$this->assign('username',$username);
			if($act=='add'){
				$role = $Public->check('Project',array('c'));
				if($userid==1){
					$str = '';
				}else{
					$email = $Public->GS('User_table',$userid,'email');
					$str = '<option id="0" cid="0" value="'.$userid.'">'.$username.' ： '.$email.'</option>';
				}
				$this->assign('role',$role);
				$this->assign('str',$str);
				$this->assign('act','add');
				$this->display();
			}else{
				$role = $Public->check('Project',array('u'));
				if(!is_int((int)$id)){
					$id = NULL;
					$this->show('无法获取ID');
				}else{
					$map['id'] = array('eq',$id);
					$info = $Project->relation(array('pro_info','concern_user'))->where($map)->find();
					$str = '';
					foreach($info['concern_user'] as $t){
						$str .= '<option id="0" cid="0" value="'.$t['id'].'">'.$t['username'].' ： '.$t['email'].'</option>';
					}
					$this->assign('role',$role);
					$this->assign('str',$str);
					$str = '';
					$this->assign('id',$id);
					$this->assign('act','edit');
					$this->assign('info',$info);
					$this->display();
					unset($info,$oinfo,$map);
				}
			}	
		}else{
			$pro_info = M('Project_baseinfo_table');
			$pro_concern = M('Project_concern_table');
			$user = C('DB_PREFIX').'user_table';
			$concern = C('DB_PREFIX').'project_concern_table';
			$result = M();
			
			$data = $Project->create();
			$data_info = $pro_info->create();
			$data_concern = I('touser');
			$data['pro_info'] = $data_info;
			//dump($data_concern);exit;
			if($act=='add'){
				$role = $Public->check('Project',array('c'));
				if($role<0){
					echo $role; exit;
				}
				$data['pro_info']['pro_creator'] = $username;
				//dump($data);exit;
				$add = $Project->relation('pro_info')->add($data);
				if($add>0){
					foreach($data_concern as $t){
						$cdata = array(
							'pro_id'=>$add,
							'user_id'=>$t
						);
						$pro_concern->add($cdata);
					}
					
					$linkage = M('Linkage');
					$statusname = $linkage->where('id='.$data['status'])->getField('text');
					$descrtption = $username.'创建了项目：“'.$data['name'].'”，状态为：'.$statusname;
					$log_data = array(
						'pro_id'=>$add,
						'descrtption'=>$descrtption,
					);
					$Log->actLog($log_data);
					
					if($data['pro_info']['app_handler']){
						$sms_data = array(
							'title'=>'项目：'.$data['name'].' 负责人任命通知',
							'description'=>$username.'任命了'.$data['pro_info']['app_handler'].'为项目：“<a href="javascript:showTab(\'项目-'.$data['name'].'\','.$add.');">'.$data['name'].'</a>” 的项目负责人，点击项目名称查看更多详情。',
						);
						$Sms->sendsms($sms_data,$cdata);
					}
					
					$sms_data = array(
						'title'=>'项目：'.$data['name'].' 创建通知',
						'description'=>$username.'创建了项目：“<a href="javascript:showTab(\'项目-'.$data['name'].'\','.$add.');">'.$data['name'].'</a>”，点击项目名称查看更多详情。',
					);
					$Sms->sendsms($sms_data,$cdata);
					
					echo 1;
				}else{
					echo 0;
				}
				unset($data);
			}elseif($act=='edit'){
				$role = $Public->check('Project',array('u'));
				if($role<0){
					echo $role; exit;
				}
				
				if(!is_int((int)$id)){
					echo 0;
				}else{
					$map['id'] = array('eq',$id);
					$app_handler = $pro_info->where('pro_id'.$id)->getField('app_handler');
					$edit = $Project->relation(array('pro_info'))->where($map)->save($data);
					unset($map);
					if($edit !== false){
						$has_concern = $pro_concern->field('user_id')->join(' join '.$user.' on '.$user.'.id='.$concern.'.user_id')->where('pro_id='.$id)->select();
						$con = array();
						foreach($has_concern as $t){
							$con[] = $t['user_id'];
						}
						$has = array_diff($con,$data_concern);
						//dump($data_concern);exit;
						if($data_concern){
							foreach($has as $t){
								$pro_concern->where('pro_id='.$id.' and user_id='.$t)->delete();
							}
							foreach($data_concern as $t){
								$isadd = $pro_concern->where('user_id='.$t.' and pro_id='.$id)->count();
								$odata = array(
									'pro_id'=>$id,
									'user_id'=>$t
								);
								if(!$isadd){
									$cdata = array(
										'pro_id'=>$id,
										'user_id'=>$t
									);
									$pro_concern->add($cdata);
								}
							}
						}else{
							$pro_concern->where('pro_id='.$id)->delete();
						}
						
						
						$linkage = M('Linkage');
						$statusname = $linkage->where('id='.$data['status'])->getField('text');
						
						if($data['pro_info']['app_handler'] && $data['pro_info']['app_handler']!=$app_handler){
							$descrtption = $username.'更新了项目：“'.$data['name'].'”，并重新任命了'.$data['pro_info']['app_handler'].'为项目负责人，状态为：'.$statusname;
							$log_data = array(
								'pro_id'=>$id,
								'descrtption'=>$descrtption,
							);
							$Log->actLog($log_data);
							
							
							$sms_data = array(
								'title'=>'项目：'.$data['name'].' 重新任命负责人通知',
								'description'=>$username.'重新任命了'.$data['pro_info']['app_handler'].'为项目：“<a href="javascript:showTab(\'项目-'.$data['name'].'\','.$add.');">'.$data['name'].'</a>” 的项目负责人，点击项目名称查看更多详情。',
							);
							$Sms->sendsms($sms_data,$odata);
						}else{
							$descrtption = $username.'更新了项目：“'.$data['name'].'”，状态为：'.$statusname;
							$log_data = array(
								'pro_id'=>$id,
								'descrtption'=>$descrtption,
							);
							$Log->actLog($log_data);
						}
						
						$sms_data = array(
							'title'=>'项目：'.$data['name'].' 更新通知',
							'description'=>$username.'更新了项目：“<a href="javascript:showTab(\'项目-'.$data['name'].'\','.$id.');">'.$data['name'].'</a>”，点击项目名称查看更多详情。',
						);
						$Sms->sendsms($sms_data,$odata);
						
						echo 1;
					}else{
						echo 0;
					}
					unset($data);
				}
			}
		}
		unset($Project,$concern,$pro_concern,$pro_info);
	}
	
	/**
		* 删除数据
		*@examlpe 
	*/
	public function del(){
		$Public = A('Index','Public');
		$Log = A('Log','Public');
		$role = $Public->check('Project',array('d'));
		if($role<0){
			echo $role; exit;
		}
		
		//main
		$username = $_SESSION['login']['se_user'];
		$str_id = I('id');
		$str_id = strval($str_id);
		$str_id = substr($str_id,0,-1);
		$arr_id = explode(',',$str_id);
		$Project = D('Project_table');
		$pass = 0;$fail = 0;
		foreach($arr_id as $id){
			$proname = $Project->where('id='.$id)->getField('name');
			$del = $Project->relation(array('pro_info','pro_concern'))->delete($id);
			if($del){
				$descrtption = $username.'删除了项目：“'.$proname;
				$log_data = array(
					'pro_id'=>$id,
					'descrtption'=>$descrtption,
				);
				$Log->actLog($log_data);
				
				$pass++;
			}else{
				$fail++;
			}
		}
		unset($str_id,$arr_id);
		if($pass==0){
			echo 0;
		}else{
			echo 1;
		}
		$pass = 0; $fail = 0;
		unset($Project,$Public);
	}
	
	/**
		* 右键快速搜索
		*@param $field  传入搜索字段
		*@param $json 为1时，输出json数据
		*@param $act   为1时，获取post
		*@examlpe 
	*/
	/*public function search($field=NULL,$json=NULL,$act=NULL){	
		$App = A('App','Public');
	
		//main
		$field = strval($field);
		$result = M();
		$Project_table = C('DB_PREFIX').'project_table';
		$Project_info = C('DB_PREFIX').'project_baseinfo_table';
		$Comy_table = C('DB_PREFIX').'user_company_table';
		if($act==1){
			$arr_status = $App->getJson('xiangmuzhuangtai','Linkage/','arr');
			$keyfield = I('field');
			$keyfields = $keyfield;
			$mod = I('mod');
			$keyword = I('keyproject');
			$keywords = $keyword;
			$ismultiple = I('ismultiple');
			$mod = htmlspecialchars_decode($mod);
			if($keyfield=='status'){
				//$keyword = array_search($keyword,$arr_status);
			}else{
				if($mod=='like' || $mod=='notlike'){
					$keyword = '%'.$keyword.'%';
				}
			}	
			
			$map = array();
			if(cookie('Project')){
				$str_map = cookie('Project');
				$map = unserialize($str_map);		
			}
			if($ismultiple){
				$keywords = htmlspecialchars_decode($keywords);
				$arr_word = explode(',',$keywords);
				$ks = array();
				if($keyfields=='status'){
					foreach($arr_word as $t){
						$t = array_search($t,$arr_status);
						if($mod=='like' || $mod=='notlike'){
							$ks[] = $keyfield." ".$mod." '%".$t."%'";
						}else{
							$ks[] = $keyfield." ".$mod." '".$t."'";
						}
					}
				}else{
					foreach($arr_word as $t){
						if($mod=='like' || $mod=='notlike'){
							$ks[] = $keyfield." ".$mod." '%".$t."%'";
						}else{
							$ks[] = $keyfield." ".$mod." '".$t."'";
						}
					}
				}
				$map[$keyfield] = " and (".implode(' or ',$ks).")";
				unset($arr_word,$ks);
			}else{
				$map[$keyfield] = " and ".$keyfield." ".$mod." '".$keyword."'";
			}	
			if($keyword=='clearThisValue'){
				unset($map[$keyfield]);
			}
			cookie('aProject',NULL);
			cookie('Project',serialize($map));
			unset($str_map,$map,$keyfield,$keyword,$mod,$table);
			echo 1;
		}else{
			if($json==1){
				$arr_status = $App->getJson('xiangmuzhuangtai','Linkage/','arr',NULL,1);
				$arr_item = $App->getJson('xiangmuleixing','Linkage/','arr',NULL,1);
				$map = array();
				if(cookie('Project') || cookie('aProject')){
					if(cookie('Project')){
						$str_map = cookie('Project');
						$map = unserialize($str_map);
					}else{
						$str_map = cookie('aProject');
						$map = unserialize($str_map);
					}
					unset($str_map);
				}else{
					$map['id'] = "id>0";
				}
				
				$map[$field] = ' and '.$field.'<>\'\'';
				$map = implode($map,' ');
					
				$arr_flelds = array(
					'id' => 't1.id as id',
					'name' => 't1.name as name',
					'status' => 't1.status as status',
					'view_state' => 't1.view_state as view_state',
					'itemtype' => 't1.itemtype as itemtype',
					'client_id' => 't1.client_id as client_id',
					'client' => 'case t1.client_id when 0 then \'无\' else t3.name end as client',
					'app_handler' => 'case t2.app_handler when \'\' then \'无\' else t2.app_handler end as app_handler',
					'pro_creator' => 'case t2.pro_creator when \'\' then \'无\' else t2.pro_creator end as pro_creator',
					'pro_creatdate' => 'case t2.pro_creatdate when \'\' then \'无\' else t2.pro_creatdate end as pro_creatdate',
					'pro_progress' => 'case t2.pro_progress when \'\' then \'暂无\' else t2.pro_progress end as pro_progress',
					'description' => 'case t2.description when \'\' then \'无\' else t2.description end as description',
				);
				$fields = implode(',',$arr_flelds);
				unset($arr_flelds,$panel_sql,$size_sql,$control_sql);
				$info_sql = $result->table($Project_table.' as t1')->field($fields)->join(' '.$Project_info.' as t2 on t2.pro_id = t1.id')->join(' '.$Comy_table.' as t3 on t3.id = t1.client_id')->select(false);
				
				if($field=='status'){
					$info = $result->query('select '.$field.' as id,ELT('.$field.','.implode(',',$arr_status).') as text from '.$info_sql.' as rows where '.$map.' group by text order by convert(text using gbk) asc');
				}elseif($field=='itemtype'){
					$info = $result->query('select '.$field.' as id,ELT('.$field.','.implode(',',$arr_item).') as text from '.$info_sql.' as rows where '.$map.' group by text order by convert(text using gbk) asc');
				}else{
					$info = $result->query('select '.$field.' as id,'.$field.' as text from '.$info_sql.' as rows where '.$map.' group by text order by convert('.$field.' using gbk) asc');
					
				}
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
			
			cookie('Project',NULL);
			cookie('aProject',serialize($map));
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
    	cookie('Project',NULL);
		cookie('aProject',NULL);
		cookie('tProject',NULL);
	}
	
	/**
		* 详情主页
		*@param $id  数据id值
		*@examlpe 
	*/
	public function detail($id){
		$Public = A('Index','Public');
		$role = $Public->check('Project',array('r'));
		
		//main
		$id = intval($id);
		$client_id = $_SESSION['login']['se_comyID'];
		$group_id = $_SESSION['login']['se_groupID'];
		
		$this->assign('id',$id);
		$this->display();
	}
	
	/**
		* 项目详情
		*@param $id  数据ID
		*@examlpe 
	*/
	public function detail_info($id){
		$App = A('App','Public');
		
		//main
		$id = intval($id);
		$result = M();
		$Project = D('Project_table');
		$Project_concern = C('DB_PREFIX').'project_concern_table';
		$Project_table = C('DB_PREFIX').'project_table';
		$User_table = C('DB_PREFIX').'user_table';
		$Project_info = C('DB_PREFIX').'project_baseinfo_table';
		
		$map['id'] = array('eq',$id);
		$info = $Project->relation(array('pro_info','concern_user','pro_client','status','itemtype','view_state'))->where($map)->find();
		$cinfo = $result->table($Project_concern.' as t1')->field('GROUP_CONCAT(t2.username) as concern')->join(' join '.$User_table.' as t2 on t2.id=t1.user_id')->where('t1.pro_id='.$id)->find();
		$info['pro_info']['app_handler'] = $info['pro_info']['app_handler']?$info['pro_info']['app_handler']:'无';
		$info['pro_info']['pro_creator'] = $info['pro_info']['pro_creator']?$info['pro_info']['pro_creator']:'无';
		$info['client_name'] = $info['client_name']?$info['client_name']:'无';
		$info['pro_info']['pro_progress'] = $info['pro_info']['pro_progress']?$info['pro_info']['pro_progress']:'暂无';
		$info['pro_info']['description'] = $info['pro_info']['description']?$info['pro_info']['description']:'无';
		$info['concern'] = $cinfo['concern'];
		
		//dump($tinfo);
		$this->assign('info',$info);
		$this->assign('id',$id);
		$this->display();
	}
	
	/**
		* BUG和跟进详情
		*@param $id  数据ID
		*@examlpe 
	*/
	public function bug_info($id){
		$App = A('App','Public');
		
		//main
		$view = C('DATAGRID_VIEW');
		$page_row = C('PAGE_ROW');
		$id = intval($id);
		$tinfo = $App->getJson('wentizhuangtai','/Linkage');
		$this->assign('status',$tinfo);
		$nowdate = date("Y-m-d",time());
		$nowyear = '0000-00-00';
		
		array_unshift($tinfo,array(
			'id'=>-2,
			'text'=>'待解决',
		));
		array_unshift($tinfo,array(
			'id'=>-1,
			'text'=>'未指派',
		));
		
		//dump($tinfo);
		$this->assign('tinfo',$tinfo);
		$this->assign('page_row',$page_row);
		$this->assign('nowdate',$nowdate);
		$this->assign('nowyear',$nowyear);
		$this->assign('app',$App);
		$this->assign('id',$id);
		$this->display();
	}
	
	/**
		* 进度跟进详情
		*@param $id  数据ID
		*@examlpe 
	*/
	public function detail_progress($id){
		//main
		$tabs = explode('|',C('PRO_TABS'));
		$this->assign('tabs',$tabs);
		$this->assign('id',$id);
		$this->display();

	}
	
	/**
		* 删除进度跟进
		*@param $id  数据ID
		*@examlpe 
	*/
	public function delprog($id){
		$Public = A('Index','Public');
		$Log = A('Log','Public');
		$role = $Public->check('Project',array('gd'));
		if($role<0){
			echo $role; exit;
		}
		
		//main
		$username = $_SESSION['login']['se_user'];
		$id = intval($id);
		$progress = D('Project_progress_table');
		$info = $progress->where('id='.$id)->find();
		$del = $progress->relation('comment')->delete($id);
		if($del==1){
			$tabs = C('PRO_TABS');
			$tabs = explode('|',$tabs);
			$descrtption = $username.'删除了创建时间为：'.$info['addtime'].'，的'.$tabs[$info['type']].'信息';
			$log_data = array(
				'pro_id'=>$info['pro_id'],
				'descrtption'=>$descrtption,
			);
			$Log->actLog($log_data);
			
			echo 1;
		}else{
			echo 0;
		}
		unset($Public,$progress);
	}
	
	/**
		* 新增、更新进度跟进记录
		*@param $act add为新增、edit为编辑
		*@param $go  为1时，获取post
		*@param $id  传人修改记录id
		*@param $pid  传人项目id
		*@param $type  传人进度分类
		*@param $tid  传人进度跟进上级ID，用于回复
		*@examlpe 
	*/
	public function progress($act=NULL,$go=false,$id=NULL,$pid=NULL,$type=NULL,$tid=NULL){
		$Public = A('Index','Public');
		$Log = A('Log','Public');
		
		//main
		$progress = D('Project_progress_table');
		$userid = $_SESSION['login']['se_id'];
		$username = $_SESSION['login']['se_user'];
		if($go==NULL){
			$nowdate = date("Y-m-d",time());
			$this->assign('nowdate',$nowdate);
			$this->assign('userid',$userid);
			$this->assign('uniqid',uniqid());
			if($tid==NULL){
				$tid = 0;
			}else{
				$tid = intval($tid);
				$type = $progress->where('id='.$tid)->getField('type');
			}
			if($act=='add'){
				$pid = intval($pid);
			}else{
				$id = intval($id);
				$pid = intval($pid);
				$info = $progress->where('id='.$id)->find();
				//dump($info);
				$this->assign('id',$id);
				$this->assign('info',$info);
			}
			$this->assign('tid',$tid);
			$this->assign('type',$type);
			$this->assign('pid',$pid);
			$this->assign('act',$act);
			$this->display();
		}elseif($go==1){
			$data = $progress->create();
			if($act=='add'){
				$role = $Public->check('Project',array('gc'));
				if($role<0){
					echo $role; exit;
				}
				$data['addtime'] = date("Y-m-d H:i:s",time());
				$user = M('User_table');
				$data['user_id'] = $userid; 
				$data['username'] = $user->where('id='.$userid)->getField('username');
				$add = $progress->add($data);
				if($add>0){
					$tabs = C('PRO_TABS');
					$tabs = explode('|',$tabs);
					$descrtption = $username.'新增了一条'.$tabs[$data['type']].'信息，创建时间为：'.$data['addtime'];
					$log_data = array(
						'pro_id'=>$data['pro_id'],
						'descrtption'=>$descrtption,
					);
					$Log->actLog($log_data);
								
					echo 1;
				}else{
					echo 0;
				}
			}else{
				$role = $Public->check('Project',array('gu'));
				if($role<0){
					echo $role; exit;
				}
				unset($data['type'],$data['status'],$data['pro_id']);
				//dump($data);exit;
				$info = $progress->where('id='.$id)->find();
				$edit = $progress->where('id='.$id)->save($data);
				if($edit !== false){
					$tabs = C('PRO_TABS');
					$tabs = explode('|',$tabs);
					$descrtption = $username.'修改了创建时间为：'.$info['addtime'].'，的'.$tabs[$info['type']].'信息';
					$log_data = array(
						'pro_id'=>$info['pro_id'],
						'descrtption'=>$descrtption,
					);
					$Log->actLog($log_data);
					
					echo 1;
				}else{
					echo 0;
				}
			}
		}
		unset($Public,$progress,$data,$data);
	}
	
	/**
		* 工具栏搜索控制
		*@param $act  传入的字段名
		*@param $mode  为like时，模糊搜索
		*@examlpe 
	*/
	public function change($act,$mode=NULL){
		$Public = A('Index','Public');
		$role = $Public->check('Project',array('r'));
		
		//main
		if(cookie('Project')){
			$str_map = cookie('Project');
			$map = unserialize($str_map);
		}
		unset($str_map);
		$id = strval(I('val'));
		switch($act){
			case 'itemtype':
				if(!$id){
					unset($map['itemtype']);
				}else{
					$map['itemtype'] = " and `itemtype`='".$id."'";
				}
			break;
			
			case 'status':
				if(!$id){
					unset($map['status']);
				}else{
					$map['status'] = ' and `status`='.$id;
				}
			break;
			
			default:
				if($mode=='like'){
					$map[$act] = " and ".$act." like '%".$id."%'";
				}else{
					$map[$act] = " and ".$act." = '".$id."'";
				}
			break;
		}
		cookie('Project',serialize($map));
	}
	
	/**
		* 工具栏搜索控制
		*@param $type  传入进度分类
		*@param $pid   传入项目ID
		*@examlpe 
	*/
	public function sonprogress($type,$pid){
		$Public = A('Index','Public');
		$role = $Public->check('Project',array('r'));
		
		//main
		$progress = D('Project_progress_table');
		$type = intval($type);
		$cid = $_SESSION['login']['se_comyID'];
		$userid = $_SESSION['login']['se_id'];
		$pid = intval($pid);
		$comy = M('User_company_table');
		$st = $comy->where('id='.$cid)->getField('type');
		$client = '';
		if($role!='all' && !in_array('a',$role)){
			if($st==1){
				$client = ' and `user_id`='.$userid;
			}
		}
		$phinfo = $progress->relation(true)->where('pro_id='.$pid.' and status=0 and type='.$type.$client)->order('addtime desc')->select();
		//dump($phinfo);
		$userid = $_SESSION['login']['se_id'];
		$this->assign('userid',$userid);
		$this->assign('role',$role);
		$this->assign('uniqid',uniqid());
		$this->assign('type',$type);
		$this->assign('pid',$pid);
		$this->assign('phinfo',$phinfo);
		$this->display();
	}
	
	/**
		* 获取项目列表数据
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
		$userid = $_SESSION['login']['se_id'];
		$username = $_SESSION['login']['se_user'];
		$project = M('Project_table');
		$project_table = C('DB_PREFIX').'project_table';
		$project_base = C('DB_PREFIX').'project_baseinfo_table';
		$project_concern = C('DB_PREFIX').'project_concern_table';
		$result = M();
		$comy = M('User_company_table');
		$st = $comy->where('id='.$cid)->getField('type');
		if($role!='all' && !in_array('a',$role)){
			if($st==1){
				$map['t1.client_id'] = array('eq',$cid);
				$map['t1.view_state'] = array('eq',3);
			}else{
				$sql = $result->table($project_concern.' as t3')->field('GROUP_CONCAT(t3.pro_id ORDER BY t3.pro_id) as pid')->where('t3.user_id='.$userid)->find();
				$map['_string'] = 't2.app_handler="'.$username.'" or t2.pro_creator="'.$username.'" or t1.id in ('.$sql['pid'].')';
			}
		}else{
			$map = array();
		}
		$info = $result->table($project_table.' as t1')->field('t1.'.$val.' as id, t1.name as text')->join(' '.$project_base.' as t2 on t2.pro_id=t1.id')->where($map)->select();
		if($mode==1){
			array_unshift($info,array(
				'id'=>0,
				'text'=>''
			));
		}
		if($act=='json'){
			echo json_encode($info);
		}else{
			return $info;
		}
		unset($project,$info,$map);
	}
	
	/**
		* 工作耗时饼猪状图
		*@param $id		传入的项目ID
		*@examlpe 
	*/
	
	public function buglevel($id){
		$Public = A('Index','Public');
		$App = A('App','Public');
		Vendor('OpenFlash.open-flash-chart');
		
		//main
		$Report = M('Report_table');
		$id = intval($id);
		$color = array('#99C754','#54C7C5','#999999','#996699','#009900','#77C600','#ff7400', 
'#FF0000','#4096ee','#c79810');
		
		$level = $App->getJson('yanzhongxing','/Linkage');
		
		$info = $Report->field('level,COUNT(id) as num')->where('pid='.$id)->group('level')->order('level')->select();
		//dump($info);
		$title = new title(  ); 
		$title->set_style("font-size:13px; font-weight:bold;"); 
		$pie = new pie(); 
		$pie->set_alpha(0.8); 
		$pie->start_angle( 35 ); 
		$pie->add_animation( new pie_fade()); 
		$pie->add_animation( new pie_bounce(5) );
		$pie->gradient_fill();
		$pie->set_tooltip( '数量：#val#条，  占：#percent#' );
		$pie->set_colours( $color ); 
		
		foreach($info as $k=>$t){
			$obj = new pie_value(intval($t['num']),'');
			$name = $Public->searchArr($level,'id',$t['level']);
			$obj->set_label($name.'：'.$t['num'].'条', $color[$k], 12 );
			$dis_value[] = $obj;
		}
		//dump($dis_value);
		$pie->set_values($dis_value);
		
		$chart = new open_flash_chart(); 
		$chart->set_title( $title ); 
		$chart->add_element( $pie ); 
		$chart->x_axis = null; 
		$chart->bg_colour = ( '#FFFFFF' ); 
		echo $chart->toPrettyString(); 
	}
}