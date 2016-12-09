<?php require_once("../../includes/session.php"); ?>
<?php require_once("../../includes/db_connection.php"); ?>
<?php require_once("../../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
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
$required_fields = array("art_title", "art_media_id", "art_size", "art_status_id", "art_framed", "art_order", "art_gallery_id", "art_num_pics");
validate_presences($required_fields);

$fields_with_max_lengths = array("art_title" => 255, "art_media_additional_info" => 255, "art_size" => 45, "art_desc" => 2048, "art_framed_desc" => 2048, "art_shopify_id" => 4096);
validate_max_lengths($fields_with_max_lengths);

validate_year ("art_created_year");

validate_currency("art_price");

validate_number("art_order");

if (empty($errors)) {
 //perform Add

	$art_id = $current_art["art_id"];
	$art_title = mysql_prep($_POST["art_title"]);
	$art_media_id = $_POST["art_media_id"];
	$art_media_additional_info = mysql_prep($_POST["art_media_additional_info"]);
	$art_size = mysql_prep($_POST["art_size"]);
	$art_created_year = $_POST["art_created_year"];
	$art_shopify_id = mysql_prep($_POST["art_shopify_id"]);
	$art_price = trim ($_POST["art_price"], "$");
	
//	if ($_POST["art_price"] == "") {
//		$art_price = 0;
//		} else {
//		$art_price = mysql_prep($art_price);
//	}
	
	$art_price = mysql_prep($art_price);
	$art_status_id = $_POST["art_status_id"];
	$art_desc = mysql_prep($_POST["art_desc"]);
	$art_framed = $_POST["art_framed"];
	$art_framed_desc = mysql_prep($_POST["art_framed_desc"]);
	//$art_artist_desc = mysql_prep($_POST["art_artist_desc"]);
	$art_order = $_POST["art_order"];
	$art_gallery_id = $_POST["art_gallery_id"];
	$art_num_pics = $_POST["art_num_pics"];
	
	
	
	$query = "INSERT INTO art (";
	$query .= " art_title, art_media_id, art_media_additional_info, art_size, art_created_year, art_shopify_id, art_price, art_status_id, art_desc, art_framed, art_framed_desc, art_order, art_gallery_id, art_num_pics";
	$query .= ") VALUES (";
	$query .= " '{$art_title}', {$art_media_id}, '{$art_media_additional_info}', '{$art_size}', {$art_created_year}, '{$art_shopify_id}', {$art_price}, {$art_status_id}, '{$art_desc}', {$art_framed}, '{$art_framed_desc}', {$art_order}, {$art_gallery_id}, {$art_num_pics} ";
	$query .= ")";
	
	
// print_r($query);
	
	
	
	$results = mysqli_query($connection, $query);
	
//	print_r(mysqli_affected_rows($connection));
//	print_r(mysqli_error($connection));
	
	if ($results) {
		// Success
		$_SESSION["message"] = "Art added.";
		redirect_to("select_art.php?art_gallery_id={$art_gallery_id}");
	} else {
		//failure
		$message = "Art add failed. " . mysqli_error($connection);
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
	
	<h4>Add Art: <?php echo htmlentities($current_art["art_title"]); ?></h4>
	<?php // $message is just a variable, no SESSION
		if (!empty($message)) {
			echo "<div class=\"message\">" . htmlentities($message) . "</div>";
		};
		?>
		<?php echo form_errors($errors); ?>

		<div class="select-box text-left">				
			<form action="add_art.php" method="post"> 
				<p>* Title:<br>
					<input type="text" name="art_title"  value="" />
					</label></p>
		  	
				<p>* Media:<br>
				<select name="art_media_id" class="small_field" >
				<?php $media_set = find_all_media(); ?>
				<?php while($media = mysqli_fetch_assoc($media_set)) { ?>
					<option value="<?php echo urlencode($media["media_id"]); ?>" ><?php echo $media["media_name"]; ?></option>
				<?php } ?>
				</select>
		  	</p>
				
				<p>Media additional info:
		    <input type="text" name="art_media_additional_info" value="" />
		  	</p>
				
				<p>* Size (H x W x D, i.e. 16" x 24" x 3")<br>
		    <input type="text" name="art_size" value=""  class="small_field">
		  	</p>
				
				<p>* Year created (YYYY, i.e. 2013)
		    <input type="number" name="art_created_year" value="2016" class="small_field"/>
		  	</p>
				
				<p>Shopify ID (from embeded buy button)
		    <textarea name="art_shopify_id" class="textbox"> </textarea>
		  	</p>
				
				<p>* Price (no comma please)<br>
		    <input type="text" name="art_price" value="0" class="small_field" />
		  	</p>
	
					<p>* Status:<br>
				<select name="art_status_id" class="small_field" >
					<option value="1">For sale</option>
					<option value="2">Not for sale</option>
					<option value="3">Sold</option>
					<option value="4">Other</option>
				</select> </p>
				
				<p>Art Description:
				<textarea name="art_desc" class="textbox"></textarea></p>	

<p>* Is Art framed?<br>
				<select name="art_framed" class="small_field" >
					<option value="1">Framed</option>
					<option value="0" selected>Not framed</option>
				</select> </p>
				
				<p>Description of frame:
		    <input type="text" name="art_framed_desc" value="" />
		  	</p>
				
				<!--<p>Artist's Description:
		    <input type="text" name="art_artist_desc" value="" />
		  	</p>-->
				
				<p>* Order of art in gallery webpage (number, smallest will appear first):<br>
		    <input type="number" name="art_order" value="1" class="small_field"/>
		  	</p>
				
								<p>* Gallery where art will appear:
				<select name="art_gallery_id" >
				<?php $gallery_set = find_all_gallery(); ?>
				<?php while($gallery = mysqli_fetch_assoc($gallery_set)) { ?>
					<option value="<?php echo urlencode($gallery["gallery_id"]); ?>"><?php echo $gallery["gallery_name"]; ?></option>
				<?php } ?>
				</select>
		  	</p>
				<p>* Number of pictures (typically 1 but increase number is there are alt images:<br>
		    <input type="number" name="art_num_pics" value="1" class="small_field"/>
		  	</p>

				
		  	<div class="center_me"><input  name="submit" type="submit" value="Add Art" /></div>
			
			</form>
			
		</div>
		<br>&nbsp;<br>

		<a href="select_art.php" class="button">Cancel</a>
		

	</div>
</main>
<?php include("../../includes/layouts/footer.php"); ?>