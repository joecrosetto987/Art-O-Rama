<?php require_once("../../includes/session.php"); ?>
<?php require_once("../../includes/db_connection.php"); ?>
<?php require_once("../../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php require_once("../../includes/validation_functions.php"); ?>
<?php include("../../includes/layouts/header.php"); ?>

<?php	find_selected_contact() ;?>
<?php
//	if (!$current_subject) {
//		redirect_to("manage_content.php");
//	};
?>


<?php

if (isset($_POST['submit'])) {
// Validation
$required_fields = array("contact_name", "contact_email", "contact_password");
validate_presences($required_fields);

$fields_with_max_lengths = array("contact_name" => 255, "contact_email" => 255, "contact_password" => 255);
validate_max_lengths($fields_with_max_lengths);

if (empty($errors)) {
 //perform Update

	$contact_id = $current_contact["contact_id"];
	$contact_name = mysql_prep($_POST["contact_name"]);
	$contact_email = mysql_prep($_POST["contact_email"]);
	$contact_password = password_encrypt($_POST["contact_password"]);
	$contact_web_updates = $_POST["contact_web_updates"];
	$contact_blog = $_POST["contact_blog"];
	
	
	$query = "UPDATE contact SET ";
	$query .= "contact_name = '{$contact_name}', ";
	$query .= "contact_email = '{$contact_email}', ";
	$query .= "contact_password = '{$contact_password}', ";
	$query .= "contact_web_updates = '{$contact_web_updates}', ";
	$query .= "contact_blog = '{$contact_blog}' ";
	$query .= "WHERE contact_id = {$contact_id} ";
	$query .= "LIMIT 1";
	
 //print_r($query);

	$results = mysqli_query($connection, $query);
	
//	print_r(mysqli_affected_rows($connection));
//	print_r(mysqli_error($connection));
	
	if ($results && mysqli_affected_rows($connection) >= 0) {
		// Success
		$_SESSION["message"] = "Contact updated.";
		redirect_to("select_contact.php");
	} else {
		//failure
		$message = "Contact update failed. " . mysqli_error($connection);
	}
}

} else {
	// this is probably a GET request from the browser URL field
	
} ; // end: if (isset($_POST['submit']))

?>




<!-- indicate which navigation row should be highlighted -->
<?php $selected_table = array ("table" => "contact"); ?>

<main class="row">
	<navigation class="small-3 columns table-col">
<?php include("../../includes/navigation.php"); ?>
	</navigation>
	<div class="small-9 columns text-center"><br>
	
	<h4>Edit Contact: <?php echo htmlentities($current_contact["contact_name"]); ?></h4>
	<?php // $message is just a variable, no SESSION
		if (!empty($message)) {
			echo "<div class=\"message\">" . htmlentities($message) . "</div>";
		};
		?>
		<?php echo form_errors($errors); ?>

		<div class="select-box text-left">				
			<form action="edit_contact.php?contact=<?php echo urlencode($current_contact["contact_id"]); ?>" method="post"> 
				<p>* Name:<br>
					<input type="text" name="contact_name"  value="<?php echo htmlentities($current_contact["contact_name"]); ?>" />
				</p>
				<p>* Email:<br>
					<input type="text" name="contact_email"  value="<?php echo htmlentities($current_contact["contact_email"]); ?>" />
				</p>
		  	
				<p>* Password:<br>
		    	<input type="password" name="contact_password" value="">
		  		</p>
		  		<p>* Recieve Web Updates?<br>
				<select name="contact_web_updates" class="small_field" >
					<option value="1" <?php if ($current_contact["contact_web_updates"]) {echo "selected";}  ?>>Yes</option>
					<option value="0" <?php if (!$current_contact["contact_web_updates"]) {echo "selected";}  ?>>No</option>
				</select> </p>
			<p>* Recieve Blog Posts?<br>
				<select name="contact_blog" class="small_field" >
					<option value="1" <?php if ($current_contact["contact_blog"]) {echo "selected";}  ?>>Yes</option>
					<option value="0" <?php if (!$current_contact["contact_blog"]) {echo "selected";}  ?>>No</option>
				</select> </p>
				
					
			<!--	<p>Video Filename (leave blank):
		    <input type="text" name="video_filename" value="" />
		  	</p>-->

		  	<div class="center_me"><input  name="submit" type="submit" value="Update Contact" /></div>
			
			</form>
			
		</div>
		<br>&nbsp;<br>

		<a href="select_contact.php" class="button">Cancel</a>
		

	</div>
</main>
<?php include("../../includes/layouts/footer.php"); ?>