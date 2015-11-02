<?php
$a->textBefore = '';
$a->table = '_owner';
$a->primaryKey = 'idowner';
$a->order = array ( 'name'=>'asc' );
$a->showRecords = 20;
$a->charsLimit = 50;
$a->fields = array (
	
	'name' => array (
		'type'=>'text',
		'width'=>150,
		'label'=>'Name',
		'noduplicates'=>false,
		'filter'=>'alpha',
		'required'=>true,
		'minSize'=>1,
		'maxSize'=>60
	),
	'sex' => array (
		'type'=>'select',
		'width'=>120,
		'label'=>'Sex',
		'required'=>true, 
		'select'=>array(
			'fields'=>'gender',
			'from'=>'gender', // table
			'on'=>'idgender',
		),
	),
	'mail' => array (
		'type'=>'text',
		'width'=>150,
		'label'=>'Email ID',
		'noduplicates'=>false,
		'filter'=>'alpha',
		'required'=>true,
		'minSize'=>1,
		'maxSize'=>60
	),
	'active' => array (
		'type'=>'checkbox',
		'width'=>70,
		'label'=>'Active',
	),
	

);