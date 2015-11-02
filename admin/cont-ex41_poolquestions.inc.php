<?php

$a->table = 'questions';
$a->primaryKey = 'idpool';
$a->order = array ( 'question'=>'asc' );
$a->showRecords = 20;
$a->charsLimit = 50;
$a->gotoAfterAction = 'update';

$a->fields = array (
	
	'question' => array (
		'type'=>'text',
		'width'=>300,
		'label'=>'Question',
		'required'=>true,
	),
	
	'active' => array (
		'type'=>'checkbox',
		'width'=>70,
		'label'=>'Active',
		'value'=>1,
	),

);

if($a->show == 'update') {
	$filterToAdd = array( 'question' => array ( $a->edit, '=') );
	$a->textAfter = '<iframe src="'.BASE_URL.'?section=ex43_poolposible&amp;show=list&amp;filter='.urlencode(serialize($filterToAdd)).'" style="width:100%;height:200px;border:0 none;border-top:5px solid #ccc;margin-top:20px"></iframe>';
}

$a->textAfter = '<p>&nbsp;</p>'.highlight_file(__FILE__, true);
