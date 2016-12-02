<?php require_once("../../includes/session.php"); ?>
<?php require_once("../../includes/db_connection.php"); ?>
<?php require_once("../../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php require_once("../../includes/validation_functions.php"); ?>
<?php include("../../includes/layouts/header.php"); ?>

<?php	find_selected_video() ;?>
<?php
//	if (!$current_subject) {
//		redirect_to("manage_content.php");
//	};
?>


<?php

if (isset($_POST['submit'])) {
// Validation
$required_fields = array("video_title", "video_desc", "video_order", "video_gallery_id");
validate_presences($required_fields);

$fields_with_max_lengths = array("video_title" => 255, "video_desc" => 2048, "video_filename" => 255, "video_credit" => 255);
validate_max_lengths($fields_with_max_lengths);

if (empty($errors)) {
 //perform Add

	//$video_id = $current_video["video_id"];
	//$video_filename = mysql_prep($_POST["video_filename"]);
	$video_filename = "";
	$video_title = mysql_prep($_POST["video_title"]);
	$video_desc = mysql_prep($_POST["video_desc"]);
	$video_credit = mysql_prep($_POST["video_credit"]);
	$video_order = $_POST["video_order"];
	$video_gallery_id = $_POST["video_gallery_id"];
	
	
	
	$query = "INSERT INTO video (";
	$query .= " video_filename, video_title, video_desc, video_credit, video_order,  video_gallery_id";
	$query .= ") VALUES (";
	$query .= " '{$video_filename}', '{$video_title}', '{$video_desc}', '{$video_credit}', {$video_order}, {$video_gallery_id} ";
	$query .= ")";
	
	//$query .= "art_title = '{$art_title}', ";
//	$query .= "art_media_id = {$art_media_id}, ";
//	$query .= "art_media_additional_info = '{$art_media_additional_info}', ";
//	$query .= "art_size = '{$art_size}', ";
//	$query .= "art_created_year = {$art_created_year}, ";
//	$query .= "art_shopify_id = {$art_shopify_id}, ";
//	$query .= "art_price = {$art_price}, ";
//	$query .= "art_status_id = {$art_status_id}, ";
//	$query .= "art_desc = '{$art_desc}', ";
//	$query .= "art_framed = {$art_framed}, ";
//	$query .= "art_framed_desc = '{$art_framed_desc}', ";
//	$query .= "art_artist_desc = '{$art_artist_desc}', ";
//	$query .= "art_order = {$art_order}, ";
//	$query .= "art_gallery_id = {$art_gallery_id} ";
//	$query .= "WHERE art_id = {$art_id} ";
//	$query .= "LIMIT 1";
	
// print_r($query);
	
	
	
	$results = mysqli_query($connection, $query);
	
//	print_r(mysqli_affected_rows($connection));
//	print_r(mysqli_error($connection));
	
	if ($results) {
		// Success
		$_SESSION["message"] = "Video added.";
		redirect_to("select_video.php");
	} else {
		//failure
		$message = "Video add failed. " . mysqli_error($connection);
	}
}

} else {
	// this is probably a GET request from the browser URL field
	
} ; // end: if (isset($_POST['submit']))

?>




<!-- indicate which navigation row should be highlighted -->
<?php $selected_table = array ("table" => "video"); ?>

<main class="row">
	<navigation class="small-3 columns table-col">
<?php include("../../includes/navigation.php"); ?>
	</navigation>
	<div class="small-9 columns text-center"><br>
	
	<h4>Add Video: <?php echo htmlentities($current_video["video_title"]); ?></h4>
	<?php // $message is just a variable, no SESSION
		if (!empty($message)) {
			echo "<div class=\"message\">" . htmlentities($message) . "</div>";
		};
		?>
		<?php echo form_errors($errors); ?>

		<div class="select-box text-left">				
			<form action="add_video.php" method="post"> 
				<p>* Title:<br>
					<input type="text" name="video_title"  value="" />
					</label></p>
		  	
				<p>Video Description:
				<textarea name="video_desc" class="textbox"></textarea></p>
				
				<p>Credit (i.e. Video - Lynn True):<br>
		    <input type="text" name="video_credit" value="">
		  	</p>
				
					
			<!--	<p>Video Filename (leave blank):
		    <input type="text" name="video_filename" value="" />
		  	</p>-->

				<p>* Order of video in gallery webpage (number, smallest will appear first):<br>
		    <input type="number" name="video_order" value="1" class="small_field"/>
		  	</p>
				
				<p>* Gallery where art will appear:
				<select name="video_gallery_id" >
				<?php $gallery_set = find_all_gallery(); ?>
				<?php while($gallery = mysqli_fetch_assoc($gallery_set)) { ?>
					<option value="<?php echo urlencode($gallery["gallery_id"]); ?>"><?php echo $gallery["gallery_name"]; ?></option>
				<?php } ?>
				</select>
		  	</p>
		  	<div class="center_me"><input  name="submit" type="submit" value="Add Video" /></div>
			
			</form>
			
		</div>
		<br>&nbsp;<br>

		<a href="select_video.php" class="button">Cancel</a>
		

	</div>
</main>
<?php include("../../includes/layouts/footer.php"); ?>