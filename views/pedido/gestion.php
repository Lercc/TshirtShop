<h1 class="tituloPedido">Lista de productos</h1>
<div class="gestionPedido-container">
    <?php if($pedidos->num_rows == 0) : ?>
        <div class="carritoVacio">
            <h3>carrito vacio</h3>
            <a href="<?=BASE_URL?>">
                <div class="img"></div>
                <span>Añadir productos al carrito</span>
            </a>  
        </div>
    <?php else : ?>
    <div class="listaPedidos">
        <table>
            <tr>
                <th>Código Pedido</th>
                <th>Estado</th>
                <th>Fecha</th>
                <th>Hora</th>
            </tr>
            <?php while ($pedido = $pedidos->fetch_object()) : ?>
                <tr>
                    <td><a href="<?=BASE_URL?>/pedido/detalle&id=<?=$pedido->id?>">RG0TV<?=$pedido->id?></a></td>
                    <td><?=Utilidades::orderstatus($pedido->estado)?></td>
                    <td><?=$pedido->fecha?></td>
                    <td><?=$pedido->hora?></td>
                </tr>
                <?php endwhile ?>
            </table>
    </div>
    <?php endif ?>
</div>