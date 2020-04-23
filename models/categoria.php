<?php 

    class Categoria {

        private $id; 
        private $nombre;
        private $db;

        public  function __construct() {
            $this->db = Database::conectar();
        }

        public function getNombre () {
            return $this->nombre;
        }

        public function setNombre ($pNombre) {
            $this->nombre = $pNombre;
        }

        public function escapeString($pString) {
            $string = $this->db->real_escape_string($pString);
            return $string;
        }

        public function listCategories() {
            $query = $this->db->query("SELECT * FROM categorias ORDER BY id");
            if ( $query){
                return $query;
            }
            return false;
        }
        
        public function createCategory() {
            $sql  =  "INSERT INTO categorias VALUEs (null ,'{$this->getNombre()}')";
            $query = $this->db->query($sql);
            if ( $query){
                return $query;
            }   
            return false;
        }
    }

?>