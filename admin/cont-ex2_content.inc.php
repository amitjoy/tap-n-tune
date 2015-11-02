<?php

$a->table = 'content';
$a->primaryKey = 'idcontent';
$a->order = array ( 'idcontent'=>'desc' );
$a->showRecords = 20;
$a->charsLimit = 50;
$a->maximulFileSize = 512;

$a->fields = array (
	
	'title' => array (
		'type'=>'text',
		'width'=>150,
		'label'=>'Title',
		'noduplicates'=>true,
		'required'=>true,
		'maxSize'=>150
	),
	
	'content' => array (
		'type'=>'content',
		'width'=>300,
		'label'=>'Page content',
		'minSize'=>2
	),
	
	'page' => array (
		'type'=>'text',
		'width'=>100,
		'label'=>'Page string',
		'noduplicates'=>true,
		'required'=>true,
		'maxSize'=>99
	),
	
	'photos' => array (
		'type'=>'file',
		'width'=>200,
		'label'=>'Gallery',
		'filter'=>'image',
		'file'=>array (
			'for'=>'contentgal',
			'location'=>'uploads/contentgallery/',
			'order'=>true,
			'multiple'=>3,
			'resize'=>array( '120x120'=>'crop', '300x200'=>'resize', '700x500'=>'resize' ),
			'keep-original'=>false,
			'watermark'=>dirname(__FILE__).'/wm.png',
		),
	),
	
	'date' => array (
		'type'=>'date',
		'width'=>130,
		'label'=>'Date',
		'filter'=>'date',
		'required'=>true,
	),

	'ip' => array (
		'type'=>'hidden',
		'width'=>100,
		'label'=>'Your IP',
		'value'=>$_SERVER['REMOTE_ADDR']
	),

);

$a->textAfter = '<p>&nbsp;</p>'.highlight_file(__FILE__, true);