<?php
// Activamos las variables de sesión.
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

// Rutas path de inc y otras..
define ('DS',DIRECTORY_SEPARATOR);

/* dirname(__FILE__) */
$rutabase=dirname(dirname(__FILE__)) .DS;

$config['inc'] = $rutabase.'inc'.DS;
$config['class'] = $rutabase.'class'.DS;
$config['imagenes'] = $rutabase.'public/imagenes'.DS;
$config['vendor'] = $rutabase.'vendor'.DS;

// Constantes de configuración de la aplicación.
define ('DB_SERVIDOR','localhost');
define ('DB_PUERTO','3306');
define ('DB_BASEDATOS','gamesBreak');
define ('DB_USUARIO','root');
define ('DB_PASSWORD','abc123.');


// Cargamos la clase de base de datos
require_once $config['class'].'basedatos.php';
require_once $config['inc'].'funciones.php';

$pdo = Basedatos::getConexion();