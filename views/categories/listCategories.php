<!-- MAIN-CONTAINER -->
    <!-- REGISTER-CONTAINER -->
    <div class="listCategories-container">
        <h1>Categorias</h1>
        <div class="categorias">
        <?php while ($cat = $listaCategorias->fetch_object()) : ?>
            <div class="categoria">
                <span class="categoria-id"><?=$cat->id?></span>
                <span class="categoria-nombre"><?=$cat->nombre?></span>
            </div>
            <?php endwhile; ?>
        </div>
        <form action="<?=BASE_URL?>/categoria/crear" method="POST">
            <input type="text" name="categoria" placeholder="Ingresa Categoria ...">
            <input type="submit" value="CREAR CATEGORIA" >
        </form>


    </div>

