<?php require_once 'config/setup.php';?>
<!DOCTYPE html>
<html>
	
	<head>
		
		<title><?php echo $page['title'];?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?php
			include_once 'config/css.php';
			include_once 'config/js.php';
		?>
			
	</head>
	
	<body>
		<?php include_once NAVIGATION; ?>
				
		<div class="container">
			
			<div><?php echo isset($error)? $error : "";?></div>
			<h1><?php echo $page['header'];?></h1>
			
			<?php echo $page['body_formatted'];?>

		</div><!-- End of container body -->
		
	<?php include_once FOOTER;?>
		<?php if($debug == 1) {
			  	include_once 'widgets/debug.php';
    		  }
	     ?> 	
	</body>
	
</html>

