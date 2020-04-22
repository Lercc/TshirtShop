<?php 

    class usuarioController {

        public function index(){
            echo 'controller:usuario - action:mostrar';
        }
        
        public function register() {
            require_once './views/user/register.php';
        }
        
        public function createUser(){
            if(isset($_POST)){
                var_dump($_POST);
            }
        }
    }
?>