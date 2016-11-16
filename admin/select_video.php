<?php require_once("../../includes/session.php"); ?>
<?php require_once("../../includes/db_connection.php"); ?>
<?php require_once("../../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php include("../../includes/layouts/header.php"); ?>

<?php $selected_table = array ("table" => "video"); ?>
<main class="row">
	<navigation class="small-3 columns table-col">
<?php include("../../includes/navigation.php"); ?>
	</navigation>
	<div class="small-9 columns text-center"><br>
		<h4>Video</h4>

		<?php echo message(); ?>

		<?php $video_set = find_all_video(); ?>
		
		<?php while($video = mysqli_fetch_assoc($video_set)) { ?>
			<div class="select-box text-left">
				<a href="edit_video.php?video=<?php echo urlencode($video["video_id"]); ?> 
				"><?php echo htmlentities($video["video_title"]); ?>
				</a> 
				<a href="delete_video.php?video=<?php echo urlencode($video["video_id"]); ?>" class="small button float-right" onclick="return confirm('Are you sure?')">delete</a>
				<a href="edit_video.php?video=<?php echo urlencode($video["video_id"]); ?>" class="small button float-right">edit</a>
			</div>
		<?php } ?>
		<br>
		<a href="add_video.php" class="button">Add</a>
		<a href="admin.php" class="button">Cancel</a>
	</div>
</main>
<?php include("../../includes/layouts/footer.php"); ?>