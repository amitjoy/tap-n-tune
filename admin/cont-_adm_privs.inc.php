<?php

$a->table = '_adminprivs';
$a->primaryKey = 'idpriv';
$a->order = array ( 'page'=>'asc', 'role'=>'asc', 'action'=>'asc' );
$a->showRecords = 100;
$a->charsLimit = 50;

$availablePages = array();
foreach($a->menu as $keyMen=>$valMen) {
	if(!is_array($valMen)) {
		$availablePages[$keyMen] = $valMen;
	} else {
		foreach($valMen as $subKeyMenu=>$subValMenu) {
			$availablePages[$subKeyMenu] = '------ '.$subValMenu;
		}
	}
}

$a->fields = array (

	'role' => array (
		'type'=>'select',
		'width'=>300,
		'label'=>'Role',
		'required'=>true,
		'select'=>array(
			'fields'=>'name',
			'from'=>'_adminroles',
			'on'=>'idrole'
		),

	),
	
	'page' => array (
		'type'=>'select',
		'width'=>150,
		'label'=>'Page',
		'required'=>true,
		'select'=>$availablePages,
	),
	
	'action' => array (
		'type'=>'select',
		'width'=>150,
		'label'=>'Priviledge',
		'required'=>true,
		'select'=> $_SESSION['POSIBLEPRIVS']
	),
	
);

//$a->textAfter = '<p>&nbsp;</p>'.highlight_file(__FILE__, true);