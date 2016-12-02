<?php require_once("../../includes/session.php"); ?>
<?php require_once("../../includes/db_connection.php"); ?>
<?php require_once("../../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php require_once("../../includes/validation_functions.php"); ?>
<?php include("../../includes/layouts/header.php"); ?>

<?php
	$current_admin = find_admin_by_id($_GET["admin"]);
	if (!$current_admin) {
		redirect_to("select_admin.php");
	}
	
	//$pages_set = find_pages_for_subject($current_subject["id"]);
//	if (mysqli_num_rows($pages_set) > 0) {
//		$_SESSION["message"] = "Can't Delete a subject with pages.";
//		redirect_to("manage_content.php?subject={$current_subject["id"]}");
//	}

	
	$admin_id = $current_admin["admin_id"];
	$query = "DELETE FROM admin WHERE admin_id = {$admin_id} LIMIT 1";
	$results = mysqli_query($connection, $query);
	
	if ($results && mysqli_affected_rows($connection) == 1) {
		// Success
		$_SESSION["message"] = "Admin deleted.";
		redirect_to("select_admin.php");
	} else {
		//failure
		$_SESSION["message"] = "Admin delete failed.";
		redirect_to("select_admin.php");
	}

?>




