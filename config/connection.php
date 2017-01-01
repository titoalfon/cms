<?php
#Database variables
$host = "localhost";
$user = "atom";
$pass = "0000";
$db = "atomcms";

#Database connection
$dbc = mysqli_connect($host, $user, $pass, $db) or die("Error, could not connect due to: " . mysqli_connect_error());
?>