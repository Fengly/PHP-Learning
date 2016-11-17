<?php
/*
 * @varsion		Dream缺陷跟踪系统 2.0var
 * @package		程序设计深圳市九五时代科技有限公司设计开发
 * @copyright	Copyright (c) 2010 - 2015, d-winner, Inc.
 * @link		http://www.d-winner.com
 */
 
class Project_progress_tableModel extends RelationModel{
	protected $_link = array(
		'comment'=>array(
			'mapping_type'=>HAS_MANY,
			'mapping_name'=>'comment',
			'class_name'=>'project_progress_table',
			'parent_key'=>'status',
		),
		'project'=>array(
			'mapping_type'=>BELONGS_TO,
			'mapping_name'=>'project',
			'class_name'=>'project_table',
			'foreign_key'=>'pro_id',
			'as_fields'=>'name:proname',
		),
	);
}