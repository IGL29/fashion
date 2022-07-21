<?php
$isErrors = isset($errors) && !empty($errors);

?>
<main class="page-authorization">
  <h1 class="h h--1">Авторизация</h1>
  <form class="custom-form">
    <input id="input-email" type="email" name="email" class="custom-form__input <?=$isErrors ? 'custom-form__input--error' : '' ?>" required="">
    <input id="input-password" type="password" name="password" class="custom-form__input <?=$isErrors ? 'custom-form__input--error' : '' ?>" required="">
    <button id="button-submit" class="button">Войти в личный кабинет</button>
    <ul>
    <?php 
    if ($isErrors) {
      foreach($errors as $error): ?>
        <li><?=$error?></li>
      <?php endforeach ?> 
    <?php }?>
  </ul>
  </form>
</main>
