<?php require_once("../../includes/session.php"); ?>
<?php require_once("../../includes/db_connection.php"); ?>
<?php require_once("../../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php require_once("../../includes/validation_functions.php"); ?>
<?php include("../../includes/layouts/header.php"); ?>

<?php
	$current_art = find_art_by_id($_GET["art"]);
	if (!$current_art) {
		redirect_to("select_art.php");
	}
	
	//$pages_set = find_pages_for_subject($current_subject["id"]);
//	if (mysqli_num_rows($pages_set) > 0) {
//		$_SESSION["message"] = "Can't Delete a subject with pages.";
//		redirect_to("manage_content.php?subject={$current_subject["id"]}");
//	}

	
	$art_id = $current_art["art_id"];
	$query = "DELETE FROM art WHERE art_id = {$art_id} LIMIT 1";
	$results = mysqli_query($connection, $query);
	
	if ($results && mysqli_affected_rows($connection) == 1) {
		// Success
		$_SESSION["message"] = "Art deleted.";
		redirect_to("select_art.php");
	} else {
		//failure
		$_SESSION["message"] = "Art delete failed.";
		redirect_to("select_art.php");
	}

?>




