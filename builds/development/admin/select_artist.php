<?php require_once("../../includes/session.php"); ?>
<?php require_once("../../includes/db_connection.php"); ?>
<?php require_once("../../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php include("../../includes/layouts/header.php"); ?>

<?php $selected_table = array ("table" => "artist"); ?>
<main class="row">
	<navigation class="small-3 columns table-col">
<?php include("../../includes/navigation.php"); ?>
	</navigation>
	<div class="small-9 columns text-center"><br>
		<h4>Artists</h4>

		<?php echo message(); ?>

		<?php $artist_set = find_all_artist(); ?>
		
		<?php while($artist = mysqli_fetch_assoc($artist_set)) { ?>
			<div class="select-box text-left">
				<a href="edit_artist.php?artist=<?php echo urlencode($artist["artist_id"]); ?> 
				"><?php echo htmlentities($artist["artist_name"]); ?>
				</a> 
				<a href="delete_artist.php?artist=<?php echo urlencode($artist["artist_id"]); ?>" class="small button float-right" onclick="return confirm('Are you sure?')">delete</a>
				<a href="edit_artist.php?artist=<?php echo urlencode($artist["artist_id"]); ?>" class="small button float-right">edit</a>
			</div>
		<?php } ?>
		<br>
		<a href="add_artist.php" class="button">Add</a>
		<a href="admin.php" class="button">Cancel</a>
	</div>
</main>
<?php include("../../includes/layouts/footer.php"); ?>