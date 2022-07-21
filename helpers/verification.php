<?php

function dataValidation ($receivedEmail, $receivedPassword)
{
    include $_SERVER['DOCUMENT_ROOT'] . '/config.php';

    try {
        $pdo = new PDO($dsn, $user, $pass);
        $stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email');
        $stmt->execute([':email'=> $receivedEmail]);
        $userData = $stmt->fetch();


        if (!empty($userData) && password_verify($receivedPassword, $userData['password'])) {

            if (!isset($_SESSION['isAuthorized'])) {
                $_SESSION['isAuthorized'] = true;
            }

            setcookie('email', $userData['email'], time() + 86400 * 30, '/'); // 30 days
            $_SESSION['userId'] = $userData['id'];

            $pdo = null;
            $stmt = null;

            return ['userData' => $userData, 'isAuthorized' => true];
        }
        $pdo = null;
        $stmt = null;

        return ['userData' => null, 'isAuthorized' => false, 'errors' => ['неверный логин или пароль']];
    }
    catch(PDOException $err) {
        echo $err->getMessage();
    }
}
