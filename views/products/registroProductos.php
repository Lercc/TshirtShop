<!-- MAIN-CONTAINER -->
<!--REGISTRO PRODUCTOS-CONTAINER -->
<div class="registroProductos-container">
    <?php if(isset($pro) && is_object($pro)) : ?>
        <?php $actionURL = BASE_URL.'/producto/crear&id='.$pro->id ?>
    <h1>Registro de <?=$pro->nombre?></h1>
    <?php elseif(!isset($pro)) : ?>
        <?php $actionURL = BASE_URL.'/producto/crear' ?>
    <h1>Registro de productos</h1>
    <?php endif?>

    <form action="<?=$actionURL?>" method="POST" enctype="multipart/form-data">
       <div>
           <label for="nombre">Nombre</label>
           <input type="text" name="nombre" value="<?= isset($pro) && is_object($pro) ? $pro->nombre : '' ?>">
           <span class="alerta-error" style="font-size:12px"><?=Utilidades::mostrarErrores('nombre')?></span>
        </div>
        
        <div>
            <label for="descripcion">Descripcion</label>
            <textarea name="descripcion"><?= isset($pro) && is_object($pro) ? $pro->descripcion : '' ?></textarea>
            <span class="alerta-error" style="font-size:12px"><?=Utilidades::mostrarErrores('descripcion')?></span>
        </div>
        
        <div>
            <label for="precio">Precio</label>
            <input type="text" name="precio" value="<?= isset($pro) && is_object($pro) ? $pro->precio : '' ?>">
            <span class="alerta-error" style="font-size:12px"><?=Utilidades::mostrarErrores('precio')?></span>
        </div>
        <div>
            <label for="stock">Stock</label>
            <input type="number" name="stock" value="<?= isset($pro) && is_object($pro) ? $pro->stock : '' ?>">
            <span class="alerta-error" style="font-size:12px"><?=Utilidades::mostrarErrores('stock')?></span>
        </div>
        <div>
            <label for="categoria">Categoria</label>
            <?php $categorias = Utilidades::mostrarCategorias()?>
            <select name="categoria">
                <?php while ($cat = $categorias->fetch_object()) : ?>
                    <option value="<?=$cat->id?>" <?= isset($pro) && is_object($pro) && $cat->id == $pro->categoria_id ? 'selected' : '' ?>><?=$cat->nombre?></option>
                    <?php endwhile?>
                </select>
            </div>
            <div class="imgContain">
                <label for="imagen">Imagen</label>
                <input type="file" name="imagen">
                <?php if (isset($pro) && is_object($pro)) : ?>
                    <img src="<?=BASE_URL?>/uploads/images/<?=$pro->imagen?>" alt="ing" class="img-tiny" >
                <?php endif?>  


                <span class="alerta-error" style="font-size:12px"><?=Utilidades::mostrarErrores('imagen')?></span>
            </div>
        <div>
            <input type="submit" value="Crear">
        </div>
    </form>
    <?php Utilidades::deleteSession('errores');?>
</div>