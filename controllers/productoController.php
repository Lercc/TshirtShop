<?php 
    require_once './models/producto.php';
    class productoController {

        public function index(){
            echo 'controller:producto - action:mostrar';
        }

        public function newArrivals() {
            require_once './views/products/newArrivals.php';
        }

        public function gestion () {
            Utilidades::isAdmin();
            $producto = new Producto();
            $productos = $producto->getAllProductos();
            if ($productos) {
                require_once './views/products/gestion.php';
            } else {
                $productos = false;
            }

        }
        public function registro () {
            Utilidades::isAdmin();
            require_once './views/products/registroProductos.php';

        }
        public function crear () {
            Utilidades::isAdmin();
            if(isset($_POST)) {
                $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : null ;
                $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null ;
                $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : null ;
                $precio = isset($_POST['precio']) ? $_POST['precio'] : null ;
                $stock = isset($_POST['stock']) ? $_POST['stock'] : null ;
                $imagen = isset($_POST['imagen']) ? $_POST['imagen'] : null ;

                $errores =array();
                //VALIDACION NOMBRE
                if(!empty($nombre) && !is_numeric($nombre)) {
                    for ($i=0;$i<strlen($nombre);$i++) {
                        if(!preg_match('/[a-zA-ZáéíóúÁÉÍÓÚnÑ ]+/',$nombre[$i])) {
                            $errores['nombre'] = 'Carácteres no válidos';
                        break;
                        }
                    }
                } else {
                    $errores['nombre'] = 'El campo no puede tener números o estar vacío';
                }
                //VALIDACION DESCIPCION
                if(!empty($descripcion)) {
                    for ($i=0;$i<strlen($descripcion);$i++) {
                        if(!preg_match('/[a-zA-ZáéíóúÁÉÍÓÚnÑ0-9. ]+/',$descripcion[$i])) {
                            $errores['descripcion'] = 'Carácteres no válidos';
                        break;
                        }
                    }
                }
                //VALIDACION PRECIO
                if(!is_numeric($precio) || $precio<=0) {
                    $errores['precio'] = 'El campo tiene valores no válidos';
                }
                //VALIDACION PRECIO
                if( !is_numeric($stock) || $precio<0) {
                    $errores['stock'] = 'El campo tiene valores no válidos '.$stock;
                }
                
                if (count($errores) == 0) {
                    
                    $producto = new Producto();
                    $producto->setCategoriaId($categoria);
                    $producto->setNombre($producto->escapeString($nombre));
                    $producto->setDescripcion($producto->escapeString($descripcion));
                    $producto->setPrecio($precio);
                    $producto->setStock($stock);
                    $producto->setImagen($imagen);

                    $resultado = $producto->crearProducto();
                    
                    if($resultado) {
                        $_SESSION['registroProducto'] = true;
                    } else {
                        $_SESSION['registroProducto'] = false;
                    }
                } else {
                    $_SESSION['errores'] = $errores;
                    header('Location:'.BASE_URL.'/producto/registro');
                    exit();
                }

            }
            header('Location:'.BASE_URL.'/producto/gestion');
        }

    }