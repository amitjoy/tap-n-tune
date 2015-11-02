<?php
$a->textBefore = '<h4>Maximum File Size For Uploading in Video Section : 25 MB </h4>';
$a->table = '_video';
$a->primaryKey = 'idvideo';
$a->order = array ( 'video_name'=>'asc' );
$a->showRecords = 20;
$a->charsLimit = 50;
$a->maximulFileSize = 25600;
$a->fields = array (
	
	'video_name' => array (
		'type'=>'text',
		'width'=>150,
		'label'=>'Video Name',
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
		'required'=>true,
		'minSize'=>1,
		'maxSize'=>15
	),
	
		'video_pic' => array (
		'type'=>'file',
		'width'=>70,
		'label'=>'Photo (190 X 160)',
		'filter'=>'image',
		'file'=>array (
			'for'=>false,
			'location'=>'uploads/gallery/',
			'order'=>true,
			'keep-original'=>false,
			'resize'=>array( '120x120'=>'crop', '300x200'=>'resize', '190x160'=>'resize' ),
			'fixed-aspect'=>'R',
		),
	),
	'band' => array (
		'type'=>'select',
		'width'=>120,
		'label'=>'Band(Select this if this video is associated with band)', 
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
		'label'=>'Artist(Select this if this video is associated with sole singer)',
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
		'label'=>'Local Video(.flv, .mp4, .3gp, .m4v, .mov, .f4v)',
		'file'=>array (
			'for'=>false,
			'location'=>'uploads/videos/',
			'order'=>true,
		),
	),
	'youtube' => array (
		'type'=>'text',
		'width'=>150,
		'label'=>'Youtube Video',
		'noduplicates'=>false,
		'filter'=>'url',
		'required'=>false,
		'minSize'=>1,
		'maxSize'=>60
	),
	'choice' => array (
		'type'=>'select',
		'width'=>120,
		'label'=>'Choice',
		'required'=>true, 
		'select'=>array(
			'fields'=>'name',
			'from'=>'selection', // table
			'on'=>'idselection'
		),
	),
	'active' => array (
		'type'=>'checkbox',
		'width'=>70,
		'label'=>'Active',
	),
	

);