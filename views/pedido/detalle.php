<!-- MAIN-CONTAINER -->
<!-- LISTAPRODUCTOS-CONTAINER -->
<h1 class="tituloCarrito">DETALLES DE PEDIDO</h1>
<div class="detallePedido-container">
    <!-- //DETALLES PEDIDO USUARIO -->
    <div class="detallePedido-usuario">
        <h3>USUARIO</h3>
        <div class="cajaDatos">
            <p><?=$datosPedido->nombre?> <?=$datosPedido->apellidos?></p>
            <p><?=$datosPedido->email?></p>
            <p><?=$datosPedido->provincia?></p>
            <p><?=$datosPedido->localidad?></p>
            <p><?=$datosPedido->direccion?></p>
        </div>
    </div>
    <!-- //DETALLES PEDIDO PEDIDO -->
    <div class="detallePedido-pedido">
        <h3>PEDIDO</h3>
        <div class="cajaDatos">
            <p>RG0TV<?=$datosPedido->id?></p>
            <p><?=$datosPedido->fecha?> | <?=$datosPedido->hora?></p>
            <p><?=$datosPedido->coste?></p>
            <p><?=Utilidades::orderStatus($datosPedido->estado)?></p>
        </div>
        <form action="<?=BASE_URL?>/pedido/cambiarEstado" method="POST">
                <input type="hidden" name="id" value="<?=$datosPedido->id?>">
            <?php if (isset($_SESSION['identity']) && !isset($_SESSION['admin'])) : ?>
                <input type="hidden" name="estado" value="received">
                <input type="submit" value="<?=$datosPedido->estado=='received' ? 'FINALIZADO' : 'CONFIRMAR RECEPCIÓN'?>" class="cambiar-estado" <?=$datosPedido->estado=='received' ? 'disabled' : ''?> >
            <?php elseif (isset($_SESSION['identity']) && isset($_SESSION['admin'])) : ?>
                <select name="estado">
                <option value="confirm" <?=$datosPedido->estado == 'confirm' ? 'selected' : '' ?>>Pendiente</option>
                <option value="preparation" <?=$datosPedido->estado == 'preparation' ? 'selected' : '' ?> >En preparación</option>
                <option value="sended" <?=$datosPedido->estado == 'sended' ? 'selected' : '' ?> >Enviado</option>
                </select>
                <input type="submit" value="CAMBIAR ESTADO" class="cambiar-estado">
            <?php endif ?>   
        </form>
    </div>
    <!-- //DETALLES PEDIDO PRODUCTOS -->
    <div class="detallePedido-productos">
        
        <?php while($producto = $productosPedido->fetch_object()) : ?>

        <div class="producto">
            <img src="<?=BASE_URL.'/uploads/images/'.$producto->imagen?>" alt="<?=$producto->imagen?>" title="<?=$producto->imagen?>">
            <p><a href="<?=BASE_URL?>/producto/producto&id=<?=$producto->producto_id?>"><?=$producto->nombre?></a></p>
            <p><?=$producto->unidades?></p>
        </div>
        <?php endwhile ?>
    </div>
</div>