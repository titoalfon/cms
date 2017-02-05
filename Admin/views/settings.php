<h1>Settings</h1>

<div class="row">
		<div class="col-md-12">
		<div><p><?php if(isset($message)) echo $message;?></p></div>
		<?php 
	
			$all_users = retrieve_settings($dbc);
			while($opened = mysqli_fetch_assoc($all_users)) { ?>
				<form class="form-inline" method="post" action="index.php?page=settings&id=<?php echo $opened['id'];?>">
				
					  
					  <div class="form-group">
					    <label for="id">ID</label>
					    <input type="text" class="form-control" id="id" name="id" placeholder="ID"
					    value="<?php if(isset($opened['id']))echo $opened['id'];?>">
					  </div>
					
					  <div class="form-group">
					    <label for="label">Label</label>
					    <input type="text" class="form-control" id="label" name="label" placeholder="Label"
					    value="<?php if(isset($opened['id'])) echo $opened['label'];?>">
					  </div>
					  
					  <div class="form-group">
					    <label for="value">Value</label>
					    <input type="text" class="form-control" id="value" name="value" placeholder="Setting Value"
					    value="<?php if(isset($opened['id']))echo $opened['value'];?>">
					  </div>
					   
					 <!-- <div class="checkbox">
					    <label>
					      <input type="checkbox"> Check me out
					    </label>
					  </div> -->
				
					  <button type="submit" name='save' class="btn btn-default">Save</button>
					  <input type="hidden" name="submitted" value="1">
					  <?php if(isset($opened['id'])) { ?>
						<input type="hidden" name="openedid" value="<?php echo $opened['id']; ?>">
					  <?php } ?>
					</form> 
					
		<?php	} ?>	
								
		</div><!-- End of md-12 -->
		
		
	</div><!-- End of div row -->