<?php 

class Administrador{
    private $idadministrador;
    private $idurbanizacion;
    private $nombre;
    private $apellido;
    private $telefono;
    private $email;
    private $pass;
    private $sesion;
    
    private $db;
    
    public function __construct() {
        $this->db = Database::connect();
    }
    
    
    function getIdadministrador() {
        return $this->idadministrador;
    }

    function getIdurbanizacion() {
        return $this->idurbanizacion;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getEmail() {
        return $this->email;
    }

    function getPass() {
        return $this->pass;
    }

    function getSesion() {
        return $this->sesion;
    }

    function setIdadministrador($idadministrador) {
        $this->idadministrador = $idadministrador;
    }

    function setIdurbanizacion($idurbanizacion) {
        $this->idurbanizacion = $idurbanizacion;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPass($pass) {
        $this->pass = $pass;
    }

    function setSesion($sesion) {
        $this->sesion = $sesion;
    }


    /* IMPRIMIR TODOS LAS MASCOTAS SCRIPT PARA TABLAS */
    public function getAll(){
        $administrador = $this->db->query("SELECT a.idadministrador, u.idurbanizacion, u.nombre AS nombre_urb, a.nombre, a.apellido, a.telefono, a.email, a.pass, a.sesion
FROM administrador a
INNER JOIN urbanizacion u ON a.idurbanizacion = u.idurbanizacion");

        return $administrador;
    }

    /*GUARDAR LA URBANIZACION*/
    public function save(){
        $sql = "INSERT INTO administrador(idurbanizacion, nombre, apellido, telefono, email, sesion) VALUES ('{$this->getIdurbanizacion()}', '{$this->getNombre()}', '{$this->getApellido()}', '{$this->getTelefono()}', '{$this->getEmail()}', 0) ";

        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }

        return $result;
    }

    public function edit(){

        $sql = "UPDATE administrador SET idurbanizacion = '{$this->getIdurbanizacion()}', nombre = '{$this->getNombre()}', apellido = '{$this->getApellido()}', telefono = '{$this->getTelefono()}', email = '{$this->getEmail()}' WHERE idadministrador = '{$this->idadministrador}' ";

        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }

        return $result;

    }






}


?>