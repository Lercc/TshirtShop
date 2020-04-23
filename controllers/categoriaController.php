<?php 
    require_once './models/categoria.php';

    class categoriaController {

        public function index(){
            Utilidades::isAdmin();
            echo 'controller:categoria - action:mostrar';
        }
        
        public function listar() {
            Utilidades::isAdmin();
            $categoria = new Categoria();
            $listaCategorias = $categoria->listCategories();
            require_once './views/categories/listCategories.php';
            
        }
        
        public function crear() {
            Utilidades::isAdmin();
            if ( isset($_POST)) {
                $errores = array(); 
                $nombreCat = isset($_POST['categoria']) ? $_POST['categoria'] : null;
                if(empty($nombreCat)) {
                    $errores['nombreCat'] = 'El campo no puede estar vacio';
                }
                if(count($errores)==0) {
                    $categoria = new Categoria();
                    $categoria->setNombre($categoria->escapeString  ($nombreCat));
                    $categoria->createCategory();

                } else {
                    $_SESSION['errores'] = $errores; 
                }
                header('Location:'.BASE_URL.'/categoria/listar');
            } else {
                header('Location:'.BASE_URL);
            }
        }
    }
?>