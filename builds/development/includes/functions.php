<?php

function redirect_to($new_location) {
	header("Location: " . $new_location);
	exit;
}

function mysql_prep($string) {
	global $connection;
	$escaped_string = mysqli_real_escape_string($connection, $string);
	return $escaped_string;
}

function confirm_query($result_set) {
	if (!$result_set) {
		die("Database query failed.");
	}
}

function form_errors($errors=array()) {
	$output = "";
	if (!empty($errors)) {
	  $output .= "<div class=\"error\">";
	  $output .= "Please fix the following errors:";
	  $output .= "<ul>";
	  foreach ($errors as $key => $error) {
	    $output .= "<li>";
			$output .= htmlentities($error);
			$output .= "</li>";
	  }
	  $output .= "</ul>";
	  $output .= "</div>";
	}
	return $output;
}
// aor function
function find_all_artist() {
	global $connection;
	$query = "SELECT * ";
	$query .= "FROM artist ";
	$query .= "ORDER BY artist_name ASC";
	$artist_set = mysqli_query($connection, $query);
	confirm_query($artist_set);
	return $artist_set;
}
// aor function
function find_all_exhibit() {
	global $connection;
	$query = "SELECT * ";
	$query .= "FROM exhibit ";
	$query .= "ORDER BY exhibit_name ASC";
	$exhibit_set = mysqli_query($connection, $query);
	confirm_query($exhibit_set);
	return $exhibit_set;
}

function find_all_gallery() {
	global $connection;
	$query = "SELECT * ";
	$query .= "FROM gallery ";
	$query .= "ORDER BY gallery_exhibit_id ASC";
	$gallery_set = mysqli_query($connection, $query);
	confirm_query($gallery_set);
	return $gallery_set;
}

function find_all_art() {
	global $connection;
	$query = "SELECT * ";
	$query .= "FROM art ";
	if (isset($_POST["art_gallery_id"])) {
		$art_gallery_id = $_POST["art_gallery_id"];
		$query .= "WHERE art_gallery_id = {$art_gallery_id} ";
	}
	$query .= "ORDER BY art_order ASC";
	$art_set = mysqli_query($connection, $query);
	confirm_query($art_set);
	return $art_set;
}

function find_all_media() {
	global $connection;
	$query = "SELECT * ";
	$query .= "FROM media_lookup ";
	$query .= "ORDER BY media_id ASC";
	$media_set = mysqli_query($connection, $query);
	confirm_query($media_set);
	return $media_set;
}
function find_all_video() {
	global $connection;
	$query = "SELECT * ";
	$query .= "FROM video ";
	$query .= "ORDER BY video_id ASC";
	$video_set = mysqli_query($connection, $query);
	confirm_query($video_set);
	return $video_set;
}
function find_all_admin() {
	global $connection;
	$query = "SELECT * ";
	$query .= "FROM admin ";
	$query .= "ORDER BY admin_id ASC";
	$admin_set = mysqli_query($connection, $query);
	confirm_query($admin_set);
	return $admin_set;
}
//function find_all_subjects() {
//	global $connection;
//	$query = "SELECT * ";
//	$query .= "FROM subjects ";
//	$query .= "ORDER BY position ASC";
//	$subject_set = mysqli_query($connection, $query);
//	confirm_query($subject_set);
//	return $subject_set;
//}

//function find_pages_for_subject($subject_id) {
//	global $connection;
//	
//	$safe_subject_id = mysqli_real_escape_string($connection, $subject_id);
//	
//	$query = "SELECT * ";
//	$query .= "FROM pages ";
//	$query .= "WHERE visible = 1 ";
//	$query .= "AND subject_id = {$safe_subject_id} ";
//	$query .= "ORDER BY position ASC";
//	$page_set = mysqli_query($connection, $query);
//	confirm_query($page_set);
//	return $page_set;
//	}

