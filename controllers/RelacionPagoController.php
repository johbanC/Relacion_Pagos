<?php 

require_once 'models/RelacionPago.php';

class RelacionPagoController{

	public function index(){
		echo "Index";
	}

	public function create(){

		if (isset($_POST['idpropiedad'])) {
			$idpropiedad = $_POST['idpropiedad'];
			$create = true;
			$propiedadRP = new RelacionPago();
			$propiedadRP->setIdPropiedad($idpropiedad);
			$propiedadRP = $propiedadRP->getPropiedad();

			/*de otro bloque*/
			$propietarioRP = new RelacionPago();
			$propietarioRP->setIdPropiedad($idpropiedad);
			$propietarioRP = $propietarioRP->getPropietario();

			require_once 'views/relacionpago/create.php';			
		}else{
			header('Location:'.base_url.'Propietario/index');
		}

	}

	public function save(){

		if (isset($_POST)) {
			$idpropietario = isset($_POST['idpropietario']) ? $_POST['idpropietario'] : false;
			$nro_relacion = isset($_POST['nro_relacion']) ? $_POST['nro_relacion'] : false;
			$idpropiedad = isset($_POST['idPropiedad']) ? $_POST['idPropiedad'] : false;

			if ($nro_relacion && $idpropiedad) {
				$relacionpago = new RelacionPago();
				$relacionpago->setNro_relacion($nro_relacion);
				$relacionpago->setIdPropiedad($idpropiedad);

				/*GUARDAR SOLO LA RELACION DE PAGO*/
				$saveRP = $relacionpago->saveRP();

				if ($saveRP) {
					$_SESSION['relacionpago'] = 'complete';
				

					require_once 'models/DetalleRelacion.php';

					$idrelacionpago = isset($_POST['idRelacionPago']) ? $_POST['idRelacionPago'] : false;
					$mes = isset($_POST['mes']) ? $_POST['mes'] : false;
					$dias = isset($_POST['dias']) ? $_POST['dias'] : false;
					$fecha_consignacion = isset($_POST['fecha_consignacion']) ? $_POST['fecha_consignacion'] : false;
					$canon = isset($_POST['canon']) ? $_POST['canon'] : false;
					$comision = isset($_POST['comision']) ? $_POST['comision'] : false;
					$iva = isset($_POST['iva']) ? $_POST['iva'] : false;
					$total_agencia = isset($_POST['total_agencia']) ? $_POST['total_agencia'] : false;
					$valor_consignado = isset($_POST['valor_consignado']) ? $_POST['valor_consignado'] : false;

					if ($mes) {
						$Drelacionpago = new DetalleRelacion();
						$Drelacionpago->setIdrelacionpago($idrelacionpago);
						$Drelacionpago->setMes($mes);
						$Drelacionpago->setDias($dias);
						$Drelacionpago->setFecha_consignacion($fecha_consignacion);
						$Drelacionpago->setCanon($canon);
						$Drelacionpago->setComision($comision);
						$Drelacionpago->setIva($iva);
						$Drelacionpago->setTotal_agencia($total_agencia);
						$Drelacionpago->setValor_consignado($valor_consignado);

						/*GUARDAR LOS DETALLE DE LA RELACION DE PAGO*/
						$saveDRP = $Drelacionpago->saveDRP();
					}

					if ($saveDRP) {

						$_SESSION['Drelacionpago'] = 'complete';

						
						/*PAGOS DE LA RELACION DE PAGOS*/
						require_once 'models/PagosRelacion.php';
						$idrelacionpago = isset($_POST['idRelacionPago']) ? $_POST['idRelacionPago'] : false;
						$fecha_p = isset($_POST['fecha_p']) ? $_POST['fecha_p'] : false;
						$descripcion_p = isset($_POST['descripcion_p']) ? $_POST['descripcion_p'] : false;
						$valor_p = isset($_POST['valor_p']) ? $_POST['valor_p'] : false;

						if ($fecha_p) {
							$Prelacionpago = new PagosRelacion();
							$Prelacionpago->setIdrelacionpago($idrelacionpago);
							$Prelacionpago->setfecha($fecha_p);
							$Prelacionpago->setDescripcion($descripcion_p);
							$Prelacionpago->setValor($valor_p);

							$savePR = $Prelacionpago->savePR();
						}

					}




				}else{
					$_SESSION['relacionpago'] = 'failed';
				}
			}else{
				$_SESSION['relacionpago'] = 'failed';
			}
		}else{
			$_SESSION['relacionpago'] = 'failed';
		}
		echo("<script>location.href = '".base_url."Propietario/detail&id=".$idpropietario."';</script>");
	}




	/*FIN DE LA CLASE*/
}

?>