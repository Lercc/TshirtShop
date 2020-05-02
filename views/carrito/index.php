<!-- MAIN-CONTAINER -->
<!-- LISTAPRODUCTOS-CONTAINER -->
<?php if(isset($_SESSION['carrito'])) : ?>
    <h1 class="tituloCarrito">Carrito de Compras</h1>
<?php endif ?>
<div class="carrito-container">
<?php if(!isset($_SESSION['carrito'])) : ?>
    <div class="carritoVacio">
        <h3>carrito vacio</h3>
        <a href="<?=BASE_URL?>">
            <div class="img"></div>
            <span>Añadir productos al carrito</span>
        </a>  
    </div>
<?php endif ?>
<?php if(isset($_SESSION['carrito'])) : ?>
    <div class="carrito-detalles">
    <h3>resumen carrito</h3>
        <div class="carrito-detalles-cantidad">
            <!-- VARIABLES A USAR -->
            <?php $carrito = Utilidades::datosCarrito()?>
                                        <!-- CONSUMIR VARAIBLE -->
            <div><p>PRODUCTOS</p><span><?=$carrito['cantidad']?></span></div>
            <!-- LISTAR PRODUCTOS -->
            <?php foreach($_SESSION['carrito'] as $producto) : ?>
            <div><p><?=$producto['producto']->nombre?></p><span><?=$producto['unidades']?></span></div>
            <?php endforeach?>
        </div>
        <div class="carrito-detalles-precio">
                                        <!-- CONSUMIR VARAIBLE -->
            <div><p>TOTAL</p><span>S/ <?=$carrito['precio']?></span></div>
        </div>
        <a href="<?=BASE_URL?>/pedido/index" class="realizar-pedido">COMPRAR</a>  
    </div>
    <div class="carrito-productos">
        <?php foreach($_SESSION['carrito'] as $indice => $producto) : ?>
        <div class="carrito-producto">
            <img src="<?=BASE_URL.'/uploads/images/'.$producto['producto']->imagen?>" alt="<?=$producto['producto']->imagen?>" title="<?=$producto['producto']->imagen?>">
            <p><a href="<?=BASE_URL?>/producto/producto&id=<?=$producto['productoId']?>"><?=$producto['producto']->nombre?></a></p>
            <p><?=$producto['producto']->precio?></p>
            <p><?=$producto['unidades']?></p>
            <a href="<?=BASE_URL?>/carrito/eliminar&id=<?=$producto['productoId']?>" class="eliminarProCarrito"></a>
        </div>
        <?php endforeach ?>
    </div>
<?php endif ?>
</div>