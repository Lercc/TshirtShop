<!-- MAIN-CONTAINER -->
<div class="products">
    <?php if($productos->num_rows != 0) : ?>
        <?php while($pro = $productos->fetch_object()) : ?>
        <div class="product">
            <img src="<?=BASE_URL?>/uploads/images/<?=$pro->imagen?>" alt="<?=$pro->imagen?>" title="<?=$pro->imagen?>">
                <a href="<?=BASE_URL?>/producto/producto&id=<?=$pro->id?>">
                    <p><?=$pro->nombre?></p>
                    <p>S/ <?=$pro->precio?> soles. </p>
                </a>
            <a href="<?=BASE_URL?>/carrito/agregar&id=<?=$pro->id?>"></a>
        </div> 
        <?php endwhile;?> 
    <?php else: ?>
    <h3 class="titleContainter">No hay productos que mostrar</h3>
    <?php endif;?>
</div>
<!-- <div class="products-pagination">
    < 1   2   3   4   5   6   >
</div> -->
<!-- END MAIN-CONTAINER -->