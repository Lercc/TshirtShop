<?php 

    require_once './models/pedido.php';

    class pedidoController {

        public function index(){
            $identity = false;
            if (isset($_SESSION['carrito']) && isset($_SESSION['identity'])) { 
                $identity = true;
            }
            require_once './views/pedido/index.php';
        }
        
        public function realizar() {
            Utilidades::isIdentity();
            if (isset($_SESSION['carrito']) && isset($_SESSION['identity']) && isset($_POST)) {

                $errores = array();

                $usuarioId = $_SESSION['identity']->id;
                $provincia = isset($_POST['provincia']) && !empty($_POST['provincia']) ? $_POST['provincia'] : $errores['provincia']='Campo provincia obligatorio' ;
                $localidad = isset($_POST['localidad']) && !empty($_POST['localidad']) ? $_POST['localidad'] : $errores['localidad']='Campo localidad obligatorio' ;
                $direccion = isset($_POST['direccion']) && !empty($_POST['direccion']) ? $_POST['direccion'] : $errores['direccion']='Campo direccion obligatorio' ;
                $coste = Utilidades::datosCarrito();
                $coste = $coste['precio'];

                if(count($errores) == 0) {

                        //
                        $pedido = new Pedido();
                        $pedido->setUsuarioId($usuarioId);
                        $pedido->setProvincia($pedido->escapeString($provincia));
                        $pedido->setLocalidad($pedido->escapeString($localidad));
                        $pedido->setDireccion($pedido->escapeString($direccion));
                        $pedido->setCoste($coste);
        
                        // REGISTRAMOS PEDIDO EN LA BD
                        $resultado = $pedido->crearPedido();

                        //CREAMOS LA LISTA DE PRODUCTOS VINCULADOS AL PEDIDO CREADO
                        $listaProductos =  $pedido->crearPedidoProductos();
                        
                        if ($resultado = 'complete' && $listaProductos == 'complete') {
                            unset($_SESSION['carrito']);
                            header('Location:'.BASE_URL.'/pedido/gestion');
                        } elseif($resultado = 'stockAgotado' || $listaProductos == 'stockAgotado') {
                            header('Location:'.BASE_URL.'/pedido/agotado');
                        }
                        //AL FINAL ELIMINAR LOS PRODUCTOS COMPRADOS DEL CARRITO
                } else {
                    $_SESSION['errores'] = $errores;
                    header('Location:'.BASE_URL.'/pedido/index');
                }
            } else {
                header('Location:'.BASE_URL);
            }
        }
        //
        public function gestion() {
            Utilidades::isIdentity();
            //
            $isAdmin =  false;
            if(isset($_SESSION['admin'])) {
                $isAdmin =  true;
            }
            //
            $usuarioId = $_SESSION['identity']->id;
            $pedido = new Pedido();
            //
            if ($isAdmin) {
                $pedidos = $pedido->getAllAsAdmin();                
            } else {
                $pedido->setUsuarioId($usuarioId);
                $pedidos = $pedido->getAllAsUser();
            }
            require_once './views/pedido/gestion.php';
        }
        //
        public function detalle () {
            Utilidades::isIdentity();
            if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] >= 1 ) {
                
                $pedidoId = $_GET['id'];

                $pedido = new Pedido();
                $pedido->setId($pedidoId);

                //OBTENER LOS DATOS DEL PEDIDO
                $datosPedido = $pedido->getOnePedido();
                $datosPedido = $datosPedido != false ? $datosPedido->fetch_object() : false ;

                //OBTENER LOS PRODUCTOS Y UNIDADES RELACIONADOS AL PEDIDO
                $productosPedido = $pedido->getProductosByPedido();
                $productosPedido = $productosPedido != false ? $productosPedido : false ;

                if( $datosPedido &&  $productosPedido ) {
                    require_once './views/pedido/detalle.php';
                } else {
                    header('Location:'.BASE_URL);
                }
            } else {
                header('Location:'.BASE_URL);
            }
        }
        //
        public function cambiarEstado () {
            Utilidades::isIdentity();
            if (isset($_POST)) {
                $pedidoId = isset($_POST['id']) && is_numeric($_POST['id']) ? $_POST['id'] : false ;
                $estado = isset($_POST['estado']) && is_string($_POST['estado']) ? $_POST['estado'] : false ;

                $pedido = new Pedido();
                $pedido->setId($pedidoId);
                $pedido->setEstado($estado);
                $resultado = $pedido->cambiarEstado();
                if($resultado) {
                    header('Location:'.BASE_URL.'/pedido/detalle&id='.$pedidoId);
                } else {
                    header('Location:'.BASE_URL);
                }
            } else {
                header('Location:'.BASE_URL);
            }


        }
        //stock agotado
        public function agotado (){
            echo '<h1>Stock agotado<h1>';
            echo '<h2>Intente otra vez<h2>';
        }
    }
?>