//	function navigation($subject_array, $page_array) {
//		$output = "<ul class=\"subjects\">";
//		$subject_set = find_all_subjects();
//		while($subject = mysqli_fetch_assoc($subject_set)) {
//			$output .= "<li";
//			if ($subject_array && $subject["id"] == $subject_array["id"]) {
//				$output .= " class=\"selected\"";
//			}
//			$output .= ">";
//			$output .= "<a href=\"manage_content.php?subject=";
//			$output .= urlencode($subject["id"]);
//			$output .= "\">";
//			$output .= htmlentities($subject["menu_name"]);
//			$output .= "</a>";
//			
//			$page_set = find_pages_for_subject($subject["id"]);
//			$output .= "<ul class=\"pages\">";
//			while($page = mysqli_fetch_assoc($page_set)) {
//				$output .= "<li";
//				if ($page_array && $page["id"] == $page_array["id"]) {
//					$output .= " class=\"selected\"";
//				}
//				$output .= ">";
//				$output .= "<a href=\"manage_content.php?page=";
//				$output .= urlencode($page["id"]);
//				$output .= "\">";
//				$output .= htmlentities($page["menu_name"]);
//				$output .= "</a></li>";
//			}
//			mysqli_free_result($page_set);
//			$output .= "</ul></li>";
//		}
//		mysqli_free_result($subject_set);
//		$output .= "</ul>";
//		return $output;
//	}
//	
//	function find_subject_by_id($subject_id) {
//	global $connection;
//	
//	$safe_subject_id = mysqli_real_escape_string($connection, $subject_id);
//	
//	$query = "SELECT * ";
//	$query .= "FROM subjects ";
//	$query .= "WHERE id = {$safe_subject_id} ";
//	$query .= "LIMIT 1";
//	$subject_set = mysqli_query($connection, $query);
//	confirm_query($subject_set);
//	if ($subject = mysqli_fetch_assoc($subject_set)) {
//		return $subject;	
//	} else {
//		return null;
//	}
//	}

// aor function	
function find_artist_by_id($artist_id) {
	global $connection;
	
	$safe_artist_id = mysqli_real_escape_string($connection, $artist_id);
	
	$query = "SELECT * ";
	$query .= "FROM artist ";
	$query .= "WHERE artist_id = {$safe_artist_id} ";
	$query .= "LIMIT 1";
	$artist_set = mysqli_query($connection, $query);
	confirm_query($artist_set);
	if ($artist = mysqli_fetch_assoc($artist_set)) {
		return $artist;	
	} else {
		return null;
	}
	}
// aor function	
function find_exhibit_by_id($exhibit_id) {
	global $connection;
	
	$safe_exhibit_id = mysqli_real_escape_string($connection, $exhibit_id);
	
	$query = "SELECT * ";
	$query .= "FROM exhibit ";
	$query .= "WHERE exhibit_id = {$safe_exhibit_id} ";
	$query .= "LIMIT 1";
	$exhibit_set = mysqli_query($connection, $query);
	confirm_query($exhibit_set);
	if ($exhibit = mysqli_fetch_assoc($exhibit_set)) {
		return $exhibit;	
	} else {
		return null;
	}
	}

function find_gallery_by_id($gallery_id) {
	global $connection;
	
	$safe_gallery_id = mysqli_real_escape_string($connection, $gallery_id);
	
	$query = "SELECT * ";
	$query .= "FROM gallery ";
	$query .= "WHERE gallery_id = {$safe_gallery_id} ";
	$query .= "LIMIT 1";
	$gallery_set = mysqli_query($connection, $query);
	confirm_query($gallery_set);
	if ($gallery = mysqli_fetch_assoc($gallery_set)) {
		return $gallery;	
	} else {
		return null;
	}
	}
	
	function find_gallery_by_name($gallery_name){
	global $connection;
	
	$safe_gallery_name = mysqli_real_escape_string($connection, $gallery_name);
	
	$query = "SELECT * ";
	$query .= "FROM gallery ";
	$query .= "WHERE gallery_name = '{$safe_gallery_name}' ";
	$query .= "LIMIT 1";
	$gallery_set = mysqli_query($connection, $query);
	confirm_query($gallery_set);
	if ($gallery = mysqli_fetch_assoc($gallery_set)) {
		return $gallery;	
	} else {
		return null;
	}
	}
	
	function find_art_by_id($art_id) {
	global $connection;
	
	$safe_art_id = mysqli_real_escape_string($connection, $art_id);
	
	$query = "SELECT * ";
	$query .= "FROM art ";
	$query .= "WHERE art_id = {$safe_art_id} ";
	$query .= "LIMIT 1";
	$art_set = mysqli_query($connection, $query);
	confirm_query($art_set);
	if ($art = mysqli_fetch_assoc($art_set)) {
		return $art;	
	} else {
		return null;
	}
	}
	
	function find_all_art_by_gallery_id($art_gallery_id) {
	global $connection;
	
	$safe_art_gallery_id = mysqli_real_escape_string($connection, $art_gallery_id);
	
	$query = "SELECT * ";
	$query .= "FROM art ";
	$query .= "WHERE art_gallery_id = {$safe_art_gallery_id} ";
	$query .= "ORDER BY art_order ASC";
	//$query .= "LIMIT 1";
	$art_set = mysqli_query($connection, $query);
	confirm_query($art_set);
	return $art_set;
	}
	//function find_all_art() {
