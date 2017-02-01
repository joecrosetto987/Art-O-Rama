<?php

// THE BELOW LINE STATES THAT IF THE SUBMIT BUTTON
// WAS PUSHED, EXECUTE THE PHP CODE BELOW TO SEND THE 
// MAIL. IF THE BUTTON WAS NOT PRESSED, SKIP TO THE CODE
// BELOW THE "else" STATEMENT (WHICH SHOWS THE FORM INSTEAD).
if (isset($_POST['submit'])) {
	// Validation
$required_fields = array("first_name", "last_name", "email");
validate_presences($required_fields);

$fields_with_max_lengths = array("first_name" => 255, "last_name" => 255, "email" => 255);
validate_max_lengths($fields_with_max_lengths);

$emails = array("email");
validate_email($emails);



if (empty($errors)) {

	$contact_firstname = mysql_prep($_POST["first_name"]);
	$contact_lastname = mysql_prep($_POST["last_name"]);
	$contact_email = mysql_prep($_POST["email"]);
	$contact_password = "";//password_encrypt($_POST["contact_password"]);
	$contact_web_updates = (!empty($_POST['contact_web_updates'])) ? 1 : 0;
	$contact_blog = (!empty($_POST['contact_blog'])) ? 1 : 0;
// if record with same email exists, update other info	
	if (find_contact_by_email($contact_email))
	{

		$query = "UPDATE contact SET ";
		$query .= "contact_firstname = '{$contact_firstname}', ";
		$query .= "contact_lastname = '{$contact_lastname}', ";
		$query .= "contact_email = '{$contact_email}', ";
		$query .= "contact_password = '{$contact_password}', ";
		$query .= "contact_web_updates = '{$contact_web_updates}', ";
		$query .= "contact_blog = '{$contact_blog}' ";
		$query .= "WHERE contact_email = '{$contact_email}' ";
		$query .= "LIMIT 1";
	
 
		$results = mysqli_query($connection, $query);
	
	
		if ($results && mysqli_affected_rows($connection) >= 0) {
		// Success
			$_SESSION["heading"] = "subscribe";
			$_SESSION["message"] = "Your Art-O-Rama subscription info has been updated.";
			redirect_to("subscribe_thanks.php");
		} else {
		//failure
			$message = "Subscription update failed. " . mysqli_error($connection);
		}


	} else {
	// if record with email does not exist, add it.
		$query = "INSERT INTO contact (";
		$query .= " contact_firstname, contact_lastname, contact_email, contact_password, contact_web_updates, contact_blog";
		$query .= ") VALUES (";
		$query .= " '{$contact_firstname}', '{$contact_lastname}', '{$contact_email}', '{$contact_password}', {$contact_web_updates}, {$contact_blog}";
		$query .= ")";

		$results = mysqli_query($connection, $query);
	
		if ($results) {
			// Success
			$_SESSION["heading"] = "subscribe";
			$_SESSION["message"] = "Thanks for Subscibing to Art-O-Rama!";
			redirect_to("subscribe_thanks.php");
		} else {
			//failure
			$message = "Subscrition failed.";
		}
	}
}

} else {
	// initialize these to be checked 
	$_POST['contact_web_updates'] = 1;
	$_POST['contact_blog'] = 1;
	// this is probably a GET request from the browser URL field
	
} ; // end: if (isset($_POST['submit']))
?>