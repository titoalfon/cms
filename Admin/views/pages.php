<h1>Page Manager</h1>
	<div class="row">
		<div class="col-md-3">
			<div class="list-group">
			<a href="?page=pages" class="list-group-item">
				<h4 class="list-group-item-heading"><i class="fa fa-plus"></i> Add New Page</h4>
				<p class="list-group-item-text"></p>
			</a>
		<?php 
	
			$all_pages = retrieve_all_pages($dbc);
			while($list = mysqli_fetch_assoc($all_pages)) { 
					$blurb = substr(strip_tags($list['body']), 0, 100);
					?>
					<a href="index.php?page=pages&id=<?php echo $list['id'];?>" class="list-group-item <?php selected($list['id'], $opened['id'], 'active')?>">
					<h4 class="list-group-item-heading"><?php echo $list['title'];?></h4>
					<p class="list-group-item-text"><?php echo $blurb;?></p>
					</a>
						
				
		<?php	}
		?>	
			</div><!-- End of list group -->
		</div>
		<div class="col-md-9">
			
			<form method="post" action="index.php?page=pages&id=<?php if(isset($opened)) echo $opened['id'];?>">
				
					  
			  		  <div class="form-group">
				  		 <label for="header">Header</label>
						 <input type="text" class="form-control" name='header' id="header" placeholder="Page header"
						  value="<?php if(isset($opened))echo $opened['header'];?>">
					  </div> 
					  
					  <div class="form-group">
					    <label for="title">Title</label>
					    <input type="text" class="form-control" id="title" name="title" placeholder="Page Title"
					    value="<?php if(isset($opened)) echo $opened['title'];?>">
					  </div>
					
					  <div class="form-group">
					    <label for="label">Label</label>
					    <input type="text" class="form-control" id="label" name="label" placeholder="Page Label"
					    value="<?php if(isset($opened)) echo $opened['label'];?>">
					  </div>
					  
					  <div class="form-group">
					    <label for="slug">Slug</label>
					    <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug"
					    value="<?php if(isset($opened)) echo $opened['slug'];?>">
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
							    	<option value="<?php if(isset($opened)){ echo $usuario['id'];} else {echo $logged['id'] ;}?>"
							    		    <?php if(isset($opened)){ selected($usuario['id'], $opened['user_id'], 'selected');}
															else {selected($usuario['id'],$logged['id'],'selected');}
                                                     
							    		?>>
							    	<?php echo $usuario['full_name'];?></option>
							    	<?php } ?>
							    </select>
						  </div> 
						
						<div class="form-group">
					  		 <label for="body">Body</label>
						     <textarea class="form-control editor" rows="8" cols="30" name='body' id="body" placeholder="Page Content">
						     	<?php if(isset($opened)) echo $opened['body'];?>
						     </textarea>
						  </div> 
					  
					 <!-- <div class="checkbox">
					    <label>
					      <input type="checkbox"> Check me out
					    </label>
					  </div> -->
				
					  <button type="submit" name='save' class="btn btn-default">Save</button>
					  <input type="hidden" name="submitted" value="1">
					  <input type="hidden" name="id" value="<?php if(isset($opened)) echo $opened['id'];?>">
					</form>
					<div><?php if(isset($message)) echo $message;?></div>
		</div><!-- End of md-8 -->
		
		
	</div><!-- End of div row -->