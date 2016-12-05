<?php require_once("../../includes/session.php"); ?>
<?php require_once("../../includes/db_connection.php"); ?>
<?php require_once("../../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php include("../../includes/layouts/header.php"); ?>

<?php $selected_table = array ("table" => "admin"); ?>
<main class="row">
	<navigation class="small-3 columns table-col">
<?php include("../../includes/navigation.php"); ?>
	</navigation>
	<div class="small-9 columns text-center"><br>
		<h4>Admin</h4>

<br>&nbsp;<br>
		<?php echo message(); ?>

		<?php  $admin_set = find_all_admin(); ?>
		
		<?php while($admin = mysqli_fetch_assoc($admin_set)) { ?>
			<div class="select-box text-left">
				<a href="edit_admin.php?admin=<?php echo urlencode($admin["admin_id"]); ?> 
				"><?php echo htmlentities($admin["admin_user"]); ?>
				</a> 
				<a href="delete_admin.php?admin=<?php echo urlencode($admin["admin_id"]); ?>" class="small button float-right" onclick="return confirm('Are you sure?')">delete</a>
				<a href="edit_admin.php?admin=<?php echo urlencode($admin["admin_id"]); ?>" class="small button float-right">edit</a>
			</div>
		<?php } ?>
		<br>
		<a href="add_admin.php" class="button">Add</a>
		<a href="admin.php" class="button">Cancel</a>
	</div>
</main>
<?php include("../../includes/layouts/footer.php"); ?>