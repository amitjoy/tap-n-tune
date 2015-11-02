<?php
require_once "lib/db.php";

$arr = array("_artist","_audio","_video","_bands","_genres","_message","_about","_contact","_owner","_social");
foreach($arr as $v)
{
	$sql = "TRUNCATE TABLE ".$v."";
	//echo $sql;
	if(mysql_query($sql))
	echo $v." truncated successfully";
	else
	echo "F";
}
?>