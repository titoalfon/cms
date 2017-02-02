<?php
error_reporting(0);
require_once 'connection.php';
include_once 'functions/data.php';
include_once 'functions/template.php';
include_once 'functions/sandbox.php';
//Setup file:
#Constants
define("TEMPLATE", "template");
define("FOOTER", "template/footer.php");
define("NAVIGATION", "template/navigation.php");
//Query para recuperar páginas
//$pageid = !isset($path['call_parts'][0]) || $path['call_parts'][0] ==''? $path['call_parts'][0] = 'home':'';//si la variable page no existe le asignamos uno por defecto
$path = get_path(); 
if(!isset($path['call_parts'][0]) || $path['call_parts'][0] == ''){
	
	header("Location: home");
}

$page = retrive_page($dbc, $path['call_parts'][0]);
#Site setup:
$debug = retrieve_settings_value($dbc,'debug-status');


?>