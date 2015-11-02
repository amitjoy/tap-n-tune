<?php

$a->table = '_message';
$a->primaryKey = 'idmessage';
$a->order = array ( 'date'=>'desc' );
$a->showRecords = 20;
$a->charsLimit = 50;
$a->navigation = true;
$a->buttonsToHide = array( 'insert','delete' );
$a->fields = array (
	
	'name' => array (
		'type'=>'text',
		'width'=>150,
		'label'=>'Name',
		'noduplicates'=>false,
		'filter'=>'alpha',
		'required'=>true,
		'minSize'=>1,
		'maxSize'=>60,
		'readonly'=>true
	),
	'email' => array (
		'type'=>'text',
		'width'=>120,
		'label'=>'Email',
		'required'=>true, 
		'filter'=>'mail',
		'readonly'=>true
	),
	'web' => array (
		'type'=>'text',
		'width'=>150,
		'label'=>'Web Address',
		'filter'=>'alpha',
		'required'=>true,
		'minSize'=>1,
		'maxSize'=>60,
		'readonly'=>true
	),
	'message' => array (
		'type'=>'content',
		'width'=>270,
		'label'=>'Message',
		'readonly'=>true
	),
	'date' => array (
		'type'=>'date',
		'filter'=>'date',
		'width'=>120,
		'label'=>'Date',
		'readonly'=>true
	),
	

);