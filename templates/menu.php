
    <?php foreach ($dataPages as $page ) {
      if (!isset($page['menu'])) continue 
    ?>
      <li>
        <a class="main-menu__item <?=($page['path'] === $dataCurrentPage['path']) ? 'active' : '' ?>" href="<?=$page['path']?>"><?=$page['title']?></a>
      </li>
    <?php }
    