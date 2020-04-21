<?php 

    class errorController {

        public function index($pValor){
                echo 'La página que buscas no existe ('.$pValor.')';
        }
        public function httpError(){
                echo 'La página que buscas no existe (parámeto HTTP no válido)';
        }

    }
?>