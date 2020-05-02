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

        public static function isAdmin () {
            if(!isset($_SESSION['admin'])) {
                header('Location:'.BASE_URL);
            }
            return true;
        }
        public static function isIdentity () {
            if(!isset($_SESSION['identity'])) {
                header('Location:'.BASE_URL);
            }
            return true;
        }

        public static function mostrarCategorias () {
            require_once './models/categoria.php';
            $categoria = new Categoria();
            $categorias = $categoria->listCategories();
            return $categorias;
        }
        //DATOS DEL CARRITO
        public static function datosCarrito() {
            if(isset($_SESSION['carrito'])) {
                $datos = [
                    'cantidad' => 0,
                    'precio' => 0
                ];

                foreach($_SESSION['carrito'] as $producto) {
                    $datos['cantidad'] += $producto['unidades'];
                    $datos['precio'] += $producto['unidades']*$producto['producto']->precio;
                }
                return $datos;
            } else {
                return false;
            }
        }
        //ESTADOS
        public static function orderStatus ($pState) {
            $stateChanged = 'confirm';
            if ($pState == 'confirm') {
                $stateChanged = 'Pendiente';
            } elseif ($pState == 'preparation') {
                $stateChanged = 'En preparación';
            } elseif ($pState == 'sended') {
                $stateChanged = 'Enviado';
            } elseif ($pState == 'received') {
                $stateChanged = 'Finalizado';
            }
            return $stateChanged;
        }

    }
?>