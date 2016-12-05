<?php require_once("../../includes/session.php"); ?>
<?php require_once("../../includes/db_connection.php"); ?>
<?php require_once("../../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php require_once("../../includes/validation_functions.php"); ?>
<?php include("../../includes/layouts/header.php"); ?>

<?php	find_selected_artist() ;?>
<?php
//	if (!$current_subject) {
//		redirect_to("manage_content.php");
//	};
?>


<?php

if (isset($_POST['submit'])) {

// Validation
$required_fields = array("artist_name");
validate_presences($required_fields);

$fields_with_max_lengths = array("artist_name" => 45);
validate_max_lengths($fields_with_max_lengths);

if (empty($errors)) {
 //perform Update

	$artist_id = $current_artist["artist_id"];
	$artist_name = mysql_prep($_POST["artist_name"]);
	//$position = (int) $_POST["position"];
	//$visible = (int) $_POST["visible"];
	
	
	$query = "INSERT INTO artist (";
	$query .= " artist_name";
	$query .= ") VALUES (";
	$query .= " '{$artist_name}'";
	$query .= ")";
	$results = mysqli_query($connection, $query);
	
	if ($results) {
		// Success
		$_SESSION["message"] = "artist added.";
		redirect_to("select_artist.php");
	} else {
		//failure
		$message = "Artist add failed.";
	}
}

} else {
	// this is probably a GET request from the browser URL field
	
} ; // end: if (isset($_POST['submit']))

?>





<?php $selected_table = array ("table" => "artist"); ?>

<main class="row">
	<navigation class="small-3 columns table-col">
<?php include("../../includes/navigation.php"); ?>
	</navigation>
	<div class="small-9 columns text-center"><br>
	
	<h4>Add Artist</h4>
	<?php // $message is just a variable, no SESSION
		if (!empty($message)) {
			echo "<div class=\"message\">" . htmlentities($message) . "</div>";
		};
		?>
		<?php echo form_errors($errors); ?>

		<div class="select-box">				
			<form action="add_artist.php" method="post"> 
	  		<p>* Artist name:
		    <input type="text" name="artist_name" value="" />
		  	</p>
		  	<input  name="submit" type="submit" value="Add Artist" />
			</form>
		</div>
		<br>&nbsp;<br>

		<a href="select_artist.php" class="button">Cancel</a>
		

	
	
	</div>
</main>
<?php include("../../includes/layouts/footer.php"); ?>