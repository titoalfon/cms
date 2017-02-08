<?php
include_once '../../config/connection.php';
$selected_id = $_GET['uid'];
$consulta = "DELETE FROM users WHERE id = '$selected_id';";
$result = mysqli_query($dbc, $consulta) or die("No se puedo borrar el usuario: " . mysqli_error($dbc));

?>