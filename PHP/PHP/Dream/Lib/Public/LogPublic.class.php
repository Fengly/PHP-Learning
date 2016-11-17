<?php
/*
 * @varsion		Dream缺陷跟踪系统 2.0var
 * @package		程序设计深圳市九五时代科技有限公司设计开发
 * @copyright	Copyright (c) 2010 - 2015, 95era, Inc.
 * @link		http://www.d-winner.com
 */

//项目日志操作
class LogPublic extends Action {
	//插入操作日誌
	/*
	return 		Void
	$data		必須值，傳入數組，格式： array('pro_id'=>項目ID，'descrtption'=>工作描述);
	$mode		默認為創建，傳入字符串，add：創建=>1，deit：編輯=>2，del：刪除=>3，check：审核=>4
	*/
	public function actLog($data){
		$log = M('Log_table');
		$datas = array(
			'user_id'=>$_SESSION['login']['se_id'],
			'pro_id'=>$data['pro_id'],
			'description'=>$data['descrtption'],
			'addtime'=>date("Y-m-d H:i:s",time()),
		);		
		$add = $log->add($datas);
	}
	
	//过期项目移到历史日志表
	/*
	$data		傳入數組，
	return 		Void
	*/
	
	public function moveLog($pro_id=0){
		$expire = C('EXPIRE_TIME');
		$result = M();
		$log = M('Log_table');
		$logd = M('Log_destroy_table');
		$log_table = C('DB_PREFIX').'log_table';
		$destroy_table = C('DB_PREFIX').'log_destroy_table';
		
		if($pro_id>0){
			$log->where('pro_id='.$pro_id)->delete();
			$logd->where('pro_id='.$pro_id)->delete();
		}else{
			$has = $log->where('TO_DAYS(NOW()) - TO_DAYS(`addtime`)>'.$expire)->count();
			if($has){
				$r1 = $result->execute('insert into '.$destroy_table.' select * from '.$log_table.' where TO_DAYS(NOW()) - TO_DAYS(`addtime`)>'.$expire);
				if($r1){
					$del = $log->where('TO_DAYS(NOW()) - TO_DAYS(`addtime`)>'.$expire)->delete();
				}
			}
		}
	}	
}