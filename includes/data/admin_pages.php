<?php

include $_SERVER['DOCUMENT_ROOT'] . '/includes/data/pages.php';

$adminPages = [
  // array_merge(PAGES[0], ['available' => []]),
  [
    'title' => 'Товары',
    'path' => '/admin/products',
    'menu' => [
      'title' => 'Товары'
    ],
    'available' => ['admin'],
    'file' => '/includes/admin_panel/products.php'
  ],
  [
    'title' => 'Добавить/изменить товар',
    'path' => '/admin/add',
    'available' => ['admin'],
    'file' => '/includes/admin_panel/add.php'
  ],
  [
    'title' => 'Заказы',
    'path' => '/admin/orders',
    'menu' => [
      'title' => 'Заказы'
    ],
    'available' => ['operator', 'admin'],
    'file' => '/includes/admin_panel/orders.php'
  ],
  [
    'title' => 'Выйти',
    'path' => '/admin/exit',
    'menu' => [
      'title' => 'Выйти'
    ],
    'available' => ['operator', 'admin'],
    'file' => '/includes/admin_panel/products.php'
  ]
];