<?php

$a->table = 'contact';
$a->primaryKey = 'idcontact';
$a->order = array ( 'idcontact'=>'desc' );
$a->showRecords = 20;
$a->charsLimit = 50;

$a->fields = array (
	
	'name' => array (
		'type'=>'text',
		'width'=>150,
		'label'=>'Name',
	),
	
	'phone' => array (
		'type'=>'text',
		'width'=>150,
		'label'=>'Phone',
	),
	
	'location' => array (
		'type'=>'text',
		'width'=>150,
		'label'=>'Location',
	),
	
	'email' => array (
		'type'=>'text',
		'width'=>150,
		'label'=>'E-mail',
		'filter'=>'mail',
	),
	
	'message' => array (
		'type'=>'content',
		'width'=>300,
		'label'=>'Message',
		'minSize'=>2
	),
	
	'date' => array (
		'type'=>'date',
		'width'=>130,
		'label'=>'Date',
		'filter'=>'date',
		'required'=>true,
	),

);

$a->textAfter = '<p>&nbsp;</p>'.highlight_file(__FILE__, true);