<?php 

require_once 'models/RelacionPago.php';

class RelacionPagoController{

	public function index(){
		$relacionpago = new RelacionPago();
		$relacionpago = $relacionpago->getAll();
		require_once 'views/relacionpago/index.php';
	}

	/*DETALLES DE LA REALCION DE PAGO*/
	public function detail(){

		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$detail = true;
			$relacionpago = new RelacionPago();
			$relacionpago->setIdRelacionPago($id);
			$relacionpago = $relacionpago->getOneDetailRelacionPago();
			
			/*de otro bloque
			$propiedadP = new Propietario();
			$propiedadP->setIdPropietario($id);
			$propiedadP = $propiedadP->getOneDetailPropi();*/

			require_once 'views/propietario/detail.php';			
		}else{
			header('Location:'.base_url.'Propietario/index');
		}

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

						// GUARDAR ARCHIVO "DOCUMENTO FRONTAL"
						if(isset($_FILES['recibopago'])){
							$file = $_FILES['recibopago'];
							$filename = $file['name'];
							$mimetype = $file['type'];

							$filename = str_replace(" ","-","$filename");
							//NO FUNCIONO EL CAMBIO DE NOMBRE
							//$nombrearchivo = rename($filename, $idPropietario."_".$nombre_1."-".$apellido_1."-DocFrontal".$mimetype);	

							if(!is_dir('librerias/dist/recibopago/relaciondepago/'.$nro_relacion)){
								mkdir('librerias/dist/recibopago/relaciondepago/'.$nro_relacion, 0777, true);
							}

							$Drelacionpago->setImg($filename);
							move_uploaded_file($file['tmp_name'], 'librerias/dist/recibopago/relaciondepago/'.$nro_relacion.'/'.$filename);							
						}

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

						if ($savePR) {

							$_SESSION['Drelacionpago'] = 'complete';


							/*DEDUCCIONES DE LA RELACION DE PAGOS*/
							require_once 'models/DeduccionesRelacion.php';
							$idrelacionpago = isset($_POST['idRelacionPago']) ? $_POST['idRelacionPago'] : false;
							$fecha_d = isset($_POST['fecha_d']) ? $_POST['fecha_d'] : false;
							$descripcion_d = isset($_POST['descripcion_d']) ? $_POST['descripcion_d'] : false;
							$valor_d = isset($_POST['valor_d']) ? $_POST['valor_d'] : false;

							if ($fecha_d) {
								$Drelacionpago = new DeduccionesRelacion();
								$Drelacionpago->setIdrelacionpago($idrelacionpago);
								$Drelacionpago->setfecha($fecha_d);
								$Drelacionpago->setDescripcion($descripcion_d);
								$Drelacionpago->setValor($valor_d);

								$saveDR = $Drelacionpago->saveDR();
							}
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
		exit();
		echo("<script>location.href = '".base_url."Propietario/detail&id=".$idpropietario."';</script>");
	}




	/*FIN DE LA CLASE*/
}

?>