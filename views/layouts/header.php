<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf8"/>
        <title> Tienda de camisetas </title>
        <link rel="stylesheet"  type="text/css" href="<?=BASE_URL?>/assets/css/style.css">
    </head>
    <body>
        <!-- HEADER -->
        <header>
            <div id="imagotipo">
                <img class="isotipo" src="<?=BASE_URL?>/assets/img/camiseta.png" alt="isotipo">
                <!-- <img id="logotipo" src="" alt=""> -->
                <p class="logotipo"><span>TSHIRTS</span><span>SHOP</span></p>
            </div>
            <div id="account">
                <div class="account-element">
                    <div class="account-carrito"></div>
                </div>
                
                <div class="account-element">
                    <div class="account-user"  onclick="accountUserToggle()"></div>
                    <div class="account-user-containt <?=!isset($_SESSION['erroresLogin']) ? 'toggleOFF': ''?>">
                        <div id="login" class="account-user-element">
                            <img src="<?=BASE_URL?>/assets/icons/lock.svg" alt="">
                            <?php if (!isset($_SESSION['identity'])) : ?>
                            <form action="<?=BASE_URL?>/usuario/loginUser" method="POST">
                                <label for="email">USUARIO</label>
                                <span class="alerta-error"><?=Utilidades::mostrarErroresLogin('email')?></span>
                                <input type="email" name="email">
                                <label for="password">CONTRASEÑA</label>
                                <span class="alerta-error"><?=Utilidades::mostrarErroresLogin('password')?></span>
                                <input type="password" name="password">
                                <span class="alerta-error"><?=Utilidades::mostrarErroresLogin('login')?></span>
                                <input type="submit" value="JOIN">
                            </form>
                            <?php elseif (isset($_SESSION['identity'])) : ?>
                            <p><?=$_SESSION['identity']->nombre?>  <?=$_SESSION['identity']->apellidos?></p>
                            <?php endif; ?>
                            <br><hr><hr>

                            <?php if (!isset($_SESSION['identity'])) : ?>
                            <a href="<?=BASE_URL?>/usuario/register">CREAR CUENTA</a>   
                            <?php endif;?>

                            <?php if (isset($_SESSION['admin'])) : ?>
                            <a href="<?=BASE_URL?>/categoria/listar">GESTIONAR CATEGORIAS</a>
                            <a href="<?=BASE_URL?>">GESTIONAR PRODUCTOS</a>
                            <a href="<?=BASE_URL?>">GESTIONAR PEDIDOS</a>
                            <?php endif; ?>

                            <?php if (isset($_SESSION['identity'])) : ?>
                                <a href="<?=BASE_URL?>">MIS PEDIDOS</a>
                                <a href="<?=BASE_URL?>/usuario/logout">LOGOUT</a>
                            <?php endif; ?>
                            
                            </div>
                            <div class="account-user-data">
                                
                            </div>
                    </div>
                    <?=Utilidades::deleteSession('erroresLogin')?>
                </div>
            </div>
        </header>