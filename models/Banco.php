<?php 

class Banco{
	private $idBanco;
	private $nombre;

	private $db;

	public function __construct(){
		$this->db = Database::connect();
	}

	public function getIdBanco(){
		return $this->idBanco;
	}

	public function setIdBanco($idBanco){
		$this->idBanco = $idBanco;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}


	/*IMPRIMIR TODOS LOS BANCOS REGISTRADOS*/
	public function getAll(){
		$banco = $this->db->query("SELECT * FROM Banco");

		return $banco;
	}

	/*GUARDAR NOMBRE DEL BANCO*/
	public function save(){
		$sql = "INSERT INTO banco (nombre) VALUES ('{$this->getNombre()}') ";

		$save = $this->db->query($sql);

		$result = false;
		if ($save) {
			$result = true;
		}

		return $result;
	}

	/*EDITAR NOMBRE DEL BANCO*/
	public function edit(){
		$sql = "UPDATE banco SET nombre = '{$this->getNombre()}' WHERE idBanco = {$this->getIdBanco()} ";

		$edit = $this->db->query($sql);

		$result = false;
		if ($edit) {
			$result = true;
		}

		return $result;
	}


	/*ELIMINAR BANCO*/
	public function delete(){
		$sql = "DELETE FROM banco WHERE idBanco = {$this->getIdBanco()}";

		$delete = $this->db->query($sql);

		$result = false;
		if ($delete) {
			$result = true;
		}

		return $result;
	}




}

?>