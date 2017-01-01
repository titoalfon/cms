<nav class="navbar navbar-default">
	
	<div class="container">
		<?php if($debug == 1) {?> 
			<button id="btn-debug" class="btn btn-default"><i class="fa fa-bug"></i></button>
		<?php } ?>
		<ul class="nav navbar-nav">
			
			<?php nav_main($dbc, $pageid);?>

    	</ul>
	</div>
</nav><!-- End main navigation -->