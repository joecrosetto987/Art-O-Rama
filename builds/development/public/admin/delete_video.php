<?php require_once("../../includes/session.php"); ?>
<?php require_once("../../includes/db_connection.php"); ?>
<?php require_once("../../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php require_once("../../includes/validation_functions.php"); ?>
<?php include("../../includes/layouts/header.php"); ?>

<?php
	$current_video = find_video_by_id($_GET["video"]);
	if (!$current_video) {
		redirect_to("select_video.php");
	}
	
	//$pages_set = find_pages_for_subject($current_subject["id"]);
//	if (mysqli_num_rows($pages_set) > 0) {
//		$_SESSION["message"] = "Can't Delete a subject with pages.";
//		redirect_to("manage_content.php?subject={$current_subject["id"]}");
//	}

	
	$video_id = $current_video["video_id"];
	$query = "DELETE FROM video WHERE video_id = {$video_id} LIMIT 1";
	$results = mysqli_query($connection, $query);
	
	if ($results && mysqli_affected_rows($connection) == 1) {
		// Success
		$_SESSION["message"] = "Video deleted.";
		redirect_to("select_video.php");
	} else {
		//failure
		$_SESSION["message"] = "Video delete failed.";
		redirect_to("select_video.php");
	}

?>




