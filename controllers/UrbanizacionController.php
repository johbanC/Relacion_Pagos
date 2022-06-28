<?php 


require_once 'models/Urbanizacion.php';
//require_once 'models/SendEmail.php';

class UrbanizacionController{

	/*MOSTRAR TODAS LAS URBANIZACIONES*/
	public function index(){

		$urbanizacion = new Urbanizacion();
		$urbanizacion = $urbanizacion->getAll();
		require_once 'views/urbanizacion/index.php';

	}


	/*GUARDAR URBANIZACION*/
	public function save(){

		if (isset($_POST)){
			$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
			$direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
			$telefono = isset($_POST['telefono']) ? $_POST['telefono'] : false;
			$email = isset($_POST['email']) ? $_POST['email'] : false;

			if ($nombre && $direccion && $telefono && $email) {
				$urbanizacion = new Urbanizacion();
				$urbanizacion->setNombre($nombre);
				$urbanizacion->setDireccion($direccion);
				$urbanizacion->setTelefono($telefono);
				$urbanizacion->setEmail($email);

				$save = $urbanizacion->save();

				if ($save) {
					$_SESSION['urbanizacion'] = 'complete';
					/*CON ESTE SCRIPT SE ENVIAR EL EMAIL A LA URBANIZACION PARA QUE CREEN SU USUARIO DE   */
					require_once 'SendEmails/SendEmailsUrbanizaciones.php';

					/*EN ESTE ESPACIO SE VA A ENVIAR EL EMAIL
					$to = "johbanc@gmail.com";
					$subject = "Asunto del email";
					$message = "Este es mi primer envío de email con PHP";

					mail($to, $subject, $message);*/

				}else{
					$_SESSION['urbanizacion'] = "failed";
				}

			}else{
				$_SESSION['urbanizacion'] = "failed";
			}
		}else{
			$_SESSION['urbanizacion'] = "failed";
		}

		echo("<script>location.href = '".base_url."Urbanizacion/index';</script>");
		/*header('Location:'.base_url.'tipodocumento/index');*/

	}

	public function edit(){

		if (isset($_POST)) {
			$idurbanizacion = isset($_POST['idurbanizacion']) ? $_POST['idurbanizacion'] : flase;
			$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : flase;
			$direccion = isset($_POST['direccion']) ? $_POST['direccion'] : flase;
			$telefono = isset($_POST['telefono']) ? $_POST['telefono'] : flase;
			$email = isset($_POST['email']) ? $_POST['email'] : flase;

			if ($idurbanizacion && $nombre && $direccion && $telefono && $email) {
				$urbanizacion = new Urbanizacion();
				$urbanizacion->setIdurbanizacion($idurbanizacion);
				$urbanizacion->setNombre($nombre);
				$urbanizacion->setDireccion($direccion);
				$urbanizacion->setTelefono($telefono);
				$urbanizacion->setEmail($email);

				$edit = $urbanizacion->edit();

				if ($edit) {
					$_SESSION['urbanizacion_edit'] = "complete";
				}else{
					$_SESSION['urbanizacion_edit'] = "failed";
				}
			}else{
				$_SESSION['urbanizacion_edit'] = "failed";
			}
		}else{
			$_SESSION['urbanizacion_edit'] = "failed";
		}

		echo("<script>location.href = '".base_url."Urbanizacion/index';</script>");
		/*header('Location:'.base_url.'tipodocumento/index');*/
	}

		public function delete(){
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
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







}

?>