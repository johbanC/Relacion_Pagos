<?php 

class Utils{

	/*BORRAR SESSIONES */
	public static function deleteSession($name){

		if (isset($_SESSION[$name])) {
			$_SESSION[$name] = null;
			unset($_SESSION[$name]);
		}	
		
		return $name;
	}

	/*URBANIZACIONES ACTIVAS*/
	public static function UrbActivo(){
		require_once 'models/Urbanizacion.php';
		$urbactivo = new Urbanizacion();
		$urbactivo = $urbactivo ->UrbActivo();

		return $urbactivo;
	}

	

	/*CODIGO ANTERIOR MAS ADELANTE BORRAR*/

	public static function isAdmin(){
		if (!isset($_SESSION['admin'])) {
			header("location:".base_url);
		}else{
			return true;
		}
	}

	/*ESTRAER LOS TIPOS DE DOCUMENTOS*/
	public static function showTipoDocumento(){
		require_once 'models/TipoDocumento.php';
		$tipodocumento = new TipoDocumento();
		$tipodocumento = $tipodocumento->getAll();

		return $tipodocumento;
	}

	public static function showBanco(){
		require_once 'models/Banco.php';
		$banco = new Banco();
		$banco = $banco->getAll();

		return $banco;
	}

	public static function showTipoCuenta(){
		require_once 'models/TipoCuenta.php';
		$tipo_cuenta = new TipoCuenta();
		$tipo_cuenta = $tipo_cuenta->getAll();

		return $tipo_cuenta;
	}

	public static function showTipoPropiedad(){
		require_once 'models/TipoPropiedad.php';
		$tipo_propiedad = new TipoPropiedad();
		$tipo_propiedad = $tipo_propiedad->getAll();

		return $tipo_propiedad;
	}

	/*CONTAR LAS RELACIONES DE PAGO*/
	public static function showCountRP(){
		require_once 'models/RelacionPago.php';
		$countRP = new RelacionPago();
		$countRP = $countRP->getCountRP();

		return $countRP;
	}









	public static function showEstatus(){
		require_once 'models/Estatus.php';
		$estatus = new Estatus();
		$estatus = $estatus->getAll();

		return $estatus;
	}

	public static function showTipoBanco(){
		require_once 'models/Banco.php';
		$tipo_banco = new Banco();
		$tipo_banco = $tipo_banco->getAllAct();

		return $tipo_banco;
	}

	

	public static function showPropietario(){
		require_once 'models/Propietario.php';
		$datos_propietario = new Propietario();
		$datos_propietario = $datos_propietario->OwnerData();

		return $datos_propietario;
	}

	public static function showArrendatario(){
		require_once 'models/Arrendatario.php';
		$datos_arrendatario = new Arrendatario();
		$datos_arrendatario = $datos_arrendatario->OwnerData();

		return $datos_arrendatario;
	}

	public static function showCodeudor(){
		require_once 'models/Codeudor.php';
		$datos_codeudor = new Codeudor();
		$datos_codeudor = $datos_codeudor->OwnerData();

		return $datos_codeudor;
	}

	public static function showPropiedad(){
		require_once 'models/Propiedad.php';
		$datos_propiedad = new Propiedad();
		$datos_propiedad = $datos_propiedad->OwnerData();

		return $datos_propiedad;
	}


	public static function showTipoInmueble(){
		require_once 'models/TipoInmueble.php';
		$tipo_inmueble = new TipoInmueble();
		$tipo_inmueble = $tipo_inmueble->getAllAct();

		return $tipo_inmueble;
	}

	public static function showNroContrato(){
		require_once 'models/Contrato.php';
		$nro_contrato_1 = new Contrato();
		$nro_contrato_1 = $nro_contrato_1->getNroContrato();

		return $nro_contrato_1;
	}

	public static function getIdPropietarioNext(){
		require_once 'models/Propietario.php';
		$id_propietario = new Propietario();
		$id_propietario = $id_propietario->getIdPropietarioNext();

		return $id_propietario;
	}


}




?>