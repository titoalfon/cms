<?php

function nav_main($dbc, $pageid) {
	$q = "SELECT * FROM pages;";
	$resultado = mysqli_query($dbc, $q);
	
	while($pagina = mysqli_fetch_assoc($resultado)) { ?>
		<li<?php echo $pageid == $pagina['slug']? ' class="active"' : ""; ?>>
		<a href="?page=<?php echo $pagina['slug'];?>"><?php echo $pagina['label'];?></a>
		</li>
					
		<?php	} 
				
}



?>