<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

session_name('session_id');
session_start();

include $_SERVER['DOCUMENT_ROOT'] . '/includes/data/pages.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/data/admin_pages.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/data/categories.php';
include $_SERVER['DOCUMENT_ROOT'] . '/helpers/isCurrentUrl.php';
include $_SERVER['DOCUMENT_ROOT'] . '/helpers/verification.php';
include $_SERVER['DOCUMENT_ROOT'] . '/helpers/getRole.php';

if (isset($_SESSION['isAuthorized']) && $_SESSION['isAuthorized'] === true && !empty($_COOKIE['email'])) {
  setcookie('email', $_COOKIE['email'], time() + 86400 * 30, '/');
  $isAuthorized = true;
}

if (!isset($isAuthorized) && isset($_POST['email']) && isset($_POST['password'])) {
  ['userData' => $userData, 'isAuthorized' => $isAuthorized, 'errors' => $errors] = dataValidation($_POST['email'], $_POST['password']);
}

$userId = isset($userData) && isset($userData['id']) ? $userData['id'] : (isset($_COOKIE['userId']) ? $_COOKIE['userId'] : null);
$userRoles = $userId !== null ? getRole($userId) : null;
$dataPages = null;
$dataCurrentPage = null;

if ($userRoles === null) {
  $dataPages = [...PAGES, ...$categories];
} else {
  $dataPages = [...$adminPages, ...$categories];
}

foreach ($dataPages as $dataPage) {
  if (isCurrentUrl($dataPage['path'])) {
    $dataCurrentPage = $dataPage;
    break;
  }
}

$data = json_decode(file_get_contents('php://input', true), true);
if ($data !== null && isset($data['email']) && isset($data['password'])) {
  header('Location: /');
}

if ($data) {
  echo $data;
}

?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <title><?=$dataCurrentPage['title']?></title>

  <meta name="description" content="Fashion - интернет-магазин">
  <meta name="keywords" content="Fashion, интернет-магазин, одежда, аксессуары">

  <meta name="theme-color" content="#393939">

  <link rel="preload" href="/img/intro/coats-2018.jpg" as="image">
  <link rel="preload" href="/fonts/opensans-400-normal.woff2" as="font">
  <link rel="preload" href="/fonts/roboto-400-normal.woff2" as="font">
  <link rel="preload" href="/fonts/roboto-700-normal.woff2" as="font">

  <link rel="icon" href="/img/favicon.png">
  <link rel="stylesheet" href="/css/style.min.css">

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="/js/scripts.js" defer></script>
</head>
<body>

<?php
var_dump('DataCurrentPage ===> ', $dataCurrentPage)
?>

<header class="page-header">
  <a class="page-header__logo" href="/">
    <img src="/img/logo.svg" alt="Fashion">
  </a>

  <nav class="page-header__menu">
    <ul class="main-menu main-menu--header">
    <?php
      include $_SERVER['DOCUMENT_ROOT'] . '/templates/menu.php';
    ?>
    </ul>
  </nav>
</header>