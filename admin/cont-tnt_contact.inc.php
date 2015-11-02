<?php
$a->textBefore = '<h4>Write not less than the no of words mentioned. In the list make that one active only which you want to display in contact us page.</h4>';
$a->table = '_contact';
$a->primaryKey = 'idcontact';
$a->showRecords = 20;
$a->charsLimit = 50;
$a->navigation = true;
$a->fields = array (
	'para1' => array (
		'type'=>'textarea',
		'width'=>400,
		'label'=>'Paragraph 1 (80 Words)',
		'required'=>true,
	),
	'para2' => array (
		'type'=>'textarea',
		'width'=>400,
		'label'=>'Paragraph 2 (170 Words)',
		'required'=>true,
	),
	'active' => array (
		'type'=>'checkbox',
		'width'=>70,
		'label'=>'Active',
	),
	

);