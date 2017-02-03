<h1>Users</h1>

<div class="row">
		<div class="col-md-3">
			<div class="list-group">
			<a href="?page=users" class="list-group-item">
				<h4 class="list-group-item-heading"><i class="fa fa-plus"></i> Add New User</h4>
				<p class="list-group-item-text"></p>
			</a>
		<?php 
	
			$all_users = retrieve_all_users($dbc);
			while($list = mysqli_fetch_assoc($all_users)) { 
					//$blurb = substr(strip_tags($pages['body']), 0, 100);
					$list = retrieve_user($dbc, $list['id']);
					?>
					<a href="index.php?page=users&id=<?php echo $list['id'];?>" class="list-group-item <?php selected($list['id'], $opened['id'], 'active')?>">
					<h4 class="list-group-item-heading"><?php echo $list['fullname_reverse'];?></h4>
					<!-- <p class="list-group-item-text"><?php //echo $blurb;?></p>-->
					</a>
						
				
		<?php	}
		?>	
			</div><!-- End of list group -->
		</div>
		<div class="col-md-9">
			
			<form method="post" action="index.php?page=users&id=<?php if(isset($opened)) echo $opened['id'];?>">
				
					  
					  <div class="form-group">
					    <label for="first">First Name</label>
					    <input type="text" class="form-control" id="first" name="first" placeholder="First Name"
					    value="<?php if(isset($opened)) echo $opened['first'];?>">
					  </div>
					
					  <div class="form-group">
					    <label for="last">Last Name</label>
					    <input type="text" class="form-control" id="last" name="last" placeholder="Last Name"
					    value="<?php if(isset($opened)) echo $opened['last'];?>">
					  </div>

					  <div class="form-group">
					  		 <label for="status">Status</label>
							    <select class="form-control" name="status" id="status">
							    	<option value="0" <?php if(isset($_GET['id'])){selected('0', $opened['status'], 'selected');};?>>Inactive</option>
							    	<option value="1" <?php if(isset($_GET['id'])){selected('1', $opened['status'], 'selected');};?>>Active</option>
							    </select>
					  </div> 
							    					  
					  <div class="form-group">
					    <label for="password">Password</label>
					    <input type="text" class="form-control" id="password" name="password" placeholder="Password"
					    value="">
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