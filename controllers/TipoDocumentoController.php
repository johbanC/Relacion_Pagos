<?php 

require_once 'models/TipoDocumento.php';

class TipoDocumentoController{

	/*MOSTRAR TODAS LOS TIPOS DE DOCUMENTOS*/
	public function index(){
		$tipodocumento = new TipoDocumento();
		$tipodocumento = $tipodocumento->getAll();
		require_once 'views/tipodocumento/index.php';
	}

	/*GUARDAR TIPO DE DOCUMENTO*/
	public function save(){

		if (isset($_POST)) {
			$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
			$prefijo = isset($_POST['prefijo']) ? $_POST['prefijo'] : false;

			if ($nombre) {
				$tipodocumento = new TipoDocumento();
				$tipodocumento->setNombre($nombre);
				$tipodocumento->setPrefijo($prefijo);

				$save = $tipodocumento->save();

				if ($save) {
					$_SESSION['tipodocumento'] = 'complete';
				}else{
					$_SESSION['tipodocumento'] = 'failed';
				}

			}else{
				$_SESSION['tipodocumento'] = 'failed';
			}

		}else{
			$_SESSION['tipodocumento'] = 'failed';
		}

		echo("<script>location.href = '".base_url."TipoDocumento/index';</script>");
		/*header('Location:'.base_url.'tipodocumento/index');*/
	}

	/*EDITAR TIPO DE DOCUMENTO*/
	public function edit(){

		if (isset($_POST)) {
			$idtipodocumento = isset($_POST['idtipodocumento']) ? $_POST['idtipodocumento'] : false;
			$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
			$prefijo = isset($_POST['prefijo']) ? $_POST['prefijo'] : false;

			if ($idtipodocumento && $nombre) {
				$tipodocumento = new TipoDocumento();
				$tipodocumento->setIdTipoDocumento($idtipodocumento);
				$tipodocumento->setNombre($nombre);
				$tipodocumento->setPrefijo($prefijo);

				$save = $tipodocumento->edit();

				if ($save) {
					$_SESSION['tipodocumento_edit'] = 'complete';
				}else{
					$_SESSION['tipodocumento_edit'] = 'failed';
				}

			}else{
				$_SESSION['tipodocumento_edit'] = 'failed';
			}

		}else{
			$_SESSION['tipodocumento_edit'] = 'failed';
		}

		echo("<script>location.href = '".base_url."TipoDocumento/index';</script>");
		/*header('Location:'.base_url.'tipodocumento/index');*/
	}

	/*ELIMINAR TIPO DE DOCUMENTO*/
	public function delete(){

		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$tipodocumento = new TipoDocumento();
			$tipodocumento->setIdTipoDocumento($id);

			$delete = $tipodocumento->delete();

			if ($delete) {
				$_SESSION['tipodocumento_delete'] = 'complete';
			}else{
				$_SESSION['tipodocumento_delete'] = 'failed';
			}

		}else{
			$_SESSION['tipodocumento_delete'] = 'failed';
		}

		echo("<script>location.href = '".base_url."TipoDocumento/index';</script>");
		/*header('Location:'.base_url.'tipodocumento/index');*/
	}
}

?>