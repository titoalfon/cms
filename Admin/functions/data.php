<?php

function retrieve_page($dbc, $pageid) {

	$query = "SELECT * FROM pages WHERE id=$pageid";
	$result = mysqli_query($dbc, $query); 
	if(mysqli_num_rows($result) > 0) {
		$page = mysqli_fetch_assoc($result);
		$page['body_nohtml'] = strip_tags($page['body']);
		if($page['body'] == $page['body_nohtml']) {
			
			$page['body_formatted'] = '<p>' . $page['body'] . '</p>';
		} else {
			
			$page['body_formatted'] = $page['body'];
		}
		return $page;
	} else {
		$error = "No matches found!";
		return $error;
}
	
}

function retrieve_settings_value($dbc, $id) {

	$q = "SELECT * FROM settings WHERE id = '$id';";
	$r = mysqli_query($dbc, $q);
	$debug = mysqli_fetch_assoc($r);
	return $debug['value'];
	
}

function retrieve_user($dbc, $id) {
	
	if(is_numeric($id)) {
		$cond = "id = '$id';";
	}else {
		$cond = "first = '$id';";
	}
	$q = "SELECT * FROM users WHERE " . $cond;
	$r = mysqli_query($dbc, $q);
	if(mysqli_num_rows($r) == 1){
		$user = mysqli_fetch_assoc($r);
		$user['full_name'] = $user['first'] . ' ' . $user['last'];
		$user['fullname_reverse'] = $user['last'] . ' ' . $user['first'];
		return $user;
	}else{
		return "Error en el query";
	}
	
}

function retrieve_all_pages($dbc) {
		
	$q = "SELECT * FROM pages;";
	return mysqli_query($dbc, $q);
		
	
}

/*function retrieve_all_users($dbc) {
	$q = "SELECT id FROM users;";
	return mysqli_query($dbc, $q);
	
}*/









?>