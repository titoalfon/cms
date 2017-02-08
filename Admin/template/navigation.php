<nav class="navbar navbar-default">
	
	<!--<div class="container">-->
		
		<ul class="nav navbar-nav">
			
			<?php //nav_main($dbc, $pageid);?>
			<li><a href="?page=dashboard">Landing</a></li>
			<li><a href="?page=pages">Pages</a></li>
			<li><a href="?page=users">Users</a></li>
			<li><a href="?page=settings">Settings</a></li>
			
    	</ul>
    	<div class="pull-right">
	    	<ul class="nav navbar-nav">
				<li><?php if($debug == 1) {?> 
				<button id="btn-debug" class="btn btn-default navbar-btn"><i class="fa fa-bug"></i></button>
			    <?php } ?></li>
			    <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php if(isset($user['full_name'])) echo $user['full_name'];?><span class="caret"></span></a>
		          <ul class="dropdown-menu">
		            <li><a href="logout.php">Log out</a></li>
		            <li role="separator" class="divider"></li>
		            <li><a href="#">Separated link</a></li>
		            <li role="separator" class="divider"></li>
		            <li><a href="#">One more separated link</a></li>
		          </ul>
		        </li>
			  				  	
	    	</ul>
    	</div><!-- End of div pull-right -->
	<!-- </div> End of div container -->
</nav><!-- End main navigation -->