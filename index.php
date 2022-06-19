<?php

  
    /*imprimir errores*/
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    

session_start();
require_once 'autoload.php';
require_once 'config/db.php';
require_once 'config/parameters.php';
require_once 'helpers/utils.php';

require_once 'views/layout/header.php';
require_once 'views/layout/sidebar.php';


/*SI NO A INICIADO SESSION LO ENVIA PARA EL LOGIN
if (!isset($_SESSION['identity'])) {
	header("location: login.php");
}
*/
/*
//PARA NO MOSTRAR PARTE DEL MENU SI NO EXITE LA SESSION
if (isset($_SESSION['identity'])) :	
require_once 'views/layout/header.php';
require_once 'views/layout/sidebar.php';
endif;
*/

/* ESTO LO UTILIZO PARAA QUITAR LA CABEZERA Y EL MENU EN DADO CASO QUE VALLA A GENERRAR UN PDF 
if($_GET['action'] != 'ContratoArrePDF'){
	require_once 'views/layout/header.php';
	require_once 'views/layout/sidebar.php';
}.
*/


function show_error(){
	$error = new ErrorController();
	$error->index();
}

if(isset($_GET['controller'])){
	$nombre_controlador = $_GET['controller'].'Controller';

}elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
	$nombre_controlador = controller_default;
	
}else{
	show_error();
	exit();
}

if(class_exists($nombre_controlador)){	
	$controlador = new $nombre_controlador();
	
	if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])){
		$action = $_GET['action'];
		$controlador->$action();
	}elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
		$action_default = action_default;
		$controlador->$action_default();
	}else{
		show_error();
	}
}else{
	show_error();
}

require_once 'views/layout/footer.php';


