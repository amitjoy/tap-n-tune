<?php
$a->textBefore = '<h4>Maximum File Size For Uploading in Audio Section : 12 MB </h4>';
$a->table = '_audio';
$a->primaryKey = 'idaudio';
$a->order = array ( 'title'=>'asc' );
$a->showRecords = 20;
$a->charsLimit = 50;
$a->maximulFileSize = 12288;
$a->fields = array (
	
	'title' => array (
		'type'=>'text',
		'width'=>150,
		'label'=>'Song Title',
		'noduplicates'=>false,
		'filter'=>'alpha',
		'required'=>true,
		'minSize'=>1,
		'maxSize'=>60
	),
	'caption' => array (
		'type'=>'text',
		'width'=>150,
		'label'=>'Caption',
		'noduplicates'=>false,
		'filter'=>'alpha',
		'minSize'=>1,
		'maxSize'=>60
	),
		'audio_pic' => array (
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
		'label'=>'Band(Select this if this song is associated with band)',
		'select'=>array(
			'fields'=>'band_name',
			'from'=>'_bands', // table
			'on'=>'idband',
			'where'=>'active=1'
		),
	),
	'artist' => array (
		'type'=>'select',
		'width'=>120,
		'label'=>'Artist(Select this if this song is associated with sole singer)',
		'select'=>array(
			'fields'=>'name',
			'from'=>'_artist', // table
			'on'=>'idartist',
			'where'=>'active=1 AND band=0'
		),
	),
	'localfile' => array (
		'type'=>'file',
		'width'=>70,
		'label'=>'Local Audio (.mp3)',
		'file'=>array (
			'for'=>false,
			'location'=>'uploads/audios/',
			'order'=>true,
			'keep-original'=>false,
		),
	),
	'likes' => array (
		'type'=>'text',
		'width'=>50,
		'label'=>'No of Likes',
		'noduplicates'=>false,
		'filter'=>'alpha',
		'minSize'=>1,
		'maxSize'=>60
	),
	'active' => array (
		'type'=>'checkbox',
		'width'=>70,
		'label'=>'Active',
	),
	

);