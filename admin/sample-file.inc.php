<?php

// main table 
$a->table = 'users';

// primary key of this table
$a->primaryKey = 'iduser';

// make order
$a->order = array ( 'name'=>'asc' );

// make filter
$a->filter = array (
	'OptionCode'	=> array ( 'hello there', 'LIKE' ),
	'title'			=> array ( 'hello mike', '=' ),
	'id'			=> array ( 25, '>' ),
);

// how many records per page
$a->showRecords = 30;

// no. of chars limited in table listing
$a->charsLimit = 5;

// some default values
$a->defaultValues = array(
	'fieldWidth'=>'150',
	'fieldHeight'=>'90',
	'formLeftWidth'=>'120',
	'smallThumbsHeight'=>'25',
);

// maximum file size (in KB) to upload
$a->maximulFileSize = 2048;

// where to go after submit
$a->gotoAfterAction = 'insert';
// default (not set)
// - on insert, go to insert
// - on update, go back to update that ID
//
//	OR
//			
// insert	- go to insert
// update	- go to update
// list		- go to list

// the admin class will not list nothing
$a->independent = false; 
// To make in-page output you have to populate a string like
// $a->textBefore, $a->form, $a->listTable, $a->textAfter OR $a->listPages

// export the CSV with a table head
$a->addCSVHead = true;

// export foreign keys (when you have fields of "select" type)
// as string, not as keys (integer values)
$a->exportCSVString = true;

// where to make the export
$a->exportFolder = 'uploads/';

// this has to be posted in index.php,
// before the use of "validateInclude" method
$a->validSections = array()

// if false, will hide the menu, the header and some buttons
$a->navigation = true;

// hide some buttons (IE: the insert button)
$a->buttonsToHide = array( 'insert' );

// some text, before the table or forms
$a->textBefore = 'Some infos';

// al fields
$a->fields = array (

	'field' => array (

		'type'=>'text', // OR password, textarea, content, select, file, checkbox, hidden, date (with calendar)
		'width'=>120,
		'height'=>50,
		'label'=>'Label of field',
		'encrypt'=>true,
		'isfield'=>true,
		'readonly'=>true,
		'noduplicates'=>false,
		'filter'=>'alphanum', // digits, number, date, mail, username ( with _ and - ) - you can add more
		'required'=>true,
		'minSize'=>3,
		'maxSize'=>50,
		'hideCharacters'=>true,

		'select'=>array(
			'fields'=>'name,mail',
			'from'=>'users', // table
			'on'=>'foreignField',
			'where'=>'`activ`=1'
		),

		'file'=>array (
			'for'=>false, // false = keep in this field  -- OR --  'USER-AVATAR' = will be associated in `files`
			'location'=>'../images/',
			'order'=>true,
			'multiple'=>8, // we need 'for' to have 'multiple'
			// ---- only if image -----
			'rotate'=>23, // integer
			'background'=>'ffffff', // background after rotate
			'resize'=>array( '120x90'=>'crop', '300x200'=>'resize', '500x500'=>'resize' ),
			'keep-original'=>false, // delete uploaded file
			'fixed-aspect'=>'C', // R, L, T, B [have a white border to keep aspect]
			'watermark'=>'../images/wm.png', // array ('300x200' => '../images/wm_special.png' ) 
		),

		'linkTo'=>array (
			'edit'=>0,
			'page'=>1,
			'section'=>'_adm_privs',
			'show'=>'list',
			'filter'=>array(	 // FIELD \\
				'role' => array ( 'idrole', '=' ),
			),
			'order'=>array('page'=>'asc', 'action'=>'asc'),
		)

	),


);


$a->textAfter = 'after everything, at the end';
