<?php

$a->table = 'articles';
$a->primaryKey = 'idarticle';
$a->order = array ( 'idarticle'=>'desc' );
$a->showRecords = 20;
$a->charsLimit = 50;
$a->maximulFileSize = 512;

$a->fields = array (

	'title' => array (
		'type'=>'text',
		'width'=>120,
		'label'=>'Title',
		'noduplicates'=>true,
		'required'=>true,
	),
	
	'content' => array (
		'type'=>'content',
		'width'=>300,
		'label'=>'Content of the article',
		'minSize'=>50
	),
	
	'datepublish' => array (
		'type'=>'date',
		'width'=>130,
		'label'=>'Published on date',
		'filter'=>'date',
	),
	
	'dateadd' => array (
		'type'=>'date',
		'width'=>130,
		'label'=>'Added on date',
		'filter'=>'date',
	),
	
	'datelastedit' => array ( // it's a timestamp
		'type'=>'hidden',
		'width'=>130,
		'readonly'=>true,
		'label'=>'Last edited',
		'value'=>date('Y-m-d H:i:s'),
	),
	
	'category' => array (
		'type'=>'select',
		'width'=>120,
		'label'=>'Category',
		'select'=>array(
			'fields'=>'name',
			'from'=>'categories',
			'on'=>'idcategory'
		),
	),
	
	'active' => array (
		'type'=>'checkbox',
		'width'=>70,
		'label'=>'Active',
	),
	
	'author' => array (
		'type'=>'hidden',
		'width'=>130,
		'label'=>'Author ID',
		'value'=>$_SESSION['USERAUTH']['idadmin'],
	),
	
	'photos' => array (
		'type'=>'file',
		'width'=>200,
		'label'=>'Gallery',
		'filter'=>'image',
		'file'=>array (
			'for'=>'photosforarticles',
			'location'=>'uploads/articles/',
			'order'=>true,
			'multiple'=>5,
			'resize'=>array( '120x120'=>'crop', '300x200'=>'resize', '700x500'=>'resize' ),
			'keep-original'=>false,
		),
	),
	

);

$a->textAfter = '<p>&nbsp;</p>'.highlight_file(__FILE__, true);