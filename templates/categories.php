<div class="filter__wrapper">
  <b class="filter__title">Категории</b>
  <ul class="filter__list">
    <?php
    $dataCurrentPage['path'];

    foreach ($categories as $category) {?>
      <li>
        <a class="filter__list-item <?=$category['path'] === $dataCurrentPage['path'] ? 'active' : ''?>" href="<?=$category['path']?>"><?=$category['title']?></a>
      </li>
    <?php } ?>
  </ul>
</div>
