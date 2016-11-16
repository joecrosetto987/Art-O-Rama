<?php require_once("../../includes/session.php"); ?>
<?php require_once("../../includes/db_connection.php"); ?>
<?php require_once("../../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php include("../../includes/layouts/header.php"); ?>

<?php $selected_table = array ("table" => "gallery"); ?>
<main class="row">
	<navigation class="small-3 columns table-col">
<?php include("../../includes/navigation.php"); ?>
	</navigation>
	<div class="small-9 columns text-center"><br>
		<h4>Galleries</h4>

		<?php echo message(); ?>

		<?php $gallery_set = find_all_gallery(); ?>
		
		<?php while($gallery = mysqli_fetch_assoc($gallery_set)) { ?>
			<div class="select-box text-left">
				<a href="edit_gallery.php?gallery=<?php echo urlencode($gallery["gallery_id"]); ?> 
				"><?php echo htmlentities($gallery["gallery_name"]); ?>
				</a> 
				<a href="delete_gallery.php?gallery=<?php echo urlencode($gallery["gallery_id"]); ?>" class="small button float-right" onclick="return confirm('Are you sure?')">delete</a>
				<a href="edit_gallery.php?gallery=<?php echo urlencode($gallery["gallery_id"]); ?>" class="small button float-right">edit</a>
			</div>
		<?php } ?>
		<br>
		<a href="add_gallery.php" class="button">Add</a>
		<a href="admin.php" class="button">Cancel</a>
	</div>
</main>
<?php include("../../includes/layouts/footer.php"); ?>