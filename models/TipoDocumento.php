    <?php 


    class TipoDocumento{
        private $idTipoDocumento;
        private $nombre;
        private $prefijo;

        private $db;
        
        public function __construct() {
            $this->db = Database::connect();
        }
        
        public function getIdTipoDocumento(){
            return $this->idTipoDocumento;
        }

        public function setIdTipoDocumento($idTipoDocumento){
            $this->idTipoDocumento = $idTipoDocumento;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function setNombre($nombre){
            $this->nombre = $nombre;
        }

        public function getPrefijo(){
            return $this->prefijo;
        }

        public function setPrefijo($prefijo){
            $this->prefijo = $prefijo;
        }

        /* IMPRIMIR TODOS TIPOS DE DOCUMENTO SCRIPT PARA TABLAS */
        public function getAll(){
            $tipodocumento = $this->db->query("SELECT * FROM TipoDocumento");

            return $tipodocumento;
        }

        /*GUARDAR TIPO DE DOCUMENTO*/        
        public function save(){
            $sql = "INSERT INTO TipoDocumento(nombre, prefijo) VALUES ('{$this->getNombre()}', '{$this->getPrefijo()}' ) ";

            $save = $this->db->query($sql);

            $result = false;
            if ($save) {
                $result = true;
            }

            return $result;
        }


        /*EDITAR TIPO DE DOCUMENTO*/
        public function edit(){

            $sql = "UPDATE TipoDocumento SET nombre = '{$this->getNombre()}', prefijo = '{$this->getPrefijo()}' WHERE idTipoDocumento = {$this->getIdTipoDocumento()} ";

            $edit = $this->db->query($sql);

            $result = false;
            if ($edit) {
                $result = true;
            }

            return $result;
        }

        public function delete(){
                $sql = "DELETE FROM TipoDocumento WHERE idTipoDocumento = {$this->getIdTipoDocumento()}";
                $delete = $this->db->query($sql);

                $result = false;
                if ($delete) {
                        $result = true;
                }
                return $result;
        }



    }

?>