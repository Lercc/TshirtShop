<?php 


    class Usuario {

        private $id;
        private $nombre;
        private $apellidos;
        private $email;
        private $password;
        private $rol;
        private $imagen;
        private $db;
        
        //constructor
        public function __construct() {
            $this->db = Database::conectar();
        }

        //metodos get 
        public function getId(){
            return $this->id;
        }
        public function getNombre(){
            return $this->nombre;
        }
        public function getApellidos(){
            return $this->apellidos;
        }
        public function getEmail(){
            return $this->email;
        }
        public function getPassword(){
            return $this->password;
        }
        public function getRol(){
            return $this->rol;
        }
        public function getImagen(){
            return $this->imagen;
        }
        
        //metodos set
        public function setId($pId){
            $this->id = $pId;
        }
        public function setNombre($pNombre){
            $this->nombre = $pNombre;
        }
        public function setApellidos($pApellidos){
            $this->apellidos = $pApellidos;
        }
        public function setEmail($pEmail){
            $this->email = $pEmail;
        }
        public function setPassword($pPassword){
            $this->password = $pPassword;
        }
        public function setRol($pRol){
            $this->rol = $pRol;
        }
        public function setImagen($pImagen){
            $this->imagen = $pImagen;
        }

        //ESCAPAR - LIMPIAR - CARACTERES 
        //real_escape_string  se usa para crear una cadena SQL legal
        //escapa los caracteres que podrian vulnerar la consulta sql

        public function escapeString($pString) {
            $stringCleaned = $this->db->real_escape_string($pString);
            return $stringCleaned;
        }

        //LIMPIAR Y ENCRIPTAR PASSWORD 
        public function encryptPasword($pPassword) {
            $passEncrypted = password_hash($this->db->real_escape_string($pPassword), PASSWORD_BCRYPT, ['cost'=>4] );
            return $passEncrypted;
        }

        //CREAR NUEVO USUARIO EN BD
        public function create(){
            //consulta sql
            $sql = "INSERT INTO usuarios VALUES (null ,'{$this->getNombre()}','{$this->getApellidos()}','{$this->getEmail()}','{$this->getPassword()}','user',null)";
            //query
            $query = $this->db->query($sql);
            //validacion
            $queryResult = false;
            if($query) {
                $queryResult = true;
            }
            return $queryResult;
        }
        
        //LOGIN USUARIO BD
        public function login(){
            // CONSULTA SQL
            $sql = "SELECT * FROM usuarios WHERE  email = '{$this->getEmail()}'";
            //QUERY A LA DB
            $query = $this->db->query($sql);

            //VALIDADCIO DEL RESULTADO
            $queryResult = false;
            if ($query && $query->num_rows == 1) {
                //recoger los datos de la query en fecth tipo objeto , para verificar
                $userToVerify = $query->fetch_object();
                //verificar que las contraseñas sean iguales
                if( password_verify($this->password,$userToVerify->password) ) {
                    $queryResult = $userToVerify;
                }
            }
            return $queryResult;
        }
        

    }

?>