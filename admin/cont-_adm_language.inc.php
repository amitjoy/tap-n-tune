<?php

$a->table = '_adminlang';
$a->primaryKey = 'idlang';
$a->order = array ( 'lang'=>'asc', 'key'=>'asc' );
$a->showRecords = 100;
$a->charsLimit = 50;

$a->fields = array (

	'lang' => array (
		'type'=>'text',
		'width'=>150,
		'label'=>'Language',
		'required'=>true,
		'maxSize'=>2,
		'minSize'=>2,
	),
	
	'key' => array (
		'type'=>'text',
		'width'=>150,
		'label'=>'Language key',
		'required'=>true,
	),
	
	'value' => array (
		'type'=>'textarea',
		'width'=>300,
		'label'=>'Value',
		'required'=>true,
	),

);

//$a->textAfter = '<p>&nbsp;</p>'.highlight_file(__FILE__, true);
