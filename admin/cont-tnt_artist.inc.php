<?php
$a->textBefore = '<h4>Maximum File Size For Uploading in Artist Section : 12 MB </h4>';
$a->table = '_artist';
$a->primaryKey = 'idartist';
$a->order = array ( 'name'=>'asc' );
$a->showRecords = 20;
$a->charsLimit = 50;
$a->maximulFileSize = 12288;
$a->fields = array (
	
	'name' => array (
		'type'=>'text',
		'width'=>150,
		'label'=>'Artist Name',
		'noduplicates'=>false,
		'filter'=>'alpha',
		'required'=>true,
		'minSize'=>1,
		'maxSize'=>60
	),
	'artist_pic' => array (
		'type'=>'file',
		'width'=>70,
		'label'=>'Photo (38 X 38)',
		'filter'=>'image',
		'file'=>array (
			'for'=>false,
			'location'=>'uploads/gallery/',
			'order'=>true,
			'keep-original'=>false,
			'resize'=>array( '120x120'=>'crop', '300x200'=>'resize', '38x38'=>'resize' ),
			'fixed-aspect'=>'R',
		),
	),
	'band' => array (
		'type'=>'select',
		'width'=>120,
		'label'=>'Band(Select this if this artist is a member of band)', 
		'select'=>array(
			'fields'=>'band_name',
			'from'=>'_bands', // table
			'on'=>'idband',
			'where'=>'active=1'
		),
	),
	'genre' => array (
		'type'=>'select',
		'width'=>120,
		'label'=>'Genre (Select this for sole Artist)', 
		'select'=>array(
			'fields'=>'genre_name',
			'from'=>'_genres', // table
			'on'=>'idgenre',
			'where'=>'active=1'
		),
	),
	'sex' => array (
		'type'=>'select',
		'width'=>120,
		'label'=>'Sex',
		'required'=>true, 
		'select'=>array(
			'fields'=>'gender',
			'from'=>'gender', // table
			'on'=>'idgender',
		),
	),
	'position' => array (
		'type'=>'text',
		'width'=>150,
		'label'=>'position',
		'noduplicates'=>false,
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