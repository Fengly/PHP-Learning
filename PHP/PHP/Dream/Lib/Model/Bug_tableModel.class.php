<?php
/*
 * @varsion		Dream缺陷跟踪系统 2.0var
 * @package		程序设计深圳市九五时代科技有限公司设计开发
 * @copyright	Copyright (c) 2010 - 2015, d-winner, Inc.
 * @link		http://www.d-winner.com
 */

class Bug_tableModel extends RelationModel{
	protected $_link = array(
		'baseinfo'=>array(
			'mapping_type'=>HAS_ONE,
			'mapping_name'=>'baseinfo',
			'class_name'=>'bug_baseinfo_table',
			'foreign_key'=>'bug_id',
		),
		'type'=>array(
			'mapping_type'=>BELONGS_TO,
			'mapping_name'=>'type',
			'class_name'=>'linkage',
			'foreign_key'=>'type',
			'as_fields'=>'val:type_name',
		),
		'user'=>array(
			'mapping_type'=>BELONGS_TO,
			'mapping_name'=>'user',
			'class_name'=>'user_table',
			'foreign_key'=>'user_id',
			'as_fields'=>'username:username',
		),
		'reply'=>array(
			'mapping_type'=>HAS_MANY,
			'mapping_name'=>'reply',
			'class_name'=>'bug_reply_table',
			'mapping_order'=>'replytime',
			'foreign_key'=>'bug_id',
		),
	);
}