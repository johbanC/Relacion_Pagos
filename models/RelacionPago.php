<?php 

class RelacionPago{
	private $idRelacionPago;
	private $nro_relacion;
	private $idPropiedad;

	private $db;

	public function __construct() {
		$this->db = Database::connect();
	}


	public function getIdRelacionPago(){
		return $this->idRelacionPago;
	}

	public function setIdRelacionPago($idRelacionPago){
		$this->idRelacionPago = $idRelacionPago;
	}

	public function getNro_relacion(){
		return $this->nro_relacion;
	}

	public function setNro_relacion($nro_relacion){
		$this->nro_relacion = $nro_relacion;
	}

	public function getIdPropiedad(){
		return $this->idPropiedad;
	}

	public function setIdPropiedad($idPropiedad){
		$this->idPropiedad = $idPropiedad;
	}

	/*CONTAR LAS RELACIONES DE PAGO*/
	public function getCountRP(){
		$countRP = $this->db->query("SELECT COUNT(idRelacionPago) AS NumRP FROM RelacionPago");

		return $countRP;
	}


	/* IMPRIMIR PROPIETARIO EN LA VISTA DETALLES */
	public function getPropiedad(){
		$propiedadRP = $this->db->query("SELECT p.idPropiedad, tp.nombre AS TpNom, p.sector_unidad, p.nro_propiedad, p.comision, p.canon, p.iva
			FROM Propiedad p
			INNER JOIN Propietario pro ON pro.idPropietario = p.idPropietario
			INNER JOIN TipoPropiedad tp ON tp.idTipoPropiedad = p.idTipoPropiedad
			WHERE p.idPropiedad = {$this->getIdPropiedad()};");

		return $propiedadRP->fetch_object();
	}

	/* IMPRIMIR PROPIETARIO EN LA VISTA DETALLES */
	public function getPropietario(){
		$propietarioRP = $this->db->query("SELECT p.idPropietario, p.nombre AS NomPro, p.apellido AS ApePro, p.celular, p.email, tp.prefijo, p.documento, b.nombre AS NomBan, tc.nombre AS NomTipoCuen, p.nro_cuenta, p.fecha_creacion
			FROM Propietario p
			INNER JOIN TipoDocumento tp ON p.idTipoDocumento = tp.idTipoDocumento 
			INNER JOIN Banco b ON b.idBanco = p.idBanco 
			INNER JOIN TipoCuenta tc ON tc.idTipoCuenta = p.idTipoCuenta
			WHERE idPropietario = (SELECT idPropietario
				FROM Propiedad
				WHERE idPropiedad = {$this->getIdPropiedad()});");

		return $propietarioRP->fetch_object();
	}

	/*GUARDAR RELACION DE PAGO*/
	public function saveRP(){

		$sql = "INSERT INTO RelacionPago(nro_relacion, idPropiedad) VALUES ('{$this->getNro_relacion()}','{$this->getIdPropiedad()}')";

		$save = $this->db->query($sql);

		$result = false;
		if ($save) {
			$result = true;
		}

		return $result;
	}

	





//FIN DE LA CLASE
}
?>