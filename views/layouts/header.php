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
                    <div class="account-user-containt toggleOFF">
                        <div id="login" class="account-user-element">
                            <img src="<?=BASE_URL?>/assets/icons/lock.svg" alt="">
                            <form action="#" method="POST">
                                <label for="user">USUARIO</label>
                                <input type="email" name="user">
                                <label for="password">CONTRASEÑA</label>
                                <input type="password" name="password">
                                <input type="submit" value="JOIN">
                            </form>
                            <br><hr><hr>
                            <a href="">MIS PEDIDOS</a>
                            <a href="">GESTIONAR PEDIDOS</a>
                            <a href="">GESTIONAR CATEGORIAS</a>
                        </div>
                        <div class="account-user-data">
    
                        </div>
                    </div>
                </div>
            </div>
        </header>