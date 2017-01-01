<?php

function retrive_page($dbc, $pageid) {
	if(is_numeric($pageid)) {
		$cond = "id = '$pageid';";
	}else{
		$cond = "slug = '$pageid';";
	}
	$query = "SELECT * FROM pages WHERE $cond";
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
	
	$q = "SELECT * FROM settings WHERE id='$id';";
	$r = mysqli_query($dbc, $q);
	$debug = mysqli_fetch_assoc($r);
	return $debug['value'];
	
}









?>