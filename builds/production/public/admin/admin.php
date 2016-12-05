<?php require_once("../../includes/session.php"); ?>
<?php require_once("../../includes/db_connection.php"); ?>
<?php require_once("../../includes/functions.php"); ?>

<?php confirm_logged_in(); ?>

<?php include("../../includes/layouts/header.php"); ?>

<?php $selected_table = array ("table" => null); ?>

<main class="row">
	<navigation class="small-3 columns table-col">
<?php include("../../includes/navigation.php"); ?>
	</navigation>
	<div class="small-9 columns text-center"><br />
		<h4>Welcome Admin User - <?php echo htmlentities($_SESSION["admin_user"]); ?></h4>
		<br />
		<a href="logout.php" class="button">Logout</a>
	</div>
</main>
<?php include("../../includes/layouts/footer.php"); ?>
