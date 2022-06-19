<?php

class Urbanizacion{
	private $idurbanizacion;
	private $nombre;
	private  $direccion;
	private  $telefono;
	private  $email;

	private $db;

	public function __construct(){
		$this->db = Database::connect();
	}
	function getIdurbanizacion() {
		return $this->idurbanizacion;
	}

	function getNombre() {
		return $this->nombre;
	}

	function getDireccion() {
		return $this->direccion;
	}

	function getTelefono() {
		return $this->telefono;
	}

	function getEmail() {
		return $this->email;
	}

	function setIdurbanizacion($idurbanizacion) {
		$this->idurbanizacion = $idurbanizacion;
	}

	function setNombre($nombre) {
		$this->nombre = $nombre;
	}

	function setDireccion($direccion) {
		$this->direccion = $direccion;
	}

	function setTelefono($telefono) {
		$this->telefono = $telefono;
	}

	function setEmail($email) {
		$this->email = $email;
	}


	/* IMPRIMIR TODOS LAS MASCOTAS SCRIPT PARA TABLAS */
	public function getAll(){
		$urbanizacion = $this->db->query("SELECT * FROM urbanizacion");

		return $urbanizacion;
	}

	public function UrbActivo(){
		$urbactivo = $this->db->query("SELECT * FROM urbanizacion");

		return $urbactivo;
	}


	/*GUARDAR LA URBANIZACION*/
	public function save(){
		$sql = "INSERT INTO urbanizacion(nombre, direccion, telefono, email) VALUES ('{$this->getNombre()}', '{$this->getDireccion()}', '{$this->getTelefono()}', '{$this->getEmail()}') ";

		$save = $this->db->query($sql);

		$result = false;
		if ($save) {
			$result = true;
		}

		return $result;
	}

	/*EDITAR URBANIZACION*/
	public function edit(){

		$sql = "UPDATE urbanizacion SET nombre = '{$this->getNombre()}', direccion = '{$this->getDireccion()}', telefono = '{$this->getTelefono()}', email = '{$this->getEmail()}' WHERE idurbanizacion = '{$this->idurbanizacion}'";
		$save = $this->db->query($sql);

		$result = false;
		if ($save) {
			$result = true;
		}

		return $result;

	}

	public function delete(){
		$sql = "DELETE FROM urbanizacion WHERE idurbanizacion = {$this->idurbanizacion} ";
		$delete = $this->db->query($sql);

		$result = false;
		if ($delete) {
			$result = true;
		}
		return $result;
	}

	public function Email($nombre,$email){


		$to = $email;
		$subject = "Asunto del email";
		$message = "Este".$nombre." es mi primer envío de email con PHP";

		mail($to, $subject, $message);
	}



}


?>