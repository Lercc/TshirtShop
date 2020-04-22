<?php 


    class Usuario {

        private $id;
        private $nombre;
        private $apellidos;
        private $email;
        private $password;
        private $rol;
        private $imagen;
        
        //metodos get 
        public function getId(){
            return $this->id;
        }
        public function getNombres(){
            return $this->nombres;
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
        public function setNombres($pNombres){
            return $this->nombres = $pNombres;
        }
        public function setApellidos($pApellidos){
            return $this->apellidos = $pApellidos;
        }
        public function setEmail($pEmail){
            return $this->email = $pEmail;
        }
        public function setPassword($pPassword){
            return $this->password = $pPassword;
        }
        public function setRol($pRol){
            return $this->rol = $pRol;
        }
        public function setImagen($pImagen){
            return $this->imagen = $pImagen;
        }

        

    }

?>