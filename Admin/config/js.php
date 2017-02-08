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
		
		$('.btn-delete').on("click", function() {
			
			var selected = $(this).attr('id');
			var page_id = selected.slice(4);
			//alert(selected);
			var confirmed = confirm('¿Estás seguro de que quieres borrar la página?');
			if (confirmed) {
				$.get('ajax/pages.php?id='+page_id);
				$(this).parent().parent().remove();
			}
		});
		
		$('.btn-deluser').on("click", function() {
			
			var selected = $(this).attr('id');
			var user_id = selected.slice(4);
			var confirmed = confirm('¿Estás seguro de que quieres borrar este usuario?');
			if (confirmed) {
				$.get('ajax/users.php?uid='+user_id);
				$('#usuario_'+user_id).remove();
			}
		});
		
		tinymce.init({
		  selector: '.editor',  // change this value according to your HTML
		  plugins : 'advlist autolink link image lists charmap print preview code'
		  
		});
				
	});
	
</script>