<?php
require '../inc/config.php';

require $config['vendor'].'autoload.php';
require $config['inc'].'google_auth.php';

$googleClient = new Google_Client();
$auth = new GoogleAuth($googleClient);

if($auth->checkRedirectCode()){
	//die($_GET['code']);
	header('Location: index.php');
}

require 'crud.php';
actualizarDummyData();
require $config['inc'].'cabecera.php';
require $config['inc'].'menu.php';

if (isset($_GET['cargar']) && $_GET['cargar']!='' && file_exists($config['inc'].'central_'.strtolower($_GET['cargar']).'.php'))
    require  $config['inc'].'central_'.strtolower($_GET['cargar']).'.php';
else
    //require  $config['inc'].'central_default.php';
    require  $config['inc'].'central_default.php';

//print_r($_SESSION);

require $config['inc'].'pie.php';
