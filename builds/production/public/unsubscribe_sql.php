<?php

// THE BELOW LINE STATES THAT IF THE SUBMIT BUTTON
// WAS PUSHED, EXECUTE THE PHP CODE BELOW TO SEND THE 
// MAIL. IF THE BUTTON WAS NOT PRESSED, SKIP TO THE CODE
// BELOW THE "else" STATEMENT (WHICH SHOWS THE FORM INSTEAD).
if (isset($_POST['submit'])) {
	// Validation
$required_fields = array("email");
validate_presences($required_fields);

$fields_with_max_lengths = array("email" => 255);
validate_max_lengths($fields_with_max_lengths);

$emails = array("email");
validate_email($emails);



if (empty($errors)) {

	$contact_email = mysql_prep($_POST["email"]);
// if record with same email exists, update other info	
	if (find_contact_by_email($contact_email))
	{

		$contact_firstname = $current_contact["contact_firstname"];
		$contact_lastname = $current_contact["contact_lastname"];
		$contact_email = $current_contact["contact_email"];
		$contact_password = "";//password_encrypt($_POST["contact_password"]);
		$contact_web_updates = 0;
		$contact_blog = 0;

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
			$_SESSION["heading"] = "unsubscribe";
			$_SESSION["message"] = "You are no longer subscribed to Art-O-Rama.";
			redirect_to("subscribe_thanks.php");
		} else {
		//failure
			$message = "UnSubscribe failed. " . mysqli_error($connection);
		}


	} else {
//users email is not in the database so they aren't subscribed so lets just say everything was successful.
		$_SESSION["heading"] = "unsubscribe";
		$_SESSION["message"] = "You are no longer subscribed to Art-O-Rama.";
		redirect_to("subscribe_thanks.php");
			
	}
}

} else {
	// initialize these to be checked 
	$_POST['contact_web_updates'] = 1;
	$_POST['contact_blog'] = 1;
	// this is probably a GET request from the browser URL field
	
} ; // end: if (isset($_POST['submit']))
?>