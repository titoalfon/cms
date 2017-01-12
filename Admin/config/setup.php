<?php
require_once '../config/connection.php';
include_once 'functions/data.php';
include_once 'functions/template.php';
include_once 'functions/sandbox.php';
//Setup file:
#Constants
define("TEMPLATE", "template");
define("FOOTER", "template/footer.php");
define("NAVIGATION", "template/navigation.php");
#Database variables
$host = "localhost";
$user = "atom";
$pass = "0000";
$db = "atomcms";

#Database connection
$dbc = mysqli_connect($host, $user, $pass, $db) or die("Error, could not connect due to: " . mysqli_connect_error());

//Query para recuperar páginas
include('queries.php');
if(isset($_GET['id'])){

	$pagina = retrieve_page($dbc, $_GET['id']);

}

$pageid = isset($_GET['page'])? $_GET['page'] : 1;//si la variable page no existe le asignamos uno por defecto 
$page = retrieve_page($dbc, $pageid);
//Recuperar usuarios
	if(!isset($_SESSION['username'])) {
		$_SESSION['username'] = "";
	}

$user = retrieve_user($dbc, $_SESSION['username']);


#Site setup:
$debug = retrieve_settings_value($dbc,'debug-status');

?>