<?php 
    require_once './models/producto.php';
    class productoController {

        public function index(){
            echo 'controller:producto - action:mostrar';
        }
        //MOSTRAR PRODUCTOS NUEVOS
        public function newArrivals() {
            $cantidad = 6;
            $producto = new Producto();
            $productos = $producto->getLastProducts($cantidad);
            require_once './views/products/newArrivals.php';

        }
        // LISTA PAAR GESTIONAR TODOS LOS PRODUCTOS
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
        //REGISTRO DE PRODUCTOS PARA EDITAR O CREAR 
        public function registro () {
            Utilidades::isAdmin();
            require_once './views/products/registroProductos.php';
        }
        //CREACION DE NUEVO PRODUCTO
        public function crear () {
            Utilidades::isAdmin();
            if(isset($_POST)) {
                $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : null ;
                $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null ;
                $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : null ;
                $precio = isset($_POST['precio']) ? $_POST['precio'] : null ;
                $stock = isset($_POST['stock']) ? $_POST['stock'] : null ;  

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
                        if(!preg_match('/[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9. ]+/',$descripcion[$i])) {
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

                //VALIDACION ARCHIVO
                if (isset($_FILES['imagen'])) {

                    $imagen =  $_FILES['imagen']; 
                    $fileName = $imagen['name'];
                    $mimeType = $imagen['type'];
                    $tmpName = $imagen['tmp_name'];
                    if($mimeType == 'image/jpg' || $mimeType == 'image/jpeg' || $mimeType == 'image/png' || $mimeType == 'image/gif') {
                        if (!is_dir('./uploads/images') ) {
                            mkdir('./uploads/images',0777,true);
                        }
                        move_uploaded_file($tmpName,'./uploads/images/'.$fileName);
                    } else {
                        $erroes['imagen'] = 'Formato de imagen no válido';
                    }
                }
                
                if (count($errores) == 0) {
                    
                    $producto = new Producto();
                    $producto->setCategoriaId($categoria);
                    $producto->setNombre($producto->escapeString($nombre));
                    $producto->setDescripcion($producto->escapeString($descripcion));
                    $producto->setPrecio($precio);
                    $producto->setStock($stock);
                    $producto->setImagen($producto->escapeString($fileName));


                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $producto->setId($id);
                        $resultado = $producto->modificarProducto();

                    } else {
                        $resultado = $producto->crearProducto();
                    }
                    
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
        //REGISTRO PARA EDITAR VINCULADO O SIMILAR A REGISTRO
        public function registroEditar() {
            Utilidades::isAdmin();
            if (isset($_GET)) {
                $id = isset($_GET['id']) ? $_GET['id'] : null ;
                $producto = new Producto();
                $producto->setId($id);
                $pro = $producto->getOne();
                require_once './views/products/registroProductos.php';
            }
        }
        //ELIMINAR REGISTRO
        public function eliminar() {
            if (isset($_GET)) {
                $id = isset($_GET['id']) ? $_GET['id'] : null ;
                $producto = new Producto();
                $producto->setId($id);
                $result = $producto->eliminarProducto();
                
                if ( $result ) {
                    $_SESSION['eliminarProducto'] = true;
                }else {
                    $_SESSION['eliminarProducto'] = false;
                }

                header('Location:'.BASE_URL.'/producto/gestion');

            } else {
                header('Location:'.BASE_URL);
            }

        }
        //PRODUCTOS POR CATEGORIA
        public function categoria() {
            if(isset($_GET)) {
                $categoriaId = isset($_GET['catId']) ? $_GET['catId'] : null ;
                $producto = new Producto();
                $productos = $producto->getProductsByCategory($categoriaId);
                if($productos == false) {
                    header('Location:'.BASE_URL);
                } else {
                    require_once './views/products/productsByCategory.php';
                }
            } else {
                header('Location:'.BASE_URL);
            }
        }
        //MOSTRAR UN PRODUCTO DEFINIDO POR PARAMETRO GET
        public function producto() {
            if(isset($_GET)) {
                $id = isset($_GET['id']) ? $_GET['id'] : null;
                if($id!=null && is_numeric($id)) {
                    $producto = new Producto();
                    $producto->setId($id);
                    $producto = $producto->getOne();
                    if($producto) {
                        require_once './views/products/product.php';
                    }else {
                        header('Location:'.BASE_URL);
                    }
                } else {
                    header('Location:'.BASE_URL);
                }
            }
        }
    }