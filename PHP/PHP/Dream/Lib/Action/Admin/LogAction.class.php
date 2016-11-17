<?php
/*
 * @varsion		Dream缺陷跟踪系统 2.0var
 * @package		程序设计深圳市九五时代科技有限公司设计开发
 * @copyright	Copyright (c) 2010 - 2015, d-winner, Inc.
 * @link		http://www.d-winner.com
 */

class LogAction extends Action {
	/**
		* 主方法
		*@param $json    为NULL输出模板。为1时输出列表数据到前端，格式为Json
		*@param $method  为1时，单独输出记录数
		*@examlpe 
	*/
    public function index($json=NULL,$pid=NULL,$method=NULL){
		$Public = A('Index','Public');
		$Public->check('Log',array('r'));
		
		//main
		if(!is_int((int)$json)){
			$json = NULL;
		}
		$view = C('DATAGRID_VIEW');
		$page_row = C('PAGE_ROW');
		$groupid = $_SESSION['login']['se_groupID'];
		$comyid = $_SESSION['login']['se_comyID'];
		$comy = M('User_company_table');
		if($json==1){
			$userid = $_SESSION['login']['se_id'];
			$protype = $comy->where('id='.$comyid)->getField('type');
			if(!$userid){
				echo '';exit;
			}
			
			$result = M();
			$Log_table = C('DB_PREFIX').'log_table';
			$Destroy_table = C('DB_PREFIX').'log_destroy_table';
			$User_table = C('DB_PREFIX').'user_table';
			
			$map = array();
			if(cookie('aLog')){
				$str_map = slashes(cookie('aLog'));
				$map = unserialize($str_map);
				unset($str_map);
			}else{
				$map['id'] = 'id>0';
				cookie('LogAll',1);
			}
			
			if($pid){
				$map['pro_id'] = ' and pro_id='.$pid;
			}
			
			/*if($protype){
				$map['client_id'] = ' and client_id='.$comyid.' and views=15';
			}*/
			
			cookie('aLog',serialize($map));
			$map = implode(' ',$map);
			//dump(unserialize(cookie('aLog')));
			
			$get_page = $this->_get('page');
			$get_rows = $this->_get('rows');
			$page = isset($get_page) ? intval($get_page) : 1;    
			$rows = isset($get_rows) ? intval($get_rows) : $page_row; 
			$now_page = $page-1;
			$offset = $now_page*$rows;
			
			$arr_flelds = array(
				'id' => 'id as id',
				'pro_id' => 'pro_id as pro_id',
				'description' => 'description as description',
				'addtime' => 'addtime as addtime',
			);
			$fields = implode(',',$arr_flelds);
			unset($arr_flelds);
			
			if(!$view){
				if(cookie('LogAll')==1){
					$info = $result->table($Log_table)->field('SQL_CALC_FOUND_ROWS '.$fields)->having($map)->order('addtime desc')->limit($offset,$rows)->select();
				}else{
					$sql = $result->table($Log_table)->field($fields)->having($map)->union('select '.$fields.' from '.$Destroy_table.' having '.$map)->select(false);
					$info = $result->query('select * from '.$sql.' as t1 order by addtime desc limit '.$offset.','.$rows);
				}
				$count = $result->query('SELECT FOUND_ROWS() as total');
				$count = $count[0]['total'];
			}else{
				if(cookie('LogAll')==1){
					$info = $result->table($Log_table.' as t1')->field('SQL_CALC_FOUND_ROWS '.$fields)->having($map)->order('addtime desc')->select();
				}else{
					$sql = $result->table($Log_table)->field($fields)->having($map)->union('select '.$fields.' from '.$Destroy_table.' having '.$map)->select(false);
					$info = $result->query('select * from '.$sql.' as t1 order by addtime desc');
				}
				$count = count($info);
			}
			//dump($info);exit;
			$new_info = array();
			$items = array();
			$new_info['total'] = $count;
			if($method=='total'){
				echo  json_encode($new_info); exit;
			}
			
			$new_info['rows'] = $info?$info:array();
			//dump($new_info);
			echo json_encode($new_info);
			unset($new_info,$info,$order,$sort,$count,$items);
		}else{
			$this->assign('page_row',$page_row);
			$this->display();
			unset($Public);
		}
    }	
	
	/**
		* 清除缓存
		*@examlpe 
	*/
	public function clear(){
    	cookie('aLog',NULL);
		cookie('LogAll',1);
	}
	
	/**
		* 工具栏搜索控制
		*@param $act  传入的字段名
		*@param $mode  为like时，模糊搜索
		*@examlpe 
	*/
	public function change($act,$mode=NULL){
		if(cookie('aLog')){
			$str_map = cookie('aLog');
			$map = unserialize($str_map);
		}
		
		$id = strval(I('val'));
		$map['id'] = 'id>0';
		switch($act){
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
		cookie('LogAll',0);
		cookie('aLog',serialize($map));
	}
}