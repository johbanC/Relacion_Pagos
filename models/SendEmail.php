<?php 


class SendEmail{
	public $remitente;
	public $destinatario;
	public $asunto;
	public $msgboby;
	public $cabeceras;

	public function enviar($nombre,$email){
		echo $this->nombre." ".$this->email;
		exit();
	}


}




?>