<?php
    require_once './models/producto.php';

    class carritoController  {

        public function index() {
            require_once './views/carrito/index.php';
        }
        //AGREGA UN PRODUCTO A EL CARRITO
        public function agregar() {
            if(isset($_GET)) {
                $productoID = isset($_GET['id']) && is_numeric($_GET['id']) ? $_GET['id'] : false ;

                if(isset($_SESSION['carrito']) && $productoID != null) {

                    $productoRepetido = 0;

                    foreach ($_SESSION['carrito'] as $indice => $producto) {

                        if( $producto['productoId'] == $productoID ) {
                            $productoRepetido++;
                            $_SESSION['carrito'][$indice]['unidades']++; 
                        }
                    }
                }
                if (!isset($productoRepetido) || $productoRepetido == 0 && $productoID != false) {
                    $producto = new Producto();
                    $producto->setId($productoID);
                    $producto = $producto->getOne();
                    
                    if (is_object($producto)){
                        $_SESSION['carrito'][]= array (
                            'productoId' => $producto->id,
                            'unidades'   => 1,
                            'producto' => $producto
                        );
                    } else {
                        header('Location:'.BASE_URL);
                    }
                }
                header('Location:'.BASE_URL.'/carrito/index');
            } else {
                header('Location:'.BASE_URL);
            }
        }
        //BORRAR UN PRODUCTO DEL CARRITO
        public function eliminar() {
            if(isset($_GET) && isset($_SESSION['carrito'])) {
                $productoID = isset($_GET['id']) ? $_GET['id'] : null;
                
                if($productoID != null && is_numeric($productoID)) {
                    foreach($_SESSION['carrito'] as $indice => $producto) {
                        if($producto['productoId'] == $productoID) {
                            unset($_SESSION['carrito'][$indice]);
                        }
                    }
                    if(count($_SESSION['carrito'])==0 || empty($_SESSION['carrito'])){
                        unset($_SESSION['carrito']);
                    }
                }
            }
            header('Location:'.BASE_URL.'/carrito/index');
        }
        //BORRA TODO EL CARRITO
        public function limpiar() {
            if(isset($_SESSION['carrito'])) {
                unset($_SESSION['carrito']);
            }
            header('Location:'.BASE_URL);
        }
    }