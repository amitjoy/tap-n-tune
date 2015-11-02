<?php

$a->table = '_adminroles';
$a->primaryKey = 'idrole';
$a->order = array ( 'name'=>'asc' );
$a->showRecords = 20;
$a->charsLimit = 50;
$a->gotoAfterAction = 'update';

$a->fields = array (

	'name' => array (
		'type'=>'text',
		'width'=>150,
		'label'=>'Role name',
		'noduplicates'=>true,
		'required'=>true,
		/* 'linkTo'=>array (
			'edit'=>0,
			'page'=>1,
			'section'=>'_adm_privs',
			'show'=>'list',
			'filter'=>array(
				'role' => array ( 'idrole', '=' ),
			),
			'order'=>array('page'=>'asc', 'action'=>'asc'),
		) */
	),
	

);

if($a->edit != 0 && $a->show == 'update') {
	$a->textAfter = '
	<div id="makeModalWindow" style="display:none"><iframe name="priviledge" style="width:920px;height:500px;border:0 none;" src="cont_special_adm_roles_to_privs.php?role='.$a->edit.'"></iframe></div>
	<div style="padding:10px 0 10px '.($a->defaultValues['formLeftWidth']+3).'px">
		<a href="#" style="font-size:18px" onclick="return makeIframe(\'makeModalWindow\', { width:950, height:550, title:\''.lang::translate('set_privileges_for_role').'\' })">'.lang::translate('set_privileges_for_role').'</a>
	</div>
	';
	
}

//$a->textAfter = '<p>&nbsp;</p>'.highlight_file(__FILE__, true);