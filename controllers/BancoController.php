<?php 

require_once 'models/Banco.php';

class BancoController{
	/*MOSTRAR TODOS LOS BANCOS*/
	public function index(){
		$banco = new Banco();
		$banco = $banco->getAll();
		require_once 'views/banco/index.php';
	}


	public function save(){
		if (isset($_POST)) {
			$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;

			if ($nombre) {
				$banco = new Banco();
				$banco->setNombre($nombre);

				$save = $banco->save();

				if ($save) {
					$_SESSION['banco'] = 'complete';
				}else{
					$_SESSION['banco'] = 'failed';
				}
			}else{
				$_SESSION['banco'] = 'failed';
			}
		}else{
			$_SESSION['banco'] = 'failed';
		}

		echo("<script>location.href = '".base_url."Banco/index';</script>");
	}

	public function edit(){

		if (isset($_POST)) {
			$idbanco = isset($_POST['idbanco']) ? $_POST['idbanco'] : false;
			$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;

			if ($idbanco && $nombre) {
				$banco = new Banco();
				$banco->setIdBanco($idbanco);
				$banco->setNombre($nombre);

				$save = $banco->edit();

				if ($save) {
					$_SESSION['banco_edit'] = 'complete';
				}else{
					$_SESSION['banco_edit'] = 'failed';
				}
			}else{
				$_SESSION['banco_edit'] = 'failed';
			}
		}else{
			$_SESSION['banco_edit'] = 'failed';
		}
		echo("<script>location.href = '".base_url."Banco/index';</script>");	
	}


	public function delete(){

		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$banco = new Banco();
			$banco->setIdBanco($id);

			$delete = $banco->delete();

			if ($delete) {
				$_SESSION['banco_delete'] = 'complete';
			}else{
				$_SESSION['banco_delete'] = 'failed';
			}
		}else{
			$_SESSION['banco_delete'] = 'failed';
		}
		echo("<script>location.href = '".base_url."Banco/index';</script>");
	}




}
?>