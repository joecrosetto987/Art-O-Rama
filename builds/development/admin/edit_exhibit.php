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
 //perform Update

	$exhibit_id = $current_exhibit["exhibit_id"];
	$exhibit_name = mysql_prep($_POST["exhibit_name"]);
	$exhibit_desc = mysql_prep($_POST["exhibit_desc"]);
	//$position = (int) $_POST["position"];
	//$visible = (int) $_POST["visible"];
	
	
	
	$query = "UPDATE exhibit SET ";
	$query .= "exhibit_name = '{$exhibit_name}', ";
	$query .= "exhibit_desc = '{$exhibit_desc}' ";
	//$query .= "position = {$position}, ";
	//$query .= "visible = {$visible} ";
	$query .= "WHERE exhibit_id = {$exhibit_id} ";
	$query .= "LIMIT 1";
	$results = mysqli_query($connection, $query);
	
	if ($results && mysqli_affected_rows($connection) >= 0) {
		// Success
		$_SESSION["message"] = "exhibit updated.";
		redirect_to("select_exhibit.php");
	} else {
		//failure
		$message = "Exhibit update failed.";
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
	
	<h4>Edit Exhibit: <?php echo htmlentities($current_exhibit["exhibit_name"]); ?></h4>
	<?php // $message is just a variable, no SESSION
		if (!empty($message)) {
			echo "<div class=\"message\">" . htmlentities($message) . "</div>";
		};
		?>
		<?php echo form_errors($errors); ?>

		<div class="select-box text-left">				
			<form action="edit_exhibit.php?exhibit=<?php echo urlencode($current_exhibit["exhibit_id"]); ?>" method="post"> 
	  		<p>* Exhibit name:
		    <input type="text" name="exhibit_name" value="<?php echo htmlentities($current_exhibit["exhibit_name"]); ?>" />
		  	</p>
				<p>Exhibit Description:
				<textarea name="exhibit_desc" class="textbox"><?php echo htmlentities($current_exhibit["exhibit_desc"]); ?></textarea></p>
<!--		<p>Position:
		    <select name="position">
				<?php
					//$subject_set = find_all_subjects();
//					$subject_count = mysqli_num_rows($subject_set);
//					for($count=1; $count <= $subject_count; $count++) {
//						echo "<option value=\"{$count}\"";
//						if ($current_subject["position"] == $count) {
//							echo " selected";
//						}
//						echo ">{$count}</option>";
//					}
				?>
		    </select>
		  	</p>
		  	<p>Visible:
		    <input type="radio" name="visible" value="0" <?php //if ($current_subject["visible"] == 0) {echo "checked"; } ?> /> No
		    &nbsp;
		    <input type="radio" name="visible" value="1" <?php //if ($current_subject["visible"] == 1) {echo "checked"; } ?> /> Yes
		  	</p>-->
		  	<div class="center_me"><input  name="submit" type="submit" value="Update Exhibit" /></div>
			</form>
		</div>
		<br>&nbsp;<br>

		<a href="select_exhibit.php" class="button">Cancel</a>
		

	
	
	</div>
</main>
<?php include("../../includes/layouts/footer.php"); ?>