//	global $connection;
//	$query = "SELECT * ";
//	$query .= "FROM art ";
//	$query .= "ORDER BY art_id ASC";
//	$art_set = mysqli_query($connection, $query);
//	confirm_query($art_set);
//	return $art_set;
//}

	
	function find_video_by_id($video_id) {
	global $connection;
	
	$safe_video_id = mysqli_real_escape_string($connection, $video_id);
	
	$query = "SELECT * ";
	$query .= "FROM video ";
	$query .= "WHERE video_id = {$safe_video_id} ";
	$query .= "LIMIT 1";
	$video_set = mysqli_query($connection, $query);
	confirm_query($video_set);
	if ($video = mysqli_fetch_assoc($video_set)) {
		return $video;	
	} else {
		return null;
	}
	}
	
	function find_admin_by_id($admin_id) {
	global $connection;
	
	$safe_admin_id = mysqli_real_escape_string($connection, $admin_id);
	
	$query = "SELECT * ";
	$query .= "FROM admin ";
	$query .= "WHERE admin_id = {$safe_admin_id} ";
	$query .= "LIMIT 1";
	$admin_set = mysqli_query($connection, $query);
	confirm_query($admin_set);
	if ($admin = mysqli_fetch_assoc($admin_set)) {
		return $admin;	
	} else {
		return null;
	}
	}

		function find_admin_by_user($admin_user) {
	global $connection;
	
	$safe_admin_user = mysqli_real_escape_string($connection, $admin_user);
	
	$query = "SELECT * ";
	$query .= "FROM admin ";
	$query .= "WHERE admin_user = '{$safe_admin_user}' ";
	$query .= "LIMIT 1";
	$admin_set = mysqli_query($connection, $query);
	confirm_query($admin_set);
	if ($admin = mysqli_fetch_assoc($admin_set)) {
		return $admin;	
	} else {
		return null;
	}
	}

	function find_all_video_by_gallery_id($video_gallery_id) {
	global $connection;
	
	$safe_video_gallery_id = mysqli_real_escape_string($connection, $video_gallery_id);
	
	$query = "SELECT * ";
	$query .= "FROM video ";
	$query .= "WHERE video_gallery_id = {$safe_video_gallery_id} ";
	$query .= "ORDER BY video_order ASC";
	//$query .= "LIMIT 1";
	$video_set = mysqli_query($connection, $query);
	confirm_query($video_set);
	return $video_set;
	}

	function find_media_by_id($media_id) {
	global $connection;
	
	$safe_media_id = mysqli_real_escape_string($connection, $media_id);
	
	$query = "SELECT * ";
	$query .= "FROM media_lookup ";
	$query .= "WHERE media_id = {$safe_media_id} ";
	$query .= "LIMIT 1";
	$media_set = mysqli_query($connection, $query);
	confirm_query($media_set);
	if ($media = mysqli_fetch_assoc($media_set)) {
		return $media;	
	} else {
		return null;
	}
	}
	//function find_page_by_id($page_id) {
