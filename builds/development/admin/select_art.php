<?php require_once("../../includes/session.php"); ?>
<?php require_once("../../includes/db_connection.php"); ?>
<?php require_once("../../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php include("../../includes/layouts/header.php"); ?>

<?php $selected_table = array ("table" => "art"); ?>
<main class="row">
	<navigation class="small-3 columns table-col">
<?php include("../../includes/navigation.php"); ?>
	</navigation>
	<div class="small-9 columns text-center"><br>
		<h4>Art</h4>

		<?php echo message(); ?>
		<div class="select-box text-left">
		Filters:<br>
				<?php if (isset($_GET["art_gallery_id"])) { $_POST["art_gallery_id"] = $_GET["art_gallery_id"];} ?>
				<form action="select_art.php" method="post"> 
					<select name="art_gallery_id" class="small_field" >
					<?php $gallery_set = find_all_gallery(); ?>
					<?php while($gallery = mysqli_fetch_assoc($gallery_set)) { ?>
						<option value="<?php echo urlencode($gallery["gallery_id"]); ?>" 
						<?php 
							if (isset($_POST["art_gallery_id"])){
								if ($gallery["gallery_id"] == $_POST["art_gallery_id"]) {echo "selected";}
								}  ?>
					>
					<?php echo $gallery["gallery_name"]; ?></option>
					<?php } ?>
					</select>
					<input  name="submit" type="submit" value="Filter by Gallery" class="small button"/>
				</form>
			</p>

		</div>

		<?php $art_set = find_all_art(); ?>
		
		<?php while($art = mysqli_fetch_assoc($art_set)) { ?>
			<div class="select-box text-left">
				<a href="delete_art.php?art=<?php echo urlencode($art["art_id"]); ?>" class="small button float-right" onclick="return confirm('Are you sure?')">delete</a>
				<a href="edit_art.php?art=<?php echo urlencode($art["art_id"]); ?>" class="small button float-right">edit</a>
				<a href="edit_art.php?art=<?php echo urlencode($art["art_id"]); ?> 
				"><?php echo htmlentities($art["art_title"]); ?>
				</a> 
			</div>
		<?php } ?>
		<br>
		<a href="add_art.php" class="button">Add</a>
		<a href="admin.php" class="button">Cancel</a>
	</div>
</main>
<?php include("../../includes/layouts/footer.php"); ?>