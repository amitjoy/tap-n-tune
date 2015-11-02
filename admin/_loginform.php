<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Admin Login Area</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<link rel="stylesheet" type="text/css" href="jscss/css.css" />
	<script>
	function amit()
	{
	window.location.href="../index.php";
	}
	</script>
</head>

<body>
	<form action="" method="post" id="_loginForm">
		<h1><?php echo lang::translate('_site_title_') ?></h1>
		<?php if(user::$error) { ?><p class="_error"><?php echo user::$error ?></p><?php } ?>
		<p><label for="username"><?php echo lang::translate('username') ?></label><input type="text" name="username" id="username" class="tf" /></p>
		<p><label for="password"><?php echo lang::translate('password') ?></label><input type="password" name="password" id="password" class="tf" /></p>
		<p><input type="submit" name="submit" id="submit" class="submit" value="<?php echo lang::translate('login') ?>" />&nbsp;&nbsp;<input type="button" name="goback" id="submit" class="submit" value="Go Back" onclick="amit()"/></p>
	</form>
</body>
</html>