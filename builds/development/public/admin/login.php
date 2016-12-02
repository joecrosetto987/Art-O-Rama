<?php require_once("../../includes/session.php"); ?>
<?php require_once("../../includes/db_connection.php"); ?>
<?php require_once("../../includes/functions.php"); ?>
<?php require_once("../../includes/validation_functions.php"); ?>
<?php include("../../includes/layouts/header.php"); ?>

<?php	find_selected_admin() ;?>
<?php
//	if (!$current_subject) {
//		redirect_to("manage_content.php");
//	};
?>


<?php
$username = "";
if (isset($_POST['submit'])) {

// Validation
$required_fields = array("admin_user", "admin_password");
validate_presences($required_fields);


if (empty($errors)) {
 // Attempt Login
 $username = $_POST["admin_user"];
 $password = $_POST["admin_password"];

$found_admin = attempt_login($username, $password);


	
	if ($found_admin) {
		// Success
		// Mark user as logged in
		$_SESSION["admin_id"] = $found_admin["admin_id"];
		$_SESSION["admin_user"] = $found_admin["admin_user"];
		redirect_to("admin.php");
	} else {
		//failure
		$message = "Username/password not found.";
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
	
	<h4>Login</h4>
	<?php // $message is just a variable, no SESSION
		if (!empty($message)) {
			echo "<div class=\"message\">" . htmlentities($message) . "</div>";
		};
		?>
		<?php echo form_errors($errors); ?>

		<div class="select-box">				
			<form action="login.php" method="post"> 
	  		<p>* Admin Username:
		    <input type="text" name="admin_user" value="<?php echo htmlentities($username); ?>" />
		  	</p>
				<p>* Password:
		    <input type="password" name="admin_password" value="" />
		  	</p>

		  	<input  name="submit" type="submit" value="Submit" />
			</form>
		</div>
		<br>&nbsp;<br>


	
	
	</div>
</main>
<?php include("../../includes/layouts/footer.php"); ?>