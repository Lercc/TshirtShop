<?php 
    ////////////////////////////////////////////////////
    /////////////// CONTROLLADOR FRONTAL /////////////// 
    ////////////////////////////////////////////////////
    require_once './autoload.php';

    require_once './config/parameters.php';

    require_once './views/layouts/header.php';
    require_once './views/layouts/menu-home.php';
    require_once './views/layouts/aside-home.php';
    
    function showError($pValor){
        $error = new errorController();
        $error->index($pValor);
    }

    if(isset($_GET['controller']) && isset($_GET['action'])) {

        //formar controlador 
        $nameController = $_GET['controller'].'Controller';

        //validar si existe la clase controlador
        if(file_exists('./controllers/'.$nameController.'.php')) {

            //instaciar un objeto del controlador validado
            $controller = new $nameController();

            //formar accion
            $action = $_GET['action'];

            //validad accion, si existe como metodo dentro de la claseControllador
            if(method_exists($controller,$action)) { 

                //ejecutar o hacer lllamado a la accion del metodo requerido
                $controller->$action();

            } else {
                showError('not exists method');
            }
        } else {
            showError('not exists controller');
        }
    } elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {

        //crear variables correspondientes
        $controller_default = CONTROLLER_DEFAULT;
        $action_default = ACTION_DEFAULT;

        //instanciar el objeto
        $controller = new $controller_default();

        //llamar a la acction default   
        $controller->$action_default();
        
    } else {
        showError('parámeto HTTP no válido');
    }

    require_once './views/layouts/footer.php';
?>
