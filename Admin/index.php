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
		
		<title><?php echo $page['title'];?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="UTF-8">

		<?php
			include_once 'config/css.php';
			include_once 'config/js.php';
			
			if(isset($_GET['id'])){
	
				$pagina = retrieve_page($dbc, $_GET['id']);
	
			}	
		?>
			
	</head>
	
	<body>
		<?php include_once NAVIGATION; ?>
		<?php 
						if(isset($_POST['submitted']) && $_POST['submitted'] == 1){
							$header = mysqli_real_escape_string($dbc, $_POST['header']);
							$title = mysqli_real_escape_string($dbc, $_POST['title']);
							$label= mysqli_real_escape_string($dbc, $_POST['label']);
							$user= mysqli_real_escape_string($dbc, $_POST['user']);
							$body= mysqli_real_escape_string($dbc, $_POST['body']);
							$slug= mysqli_real_escape_string($dbc, $_POST['slug']);
							
							$query = "INSERT INTO pages (header, title, label, user_id, body, slug) VALUES('$header', '$title', '$label', '$user', '$body', '$slug');";
							$r = mysqli_query($dbc, $query);
							if($r) {
								$message = "<p>Query realizado con ÉXITO</p>";
							}else{
								$message = "<p>Error en el query por:" . mysqli_error($dbc) . "</p>";
								$message .= "<p>" . $query . "</p>";
							}
						}
					?>
				
		<!--<div class="container">-->
			
			<h1>Area de administración</h1>
			<p>Hecho para git</p>
			<div class="row">
				<div class="col-md-3">
					<div class="list-group">
					<a href="index.php" class="list-group-item">
						<h4 class="list-group-item-heading"><i class="fa fa-plus"></i> Add New Page</h4>
						<p class="list-group-item-text"></p>
					</a>
				<?php 
					$all_pages = retrieve_all_pages($dbc);
					while($pages = mysqli_fetch_assoc($all_pages)) { 
							$blurb = substr(strip_tags($pages['body']), 0, 100);
							?>
							<a href="index.php?id=<?php echo $pages['id'];?>" class="list-group-item">
							<h4 class="list-group-item-heading"><?php echo $pages['title'];?></h4>
							<p class="list-group-item-text"><?php echo $blurb;?></p>
							</a>
								
						
				<?php	}
				?>	
					</div><!-- End of list group -->
				</div>
				<div class="col-md-9">
					
					<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
						
							  
					  		  <div class="form-group">
						  		 <label for="header">Header</label>
								 <input type="text" class="form-control" name='header' id="header" placeholder="Page header"
								  value="<?php if(isset($pagina))echo $pagina['header'];?>">
							  </div> 
							  
							  <div class="form-group">
							    <label for="title">Title</label>
							    <input type="text" class="form-control" id="title" name="title" placeholder="Page Title"
							    value="<?php if(isset($pagina)) echo $pagina['title'];?>">
							  </div>
							
							  <div class="form-group">
							    <label for="label">Label</label>
							    <input type="text" class="form-control" id="label" name="label" placeholder="Page Label"
							    value="<?php if(isset($pagina)) echo $pagina['label'];?>">
							  </div>
							  
							  <div class="form-group">
							    <label for="slug">Slug</label>
							    <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug"
							    value="<?php if(isset($pagina)) echo $pagina['slug'];?>">
							  </div>
							  
							  <div class="form-group">
							  		<?php $logged = retrieve_user($dbc, $_SESSION['username']) ?>
							  		 <label for="user">User</label>
									    <select class="form-control" name="user" id="user">
									    	<!--<option value="<?php echo $logged['id'] ;?>"><?php echo $logged['full_name'];?></option>-->
									    	<?php
									    	$q = "SELECT id FROM users;";
											$r = mysqli_query($dbc, $q);
									    	 while($usuarios_list = mysqli_fetch_assoc($r)) {
									    	 	$usuario = retrieve_user($dbc, $usuarios_list['id']);
									    	 	?> 
									    	<option value="<?php if(isset($pagina)){ echo $usuario['id'];} else {echo $logged['id'] ;}?>"
									    		    <?php if(isset($pagina)){ echo ($usuario['id']==$pagina['user_id'])? 'selected' : '';}
																	else {echo $logged['full_name'];}
									    		?>>
									    	<?php  if(isset($pagina)){ echo $usuario['full_name'];}
                                                   else {
                                                   			echo $logged['full_name'];
                                                        } 
									    	 ?></option>
									    	<?php } ?>
									    </select>
								  </div> 
								
								<div class="form-group">
							  		 <label for="body">Body</label>
								     <textarea class="form-control editor" rows="8" cols="30" name='body' id="body" placeholder="Page Content">
								     	<?php if(isset($pagina)) echo $pagina['body'];?>
								     </textarea>
								  </div> 
							  
							 <!-- <div class="checkbox">
							    <label>
							      <input type="checkbox"> Check me out
							    </label>
							  </div> -->
						
							  <button type="submit" name='save' class="btn btn-default">Save</button>
							  <input type="hidden" name="submitted" value="1">
							</form>
							<div><?php if(isset($message)) echo $message;?></div>
				</div><!-- End of md-8 -->
				
				
			</div><!-- End of div row -->

		<!--</div> End of container body -->
		
	<?php include_once FOOTER;?>
		<?php if($debug == 1) {
			  	include_once 'widgets/debug.php';
    		  }
	     ?> 	
	</body>
	
</html>