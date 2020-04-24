  <!-- MENU -->
  <?php $listCat = Utilidades::mostrarCategorias();?>
  <nav id="menu">
    <ul>
    <li><a href="<?=BASE_URL?>" class="category active" onclick="selectCat(0)">HOME</a></li>
    <?php $i=1?>
    <?php while ($cat = $listCat->fetch_object() ) :?>
        <li><a class="category" onclick="selectCat(<?=$i?>)"><?=$cat->nombre?></a></li>
        <?php $i+=1?>
    <?php endwhile;?>
    </ul>
</nav>