<?php
require_once 'config/setup.php';
session_start();
if(isset($_SESSION['username'])) {
	header('Location: index.php');
}else{
	if(isset($_POST['logueo'])) {
		$user = mysqli_real_escape_string($dbc, $_POST['nombre']);
		$pass = sha1(mysqli_real_escape_string($dbc, $_POST['pass']));
		$q = "SELECT * FROM users WHERE first = '$user' AND password = '$pass';";
		$r = mysqli_query($dbc, $q);
		if(mysqli_num_rows($r)== 1 ) {
			$user = mysqli_fetch_assoc($r);
			$_SESSION['username'] = $user['first'];
			header('Location: index.php');
			
		}else{
			$error = "Name or password incorrect";
		}
		
	}
	
}


?>

<!DOCTYPE html>
<html>
	
	<head>
		
		<title>Admin Login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="UTF-8">
		<?php
			include_once 'config/css.php';
			include_once 'config/js.php';
		?>
			
	</head>
	
	<body>
		<?php include_once NAVIGATION; ?>
				
		<div class="container">
			<div class="row">
				
				<div class="col-md-4 col-md-offset-4">
					<div class="panel panel-primary">
						<div class="panel-heading"><h2>Login</h2></div>
						<div class="panel-body">
							<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
							  <div class="form-group">
							  		 <label for="nombre">Email address</label>
									    <input type="text" class="form-control" name='nombre' id="nombre" placeholder="Email">
								  </div> 
							
							  <div class="form-group">
							    <label for="pass">Password</label>
							    <input type="password" class="form-control" id="pass" name="pass" placeholder="Password">
							  </div>
							 <!-- <div class="checkbox">
							    <label>
							      <input type="checkbox"> Check me out
							    </label>
							  </div> -->
						
							  <button type="submit" name='logueo' class="btn btn-default">Submit</button>
							</form>
						</div><!-- End of div panel-body -->
					</div><!-- End of div panel-primary -->
					<div id="errors"><?php echo isset($error)? $error : "";?></div>
				</div><!-- End of div col-md-4 -->
				
			</div><!-- End of div row-->
		</div><!-- End of container body-->
		
	<?php include_once FOOTER;?>
		<?php if($debug == 1) {
			  	include_once 'widgets/debug.php';
    		  }
	     ?> 	
	</body>
	
</html>