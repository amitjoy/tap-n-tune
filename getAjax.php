<?php
require_once "lib/db.php";

$id = $_POST['id'];
if($id == "like") {
$audio = $_POST['audio_id'];
$count = mysql_fetch_array(mysql_query("SELECT * FROM _audio WHERE active = 1 AND idaudio='".$audio."'"));
$cnt = isset($count['likes']) ? $count['likes'] : 0;
$upd = $cnt+1;
//echo "UPDATE _audio SET like = '".$upd."' WHERE idaudio ='".$audio."' AND active = 1";
$sql = mysql_query("UPDATE _audio SET likes = '".$upd."' WHERE idaudio ='".$audio."' AND active = 1") ; 
$count2 = mysql_fetch_array(mysql_query("SELECT * FROM _audio WHERE active = 1 AND idaudio ='".$audio."'"));
$msg = "Liked (".$count2['likes'].")";
if($sql)
echo $msg;
}
?>