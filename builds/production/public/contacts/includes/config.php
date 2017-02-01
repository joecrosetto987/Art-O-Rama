<?php
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASS", "cloud987");
define("DB_NAME", "aor1");
$contacts = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
if(mysqli_connect_errno()) {
	die("Database connection failed: " . 
	mysqli_connect_error() . 
	" (" . mysqli_connect_errno() . ")"
	);
}


//mysql connection information

//$hostname_contacts = "localhost";  
//$database_contacts = "aor1"; //The name of the database
//$username_contacts = "root"; //The username for the database
//$password_contacts = "cloud987"; // The password for the database
//$contacts = mysqli_connect($hostname_contacts, $username_contacts, $password_contacts) or trigger_error(mysql_error(),E_USER_ERROR); 
//mysql_select_db($database_contacts, $contacts);

//

?>