<?php
    class pruebasController {

        public function sobreescribirSesiones() {

            $frutas1 = [
                'manzana' => 1,
                'pera' => 2
            ];
            
            $frutas3 = [
                'nose' => 3,
                'sss' => 4
            ];
            $frutas2 = [
                'platano' => 3,
                'asndia' => 4
            ];

            $_SESSION['frutas'] = $frutas3;
            $_SESSION['frutas'] = $frutas1;
            $_SESSION['frutas'] = $frutas2;
            var_dump($_SESSION['frutas']);
            

            // $_SESSION['frutas'] = $frutas;
            // var_dump($_SESSION['frutas']);

            //
            // unset($_SESSION['frutas']);

        }


    }