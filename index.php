<?php
//Se usa solo para regresar al menu principal
include_once('config.php');
date_default_timezone_set('America/Tegucigalpa');

		


#Requiere que se cargue el archivo conexion_db.php
require_once 'models/cnndb_model.php';
$controller = 'index';

//Con esta sección hacemos el controlador del frontend y llamamos al index
if(!isset($_REQUEST['c']))
{

	require_once 'controllers/'.$controller.'_controller.php';
	$controller = ucwords($controller)."_controller";
	$controller = new $controller;
	$controller->Index();
	
}
else
{
	//buscamos el controlador que queramos cargar
	$controller =strtolower($_REQUEST['c']);
	$accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';

	//Instanciamos el controlador
	require_once 'controllers/'.$controller.'_controller.php';
	$controller = ucwords($controller)."_controller";
	$controller = new $controller;

	//FUncion para llamar las acciones a ejecutar
	call_user_func(array($controller, $accion));
}
?>