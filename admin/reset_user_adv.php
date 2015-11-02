<?php
require_once ("../lib/db.php");

$sql = mysql_query("SELECT * FROM _adminusers WHERE active = 0");
if(mysql_num_rows($sql)>0)
{
while($r = mysql_fetch_array($sql))
{
	mysql_query("UPDATE _adminusers SET active = 1 WHERE username = '".$r['username']."'");
}
$_SESSION = array();
$_COOKIE = array();
//print_r($_COOKIE);
header("Location:index.php");
}
?>