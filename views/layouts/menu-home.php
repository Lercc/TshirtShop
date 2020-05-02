<?php $listCat = Utilidades::mostrarCategorias(); ?>
<nav id="menu">
    <ul>
        <li><a href="<?= BASE_URL ?>" class="category 0">HOME</a></li>
        <?php while ($cat = $listCat->fetch_object()) :; ?>
            <li><a href="<?= BASE_URL ?>/producto/categoria&catId=<?= $cat->id ?>" class="category  <?= $cat->id ?>"><?= $cat->nombre ?></a></li>
        <?php endwhile; ?>
    </ul>
</nav>