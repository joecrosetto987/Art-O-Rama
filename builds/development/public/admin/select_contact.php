<?php require_once("../../includes/session.php"); ?>
<?php require_once("../../includes/db_connection.php"); ?>
<?php require_once("../../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php include("../../includes/layouts/header.php"); ?>

<?php $selected_table = array ("table" => "contact"); ?>
<main class="row">
	<navigation class="small-3 columns table-col">
<?php include("../../includes/navigation.php"); ?>
	</navigation>
	<div class="small-9 columns text-center"><br>
		<h4>Contacts</h4>

<br>&nbsp;<br>
		<?php echo message(); ?>

		<?php  $contact_set = find_all_contact(); ?>
		
		<?php while($contact = mysqli_fetch_assoc($contact_set)) { ?>
			<div class="select-box text-left">
				<a href="edit_contact.php?contact=<?php echo urlencode($contact["contact_id"]); ?> 
				"><?php echo htmlentities($contact["contact_name"]); ?>
				</a> 
				<a href="delete_contact.php?contact=<?php echo urlencode($contact["contact_id"]); ?>" class="small button float-right" onclick="return confirm('Are you sure?')">delete</a>
				<a href="edit_contact.php?contact=<?php echo urlencode($contact["contact_id"]); ?>" class="small button float-right">edit</a>
			</div>
		<?php } ?>
		<br>
		<a href="add_contact.php" class="button">Add</a>
		<a href="admin.php" class="button">Cancel</a>
	</div>
</main>
<?php include("../../includes/layouts/footer.php"); ?>