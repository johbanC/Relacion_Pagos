<?php 

require_once 'models/Propietario.php';

class PropietarioController{


	public function index(){
		$propietario = new Propietario();
		$propietario = $propietario->getAll();
		require_once 'views/propietario/index.php';
	}

	public function detail(){

		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$detail = true;
			$propietario = new Propietario();
			$propietario->setIdPropietario($id);
			$propietario = $propietario->getOneDetail();
			
			/*de otro bloque*/
			$propiedadP = new Propietario();
			$propiedadP->setIdPropietario($id);
			$propiedadP = $propiedadP->getOneDetailPropi();

			require_once 'views/propietario/detail.php';			
		}else{
			header('Location:'.base_url.'Propietario/index');
		}

	}


	public function save(){
		if (isset($_POST)) {
			$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
			$apellido = isset($_POST['apellido']) ? $_POST['apellido'] : false;
			$celular = isset($_POST['celular']) ? $_POST['celular'] : false;
			$email = isset($_POST['email']) ? $_POST['email'] : false;			
			$idtipodocumento = isset($_POST['idtipodocumento']) ? $_POST['idtipodocumento'] : false;
			$documento = isset($_POST['documento']) ? $_POST['documento'] : false;
			$idbanco = isset($_POST['idbanco']) ? $_POST['idbanco'] : false;
			$idtipocuenta = isset($_POST['idtipocuenta']) ? $_POST['idtipocuenta'] : false;
			$nro_cuenta = isset($_POST['nro_cuenta']) ? $_POST['nro_cuenta'] : false;


			if ($nombre && $apellido && $email && $celular) {
				$propietario = new Propietario();
				$propietario->setNombre($nombre);
				$propietario->setApellido($apellido);
				$propietario->setCelular($celular);
				$propietario->setEmail($email);
				$propietario->setIdTipoDocumento($idtipodocumento);
				$propietario->setDocumento($documento);
				$propietario->setIdbanco($idbanco);
				$propietario->setIdtipocuenta($idtipocuenta);
				$propietario->setNro_cuenta($nro_cuenta);

				$save = $propietario->save();

				if ($save) {
					$_SESSION['propietario'] = 'complete';
				}else{
					$_SESSION['propietario'] = 'failed';
				}
			}else{
				$_SESSION['propietario'] = 'failed';
			}
		}else{
			$_SESSION['propietario'] = 'failed';
		}
		echo("<script>location.href = '".base_url."Propietario/index';</script>");

	}





}
?>