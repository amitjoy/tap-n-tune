<?php

$a->table = '_adminusers';
$a->primaryKey = 'idadmin';
$a->order = array ( 'username'=>'asc' );
$a->showRecords = 20;
$a->charsLimit = 50;

$a->fields = array (
	
	'username' => array (
		'type'=>'text',
		'width'=>150,
		'label'=>'Username',
		'noduplicates'=>true,
		'filter'=>'username',
		'required'=>true,
		'minSize'=>3,
		'maxSize'=>60
	),
	
	'password' => array (
		'type'=>'password',
		'width'=>90,
		'label'=>'Password',
		'encrypt'=>true,
		'required'=>true,
		'minSize'=>5,
		'maxSize'=>60
	),
	
	'mail' => array (
		'type'=>'text',
		'width'=>150,
		'label'=>'E-mail',
		'noduplicates'=>true,
		'filter'=>'mail',
		'required'=>true,
		'minSize'=>5,
		'maxSize'=>250
	),

	'role' => array (
		'type'=>'select',
		'width'=>120,
		'label'=>'Role',
		'select'=>array(
			'fields'=>'name',
			'from'=>'_adminroles', // table
			'on'=>'idrole'
		),
	),
	
	'active' => array (
		'type'=>'checkbox',
		'width'=>70,
		'label'=>'Active',
	),
	

);

//$a->textAfter = '<p>&nbsp;</p>'.highlight_file(__FILE__, true);