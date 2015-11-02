<?php

$a->table = '_bands';
$a->primaryKey = 'idband';
$a->order = array ( 'band_name'=>'asc' );
$a->showRecords = 20;
$a->charsLimit = 50;
$a->maximulFileSize = 4096;
$a->textBefore = '<h4>Maximum File Size For Uploading in Band Section : 4 MB </h4>';
$a->fields = array (
	
	'band_name' => array (
		'type'=>'text',
		'width'=>150,
		'label'=>'Band Name',
		'noduplicates'=>true,
		'filter'=>'alphanum',
		'required'=>true,
		'minSize'=>1,
		'maxSize'=>60
	),
	'genre' => array (
		'type'=>'select',
		'width'=>120,
		'label'=>'Genre',
		'required'=>true, 
		'select'=>array(
			'fields'=>'genre_name',
			'from'=>'_genres', // table
			'on'=>'idgenre',
			'where'=>'active=1'
		),
	),
		'poster' => array (
		'type'=>'file',
		'width'=>70,
		'label'=>'Photo (190 X 160)',
		'filter'=>'image',
		'file'=>array (
			'for'=>false,
			'location'=>'uploads/gallery/',
			'order'=>true,
			'keep-original'=>false,
			'resize'=>array( '190x160'=>'resize' ),
			'fixed-aspect'=>'R',
		),
	),
	'location' => array (
		'type'=>'text',
		'width'=>150,
		'label'=>'Location',
		'filter'=>'alpha',
		'required'=>true,
		'minSize'=>1,
		'maxSize'=>60
	),
	'fb_page' => array (
		'type'=>'text',
		'width'=>150,
		'label'=>'FB Page Link',
		'filter'=>'alpha',
		'minSize'=>1,
		'maxSize'=>160
	),
	'active' => array (
		'type'=>'checkbox',
		'width'=>70,
		'label'=>'Active',
	),
	

);