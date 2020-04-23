  <!-- MENU -->
  <?php $listCat = Utilidades::mostrarCategorias() ?>
  <nav id="menu">
            <ul>
                <li><a href="<?=BASE_URL?>" class="category active" onclick="selectCat(0)">HOME</a></li>
                <?php while ($cat = $listCat->fetch_object()  ) :?>
                    <?php $i = 1?>
                    <li><a class="category" onclick="selectCat($i)"><?=$cat->nombre?></a></li>
                    <?php $i++?>
                <?php endwhile; ?>
            </ul>
        </nav>
