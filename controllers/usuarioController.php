<?php 
    require_once './models/usuario.php';
    class usuarioController {

        public function index(){
            echo 'controller:usuario - action:mostrar';
        }
        
        public function register() {
            require_once './views/user/register.php';
        }
        
        public function createUser(){
            if(isset($_POST)){

                // $usuarioValidado = false;
                $errores = array();

                $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
                $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : '';
                $email = isset($_POST['email']) ? $_POST['email'] : '';
                $password = isset($_POST['password']) ? $_POST['password'] : '';
                
                //VALIDACION NOMBRE 
                if (!empty($nombre) && !is_numeric($nombre)) {
                        // $nombreValidado = true;
                        for ($i=0;$i<strlen($nombre);$i++) {
                            if ( !preg_match('/[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+/',$nombre[$i]) ) {
                                // $nombreValidado = false;   
                                $errores["nombre"] = 'Campo nombre no válido';
                                break;
                            }
                        }
                } else {
                    // $nombreValidado = false;
                    $errores['nombre'] = 'Campo nombre no válido';
                }

                //VALIDACION APELLIDO
                if (!empty($apellidos) && !is_numeric($apellidos)) {
                        // $apellidosValidado = true;
                        for ($i=0;$i<strlen($apellidos);$i++) {
                            if ( !preg_match('/[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+/',$apellidos[$i]) ) {
                                // $apellidosValidado = false;   
                                $errores["apellidos"] = 'Campo apellidos no válido';
                                break;
                            }
                        }
                } else {
                    // $apellidoValidado = false;
                    $errores['apellidos'] = 'Campo apellidos no válido';
                }

                //VALIDACION EMAIL
                if (empty($email) || !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
                    // $emailValidado = false;
                    $errores['email'] = 'El campo correo no es válido'; 
                }
                /* $emailValidado = true;*/
                
                //VALIDACION PASSWORD
                if (empty($password)) {
                    /* $passwordValidado = fase;*/
                    $errores['password'] = 'El campo password no puede ir vacío';
                }
                /* $passwordValidado = true;*/

                //CARGAR TODOS LOS ERRORES A LA VARIABLE DE SESION ERRORES
                $_SESSION['errores'] = $errores;

                if(count($errores)==0 ) {
                // $usuarioValidado = false;
                    $usuario = new Usuario();

                    $usuario->setNombre($usuario->escapeString($nombre));
                    $usuario->setApellidos($usuario->escapeString($apellidos));
                    $usuario->setEmail($usuario->escapeString($email));
                    $usuario->setPassword($usuario->encryptPasword($password));

                    $resultado = $usuario->create();
                    
                    if($resultado) {
                        $_SESSION['registro'] = true;
                    } else {
                        $_SESSION['registro'] = false;
                    }
                }
            } else {
                $_SESSION['registro'] = false;
            }
            header('Location:'.BASE_URL.'/usuario/register');
        }

        public function loginUser() {

        }
    }
?>