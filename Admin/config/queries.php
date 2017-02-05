<?php 

	switch($page){
		case 'dashboard':
			break;
		case 'pages':
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
					$message = "<p class=\"alert alert-success\">Page was successfully $action</p>";
				}else{
					$message = "<p class=\"alert alert-danger\">Error en el query por:" . mysqli_error($dbc) . "</p>";
					$message .= "<p class=\"alert alert-warning\">" . $query . "</p>";
				}
			}
			if(isset($_GET['id'])){	$opened = retrieve_page($dbc, $_GET['id']);}
			break;
			case 'users':
				if(isset($_POST['submitted']) && $_POST['submitted'] == 1){
					$first = mysqli_real_escape_string($dbc, $_POST['first']);
					$last= mysqli_real_escape_string($dbc, $_POST['last']);
					$email= mysqli_real_escape_string($dbc, $_POST['email']);
					
					if($_POST['password'] != '') {
						if($_POST['password'] == $_POST['verification']) {
							$password = "password = SHA1('$_POST[password]'),";
							$verify = true;
						} else {
							$verify = false;
						}
					} else {
						$verify = false;
					}
					
					if(isset($_POST['id']) && $_POST['id'] != "") {
						
						$query = "UPDATE users SET first = '$first',
										 last = '$last',
										 $password status = $_POST[status] WHERE id = '$_POST[id]';";
						$r = mysqli_query($dbc, $query);
						$action = "UPDATED!";
					} else {
						
							$query = "INSERT INTO users (first, last, email, password, status) VALUES('$first', '$last', '$email', SHA1('$_POST[password]'), '$_POST[status]');";
							if($verify == true) {
								$r = mysqli_query($dbc, $query);
								$action = "ADDED!";
							}
						
					}
					
					if($r) {
						$message = "<p class=\"alert alert-success\">User was successfully $action</p>";
						}else{
						$message = "<p class=\"alert alert-danger\">Error en el query por: " . mysqli_error($dbc) . "</p>";
						if($verify == false) {
							$message .= "<p class=\"alert alert-danger\">Password vacío/no coincidente</p>";
						}
						$message .= "<p class=\"alert alert-warning\">" . $query . "</p>";
					}
				}
				if(isset($_GET['id'])){	$opened = retrieve_user($dbc, $_GET['id']);}
			break;
			case 'settings':
				if(isset($_POST['submitted']) && $_POST['submitted'] == 1){
					$value = mysqli_real_escape_string($dbc, $_POST['value']);
					$label= mysqli_real_escape_string($dbc, $_POST['label']);
					$id= mysqli_real_escape_string($dbc, $_POST['id']);
					
					if(isset($_POST['id']) && $_POST['id'] != "") {
						
						$query = "UPDATE settings SET id = '$id', value = '$value',
										 label = '$label' WHERE id = '$_POST[openedid]';";
						$r = mysqli_query($dbc, $query);
						$action = "UPDATED!";
					} 
					
					if($r) {
						$message = "<p class=\"alert alert-success\">Setting was successfully $action</p>";
						}else{
						$message = "<p class=\"alert alert-danger\">Error en el query por: " . mysqli_error($dbc) . "</p>";
						$message .= "<p class=\"alert alert-warning\">" . $query . "</p>";
						}					
						
				}
			
			break;
		
	}

?>