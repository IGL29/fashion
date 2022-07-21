<?php

function getRole($id) 
{
  include $_SERVER['DOCUMENT_ROOT'] . '/config.php';

  try {
    $pdo = new PDO($dsn, $user, $pass);
    $stmt = $pdo->prepare('SELECT name, roles.id from roles JOIN user_role ON user_role.role_id = roles.id WHERE user_id = :userId');
    $stmt->execute([':userId' => $id]);
    $roles = $stmt->fetch();

    return $roles;

  } catch(PDOException $Exception) {
    $Exception->getMessage();
  }

}