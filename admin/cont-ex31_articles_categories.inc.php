<?php

$a->table = 'categories';
$a->primaryKey = 'idcategory';
$a->order = array ( 'order'=>'asc', 'idcategory'=>'desc');
$a->showRecords = 20;
$a->charsLimit = 50;

$a->fields = array (
	
	'name'=>array(
		'type'=>'text',
		'label'=>'Name',
		'required'=>true,
		'linkTo'=>array (
			'edit'=>0,
			'page'=>1,
			'section'=>'ex31_articles_categories',
			'show'=>'list',
			'filter'=>array(
				'parentid' => array ( 'idcategory', '=' ),
			),
			'order'=>array('order'=>'asc', 'idcategory'=>'desc'),
		)
	),
	
	'active' => array (
		'type'=>'checkbox',
		'label'=>'Active',
	),
	
	'parentid' => array (
		'type'=>'select',
		'width'=>120,
		'label'=>'Parent ID',
		'select'=>array(
			'fields'=>'name',
			'from'=>'categories',
			'on'=>'idcategory'
		),
	),
	
	'order' => array (
		'type'=>'text',
		'label'=>'order',
	),

);

$a->textAfter = '<p>&nbsp;</p>'.highlight_file(__FILE__, true);