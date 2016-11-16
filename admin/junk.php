<?php require_once("../../includes/session.php"); ?>
<?php require_once("../../includes/db_connection.php"); ?>
<?php require_once("../../includes/functions.php"); ?>
<?php require_once("../../includes/validation_functions.php"); ?>
<?php include("../../includes/layouts/header.php"); ?>

<?php	find_selected_art() ;?>
<?php
//	if (!$current_subject) {
//		redirect_to("manage_content.php");
//	};
?>


<?php

if (isset($_POST['submit'])) {
// Validation
$required_fields = array("art_title", "art_media_id", "art_size", "art_status_id", "art_framed", "art_order", "art_gallery_id");
validate_presences($required_fields);

$fields_with_max_lengths = array("art_title" => 45, "art_media_additional_info" => 255, "art_size" => 45, "art_desc" => 2048, "art_framed_desc" => 2048, "art_artist_desc" => 2048);
validate_max_lengths($fields_with_max_lengths);

validate_year ("art_created_year");

validate_currency("art_price");

validate_number("art_order");

if (empty($errors)) {
 //perform Update

	$art_id = $current_art["art_id"];
	$art_title = mysql_prep($_POST["art_title"]);
	$art_media_id = $_POST["art_media_id"];
	$art_media_additional_info = mysql_prep($_POST["art_media_additional_info"]);
	$art_size = mysql_prep($_POST["art_size"]);
	$art_created_year = $_POST["art_created_year"];
	$art_shopify_id = $_POST["art_shopify_id"];
	$art_price = trim ($_POST["art_price"], "$");
	$art_status_id = $_POST["art_status_id"];
	$art_desc = mysql_prep($_POST["art_desc"]);
	$art_framed = $_POST["art_framed"];
	$art_framed_desc = mysql_prep($_POST["art_framed_desc"]);
	$art_artist_desc = mysql_prep($_POST["art_artist_desc"]);
	$art_order = $_POST["art_order"];
	$art_gallery_id = $_POST["art_gallery_id"];
	
	
	
	$query = "UPDATE art SET ";
	$query .= "art_title = '{$art_title}', ";
	$query .= "art_media_id = {$art_media_id}, ";
	$query .= "art_media_additional_info = '{$art_media_additional_info}', ";
	$query .= "art_size = '{$art_size}', ";
	$query .= "art_created_year = {$art_created_year}, ";
	$query .= "art_shopify_id = {$art_shopify_id}, ";
	$query .= "art_price = {$art_price}, ";
	$query .= "art_status_id = {$art_status_id}, ";
	$query .= "art_desc = '{$art_desc}', ";
	$query .= "art_framed = {$art_framed}, ";
	$query .= "art_framed_desc = '{$art_framed_desc}', ";
	$query .= "art_artist_desc = '{$art_artist_desc}', ";
	$query .= "art_order = {$art_order}, ";
	$query .= "art_gallery_id = {$art_gallery_id} ";
	$query .= "WHERE art_id = {$art_id} ";
	$query .= "LIMIT 1";
	
// print_r($query);
	
	
	
	$results = mysqli_query($connection, $query);
	
//	print_r(mysqli_affected_rows($connection));
//	print_r(mysqli_error($connection));
	
	if ($results && mysqli_affected_rows($connection) >= 0) {
		// Success
		$_SESSION["message"] = "Art updated.";
		redirect_to("select_art.php");
	} else {
		//failure
		$message = "Art update failed. " . mysqli_error($connection);
	}
}

} else {
	// this is probably a GET request from the browser URL field
	
} ; // end: if (isset($_POST['submit']))

?>




<!-- indicate which navigation row should be highlighted -->
<?php $selected_table = array ("table" => "art"); ?>

<main class="row">
	<navigation class="small-3 columns table-col">
<?php include("../../includes/navigation.php"); ?>
	</navigation>
	<div class="small-9 columns text-center"><br>
	
	<h4>Edit Art: <?php echo htmlentities($current_art["art_title"]); ?></h4>
	<?php // $message is just a variable, no SESSION
		if (!empty($message)) {
			echo "<div class=\"message\">" . htmlentities($message) . "</div>";
		};
		?>
		<?php echo form_errors($errors); ?>

		<div class="select-box text-left">				
			<form action="edit_art.php?art=<?php echo urlencode($current_art["art_id"]); ?>" method="post"> 
				<div class="row">
