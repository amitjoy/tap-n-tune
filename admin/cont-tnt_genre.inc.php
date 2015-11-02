<?php

$a->table = '_genres';
$a->primaryKey = 'idgenre';
$a->order = array ( 'genre_name'=>'asc' );
$a->showRecords = 20;
$a->charsLimit = 50;

$a->fields = array (
	
	'genre_name' => array (
		'type'=>'text',
		'width'=>150,
		'label'=>'Genre Name',
		'noduplicates'=>true,
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