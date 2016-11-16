<?php require_once("../../includes/session.php"); ?>
<?php require_once("../../includes/db_connection.php"); ?>
<?php require_once("../../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php require_once("../../includes/validation_functions.php"); ?>
<?php include("../../includes/layouts/header.php"); ?>

<?php	find_selected_admin() ;?>
<?php
//	if (!$current_subject) {
//		redirect_to("manage_content.php");
//	};
?>


<?php

if (isset($_POST['submit'])) {
// Validation
$required_fields = array("admin_user", "admin_password");
validate_presences($required_fields);

$fields_with_max_lengths = array("admin_user" => 255, "admin_password" => 45);
validate_max_lengths($fields_with_max_lengths);

if (empty($errors)) {
 //perform Update

	$admin_id = $current_admin["admin_id"];
	//$video_filename = mysql_prep($_POST["video_filename"]);
	//$video_filename = "";
	$admin_user = mysql_prep($_POST["admin_user"]);
	$admin_password = password_encrypt($_POST["admin_password"]);
	
	
	$query = "UPDATE admin SET ";
	$query .= "admin_user = '{$admin_user}', ";
	$query .= "admin_password = '{$admin_password}' ";
	$query .= "WHERE admin_id = {$admin_id} ";
	$query .= "LIMIT 1";
	
 //print_r($query);

	$results = mysqli_query($connection, $query);
	
//	print_r(mysqli_affected_rows($connection));
//	print_r(mysqli_error($connection));
	
	if ($results && mysqli_affected_rows($connection) >= 0) {
		// Success
		$_SESSION["message"] = "Admin updated.";
		redirect_to("select_admin.php");
	} else {
		//failure
		$message = "Admin update failed. " . mysqli_error($connection);
	}
}

} else {
	// this is probably a GET request from the browser URL field
	
} ; // end: if (isset($_POST['submit']))

?>




<!-- indicate which navigation row should be highlighted -->
<?php $selected_table = array ("table" => "admin"); ?>

<main class="row">
	<navigation class="small-3 columns table-col">
<?php include("../../includes/navigation.php"); ?>
	</navigation>
	<div class="small-9 columns text-center"><br>
	
	<h4>Edit Admin: <?php echo htmlentities($current_admin["admin_user"]); ?></h4>
	<?php // $message is just a variable, no SESSION
		if (!empty($message)) {
			echo "<div class=\"message\">" . htmlentities($message) . "</div>";
		};
		?>
		<?php echo form_errors($errors); ?>

		<div class="select-box text-left">				
			<form action="edit_admin.php?admin=<?php echo urlencode($current_admin["admin_id"]); ?>" method="post"> 
				<p>* Admin User:<br>
					<input type="text" name="admin_user"  value="<?php echo htmlentities($current_admin["admin_user"]); ?>" />
					</label></p>
		  	
				<p>* Password:<br>
		    <input type="password" name="admin_password" value="">
		  	</p>
				
					
			<!--	<p>Video Filename (leave blank):
		    <input type="text" name="video_filename" value="" />
		  	</p>-->

		  	<div class="center_me"><input  name="submit" type="submit" value="Update Admin" /></div>
			
			</form>
			
		</div>
		<br>&nbsp;<br>

		<a href="select_admin.php" class="button">Cancel</a>
		

	</div>
</main>
<?php include("../../includes/layouts/footer.php"); ?>