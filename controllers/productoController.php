<?php 

    class productoController {

        public function index(){
            echo 'controller:producto - action:mostrar';
        }

        public function newArrivals() {
            require_once './views/products/newArrivals.php';
        }

    }
?>