<?php require_once("../../includes/session.php"); ?>
<?php require_once("../../includes/db_connection.php"); ?>
<?php require_once("../../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php require_once("../../includes/validation_functions.php"); ?>
<?php include("../../includes/layouts/header.php"); ?>

<?php	find_selected_exhibit() ;?>
<?php
//	if (!$current_subject) {
//		redirect_to("manage_content.php");
//	};
?>


<?php

if (isset($_POST['submit'])) {

// Validation
$required_fields = array("exhibit_name");
validate_presences($required_fields);

$fields_with_max_lengths = array("exhibit_name" => 255, "exhibit_desc" => 2048);
validate_max_lengths($fields_with_max_lengths);

if (empty($errors)) {
 //perform Add
	$exhibit_id = $current_exhibit["exhibit_id"];
	$exhibit_name = mysql_prep($_POST["exhibit_name"]);
	$exhibit_desc = mysql_prep($_POST["exhibit_desc"]);

	
	$query = "INSERT INTO exhibit (";
	$query .= " exhibit_name, exhibit_desc";
	$query .= ") VALUES (";
	$query .= " '{$exhibit_name}', '{$exhibit_desc}'";
	$query .= ")";
	$results = mysqli_query($connection, $query);
	
	if ($results) {
		// Success
		$_SESSION["message"] = "exhibit added.";
		redirect_to("select_exhibit.php");
	} else {
		//failure
		$message = "Exhibit add failed.";
	}
}

} else {
	// this is probably a GET request from the browser URL field
	
} ; // end: if (isset($_POST['submit']))

?>





<?php $selected_table = array ("table" => "exhibit"); ?>

<main class="row">
	<navigation class="small-3 columns table-col">
<?php include("../../includes/navigation.php"); ?>
	</navigation>
	<div class="small-9 columns text-center"><br>
	
	<h4>Add Exhibit</h4>
	<?php // $message is just a variable, no SESSION
		if (!empty($message)) {
			echo "<div class=\"message\">" . htmlentities($message) . "</div>";
		};
		?>
		<?php echo form_errors($errors); ?>

		<div class="select-box">				
			<form action="add_exhibit.php" method="post"> 
	  		<p>* Exhibit name:
		    <input type="text" name="exhibit_name" value="" />
		  	</p>
				<p>Exhibit Description:
				<textarea name="exhibit_desc" class="textbox"><?php echo htmlentities($current_exhibit["exhibit_desc"]); ?></textarea></p>

		  	<div class="center_me"><input  name="submit" type="submit" value="Add Exhibit" /></div>
			</form>
		</div>
		<br>&nbsp;<br>

		<a href="select_exhibit.php" class="button">Cancel</a>
		

	
	
	</div>
</main>
<?php include("../../includes/layouts/footer.php"); ?>