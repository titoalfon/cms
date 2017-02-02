<?php
session_start();
if(!isset($_SESSION['username'])) {
	header('Location: login.php');
}

?>

<?php require_once 'config/setup.php';?>
<!DOCTYPE html>
<html>
	
	<head>
		
		<title><?php echo 'Management';?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="UTF-8">

		<?php
			include_once 'config/css.php';
			include_once 'config/js.php';
			
	
		?>
			
	</head>
	
	<body>
		<?php include_once NAVIGATION; ?>