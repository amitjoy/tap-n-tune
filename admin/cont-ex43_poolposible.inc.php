<?php

$a->table = 'posibleanswers';
$a->primaryKey = 'idposans';
$a->order = array ( 'answer'=>'asc' );
$a->showRecords = 20;
$a->charsLimit = 50;
$a->navigation = false;

$a->fields = array (
	
	'question' => array (
		'type'=>'hidden',
		'width'=>70,
		'label'=>'Question',
		'value'=>isset($a->urlFilter['question'][0]) ? $a->urlFilter['question'][0] : 0,
	),
	'answer' => array (
		'type'=>'text',
		'width'=>300,
		'label'=>'Answer',
		'required'=>true,
	),

);

$a->textAfter = '<p>&nbsp;</p>'.highlight_file(__FILE__, true);