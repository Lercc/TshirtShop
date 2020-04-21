<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf8"/>
        <title> Tienda de camisetas </title>
        <link rel="stylesheet"  type="text/css" href="./assets/css/style.css">
    </head>
    <body>
        <!-- HEADER -->
        <header>
            <div id="imagotipo">
                <img class="isotipo" src="./assets/img/camiseta.png" alt="isotipo">
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
                            <img src="./assets/icons/lock.svg" alt="">
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
        <!-- MENU -->
        <nav id="menu">
            <ul>
                <li><a class="category active" onclick="selectCat(0)">HOME</a></li>
                <li><a class="category" onclick="selectCat(1)">CATEGORY 1</a></li>
                <li><a class="category" onclick="selectCat(2)">CATEGORY 2</a></li>
                <li><a class="category" onclick="selectCat(3)">CATEGORY 3</a></li>
                <li><a class="category" onclick="selectCat(4)">CATEGORY 4</a></li>
                <li><a class="category" onclick="selectCat(5)">CATEGORY 5</a></li>
            </ul>
        </nav>

        <div id="contaniner">
            <!-- ASIDE -->
            <aside class="aside">
                <img src="./assets/img/models/model-1.png" alt="">
                <span>NEW</span>
                <span>ARRIVALS</span>
            </aside>
            <!-- MAIN -->
            <div class="main">
                <div class="main-container">
                    <div class="products">
                        <div class="product">
                            <img src="./assets/img/products/product-1.png" alt="">
                            <p>White Tshirt</p>
                            <p>$/30 dolares. </p>
                            <a href=#></a>
                        </div> 
                        <div class="product">
                            <img src="./assets/img/products/product-7.png" alt="">
                            <p>White Tshirt</p>
                            <p>$/30 dolares. </p>
                            <a href=#></a>
                        </div> 
                        <div class="product">
                            <img src="./assets/img/products/product-3.png" alt="">
                            <p>White Tshirt</p>
                            <p>$/30 dolares. </p>
                            <a href=#></a>
                        </div> 
                        <div class="product">
                            <img src="./assets/img/products/product-4.png" alt="">
                            <p>White Tshirt</p>
                            <p>$/30 dolares. </p>
                            <a href=#></a>
                        </div> 
                        <div class="product">
                            <img src="./assets/img/products/product-5.png" alt="">
                            <p>White Tshirt</p>
                            <p>$/30 dolares. </p>
                            <a href=#></a>
                        </div> 
                        <div class="product">
                            <img src="./assets/img/products/product-6.png" alt="">
                            <p>White Tshirt</p>
                            <p>$/30 dolares. </p>
                            <a href=#></a>
                        </div> 
                       
                    </div>
                    <div class="products-pagination">
                        < 1   2   3   4   5   6   >
                    </div>
                </div>
            </div>
            <!-- FOOTER -->
            <footer>
                <span>DEVELOPED BY LERCC &copy;<?=date('Y')?> </span>
            </footer>
        </div>
        <script src="./assets/js/main.js"></script>
    </body>
</html>