//	global $connection;
//	
//	$safe_page_id = mysqli_real_escape_string($connection, $page_id);
//	
//	$query = "SELECT * ";
//	$query .= "FROM pages ";
//	$query .= "WHERE id = {$safe_page_id} ";
//	$query .= "LIMIT 1";
//	$page_set = mysqli_query($connection, $query);
//	confirm_query($page_set);
//	if ($page = mysqli_fetch_assoc($page_set)) {
//		return $page;	
//	} else {
//		return null;
//	}
//	}

//function find_selected_page() {
//	global $current_subject;
//	global $current_page;
//	
//	if (isset($_GET["subject"])) {
//		$current_subject = find_subject_by_id($_GET["subject"]);
//		$current_page = null;
//	} elseif (isset($_GET["page"])) {
//		$current_page = find_page_by_id($_GET["page"]);
//		$current_subject = null;
//	} else {
//		$current_page = null;
//		$current_subject = null;
//	}
//}
// aor function
function find_selected_artist() {
	global $current_artist;
	
	if (isset($_GET["artist"])) {
		$current_artist = find_artist_by_id($_GET["artist"]);
	} else {
		$current_artist = null;
	}
}
// aor function
function find_selected_exhibit() {
	global $current_exhibit;
	
	if (isset($_GET["exhibit"])) {
		$current_exhibit = find_exhibit_by_id($_GET["exhibit"]);
	} else {
		$current_exhibit = null;
	}
}
function find_selected_gallery() {
	global $current_gallery;
	
	if (isset($_GET["gallery"])) {
		$current_gallery = find_gallery_by_id($_GET["gallery"]);
	} else {
		$current_exhibit = null;
	}
}
function find_selected_art() {
	global $current_art;
	
	if (isset($_GET["art"])) {
		$current_art = find_art_by_id($_GET["art"]);
	} else {
		$current_art = null;
	}
}
function find_selected_video() {
	global $current_video;
	
	if (isset($_GET["video"])) {
		$current_video = find_video_by_id($_GET["video"]);
	} else {
		$current_video = null;
	}
}
function find_selected_admin() {
	global $current_admin;
	
	if (isset($_GET["admin"])) {
		$current_admin = find_admin_by_id($_GET["admin"]);
	} else {
		$current_admin = null;
	}
}


// aor function
function load_selected($current_li) {
	global $selected_table;
	if ($selected_table["table"] == $current_li) {
		return "selected";
	} else {
		return null;
	}
}

function number_to_letter($num) {
	$alphabet = range('a', 'z');
	$num--;
	return $alphabet[$num];
}

function password_encrypt($password) {
		$hash_format = "$2y$10$"; //tell PHP to use blowfish with a cost of 10
		$salt_length = 22; //blowfish salt should be 22 or mor chars
		$salt = generate_salt($salt_length);
		
		$format_and_salt = $hash_format . $salt;
		$hash = crypt($password, $format_and_salt);
		return $hash;	
}

function generate_salt($length) {
	// not 100% unque or random but good enough for a salt
	// MD5 returns 32 chars
	$unique_random_string = md5(uniqid(mt_rand(), true));
	// valid chars for a salt are [a-zA-Z0-9./]
	$base64_string = base64_encode($unique_random_string);
	// But not '+' which is valid in base64 encoding
	$modified_base64_string = str_replace('+', '.', $base64_string);
	//truncate to correct length
	$salt = substr($modified_base64_string, 0, $length);
	return $salt;
}

function password_check($password, $existing_hash) {
	//existing hash contains format and salt at start
	$hash = crypt($password, $existing_hash);
	if ($hash === $existing_hash) {
		return true;
	} else {
		return false;
	}
}

function attempt_login($username, $password) {
	$admin = find_admin_by_user($username);
	if ($admin) {
		if (password_check($password, $admin["admin_password"])) {
			return $admin;
		} else {
			return false;
		}
	} else {
		return false;
	}
}
function logged_in() {
	return isset($_SESSION['admin_id']);
}
function confirm_logged_in() {
	if (!logged_in()) {
	redirect_to("login.php");
}

}
?>