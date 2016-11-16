<?php require_once("../../includes/session.php"); ?>
<?php require_once("../../includes/db_connection.php"); ?>
<?php require_once("../../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php require_once("../../includes/validation_functions.php"); ?>
<?php include("../../includes/layouts/header.php"); ?>

<?php	find_selected_gallery() ;?>
<?php
//	if (!$current_subject) {
//		redirect_to("manage_content.php");
//	};
?>


<?php

if (isset($_POST['submit'])) {

// Validation
$required_fields = array("gallery_name", "gallery_exhibit_id", "gallery_filename_prefix");
validate_presences($required_fields);

$fields_with_max_lengths = array("gallery_name" => 45, "gallery_filename_prefix" => 45);
validate_max_lengths($fields_with_max_lengths);

if (empty($errors)) {
 //perform Add
 //$gallery_id = $current_gallery["gallery_id"];
	$gallery_name = mysql_prep($_POST["gallery_name"]);
	$gallery_exhibit_id = $_POST["gallery_exhibit_id"];
	$gallery_filename_prefix = mysql_prep($_POST["gallery_filename_prefix"]);

	
	$query = "INSERT INTO gallery (";
	$query .= " gallery_name, gallery_exhibit_id, gallery_filename_prefix";
	$query .= ") VALUES (";
	$query .= " '{$gallery_name}', {$gallery_exhibit_id}, '{$gallery_filename_prefix}'";
	$query .= ")";
	$results = mysqli_query($connection, $query);
	
	if ($results) {
		// Success
		$_SESSION["message"] = "gallery added.";
		redirect_to("select_gallery.php");
	} else {
		//failure
		$message = "Gallery add failed.";
	}
}

} else {
	// this is probably a GET request from the browser URL field
	
} ; // end: if (isset($_POST['submit']))

?>





<?php $selected_table = array ("table" => "gallery"); ?>

<main class="row">
	<navigation class="small-3 columns table-col">
<?php include("../../includes/navigation.php"); ?>
	</navigation>
	<div class="small-9 columns text-center"><br>
	
	<h4>Add Gallery</h4>
	<?php // $message is just a variable, no SESSION
		if (!empty($message)) {
			echo "<div class=\"message\">" . htmlentities($message) . "</div>";
		};
		?>
		<?php echo form_errors($errors); ?>

		<div class="select-box">				
			<form action="add_gallery.php" method="post"> 
	  		<p>* Gallery name:
		    <input type="text" name="gallery_name" value="" />
		  	</p>
								<p>* Exhibit:
				<select name="gallery_exhibit_id" >

				<?php $exhibit_set = find_all_exhibit(); ?>
					<?php while($exhibit = mysqli_fetch_assoc($exhibit_set)) { ?>
						<option value="<?php echo urlencode($exhibit["exhibit_id"]); ?>" <?php if ($exhibit["exhibit_id"] == $current_gallery["gallery_exhibit_id"]) {echo "selected";}  ?>><?php echo $exhibit["exhibit_name"]; ?></option>
					<?php } ?>
				</select>
		  	</p>
				<p>* Gallery filename prefix:
		    <input type="text" name="gallery_filename_prefix" value="" />
		  	</p>
		  	<div class="center_me"><input  name="submit" type="submit" value="Add Gallery" /></div>
			</form>
		</div>
		<br>&nbsp;<br>

		<a href="select_gallery.php" class="button">Cancel</a>
		

	
	
	</div>
</main>
<?php include("../../includes/layouts/footer.php"); ?>