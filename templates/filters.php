<form id="filters">
  <?php 
  include $_SERVER['DOCUMENT_ROOT'] . '/templates/categories.php';
  ?>
  
  <div class="filter__wrapper">
    <b class="filter__title">Фильтры</b>
    <div class="filter__range range">
      <span class="range__info">Цена</span>
      <div class="range__line" aria-label="Range Line"></div>
      <div class="range__res">
        <span class="range__res-item min-price">350 руб.</span>
        <span class="range__res-item max-price">32 000 руб.</span>
      </div>
    </div>
  </div>

  <fieldset class="custom-form__group">
    <input type="checkbox" <?=isset($_GET['new']) && $_GET['new'] === 'true' ? 'checked' : ''?> name="new" id="new" class="custom-form__checkbox">
    <label for="new" class="custom-form__checkbox-label custom-form__info" style="display: block;">Новинка</label>
    
    <input type="checkbox" <?=isset($_GET['new']) && $_GET['sale'] === 'true' ? 'checked' : ''?> name="sale" id="sale" class="custom-form__checkbox">
    <label for="sale" class="custom-form__checkbox-label custom-form__info" style="display: block;">Распродажа</label>
  </fieldset>
  <button class="button" type="submit" style="width: 100%">Применить</button>
</form>