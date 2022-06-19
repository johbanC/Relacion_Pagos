<?php

class Propietario{
    private $idpropietario;
    private $nombre;
    private $apellido;
    private $email;
    private $celular;
    private $idtipodocumento;
    private $documento;
    private $idbanco;
    private $idtipocuenta;
    private $nro_cuenta;
    
    private $db;
    
    public function __construct() {
        $this->db = Database::connect();
    }
    
    public function getIdpropietario(){
        return $this->idpropietario;
    }

    public function setIdpropietario($idpropietario){
        $this->idpropietario = $idpropietario;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }

    public function setApellido($apellido){
        $this->apellido = $apellido;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getCelular(){
        return $this->celular;
    }

    public function setCelular($celular){
        $this->celular = $celular;
    }

    public function getIdtipodocumento(){
        return $this->idtipodocumento;
    }

    public function setIdtipodocumento($idtipodocumento){
        $this->idtipodocumento = $idtipodocumento;
    }

    public function getDocumento(){
        return $this->documento;
    }

    public function setDocumento($documento){
        $this->documento = $documento;
    }

    public function getIdbanco(){
        return $this->idbanco;
    }

    public function setIdbanco($idbanco){
        $this->idbanco = $idbanco;
    }

    public function getIdtipocuenta(){
        return $this->idtipocuenta;
    }

    public function setIdtipocuenta($idtipocuenta){
        $this->idtipocuenta = $idtipocuenta;
    }

    public function getNro_cuenta(){
        return $this->nro_cuenta;
    }

    public function setNro_cuenta($nro_cuenta){
        $this->nro_cuenta = $nro_cuenta;
    }


    /* IMPRIMIR TODOS PROPIETARIOS SCRIPT PARA TABLAS */
    public function getAll(){
        $propietario = $this->db->query("SELECT p.idPropietario, p.nombre AS NomPro, p.apellido AS ApePro, p.celular, p.email AS email, tp.idTipoDocumento, tp.prefijo, p.documento, b.idBanco, b.nombre, tc.idTipoCuenta, tc.nombre, nro_cuenta FROM Propietario p INNER JOIN TipoDocumento tp ON p.idTipoDocumento = tp.idTipoDocumento INNER JOIN Banco b ON b.idBanco = p.idBanco INNER JOIN TipoCuenta tc ON tc.idTipoCuenta = p.idTipoCuenta;");

        return $propietario;
    }


    /* IMPRIMIR PROPIETARIO EN LA VISTA DETALLES */
    public function getOneDetail(){
        $propietario = $this->db->query("SELECT p.idPropietario, p.fecha_creacion AS fecha_creacion, p.nombre AS NomPro, p.apellido AS ApePro, p.celular, p.email AS email, 
           tp.prefijo, p.documento, b.nombre AS NomBan, tc.nombre AS NomTipoCuen, nro_cuenta 
           FROM Propietario p 
           INNER JOIN TipoDocumento tp ON p.idTipoDocumento = tp.idTipoDocumento 
           INNER JOIN Banco b ON b.idBanco = p.idBanco 
           INNER JOIN TipoCuenta tc ON tc.idTipoCuenta = p.idTipoCuenta 
           WHERE p.idPropietario = {$this->getIdPropietario()};");

        return $propietario->fetch_object();
    }


    /* IMPRIMIR PROPIEDAD EN LA VISTA DETALLES DEL PROPIETARIO*/
    public function getOneDetailPropi(){
        $propiedadP = $this->db->query("SELECT p.idPropiedad, p.idPropietario, tp.nombre AS TipoPro, p.sector_unidad, p.nro_propiedad, p.comision, p.canon, p.iva 
            FROM Propiedad p
            INNER JOIN TipoPropiedad tp ON p.idTipoPropiedad = tp.idTipoPropiedad
            WHERE p.idPropietario = {$this->getIdPropietario()};");

        return $propiedadP;
    }






    /* IMPRIMIR TODAS LAS PROPIEDADES */
    public function getDetail(){
        $propietario = $this->db->query("SELECT p.idPropiedad, pro.idPropietario, pro.fecha_creacion AS fecha_creacion, pro.nombre AS NomPro, pro.apellido AS ApePro, tp.nombre AS TpNom, p.sector_unidad, p.nro_propiedad, p.comision, p.canon, p.iva
            FROM Propiedad p
            INNER JOIN Propietario pro ON pro.idPropietario = p.idPropietario
            INNER JOIN TipoPropiedad tp ON tp.idTipoPropiedad = p.idTipoPropiedad
            WHERE pro.idPropietario = {$this->getIdPropietario()}");

        return $propietario->fetch_object();
    }

    /*GUARDAR PROPIETARIO*/
    public function save(){
        $sql = "INSERT INTO Propietario(nombre, apellido, celular, email, idTipoDocumento, documento, idBanco, idTipoCuenta, nro_cuenta) VALUES 
        ('{$this->getNombre()}','{$this->getApellido()}','{$this->getCelular()}','{$this->getEmail()}','{$this->getIdtipodocumento()}','{$this->getDocumento()}','{$this->getIdbanco()}','{$this->getIdtipocuenta()}','{$this->getNro_cuenta()}')";

        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }

        return $result;
    }


    


}
?>

