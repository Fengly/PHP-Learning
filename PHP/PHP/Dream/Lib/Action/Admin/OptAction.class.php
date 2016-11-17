<?php
/*
 * @varsion		Dream缺陷跟踪系统 2.0var
 * @package		程序设计深圳市九五时代科技有限公司设计开发
 * @copyright	Copyright (c) 2010 - 2015, d-winner, Inc.
 * @link		http://www.d-winner.com
 */
 
class OptAction extends Action {
	/**
		* 属性列表
		*@param $json    为NULL输出模板。为1时输出列表数据到前端，格式为Json
		*@examlpe 
	*/
    public function index($json=NULL){
		$Public = A('Index','Public');
		$Public->check('Opt',array('r'));
		
		//main
		if(!is_int((int)$json)){
			$json = NULL;
		}
		if($json==1){
			$opt = M('Project_attr_key_value');
			$attr = M('Project_attr_key');
			$result = M();
			$Project_attrkey = C('DB_PREFIX').'project_attr_key';
			$Project_attrval = C('DB_PREFIX').'project_attr_value';
			$Project_attrkv = C('DB_PREFIX').'project_attr_key_value';
			if(cookie('cOpt')){
				$str_map = cookie('cOpt');
				$map = unserialize($str_map);
			}
			if(!isset($map['pid'])){
				$state = ',\'closed\' as state';
			}else{
				$state = '';
			}
			//dump($map);
			$info = $attr->field('concat(\'p_\',id) as id,name as text,IF(status=1,\'关闭\',\'开启\') as status,code'.$state)->where("name<>''".$map['id'])->order('sort,convert(name using gbk) desc')->select();
			$pinfo = $result->table($Project_attrkv.' as t1')->field('t2.id as id,concat(\'p_\',t3.id) as _parentId,t2.name as text,IF(t2.status=1,\'关闭\',\'开启\') as status'.$state)->join(' join '.$Project_attrval.' as t2 on t2.id=t1.value_id')->join(' join '.$Project_attrkey.' as t3 on t3.id=t1.key_id')->where("t2.name<>''".$map['pid'])->order('t2.sort,convert(t2.name using gbk) desc')->select();
			if($pinfo){
				$info = array_merge($info,$pinfo);
			}else{
				$info = array_merge($info);
			}
			
			//dump($info);
			echo '{"rows":'.json_encode($info).'}';
			unset($info,$new_info,$opt,$pinfo,$result,$attr);
		}else{
			$this->display();
		}
		unset($Public);
    }
	
	/**
		* 新增与更新数据
		*@param $act add为新增、edit为编辑
		*@param $go  为1时，获取post
		*@param $id  传人数据id
		*@examlpe 
	*/
	public function add($act=NULL,$go=false,$id=NULL){		
		//main
		$attr_key = M('Project_attr_key');
		$attr_value = D('Project_attr_value');
		if($go==false){
			$this->assign('uniqid',uniqid());
			if($act=='add'){
				$this->assign('act','add');
				$this->display();
			}else{
				if(strstr($id,'p_')){
					$id = (int)str_replace('p_','',$id);
					$map['id'] = array('eq',$id);
					$info = $attr_key->where($map)->find();
					
				}else{
					$result = M();
					$Project_attrkey = C('DB_PREFIX').'project_attr_key';
					$Project_attrval = C('DB_PREFIX').'project_attr_value';
					$Project_attrkv = C('DB_PREFIX').'project_attr_key_value';
					$id = intval($id);
					$map['t2.id'] = array('eq',$id);
					$info = $result->table($Project_attrkv.' as t1')->field('t2.*,t3.id as _parentId')->join(' join '.$Project_attrval.' as t2 on t2.id=t1.value_id')->join(' join '.$Project_attrkey.' as t3 on t3.id=t1.key_id')->where($map)->order('t2.sort,convert(t2.name using gbk) desc')->find();
			}
				if($info['_parentId']==0){
					$info['_parentId'] = '';
				}
				unset($map);
				//dump($info);
				$this->assign('id',$id);
				$this->assign('act','edit');
				$this->assign('info',$info);
				$this->display();
				unset($info);
			}	
		}else{
			$parentId = I('_parentId');
			if($parentId){
				$data = $attr_value->create();
			}else{
				$data = $attr_key->create();
			}
			if($act=='add'){
				$Public = A('Index','Public');
				$role = $Public->check('Opt',array('c'));
				if($role<0){
					echo $role; exit;
				}
				
				if($parentId){
					$data['key_value']['key_id'] = $parentId;
					$add = $attr_value->relation(true)->add($data);
				}else{
					if($data['code']==''){
						$data['code'] = pinyin($data['name']);
					}
					$add = $attr_key->add($data);
				}
				if($add>0){
					$this->json(NULL);
					echo 1;
				}else{
					echo 0;
				}
			}elseif($act=='edit'){
				$Public = A('Index','Public');
				$role = $Public->check('Opt',array('u'));
				if($role<0){
					echo $role; exit;
				}
				$id = (int)str_replace('p_','',$id);
				if($parentId){
					$map['id'] = array('eq',$id);
					$data['key_value']['key_id'] = $parentId;
					$edit = $attr_value->relation(true)->where($map)->save($data);
				}else{
					$map['id'] = array('eq',$id);
					if($data['code']==''){
						$data['code'] = pinyin($data['name']);
					}
					$edit = $attr_key->where($map)->save($data);
				}
				unset($map);
				if($edit !== false){
					$this->json(NULL);
					echo 1;
				}else{
					echo 0;
				}
			}
			unset($data,$Public);
		}
		unset($opt);
	}
	
