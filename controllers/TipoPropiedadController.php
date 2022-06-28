<?php 

require_once 'models/TipoPropiedad.php';

class TipoPropiedadController{

	public function index(){
		$tipopropiedad = new TipoPropiedad();
		$tipopropiedad = $tipopropiedad->getAll();
		require_once 'views/tipopropiedad/index.php';
	}

	public function save(){
        if (isset($_POST)) {
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            
            if ($nombre) {
                $tipopropiedad = new TipoPropiedad();
                $tipopropiedad->setNombre($nombre);

                $save = $tipopropiedad->save();

                if ($save) {
                    $_SESSION['tipopropiedad'] = 'complete';
                }else {
                    $_SESSION['tipopropiedad'] = 'failed';
                }
            }else {
                $_SESSION['tipopropiedad'] = 'failed';
            }
        }else {
            $_SESSION['tipopropiedad'] = 'failed';
        }

        echo("<script>location.href = '".base_url."TipoPropiedad/index';</script>");

    }


    public function edit(){

		if (isset($_POST)) {
			$idtipopropiedad = isset($_POST['idtipopropiedad']) ? $_POST['idtipopropiedad'] : false;
			$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;

			if ($idtipopropiedad && $nombre) {
				$tipopropiedad = new TipoPropiedad();
				$tipopropiedad->setIdtipopropiedad($idtipopropiedad);
				$tipopropiedad->setNombre($nombre);

				$save = $tipopropiedad->edit();

				if ($save) {
					$_SESSION['tipopropiedad_edit'] = 'complete';
				}else{
					$_SESSION['tipopropiedad_edit'] = 'failed';
				}
			}else{
				$_SESSION['tipopropiedad_edit'] = 'failed';
			}
		}else{
			$_SESSION['tipopropiedad_edit'] = 'failed';
		}
		echo("<script>location.href = '".base_url."TipoPropiedad/index';</script>");	
	}


	public function delete(){

		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$tipopropiedad = new TipoPropiedad();
			$tipopropiedad->setIdtipopropiedad($id);

			$delete = $tipopropiedad->delete();

			if ($delete) {
				$_SESSION['tipopropiedad_delete'] = 'complete';
			}else{
				$_SESSION['tipopropiedad_delete'] = 'failed';
			}
		}else{
			$_SESSION['tipopropiedad_delete'] = 'failed';
		}
		echo("<script>location.href = '".base_url."TipoPropiedad/index';</script>");
	}







}
?>