<?php 

require_once 'models/Propiedad.php';

class PropiedadController{
		
	public function save(){
		if (isset($_POST)) {
			$idpropietario = isset($_POST['idpropietario']) ? $_POST['idpropietario'] : false;
			$idtipopropiedad = isset($_POST['idtipopropiedad']) ? $_POST['idtipopropiedad'] : false;
			$sector_unidad = isset($_POST['sector_unidad']) ? $_POST['sector_unidad'] : false;
			$nro_propiedad = isset($_POST['nro_propiedad']) ? $_POST['nro_propiedad'] : false;
			$comision = isset($_POST['comision']) ? $_POST['comision'] : false;
			$iva = isset($_POST['iva']) ? $_POST['iva'] : false;
			$canon = isset($_POST['canon']) ? $_POST['canon'] : false;

			if ($idpropietario) {
				$propiedad = new Propiedad();
				$propiedad->setIdPropietario($idpropietario);
				$propiedad->setIdTipoPropiedad($idtipopropiedad);
				$propiedad->setSector_unidad($sector_unidad);
				$propiedad->setNro_propiedad($nro_propiedad);
				$propiedad->setComision($comision);
				$propiedad->setIva($iva);
				$propiedad->setCanon($canon);

				$save = $propiedad->save();

				if ($save) {
					$_SESSION['propiedad'] = 'complete';
				}else{
					$_SESSION['propiedad'] = 'failed';
				}
			}else{
				$_SESSION['propiedad'] = 'failed';
			}
		}else{
			$_SESSION['propiedad'] = 'failed';
		}
		echo("<script>location.href = '".base_url."Propietario/detail&id=".$idpropietario."';</script>");

	}



//FIN DE LA CLASE
}

?>