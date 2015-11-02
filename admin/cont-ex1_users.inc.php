<?php

$a->table = 'users';
$a->primaryKey = 'iduser';
$a->order = array ( 'iduser'=>'desc' );
$a->showRecords = 20;
$a->charsLimit = 50;
$a->maximulFileSize = 512;

$a->fields = array (

	'username' => array (
		'type'=>'text',
		'width'=>150,
		'label'=>'Username',
		'noduplicates'=>true,
		'filter'=>'username',
		'required'=>true,
		'minSize'=>3,
		'maxSize'=>50
	),
	
	'password' => array (
		'type'=>'password',
		'width'=>90,
		'label'=>'Password',
		'encrypt'=>true,
		'required'=>true,
		'minSize'=>5,
		'maxSize'=>100
	),
	
	'email' => array (
		'type'=>'text',
		'width'=>150,
		'label'=>'E-mail',
		'noduplicates'=>true,
		'filter'=>'mail',
		'required'=>true,
		'minSize'=>5,
		'maxSize'=>250
	),
	
	'regdate' => array (
		'type'=>'date',
		'width'=>130,
		'label'=>'Registration date',
		'filter'=>'date',
		'required'=>true,
	),

	'usertype' => array (
		'type'=>'select',
		'width'=>120,
		'label'=>'Type of user',
		'select'=>array(
			'regular'=>'Regular user',
			'moderator'=>'Moderator',
			'administrator'=>'Administrator',
		),
	),
	
	'active' => array (
		'type'=>'checkbox',
		'width'=>70,
		'label'=>'Active',
		'value'=>1,
	),
	
	'description' => array (
		'type'=>'content',
		'width'=>300,
		'label'=>'User description',
		'minSize'=>2
	),
	
	'avatar' => array (
		'type'=>'file',
		'width'=>120,
		'label'=>'Avatar',
		'filter'=>'image',
		'file'=>array (
			'for'=>false,
			'location'=>'uploads/useravatars/',
			'order'=>true,
			'keep-original'=>false,
			'resize'=>array( '120x120'=>'crop', '300x200'=>'resize', '700x500'=>'resize' ),
			'rotate'=>20,
			'background'=>'ffffff',
			'fixed-aspect'=>'T',
		),
	),
	
	'photos' => array (
		'type'=>'file',
		'width'=>200,
		'label'=>'Gallery',
		'filter'=>'image',
		'file'=>array (
			'for'=>'usergallery',
			'location'=>'uploads/usergallery/',
			'order'=>true,
			'multiple'=>5,
			'resize'=>array( '120x120'=>'crop', '300x200'=>'resize', '700x500'=>'resize' ),
			'keep-original'=>false,
		),
	),

);

$a->textAfter = '<p>&nbsp;</p>'.highlight_file(__FILE__, true);