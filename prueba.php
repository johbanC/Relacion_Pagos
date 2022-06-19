<?php 

function conexion(){

	$servidor="localhost";
	$usuario="u845733158_johbanc";
	$password="Rosa.2106";
	$bd="u845733158_app";

	$conexion=mysqli_connect($servidor,$usuario,$password,$bd);

	return $conexion;
}


?>



<?php 

	$conexion=conexion();

	if ($conexion) {
		echo "si";
	}else{
		echo "no";
	}

 ?>