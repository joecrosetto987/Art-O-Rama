<?php

$errors = array();

function fieldname_as_text($fieldname) {
	$fieldname = str_replace("_", " ", $fieldname);
	$fieldname = ucfirst($fieldname);
	return $fieldname;
}

// * presence
// use trim() so empty spaces don't count
// use === to avoid false positives
// empty() would consider "0" to be empty
function has_presence($value) {
	return isset($value) && $value !== "";
}

function validate_presences($required_fields) {
	global $errors;
	foreach($required_fields as $field) {
		$value = trim($_POST[$field]);
		if (!has_presence($value)) {
			$errors[$field] = fieldname_as_text($field) . " can't be blank";
		}
	}
}


// * string length
// max length
function has_max_length($value, $max) {
	return strlen($value) <= $max;
}

function validate_max_lengths($fields_with_max_lengths) {
	global $errors;
	// Expects an assoc. array
	foreach($fields_with_max_lengths as $field => $max) {
		$value = trim($_POST[$field]);
	  if (!has_max_length($value, $max)) {
	    $errors[$field] = fieldname_as_text($field) . " is too long";
	  }
	}
}

// * valid email address
function validate_email($emails) {
	global $errors;
	// Expects an assoc. array
	foreach($emails as $email) {
	  $value = trim($_POST[$email]);
	  if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
   		$errors[$email] = fieldname_as_text($email) . " is not a valid format";
	  }
	}
}

// * inclusion in a set
function has_inclusion_in($value, $set) {
	return in_array($value, $set);
}

// Check if a reasonable Year
function validate_year($year_field) {
	global $errors;
	$year = $_POST[$year_field];
	$year = (int)$year;
  if($year<1800 || $year>2100)
    {
      $errors["year"] = "Must be a valid 4 digit year";
    }
}

// Check if reasonable currancy
function validate_currency($money_field) {
	global $errors;
	$money = trim($_POST[$money_field], "$");
	if (!preg_match('/^[0-9]+(?:\.[0-9]{0,2})?$/', $money)) {
 // if (preg_match("/\b\d{1,3}(?:,?\d{3})*(?:\.\d{2})?\b/", $money)) {
		$errors["price"] = "Price must be a valid dollar amount";
	}
}

// Check if numeric
function validate_number($number_field) {
	global $errors;
	$number = trim($_POST[$number_field], "$");
  if (!is_numeric($number)) {
		$errors["order"] = "Order must be a numeric value";
	}
}
?>