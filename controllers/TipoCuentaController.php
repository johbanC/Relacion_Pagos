<?php 

require_once 'models/TipoCuenta.php';

class TipoCuentaController{

    public function index(){
        $tipocuenta = new TipoCuenta();
        $tipocuenta = $tipocuenta->getAll();
        require_once 'views/tipocuenta/index.php';
    }

    public function save(){
        if (isset($_POST)) {
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            
            if ($nombre) {
                $tipocuenta = new TipoCuenta();
                $tipocuenta->setNombre($nombre);

                $save = $tipocuenta->save();

                if ($save) {
                    $_SESSION['tipocuenta'] = 'complete';
                }else {
                    $_SESSION['tipocuenta'] = 'failed';
                }
            }else {
                $_SESSION['tipocuenta'] = 'failed';
            }
        }else {
            $_SESSION['tipocuenta'] = 'failed';
        }

        echo("<script>location.href = '".base_url."TipoCuenta/index';</script>");

    }


    public function edit(){

		if (isset($_POST)) {
			$idtipocuenta = isset($_POST['idtipocuenta']) ? $_POST['idtipocuenta'] : false;
			$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;

			if ($idtipocuenta && $nombre) {
				$tipocuenta = new TipoCuenta();
				$tipocuenta->setIdtipocuenta($idtipocuenta);
				$tipocuenta->setNombre($nombre);

				$save = $tipocuenta->edit();

				if ($save) {
					$_SESSION['tipocuenta_edit'] = 'complete';
				}else{
					$_SESSION['tipocuenta_edit'] = 'failed';
				}
			}else{
				$_SESSION['tipocuenta_edit'] = 'failed';
			}
		}else{
			$_SESSION['tipocuenta_edit'] = 'failed';
		}
		echo("<script>location.href = '".base_url."TipoCuenta/index';</script>");	
	}

    public function delete(){

		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$tipocuenta = new TipoCuenta();
			$tipocuenta->setIdtipocuenta($id);

			$delete = $tipocuenta->delete();

			if ($delete) {
				$_SESSION['tipocuenta_delete'] = 'complete';
			}else{
				$_SESSION['tipocuenta_delete'] = 'failed';
			}
		}else{
			$_SESSION['tipocuenta_delete'] = 'failed';
		}
		echo("<script>location.href = '".base_url."TipoCuenta/index';</script>");
	}







}

?>