	/**
		* 删除数据
		*@param $id 数据ID
		*@examlpe 
	*/
	public function del($id){
		$Public = A('Index','Public');
		$role = $Public->check('Opt',array('d'));
		if($role<0){
			echo $role; exit;
		}
		
		//main
		$attr_key = D('Project_attr_key');
		$attr_value = D('Project_attr_value');
		$attr_kv = M('Project_attr_key_value');
		$attr_table = M('Project_attr_table');
		if(strstr($id,'p_')){
			$id = (int)str_replace('p_','',$id);
			$map['id'] = array('eq',$id);
			$kvinfo = $attr_kv->field('id')->where('key_id='.$id)->select(false);
			$delattr = $attr_table->where('key_value_id in('.$kvinfo.')')->delete();
			$del = $attr_key->relation('attr_value')->delete($id);
			unset($kvinfo);
		}else{
			$id = intval($id);
			$map['id'] = array('eq',$id);
			$del = $attr_value->where($map)->delete();
		}
		unset($map,$attr_key,$attr_kv,$attr_value,$attr_table);
		if($del){
			$this->json(NULL);
			echo 1;
		}else{
			echo 0;
		}
		unset($Public,$opt);
	}
	
	/**
		* 工具栏搜索控制
		*@param $act  传入的字段名
		*@examlpe 
	*/
	public function change($id){	
		//main
		$id = intval($id);	
		$map['id'] = " and id=".$id;
		$map['pid'] = " and t3.id=".$id;
		cookie('cOpt',serialize($map));
		unset($map);
		echo $id;
	}
	
	/**
		* 生成json文件
		*@param $back  为1时，返回数据
		*@examlpe 
	*/
	public function json($back=1){
		$Write = A('Write','Public');
		import('ORG.Net.FileSystem');
		$sys = new FileSystem();
	
		//main
    	$temp_path = RUNTIME_PATH.'/Temp/';
		if(file_exists($temp_path)){
			$dt = $sys->delFile($temp_path);
		}
		$attr = M('Project_attr_key');
		$info = $attr->field('id,name as text,code')->where("name<>'' and status=0")->order('sort,convert(name using gbk) desc')->select();
		$json_data = json_encode($info);
		$path = RUNTIME_PATH.'Data/Json';
		$put_json = $Write->write($path,$json_data,'Opt_data');
		
		$result = M();
		$Project_attrkey = C('DB_PREFIX').'project_attr_key';
		$Project_attrval = C('DB_PREFIX').'project_attr_value';
		$Project_attrkv = C('DB_PREFIX').'project_attr_key_value';
		$path = RUNTIME_PATH.'Data/Json/Opt';
		foreach($info as $t){
			$sinfo = $result->table($Project_attrkv.' as t1')->field('t2.id as id,t2.name as text')->join(' join '.$Project_attrval.' as t2 on t2.id=t1.value_id')->join(' join '.$Project_attrkey.' as t3 on t3.id=t1.key_id')->where("t2.name<>'' and t2.status=0 and t3.id=".$t['id'])->order('t2.sort,convert(t2.name using gbk) desc')->select();
			//dump($sinfo);exit;
			$json_datas = json_encode($sinfo);
			$Write->write($path,$json_datas,$t['code'].'_data');
		}
		if($back==1){
			if($put_json){
				echo 1;
			}
		}
		unset($info,$json_datas,$path,$opt,$Loop,$Write,$sele,$sinfo,$sys);
	}
	
	/**
		* 清空所以搜索产生的cookies
		*@examlpe 
	*/
	public function clear(){
		cookie('cOpt',NULL);
	}
}