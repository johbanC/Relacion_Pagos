<?php 

class TipoPropiedad{
	private $idtipopropiedad;
	private $nombre;

	private $db;

	public function __construct(){
		$this->db = Database::connect();
	}

	public function getIdtipopropiedad(){
		return $this->idtipopropiedad;
	}

	public function setIdtipopropiedad($idtipopropiedad){
		$this->idtipopropiedad = $idtipopropiedad;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}


	/*IMPRIMIR TODOS LOS TIPOS DE PROPIEDAD*/
    public function getAll(){
        $tipopropiedad = $this->db->query("SELECT * FROM TipoPropiedad");

        return $tipopropiedad;
    }
    
    /*GUARDAR TIPO DE PROPIEDAD*/
    public function save(){
        $sql = "INSERT INTO TipoPropiedad (nombre) VALUES ('{$this->getNombre()}') ";
        
        $save = $this->db->query($sql);
        
        $result = false;
        
        if ($save) {
            $result = true;
        }

        return $result;
    }

    /*EDITAR NOMBRE DE TIPO DE PROPIEDAD*/
    public function edit(){
        $sql = " UPDATE TipoPropiedad SET nombre = '{$this->getNombre()}' WHERE idTipoPropiedad = '{$this->getIdtipopropiedad()}' ";

        $edit = $this->db->query($sql);

        $result = false;

        if ($edit) {
            $result = true;
        }

        return $result;
    }

    /*ELIMINAR TIPO DE PROPIEDAD*/
    public function delete(){
        $sql = "DELETE FROM TipoPropiedad WHERE idTipoPropiedad = '{$this->getIdtipopropiedad()}' ";

        $delete = $this->db->query($sql);

        $result = false;

        if ($delete) {
            $result = true;
        }

        return $result;
    }








}
?>