<?php
//JavaScript file:
?>
<!-- jQuery CDN -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>		
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<!-- TinyMCE CDN -->
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
	$('document').ready(function(){
		
		$('#console-debug').hide();
		$('#btn-debug').click(function(){
			$('#console-debug').toggle();
		});
		
		tinymce.init({
		  selector: '.editor',  // change this value according to your HTML
		  plugins : 'advlist autolink link image lists charmap print preview code'
		  
		});
				
	});
	
</script>