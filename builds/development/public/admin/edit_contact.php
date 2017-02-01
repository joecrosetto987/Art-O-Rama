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
$required_fields = array("contact_firstname", "contact_firstname", "contact_email");
validate_presences($required_fields);

$fields_with_max_lengths = array("contact_firstname" => 255, "contact_firstname" => 255, "contact_email" => 255, "contact_password" => 255);
validate_max_lengths($fields_with_max_lengths);

$emails = array("contact_email");
validate_email($emails);

if (empty($errors)) {
 //perform Update

	$contact_id = $current_contact["contact_id"];
	$contact_firstname = mysql_prep($_POST["contact_firstname"]);
	$contact_lastname = mysql_prep($_POST["contact_lastname"]);
	$contact_email = mysql_prep($_POST["contact_email"]);
	$contact_password = ""; //password_encrypt($_POST["contact_password"]);
	$contact_web_updates = (!empty($_POST['contact_web_updates'])) ? 1 : 0;
	$contact_blog = (!empty($_POST['contact_blog'])) ? 1 : 0;
	
	
	$query = "UPDATE contact SET ";
	$query .= "contact_firstname = '{$contact_firstname}', ";
	$query .= "contact_lastname = '{$contact_lastname}', ";
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
	
	<h4>Edit Contact: <?php echo htmlentities($current_contact["contact_firstname"]) . htmlentities($current_contact["contact_lastname"]); ?></h4>
	<?php // $message is just a variable, no SESSION
		if (!empty($message)) {
			echo "<div class=\"message\">" . htmlentities($message) . "</div>";
		};
		?>
		<?php echo form_errors($errors); ?>

		<div class="select-box text-left">				
			<form action="edit_contact.php?contact=<?php echo urlencode($current_contact["contact_id"]); ?>" method="post"> 
				<p>* First Name:<br>
					<input type="text" name="contact_firstname"  value="<?php echo htmlentities($current_contact["contact_firstname"]); ?>" />
				</p>
				<p>* Last Name:<br>
					<input type="text" name="contact_lastname"  value="<?php echo htmlentities($current_contact["contact_lastname"]); ?>" />
				</p>

				<p>* Email:<br>
					<input type="text" name="contact_email"  value="<?php echo htmlentities($current_contact["contact_email"]); ?>" />
				</p>
		  	
				<p>Password:<br>
		    	<input type="password" name="contact_password" value="">
		  		</p>
		  		<p><input type="checkbox" name="contact_web_updates" value="1" <?php if (isset($_POST["contact_web_updates"])) {
						echo "checked"; 
					} 	elseif ($current_contact["contact_web_updates"] == 1) {
						echo "checked";	
					}
				;?>> Recieve Web Updates<br>
				</p>
				<p><input type="checkbox" name="contact_blog" value="1" <?php if (isset($_POST["contact_blog"])) {
					echo "checked"; 
				} 	elseif ($current_contact["contact_blog"] == 1) {
						echo "checked"; 
				}	
				;?>> Recieve Blog Posts<br>
				</p>
				
					
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