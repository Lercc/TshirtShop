<!-- MAIN-CONTAINER -->
<!-- LISTAPRODUCTOS-CONTAINER -->
<div class="listaProductos-container">
    <h1>Productos</h1>
    <table>
        <tr>
            <th>id</th>
            <th>nombre</th>
            <th>precio</th>
            <th>stock</th>
        </tr>
        <?php while ($prod = $productos->fetch_object()) : ?>
        <tr>
            <td><?=$prod->id?></td>
            <td><?=$prod->nombre?></td>
            <td><?=$prod->precio?></td>
            <td><?=$prod->stock?></td>
        </tr>
        <?php endwhile; ?>
        <tr>
            <td>ciacl</td>
            <td>ciacl</td>
            <td>ciacl</td>
            <td>ciacl</td>
        </tr>
        <tr>
            <td>ciacl</td>
            <td>ciacl</td>
            <td>ciacl</td>
            <td>ciacl</td>
        </tr>

    </table>
    <a href="<?=BASE_URL?>/producto/registro" class="button button-small">Crear Producto</a>
</div>