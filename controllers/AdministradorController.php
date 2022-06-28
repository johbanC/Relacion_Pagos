<?php 

require_once 'models/Administrador.php';

class AdministradorController{

	/*MOSTRAR TODAS LOS ADMINISTRADORES*/
	public function index(){
		$administrador = new Administrador();
		$administrador = $administrador->getAll();
		require_once 'views/administrador/index.php';
	}


	/*GUARDAR ADMINISTRADOR*/
	public function save(){

		if (isset($_POST)){
			$idurbanizacion = isset($_POST['idurbanizacion']) ? $_POST['idurbanizacion'] : flase;
			$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : flase;
			$apellido = isset($_POST['apellido']) ? $_POST['apellido'] : flase;
			$telefono = isset($_POST['telefono']) ? $_POST['telefono'] : flase;
			$email = isset($_POST['email']) ? $_POST['email'] : flase;
			

			if ($idurbanizacion && $nombre && $apellido && $telefono && $email) {
				$administrador = new Administrador();
				$administrador->setIdurbanizacion($idurbanizacion);
				$administrador->setNombre($nombre);
				$administrador->setApellido($apellido);
				$administrador->setTelefono($telefono);
				$administrador->setEmail($email);



				$save = $administrador->save();

				if ($save) {
					$_SESSION['administrador'] = 'complete';

				}else{
					$_SESSION['administrador'] = "failed";
				}

			}else{
				$_SESSION['administrador'] = "failed";
			}
		}else{
			$_SESSION['administrador'] = "failed";
		}

		echo("<script>location.href = '".base_url."Administrador/index';</script>");
		/*header('Location:'.base_url.'tipodocumento/index');*/

	}

	public function edit(){

		if (isset($_POST)) {
			$idadministrador = isset($_POST['idadministrador']) ? $_POST['idadministrador'] : false;
			$idurbanizacion = isset($_POST['idurbanizacion']) ? $_POST['idurbanizacion'] : flase;
			$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : flase;
			$apellido = isset($_POST['apellido']) ? $_POST['apellido'] : flase;
			$telefono = isset($_POST['telefono']) ? $_POST['telefono'] : flase;
			$email = isset($_POST['email']) ? $_POST['email'] : flase;

			if ($idurbanizacion && $nombre && $apellido && $telefono && $email) {
				$administrador = new Administrador();
				$administrador->setIdAdministrador($idadministrador);
				$administrador->setIdurbanizacion($idurbanizacion);
				$administrador->setNombre($nombre);
				$administrador->setApellido($apellido);
				$administrador->setTelefono($telefono);
				$administrador->setEmail($email);

				$save = $administrador->edit();

				if ($save) {
					$_SESSION['administrador'] = 'complete';
				}else{
					$_SESSION['administrador'] = "failed";
				}

			}else{
				$_SESSION['administrador'] = "failed";
			}
		}else{
			$_SESSION['administrador'] = "failed";
		}

		echo("<script>location.href = '".base_url."Administrador/index';</script>");
		/*header('Location:'.base_url.'tipodocumento/index');*/
	}

/*
	public function delete(){
		if (isset($_GET['id'])) {
			$id = $_GET['id']
			$urbanizacion = new Urbanizacion();
			$urbanizacion->setIdurbanizacion($id);

			$delete = $urbanizacion->delete();

			if ($delete) {
				$_SESSION['urbanizacion_delete'] = 'complete';
			}else{
				$_SESSION['urbanizacion_delete'] = 'failed';
			}

		}else{
			$_SESSION['urbanizacion_delete'] = 'failed';
		}
		echo("<script>location.href = '".base_url."Urbanizacion/index';</script>");
		//header('Location:'.base_url.'arrendatario/index');

	}
	*/







}

?>