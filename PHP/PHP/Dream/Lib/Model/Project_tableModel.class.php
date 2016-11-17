<?php
/*
 * @varsion		Dream缺陷跟踪系统 2.0var
 * @package		程序设计深圳市九五时代科技有限公司设计开发
 * @copyright	Copyright (c) 2010 - 2015, d-winner, Inc.
 * @link		http://www.d-winner.com
 */

class Project_tableModel extends RelationModel{
	protected $_link = array(
		'pro_client'=>array(
			'mapping_type'=>BELONGS_TO,
			'mapping_name'=>'pro_client',
			'class_name'=>'user_company_table',
			'foreign_key'=>'client_id',
			'as_fields'=>'name:client_name',
		),
		'status'=>array(
			'mapping_type'=>BELONGS_TO,
			'mapping_name'=>'status',
			'class_name'=>'linkage',
			'foreign_key'=>'status',
			'as_fields'=>'val:status_name',
		),
		'itemtype'=>array(
			'mapping_type'=>BELONGS_TO,
			'mapping_name'=>'itemtype',
			'class_name'=>'linkage',
			'foreign_key'=>'itemtype',
			'as_fields'=>'val:itemtype_name',
		),
		'view_state'=>array(
			'mapping_type'=>BELONGS_TO,
			'mapping_name'=>'view_state',
			'class_name'=>'linkage',
			'foreign_key'=>'view_state',
			'as_fields'=>'val:view_state_name',
		),
		'pro_info'=>array(
			'mapping_type'=>HAS_ONE,
			'mapping_name'=>'pro_info',
			'class_name'=>'project_baseinfo_table',
			'foreign_key'=>'pro_id',
		),
		'pro_concern'=>array(  
			'mapping_type'=>HAS_MANY, 
			'mapping_name'=>'pro_concern',
			'class_name'=>'project_concern_table',
			'foreign_key'=>'pro_id',
			'mapping_fields'=>'user_id',
		),
		'concern_user'=>array(
			'mapping_type'=>MANY_TO_MANY,
			'mapping_name'=>'concern_user',
			'class_name'=>'user_table',
			'foreign_key'=>'pro_id',
			'relation_foreign_key'=>'user_id',
			'relation_table'=>'project_concern_table',
			'mapping_fields'=>'id,username,email',
		),
	);
}