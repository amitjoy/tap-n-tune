<?php

$a->table = 'answers';
$a->primaryKey = 'idanswer';
$a->order = array ( 'idanswer'=>'desc' );
$a->showRecords = 20;
$a->charsLimit = 50;

$a->buttonsToHide = array('insert');

$a->fields = array (
	
	'question' => array (
		'type'=>'select',
		'width'=>120,
		'label'=>'Question',
		'readonly'=>true,
		'select'=>array(
			'fields'=>'question',
			'from'=>'questions',
			'on'=>'idpool',
		),
	),
	
	'answer' => array (
		'type'=>'select',
		'width'=>120,
		'label'=>'Answer',
		'readonly'=>true,
		'select'=>array (
			'fields'=>'answer',
			'from'=>'posibleanswers',
			'on'=>'idposans',
		),
	),
	
	'user' => array (
		'type'=>'select',
		'width'=>120,
		'label'=>'User',
		'readonly'=>true,
		'select'=>array(
			'fields'=>'username,email',
			'from'=>'users',
			'on'=>'iduser',
		),
	),

);

$a->textAfter = '<p>&nbsp;</p>'.highlight_file(__FILE__, true);