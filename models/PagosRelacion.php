<?php 

class PagosRelacion{
	private $idrelacionpago;
	private $fecha;
	private $descripcion;
	private $valor;

	private $db;

	public function __construct() {
		$this->db = Database::connect();
	}


	public function getIdrelacionpago(){
		return $this->idrelacionpago;
	}

	public function setIdrelacionpago($idrelacionpago){
		$this->idrelacionpago = $idrelacionpago;
	}

	public function getFecha(){
		return $this->fecha;
	}

	public function setFecha($fecha){
		$this->fecha = $fecha;
	}

	public function getDescripcion(){
		return $this->descripcion;
	}

	public function setDescripcion($descripcion){
		$this->descripcion = $descripcion;
	}

	public function getValor(){
		return $this->valor;
	}

	public function setValor($valor){
		$this->valor = $valor;
	}

	/*GUARDAR PAGOS DE LA RELACION DE PAGO*/
	public function savePR(){

		echo $cantidad = count($this->getFecha());


		for ($i=0; $i < $cantidad; $i++) { 

			$sql = "INSERT INTO Pagos(idRelacionPago, fecha, descripcion, valor) VALUES ('{$this->getIdrelacionpago()}','{$this->getFecha()[$i]}','{$this->getDescripcion()[$i]}','{$this->getValor()[$i]}')";

			$save = $this->db->query($sql);

			}






		/*
			exit();


			$sql = "INSERT INTO Pagos(idRelacionPago, fecha, descripcion, valor) VALUES ('{$this->getIdrelacionpago()}','{$this->getFecha()}','{$this->getDescripcion}','{$this->getValor()}')";


			$save = $this->db->query($sql);

			$result = false;
			if ($save) {
				$result = true;
			}

			return $result;*/
		}





	}
?>