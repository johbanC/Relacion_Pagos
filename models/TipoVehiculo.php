    <?php 


    class TipoVehiculo{
        private $idTipoVehiculo;
        private $nombre;
        private $descripcion;

        private $db;
        
        public function __construct() {
            $this->db = Database::connect();
        }
        
        function getIdTipoVehiculo(){
            return $this->idTipoVehiculo;
        }

        function setIdTipoVehiculo($idTipoVehiculo){
            $this->idTipoVehiculo = $idTipoVehiculo;
        }

        function getNombre(){
            return $this->nombre;
        }

        function setNombre($nombre){
            $this->nombre = $nombre;
        }

        function getDescripcion(){
            return $this->descripcion;
        }

        function setDescripcion($descripcion){
            $this->descripcion = $descripcion;
        }

        /* IMPRIMIR TODOS LAS MASCOTAS SCRIPT PARA TABLAS */
        public function getAll(){
            $tipovehiculo = $this->db->query("SELECT * FROM TipoVehiculo");

            return $tipovehiculo;
        }

        /*GUARDAR TIPO VEHOCULO*/        
        public function save(){
            $sql = "INSERT INTO TipoVehiculo(nombre, descripcion) VALUES ('{$this->getNombre()}', '{$this->getDescripcion()}' ) ";

            $save = $this->db->query($sql);

            $result = false;
            if ($save) {
                $result = true;
            }

            return $result;
        }





        /*GUARDAR LA URBANIZACION*/
        public function save1(){
            $sql = "INSERT INTO administrador(idurbanizacion, nombre, apellido, telefono, email, sesion) VALUES ('{$this->getIdurbanizacion()}', '{$this->getNombre()}', '{$this->getApellido()}', '{$this->getTelefono()}', '{$this->getEmail()}', 0) ";

            $save = $this->db->query($sql);

            $result = false;
            if ($save) {
                $result = true;
            }

            return $result;
        }




    }

?>