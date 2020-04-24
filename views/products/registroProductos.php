<!-- MAIN-CONTAINER -->
<!--REGISTRO PRODUCTOS-CONTAINER -->
<div class="registroProductos-container">
    <h1>Registro de productos</h1>
    <form action="<?=BASE_URL?>/producto/crear" method="POST">
       <div>
           <label for="nombre">Nombre</label>
           <input type="text" name="nombre">
           <span class="alerta-error" style="font-size:12px"><?=Utilidades::mostrarErrores('nombre')?></span>
        </div>
        
        <div>
            <label for="descripcion">Descripcion</label>
            <textarea name="descripcion"></textarea>
            <span class="alerta-error" style="font-size:12px"><?=Utilidades::mostrarErrores('descripcion')?></span>
        </div>
        
        <div>
            <label for="precio">Precio</label>
            <input type="text" name="precio">
            <span class="alerta-error" style="font-size:12px"><?=Utilidades::mostrarErrores('precio')?></span>
        </div>
        <div>
            <label for="stock">Stock</label>
            <input type="number" name="stock">
            <span class="alerta-error" style="font-size:12px"><?=Utilidades::mostrarErrores('stock')?></span>
        </div>
        <div>
            <label for="categoria">Categoria</label>
            <?php $categorias = Utilidades::mostrarCategorias()?>
            <select name="categoria">
                <?php while ($cat = $categorias->fetch_object()) : ?>
                <option value="<?=$cat->id?>"><?=$cat->nombre?></option>
                <?php endwhile?>
            </select>
        </div>
        <div>
            <label for="imagen">Imagen</label>
            <input type="file" name="imagen">
         </div>
        <div>
            <input type="submit" value="Crear">
        </div>
    </form>
    <?php Utilidades::deleteSession('errores');?>
</div>