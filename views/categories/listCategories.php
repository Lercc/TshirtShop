<!-- MAIN-CONTAINER -->
    <!-- REGISTER-CONTAINER -->
    <div class="listCategories-container">
        <h1>Categorias</h1>
        <div class="categorias">
        <?php while ($cat = $listaCategorias->fetch_object()) : ?>
            <div class="categoria">
                <span class="categoria-nombre"><?=$cat->nombre?></span>
            </div>
            <?php endwhile;?>
        </div>
        <form action="<?=BASE_URL?>/categoria/crear" method="POST">
            <input type="text" name="categoria" placeholder="Ingresa Categoria ...">
            <input type="submit" value="CREAR CATEGORIA">
            <?php if(isset($_SESSION['errores'])) : ?>
            <span class="alerta-error"><?=Utilidades::mostrarErrores('nombreCat')?></span>
            <?php endif;?>
        </form>
        <?php Utilidades::deleteSession('errores');?>
    </div>

