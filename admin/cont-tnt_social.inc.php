<?php
$a->textBefore = '<h4>In the list make that one active only which you want to display in footer.</h4>';
$a->table = '_social';
$a->primaryKey = 'idsocial';
$a->showRecords = 20;
$a->charsLimit = 50;
$a->navigation = true;
$a->fields = array (
	'facebook' => array (
		'type'=>'text',
		'width'=>200,
		'label'=>'Facebook Page URL',
		'required'=>true,
	),
	'twitter' => array (
		'type'=>'text',
		'width'=>150,
		'label'=>'Twitter URL',
		'required'=>true,
	),
	'google' => array (
		'type'=>'text',
		'width'=>150,
		'label'=>'Google Plus Page URL',
		'required'=>true,
	),
	'active' => array (
		'type'=>'checkbox',
		'width'=>70,
		'label'=>'Active',
	),
	

);