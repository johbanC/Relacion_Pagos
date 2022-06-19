<?php

class TipoCuenta{
    private $idtipocuenta;
    private $nombre;

    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    public function getIdtipocuenta(){
		return $this->idtipocuenta;
	}

	public function setIdtipocuenta($idtipocuenta){
		$this->idtipocuenta = $idtipocuenta;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

    /*IMPRIMIR TODOS LOS TIPOS DE CUENTA*/
    public function getAll(){
        $tipocuenta = $this->db->query("SELECT * FROM TipoCuenta");

        return $tipocuenta;
    }
    
    /*GUARDAR TIPO DE CUENTA*/
    public function save(){
        $sql = "INSERT INTO TipoCuenta (nombre) VALUES ('{$this->getNombre()}') ";
        
        $save = $this->db->query($sql);
        
        $result = false;
        
        if ($save) {
            $result = true;
        }

        return $result;
    }

    /*EDITAR NOMBRE DE TIPO DE BANCO*/
    public function edit(){
        $sql = " UPDATE TipoCuenta SET nombre = '{$this->getNombre()}' WHERE idTipoCuenta = '{$this->getIdtipocuenta()}' ";

        $edit = $this->db->query($sql);

        $result = false;

        if ($edit) {
            $result = true;
        }

        return $result;
    }

    /*ELIMINAR TIPO DE CUENTA*/
    public function delete(){
        $sql = "DELETE FROM TipoCuenta WHERE idTipoCuenta = '{$this->getIdtipocuenta()}' ";

        $delete = $this->db->query($sql);

        $result = false;

        if ($delete) {
            $result = true;
        }

        return $result;
    }

}

?>