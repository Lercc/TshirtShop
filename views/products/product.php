<!-- MAIN-CONTAINER -->
<div class="mostrarProducto-container">
    <div class="producto">
        <span class="stockProducto">Stock : <?=$producto->stock?></span>
        <?php if(isset($producto->imagen)) : ?>
            <img src="<?=BASE_URL?>/uploads/images/<?=$producto->imagen?>" alt="<?=$producto->imagen?>" title="<?=$producto->imagen?>" >
            <?php else : ?>
            <img src="<?=BASE_URL?>/assets/img/camiseta.png>" alt="camiseta.png" title="camiseta.png" >
        <?php endif?>
    </div>
    <div class="detalles">
        <h1><?=substr($producto->nombre,0,20)?></h1>
        <p><?=$producto->descripcion?> </p>     
        <p>S/ <?=$producto->precio?></p>
    <?php if($producto->stock != 0) : ?>
        <a href="<?=BASE_URL?>/carrito/agregar&id=<?=$producto->id?>">
        <div class="img"></div>
        <span>Añadir al carrito</span>
    </a>     
    <?php else : ?>
        <div class="img"></div>
        <span>Stock Agotado</span>
    <?php endif ?>
    </div>
    
</div>
<!-- <div class="products-pagination">
    < 1   2   3   4   5   6   >
</div> -->
<!-- END MAIN-CONTAINER -->