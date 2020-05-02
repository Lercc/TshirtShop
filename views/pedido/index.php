<!-- MAIN-CONTAINER -->
<!-- LISTAPRODUCTOS-CONTAINER -->
<?php if(isset($identity) && $identity == true) : ?>
    <h1 class="tituloCarrito">Datos de envio</h1>
<?php endif ?>
<div class="carrito-container">

    <?php if(isset($identity) && $identity == false && !isset($_SESSION['carrito'])) : ?>
        <div class="carritoVacio">
            <h3>carrito vacio</h3>
            <a href="<?=BASE_URL?>">
                    <div class="img"></div>
                    <span>Añadir productos al carrito</span>
            </a>
        </div>
    <?php elseif(isset($identity) && $identity == false && isset($_SESSION['carrito'])) : ?>
        <div class="carritoVacio">
            <h3>login necesario</h3>
            <a href="<?=BASE_URL?>/usuario/register">
                    <div class="imgAccount"></div>
                    <span class="spanIngresa">registra / ingresa una cuenta </span>
            </a>  
        </div>
    <?php endif ?>

    <?php if(isset($identity) && $identity == true) : ?>
        <div class="pedido-datos">
            <h3>DATOS</h3>
            <div class="datos-formulario">
                <form action="<?=BASE_URL?>/pedido/realizar" method="POST">
                    <label for="provincia">Provincia</label>
                    <span class="alerta-error"><?=Utilidades::mostrarErrores('provincia')?></span>
                    <input type="text" name="provincia">
                    <label for="localidad">Localidad</label>
                    <span class="alerta-error"><?=Utilidades::mostrarErrores('localidad')?></span>
                    <input type="text" name="localidad">
                    <label for="direccion">Direccion</label>
                    <span class="alerta-error"><?=Utilidades::mostrarErrores('direccion')?></span>
                    <input type="text" name="direccion">
                    <input type="submit" value="Realizar pedido" class="realizar-pedido">
                </form>
                <?php Utilidades::deleteSession('errores')?>
            </div>
        </div>
        <div class="pedido-productos">
            <?php foreach($_SESSION['carrito'] as $indice => $producto) : ?>
            <div class="pedido-producto">
                <img src="<?=BASE_URL.'/uploads/images/'.$producto['producto']->imagen?>" alt="<?=$producto['producto']->imagen?>" title="<?=$producto['producto']->imagen?>">
                <p><a href="<?=BASE_URL?>/producto/producto&id=<?=$producto['productoId']?>"><?=$producto['producto']->nombre?></a></p>
                <p><?=$producto['producto']->precio?></p>
                <p><?=$producto['unidades']?></p>
            </div>
            <?php endforeach ?>
        </div>
    <?php endif ?>
    
</div>