<?php

$a->table = 'gallery';
$a->primaryKey = 'idphoto';
$a->order = array ( 'date'=>'desc' );
$a->showRecords = 20;
$a->charsLimit = 50;
$a->fields = array (

	'Name' => array (
		'type'=>'text',
		'width'=>150,
		'label'=>'Name of the photo',
		# 'required'=>true,
	),
	
	'url' => array (
		'type'=>'file',
		'width'=>70,
		'label'=>'Photo',
		'filter'=>'image',
		'file'=>array (
			'for'=>false,
			'location'=>'uploads/gallery/',
			'order'=>true,
			'keep-original'=>false,
			'resize'=>array( '120x120'=>'crop', '300x200'=>'resize', '700x500'=>'resize' ),
		),
	),
	
	'description' => array (
		'type'=>'textarea',
		'width'=>300,
		'label'=>'Description',
	),
	
	'date' => array (
		'type'=>'date',
		'width'=>130,
		'label'=>'Date',
		'filter'=>'date',
	),
	
	'active' => array (
		'type'=>'checkbox',
		'width'=>70,
		'label'=>'Active',
		'value'=>1,
	),

);

$a->textAfter = '<p>&nbsp;</p>'.highlight_file(__FILE__, true);