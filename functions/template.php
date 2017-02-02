<?php

function nav_main($dbc, $path) {
	$q = "SELECT * FROM pages;";
	$resultado = mysqli_query($dbc, $q);
	
	while($pagina = mysqli_fetch_assoc($resultado)) { ?>
		<li<?php echo selected($path['call_parts'][0],$pagina['slug'], ' class="active"');?>>
		<a href="<?php echo $pagina['slug'];?>"><?php echo $pagina['label'];?></a>
		</li>
					
		<?php	} 
				
}



?>