<!--	  		</p></div>-->
		    <div class="small-12 columns">
					<label>* Title:
								<input type="text" name="art_title"  value="<?php echo htmlentities($current_art["art_title"]); ?>" />
					</label></div>
		  	
				<p>* Media:
				<select name="art_media_id" >
				<?php $media_set = find_all_media(); ?>
				<?php while($media = mysqli_fetch_assoc($media_set)) { ?>
					<option value="<?php echo urlencode($media["media_id"]); ?>" <?php if ($media["media_id"] == $current_art["art_media_id"]) {echo "selected";}  ?>><?php echo $media["media_name"]; ?></option>
				<?php } ?>
				</select>
		  	</p>
				
				<p>Media additional info:
		    <input type="text" name="art_media_additional_info" value="<?php echo htmlentities($current_art["art_media_additional_info"]); ?>" />
		  	</p>
				
				<p>* Size (H x W x D, i.e. 16" x 24" x 3")
		    <input type="text" name="art_size" value="<?php echo htmlentities($current_art["art_size"]); ?>" />
		  	</p>
				
				<p>* Year created (YYYY, i.e. 2013)
		    <input type="text" name="art_created_year" value="<?php echo htmlentities($current_art["art_created_year"]); ?>" />
		  	</p>
				
				<p>Shopify ID (from the end of shopify buy button)
		    <input type="text" name="art_shopify_id" value="<?php echo htmlentities($current_art["art_shopify_id"]); ?>" />
		  	</p>
				
				<p>* Price (i.e. $600, $5.99 or 1,200)
		    <input type="text" name="art_price" value="<?php echo htmlentities($current_art["art_price"]); ?>" />
		  	</p>
	
					<p>* Status:
				<select name="art_status_id" >
					<option value="1" <?php if ($current_art["art_status_id"] == "1") {echo "selected";}  ?>>For sale</option>
					<option value="2" <?php if ($current_art["art_status_id"] == "2") {echo "selected";}  ?>>Not for sale</option>
					<option value="3" <?php if ($current_art["art_status_id"] == "3") {echo "selected";}  ?>>Sold</option>
				</select> </p>
					
				<p>Art Description:
		    <input type="text" name="art_desc" value="<?php echo htmlentities($current_art["art_desc"]); ?>" />
		  	</p>

<p>* Is Art framed?
				<select name="art_framed" >
					<option value="1" <?php if ($current_art["art_framed"]) {echo "selected";}  ?>>Framed</option>
					<option value="2" <?php if (!$current_art["art_framed"]) {echo "selected";}  ?>>Not framed</option>
				</select> </p>
				
				<p>Description of frame:
		    <input type="text" name="art_framed_desc" value="<?php echo htmlentities($current_art["art_framed_desc"]); ?>" />
		  	</p>
				
				<p>Artist's Description:
		    <input type="text" name="art_artist_desc" value="<?php echo htmlentities($current_art["art_artist_desc"]); ?>" />
		  	</p>
				
				<p>* Order of art in gallery webpage (number, smallest will appear first, i.e. 1,2 or 12):
		    <input type="text" name="art_order" value="<?php echo htmlentities($current_art["art_order"]); ?>" />
		  	</p>
				
								<p>* Gallery where art will appear:
				<select name="art_gallery_id" >
				<?php $gallery_set = find_all_gallery(); ?>
				<?php while($gallery = mysqli_fetch_assoc($gallery_set)) { ?>
					<option value="<?php echo urlencode($gallery["gallery_id"]); ?>" <?php if ($gallery["gallery_id"] == $current_art["art_gallery_id"]) {echo "selected";}  ?>><?php echo $gallery["gallery_name"]; ?></option>
				<?php } ?>
				</select>
		  	</p>

				
		  	<!--<p>Visible:
		    <input type="radio" name="visible" value="0" <?php //if ($current_subject["visible"] == 0) {echo "checked"; } ?> /> No
		    &nbsp;
		    <input type="radio" name="visible" value="1" <?php //if ($current_subject["visible"] == 1) {echo "checked"; } ?> /> Yes
		  	</p>-->
		  	<div class="center_me"><input  name="submit" type="submit" value="Update Gallery" /></div>
				</div>
			</form>
			
		</div>
		<br>&nbsp;<br>

		<a href="select_gallery.php" class="button">Cancel</a>
		

	
	
	</div>
</main>
<?php include("../../includes/layouts/footer.php"); ?>