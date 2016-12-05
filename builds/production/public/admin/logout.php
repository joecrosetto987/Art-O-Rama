<?php require_once("../../includes/session.php"); ?>
<?php require_once("../../includes/functions.php"); ?>
<?php
	// v1: simple logout
	$_SESSION["admin_id"] = null;
	$_SESSION["admin_user"] = null;
	redirect_to("login.php");
	?>
	
	<?php
	// v2: destroy session
	// assumes nothing else to keep
	//$_SESSION = array();
//	if (isset($_COOKIE[session_name()])) {
//		setcookie(session_name(), '', time()-4200, '/');
//	}
//	session_destroy();
//	redirect_to("login.php");
	?>
	