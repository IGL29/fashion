<?php

!defined('PAGES') && define('PAGES', [
  [
    'title' => 'Fashion',
    'path' => '/',
    // 'menu' => [
    //   'title' => 'Главная'
    // ],
    'file' => '/includes/pages/main.php'
  ],
  [
    'title' => 'Новинки',
    'path' => '/new',
    'menu' => [
      'title' => 'Новинки'
    ],
    'file' => '/includes/pages/main.php'
  ],
  [
    'title' => 'Распродажа',
    'path' => '/sale',
    'menu' => [
      'title' => 'Sale'
    ],
    'file' => '/includes/pages/main.php'
  ],
  [
    'title' => 'Доставка',
    'path' => '/delivery',
    'menu' => [
      'title' => 'Доставка'
    ],
    'file' => '/includes/pages/delivery.php'
  ],
  [
    'title' => 'Авторизация',
    'path' => '/admin',
    'available' => [],
    'file' => '/includes/pages/authorization.php'
  ],

]);