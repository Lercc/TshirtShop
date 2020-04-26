<!-- MAIN-CONTAINER -->
<!-- LISTAPRODUCTOS-CONTAINER -->
<div class="listaProductos-container">
    <h1>Productos</h1>
    <?php if(isset($_SESSION['registroProducto']) && $_SESSION['registroProducto']==true) :?> 
    <span class="alerta-exito">Creación del producto exitosa</span>
    <?php elseif(isset($_SESSION['registroProducto']) && $_SESSION['registroProducto']==false) : ?>
    <span class="alerta-error">Creación del producta fallido</span>
    <?php endif?>
    <?php Utilidades::deleteSession('registroProducto')?>
    <?php if(isset($_SESSION['eliminarProducto']) && $_SESSION['eliminarProducto']==true) :?> 
    <span class="alerta-exito">Eliminación del producto exitosa</span>
    <?php elseif(isset($_SESSION['eliminarProducto']) && $_SESSION['eliminarProducto']==false) : ?>
    <span class="alerta-error">Eliminación del producto fallido</span>
    <?php endif?>
    <?php Utilidades::deleteSession('eliminarProducto')?>
    <div class="tableContainer">
        <table>
            <tr>
                <th>id</th>
                <th>nombre</th>
                <th>precio</th>
                <th>stock</th>
                <th>#</th>
            </tr>
            <?php while ($prod = $productos->fetch_object()) : ?>
            <tr>
                <td><?=$prod->id?></td>
                <td><?=$prod->nombre?></td>
                <td><?=$prod->precio?></td>
                <td><?=$prod->stock?></td>
                <td class="acciones">
                    <a class="editarProducto" href="<?=BASE_URL?>/producto/registroEditar&id=<?=$prod->id?>"></a>
                    <a class="eliminarProducto" href="<?=BASE_URL?>/producto/eliminar&id=<?=$prod->id?>" ></a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
    <a class="botonCrearProducto" href="<?=BASE_URL?>/producto/registro" class="button button-small">Crear Producto</a>
</div>