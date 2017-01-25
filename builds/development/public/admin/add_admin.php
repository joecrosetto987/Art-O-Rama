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

$fields_with_max_lengths = array("admin_user" => 255, "admin_password" => 255);
validate_max_lengths($fields_with_max_lengths);

if (empty($errors)) {
 //perform Update

	$admin_user = mysql_prep($_POST["admin_user"]);
	$admin_password = password_encrypt($_POST["admin_password"]);
	//$position = (int) $_POST["position"];
	//$visible = (int) $_POST["visible"];
	
	
	$query = "INSERT INTO admin (";
	$query .= " admin_user, admin_password";
	$query .= ") VALUES (";
	$query .= " '{$admin_user}', '{$admin_password}'";
	$query .= ")";
	$results = mysqli_query($connection, $query);
	
	if ($results) {
		// Success
		$_SESSION["message"] = "admin added.";
		redirect_to("select_admin.php");
	} else {
		//failure
		$message = "Admin add failed.";
	}
}

} else {
	// this is probably a GET request from the browser URL field
	
} ; // end: if (isset($_POST['submit']))

?>





<?php $selected_table = array ("table" => "admin"); ?>

<main class="row">
	<navigation class="small-3 columns table-col">
<?php include("../../includes/navigation.php"); ?>
	</navigation>
	<div class="small-9 columns text-center"><br>
	
	<h4>Add Admin</h4>
	<?php // $message is just a variable, no SESSION
		if (!empty($message)) {
			echo "<div class=\"message\">" . htmlentities($message) . "</div>";
		};
		?>
		<?php echo form_errors($errors); ?>

		<div class="select-box">				
			<form action="add_admin.php" method="post"> 
	  		<p>* Admin Username:
		    <input type="text" name="admin_user" value="" />
		  	</p>
				<p>* Password:
		    <input type="password" name="admin_password" value="" />
		  	</p>

		  	<input  name="submit" type="submit" value="Add Admin" />
			</form>
		</div>
		<br>&nbsp;<br>

		<a href="select_admin.php" class="button">Cancel</a>
		

	
	
	</div>
</main>
<?php include("../../includes/layouts/footer.php"); ?>