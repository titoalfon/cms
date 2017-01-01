<?php 
	if(isset($_POST['submitted']) && $_POST['submitted'] == 1){
		$header = mysqli_real_escape_string($dbc, $_POST['header']);
		$title = mysqli_real_escape_string($dbc, $_POST['title']);
		$label= mysqli_real_escape_string($dbc, $_POST['label']);
		$user= mysqli_real_escape_string($dbc, $_POST['user']);
		$body= mysqli_real_escape_string($dbc, $_POST['body']);
		$slug= mysqli_real_escape_string($dbc, $_POST['slug']);
		if(isset($_POST['id']) && $_POST['id'] != "") {
			
			$query = "UPDATE pages SET header = '$header', title = '$title', label = '$label',
			 				 user_id = '$user', body = '$body', slug = '$slug' 
			 				 WHERE id = '$_POST[id]';";
			$action = "UPDATED!";
		} else {
			$query = "INSERT INTO pages (header, title, label, user_id, body, slug) VALUES('$header', '$title', '$label', '$user', '$body', '$slug');";
			$action = "ADDED!";
		}
		$r = mysqli_query($dbc, $query);
		if($r) {
			$message = "<p>Page was successfully $action</p>";
		}else{
			$message = "<p>Error en el query por:" . mysqli_error($dbc) . "</p>";
			$message .= "<p>" . $query . "</p>";
		}
	}
?>