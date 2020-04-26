<?php
    //creano una clase estatica
    class Utilidades {

        public static function deleteSession($pName) {
            if(isset($_SESSION[$pName])) {
                $_SESSION[$pName] = null;
                unset($_SESSION[$pName]);
            }
        }

        public static function mostrarErrores($pError) {
            $string = '';
            if(isset($_SESSION['errores']) && isset($_SESSION['errores'][$pError])) {
                $string = $_SESSION['errores'][$pError];
            }
            return $string;
        }
        public static function mostrarErroresLogin($pError) {
            $string = '';
            if(isset($_SESSION['erroresLogin']) && isset($_SESSION['erroresLogin'][$pError])) {
                $string = $_SESSION['erroresLogin'][$pError];
            }
            return $string;
        }

        public static function isAdmin() {
            if(!isset($_SESSION['admin'])) {
                header('Location:'.BASE_URL);
            }
            return true;
        }

        public static function mostrarCategorias() {
            require_once './models/categoria.php';
            $categoria = new Categoria();
            $categorias = $categoria->listCategories();
            return $categorias;
        }


    }
?>