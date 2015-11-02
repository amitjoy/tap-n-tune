<?php

require dirname(__FILE__).'/config.inc.php';

$db = new db;

$ROLE = isset($_GET['role']) ? $_GET['role'] : false;
if(!$ROLE) {
	die('No role defined!');
}

$sql = 'SELECT `page`, `action` FROM `_adminprivs` WHERE `role` = :role';
$rec = $db->fetch($sql, array(':role'=>$ROLE));

function isAction($page, $action) {
	global $rec;
	foreach($rec as $values) {
		if($values['page'] == $page && $values['action'] == $action) {
			return true;
		}
	} false;
}

// make delete AND insert from POST
if(isset($_POST['submitPrivs'])) {
	// delete all privs for this role
	$sqlDel = 'DELETE FROM `_adminprivs` WHERE `role` = :role';
	$goDel = $db->fetch($sqlDel, array(':role'=>$ROLE), 1);
	// check each checkbox and make insert
	$sqlInsert = 'INSERT INTO `_adminprivs` ( `page`, `action`, `role` ) VALUES ';
	$arrayStatment = array();
	$contor = 0;
	foreach($_POST as $kP=>$vP) {
		if(strpos($kP, 'priv_') === 0) {
			$contor++;
			$prvParts = explode('___', str_replace('priv_', '', $kP));
			$sqlInsert .= '( :page'.$contor.', :action'.$contor.', :role'.$contor.' ), ';
			$arrayStatment[':page'.$contor] = $prvParts[0];
			$arrayStatment[':action'.$contor] = $prvParts[1];
			$arrayStatment[':role'.$contor] = $ROLE;
		}
	}
	if($contor) {
		$sqlInsert = substr($sqlInsert, 0, -2);
		$db->fetch($sqlInsert, $arrayStatment, 1);
	}
	header('Location: cont_special_adm_roles_to_privs.php?role='.(int)$ROLE);
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo lang::translate('_site_title_') ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<base href="<?php echo BASE_URL ?>" />
	<link rel="stylesheet" type="text/css" href="jscss/css.css" />
	<?php /* // you can request jQuery from Google... or NOT
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
	*/ // no need for UI here
	?>
	<script type="text/javascript" src="jscss/jquery_and_ui.js"></script>
</head>

<body style="background:#fff">
	
	<form action="" method="post" class="_formtable" style="padding:0px">
		
	<p style="padding:10px 0;clear:both"><input type="submit" class="submit" name="submitPrivs" value="<?php echo lang::translate('submit'); ?>" /></p>
	
	<?php
	
	foreach($_SESSION['menu_items'] as $page=>$title) {
		if(is_array($title)) {
			foreach($title as $page1=>$title1) {
				echo '<div style="width:230px;float:left">
				<h2 style="padding:10px 0 2px 0;font-size:14px">
				<label><input type="checkbox" value="1" onchange="if(this.checked) { $(\'.ckb'.$page1.'\').attr(\'checked\',\'checked\'); } else { $(\'.ckb'.$page1.'\').removeAttr(\'checked\'); }" /> '.$title1.'</label></h2>';
				foreach($_SESSION['POSIBLEPRIVS'] as $priv1=>$tit1) {
					echo '<label><input type="checkbox" class="ckb'.$page1.'"'. (isAction($page1, $priv1) ? ' checked="checked"' : '' ) .' name="priv_'.$page1.'___'.$priv1.'" id="priv_'.$page1.'___'.$priv1.'" /> '.$tit1.'</label><br />';
				}
				echo '</div>';
			}
		} else {
			echo '<div style="width:230px;float:left">
			<h2 style="padding:10px 0 2px 0;font-size:14px">
			<label><input type="checkbox" value="1" onchange="if(this.checked) { $(\'.ckb'.$page.'\').attr(\'checked\',\'checked\'); } else { $(\'.ckb'.$page.'\').removeAttr(\'checked\'); }" /> '.$title.'</label></h2>';
			foreach($_SESSION['POSIBLEPRIVS'] as $priv=>$tit) {
				echo '<label><input type="checkbox" class="ckb'.$page.'"'. (isAction($page, $priv) ? ' checked="checked"' : '' ) .' name="priv_'.$page.'___'.$priv.'" id="priv_'.$page.'___'.$priv.'" /> '.$tit.'</label><br />';
			}
			echo '</div>';
		}
	}
	
	?>
	<p style="padding:10px 0;clear:both"><input type="submit" class="submit" name="submitPrivs" value="<?php echo lang::translate('submit'); ?>" /></p>
	
	</form>
	
</body>
</html>