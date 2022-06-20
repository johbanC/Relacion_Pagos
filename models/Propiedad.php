<?php 

class Propiedad{
	private $idPropiedad;
	private $idPropietario;
	private $idTipoPropiedad;
	private $sector_unidad;
	private $nro_propiedad;
	private $comision;
	private $canon;
	private $iva;

	/*CONEXION A LA BASE DE DATOS*/
	private $db;

	public function __construct(){
		$this->db = Database::connect();
	}

	public function getIdPropiedad(){
		return $this->idPropiedad;
	}

	public function setIdPropiedad($idPropiedad){
		$this->idPropiedad = $idPropiedad;
	}

	public function getIdPropietario(){
		return $this->idPropietario;
	}

	public function setIdPropietario($idPropietario){
		$this->idPropietario = $idPropietario;
	}

	public function getIdTipoPropiedad(){
		return $this->idTipoPropiedad;
	}

	public function setIdTipoPropiedad($idTipoPropiedad){
		$this->idTipoPropiedad = $idTipoPropiedad;
	}

	public function getSector_unidad(){
		return $this->sector_unidad;
	}

	public function setSector_unidad($sector_unidad){
		$this->sector_unidad = $sector_unidad;
	}

	public function getNro_propiedad(){
		return $this->nro_propiedad;
	}

	public function setNro_propiedad($nro_propiedad){
		$this->nro_propiedad = $nro_propiedad;
	}

	public function getComision(){
		return $this->comision;
	}

	public function setComision($comision){
		$this->comision = $comision;
	}

	public function getCanon(){
		return $this->canon;
	}

	public function setCanon($canon){
		$this->canon = $canon;
	}

	public function getIva(){
		return $this->iva;
	}

	public function setIva($iva){
		$this->iva = $iva;
	}


	/* IMPRIMIR TODAS LAS PROPIEDADES SCRIPT PARA TABLAS */
	public function getAll(){
		$propiedad = $this->db->query("SELECT p.idPropiedad, pro.nombre, pro.apellido, tp.nombre, p.sector_unidad, p.nro_propiedad, p.comision, p.canon, p.iva
			FROM Propiedad p
			INNER JOIN Propietario pro ON pro.idPropietario = p.idPropietario
			INNER JOIN TipoPropiedad tp ON tp.idTipoPropiedad = p.idTipoPropiedad");

		return $propiedad;
	}

	/* IMPRIMIR TODAS LAS PROPIEDADES DEL PROPIETARIO EN ESPECIFICO */
	public function getDetail(){
		$propiedad = $this->db->query("SELECT p.idPropiedad, pro.idPropietario, pro.nombre, pro.apellido, tp.nombre, p.sector_unidad, p.nro_propiedad, p.comision, p.canon, p.iva
FROM Propiedad p
INNER JOIN Propietario pro ON pro.idPropietario = p.idPropietario
INNER JOIN TipoPropiedad tp ON tp.idTipoPropiedad = p.idTipoPropiedad
WHERE pro.idPropietario = {$this->getIdPropietario()}");

		return $propiedad;
	}


	/*GUARDAR PROPIEDAD*/
	public function save(){
		$sql = "INSERT INTO Propiedad(idPropietario, idTipoPropiedad, sector_unidad, nro_propiedad, comision, canon, iva, idEstatus) VALUES ('{$this->getIdPropietario()}','{$this->getIdtipopropiedad()}','{$this->getSector_unidad()}','{$this->getNro_propiedad()}','{$this->getComision()}','{$this->getCanon()}','{$this->getIva()}', 1) ";
		
			$save = $this->db->query($sql);

			$result = false;
			if ($save) {
				$result = true;
			}

			return $result;
	}






}

?>