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

$fields_with_max_lengths = array("contact_name" => 255, "contact_password" => 255);
validate_max_lengths($fields_with_max_lengths);

if (empty($errors)) {
 //perform Update

	$contact_name = mysql_prep($_POST["contact_name"]);
	$contact_email = mysql_prep($_POST["contact_email"]);
	$contact_password = password_encrypt($_POST["contact_password"]);
	$contact_web_updates = $_POST["contact_web_updates"];
	$contact_blog = $_POST["contact_blog"];
	
	
	$query = "INSERT INTO contact (";
	$query .= " contact_name, contact_email, contact_password, contact_web_updates, contact_blog";
	$query .= ") VALUES (";
	$query .= " '{$contact_name}', '{$contact_email}', '{$contact_password}', {$contact_web_updates}, {$contact_blog}";
	$query .= ")";
	$results = mysqli_query($connection, $query);
	
	if ($results) {
		// Success
		$_SESSION["message"] = "contact added.";
		redirect_to("select_contact.php");
	} else {
		//failure
		$message = "Contact add failed.";
	}
}

} else {
	// this is probably a GET request from the browser URL field
	
} ; // end: if (isset($_POST['submit']))

?>





<?php $selected_table = array ("table" => "contact"); ?>

<main class="row">
	<navigation class="small-3 columns table-col">
<?php include("../../includes/navigation.php"); ?>
	</navigation>
	<div class="small-9 columns text-center"><br>
	
	<h4>Add Contact</h4>
	<?php // $message is just a variable, no SESSION
		if (!empty($message)) {
			echo "<div class=\"message\">" . htmlentities($message) . "</div>";
		};
		?>
		<?php echo form_errors($errors); ?>

		<div class="select-box">				
			<form action="add_contact.php" method="post"> 
	  		<p>* Name:
		    <input type="text" name="contact_name" value="" />
		  	</p>
		  	<p>* Email:
		    <input type="text" name="contact_email" value="" />
		  	</p>
				<p>* Password:
		    <input type="password" name="contact_password" value="" />
		  	</p>
		  	<p>* Recieve Web Updates?<br>
				<select name="contact_web_updates" class="small_field" >
					<option value="1" selected>Yes</option>
					<option value="0">No</option>
				</select> </p>
			<p>* Recieve Blog Posts?<br>
				<select name="contact_blog" class="small_field" >
					<option value="1" selected>Yes</option>
					<option value="0">No</option>
				</select> </p>

		  	<input  name="submit" type="submit" value="Add Contact" />
			</form>
		</div>
		<br>&nbsp;<br>

		<a href="select_contact.php" class="button">Cancel</a>
		

	
	
	</div>
</main>
<?php include("../../includes/layouts/footer.php"); ?>