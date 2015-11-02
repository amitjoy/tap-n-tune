<?php
require_once "lib/db.php";
$name = $_POST['Name'];
$mail = $_POST['Mail'];
$web_addr = $_POST['Web'];
$msg = $_POST['Message'];
if(($name=="Name:" OR $name=="") AND ($mail=="E-Mail:" OR $mail=="") AND ($msg=="Message:" OR $msg==""))
{?>
<script>
alert("Please fill Name, Email and Message");
window.location.href="contact.php";
</script>
<?php 
//header("Location:contact.php");
}
else
{
mysql_query("INSERT INTO _message SET name='".$name."',email = '".$mail."',web = '".$web_addr."',message = '".$msg."',date = now()");
?>
<script>
alert("Message succesfully sent");
window.location.href="contact.php";
</script>
<?php
}
?>