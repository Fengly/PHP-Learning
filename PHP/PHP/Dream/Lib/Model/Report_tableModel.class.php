<?php
/*
 * @varsion		Dream缺陷跟踪系统 2.0var
 * @package		程序设计深圳市九五时代科技有限公司设计开发
 * @copyright	Copyright (c) 2010 - 2015, d-winner, Inc.
 * @link		http://www.d-winner.com
 */

class Report_tableModel extends RelationModel{
	protected $_link = array(
		'baseinfo'=>array(
			'mapping_type'=>HAS_ONE,
			'mapping_name'=>'baseinfo',
			'class_name'=>'report_baseinfo_table',
			'foreign_key'=>'rid',
		),
		'user'=>array(
			'mapping_type'=>BELONGS_TO,
			'mapping_name'=>'user',
			'class_name'=>'user_table',
			'foreign_key'=>'user_id',
			'as_fields'=>'username:username',
		),
		'create'=>array(
			'mapping_type'=>BELONGS_TO,
			'mapping_name'=>'create',
			'class_name'=>'user_table',
			'foreign_key'=>'creator',
			'as_fields'=>'username:createname',
		),
		'status'=>array(
			'mapping_type'=>BELONGS_TO,
			'mapping_name'=>'status',
			'class_name'=>'linkage',
			'foreign_key'=>'status',
			'as_fields'=>'val:statusname',
		),
		'project'=>array(
			'mapping_type'=>BELONGS_TO,
			'mapping_name'=>'project',
			'class_name'=>'project_table',
			'foreign_key'=>'pid',
			'as_fields'=>'name:proname',
		),
		'files'=>array(
			'mapping_type'=>HAS_MANY,
			'mapping_name'=>'files',
			'class_name'=>'report_files_table',
			'mapping_order'=>'addtime',
			'foreign_key'=>'rid',
		),
		'reply'=>array(
			'mapping_type'=>HAS_MANY,
			'mapping_name'=>'reply',
			'class_name'=>'report_reply_table',
			'mapping_order'=>'replytime',
			'foreign_key'=>'rid',
		),
	);
}