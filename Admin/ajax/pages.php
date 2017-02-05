<?php
include_once '../../config/connection.php';
$selected_id = $_GET['id'];
$consulta = "DELETE FROM pages WHERE id = '$selected_id';";
$result = mysqli_query($dbc, $consulta) or die("No se puedo borrar la página: " . mysqli_error($dbc));





?>