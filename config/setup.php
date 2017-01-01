<?php
require_once 'connection.php';
include_once 'functions/data.php';
include_once 'functions/template.php';
//Setup file:
#Constants
define("TEMPLATE", "template");
define("FOOTER", "template/footer.php");
define("NAVIGATION", "template/navigation.php");
//Query para recuperar páginas
$pageid = isset($_GET['page'])? $_GET['page'] : 'home';//si la variable page no existe le asignamos uno por defecto 
$page = retrive_page($dbc, $pageid);
#Site setup:
$debug = retrieve_settings_value($dbc,'debug-status');

?>