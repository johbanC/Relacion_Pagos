<?php 

class DetalleRelacion{
	private $idrelacionpago;
	private $mes;
	private $dias;
	private $fecha_consignacion;
	private $canon;
	private $comision;
	private $iva;
	private $total_agencia;
	private $valor_consignado;
	private $img;

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

	public function getMes(){
		return $this->mes;
	}

	public function setMes($mes){
		$this->mes = $mes;
	}

	public function getDias(){
		return $this->dias;
	}

	public function setDias($dias){
		$this->dias = $dias;
	}

	public function getFecha_consignacion(){
		return $this->fecha_consignacion;
	}

	public function setFecha_consignacion($fecha_consignacion){
		$this->fecha_consignacion = $fecha_consignacion;
	}

	public function getCanon(){
		return $this->canon;
	}

	public function setCanon($canon){
		$this->canon = $canon;
	}

	public function getComision(){
		return $this->comision;
	}

	public function setComision($comision){
		$this->comision = $comision;
	}

	public function getIva(){
		return $this->iva;
	}

	public function setIva($iva){
		$this->iva = $iva;
	}

	public function getTotal_agencia(){
		return $this->total_agencia;
	}

	public function setTotal_agencia($total_agencia){
		$this->total_agencia = $total_agencia;
	}

	public function getValor_consignado(){
		return $this->valor_consignado;
	}

	public function setValor_consignado($valor_consignado){
		$this->valor_consignado = $valor_consignado;
	}

	public function getImg(){
		return $this->img;
	}

	public function setImg($img){
		$this->img = $img;
	}

	/*GUARDAR DETALLES DE RELACION DE PAGO*/
	public function saveDRP(){

		$sql = "INSERT INTO DetalleRelacion(idRelacionPago, mes, dias, fecha_consignacion, canon, comision, iva, total_agencia, valor_consignado, img) 
		VALUES ('{$this->getIdrelacionpago()}','{$this->getMes()}','{$this->getDias()}','{$this->getFecha_consignacion()}','{$this->getCanon()}','{$this->getComision()}','{$this->getIva()}','{$this->getTotal_agencia()}','{$this->getValor_consignado()}','{$this->getImg()}')";
		
		$save = $this->db->query($sql);

		$result = false;
		if ($save) {
			$result = true;
		}

		return $result;
	}






	/*FIN DE LA CLASE*/
}
?>