<?php
session_start(); // Инициализируем сессию

require_once('db.php');


if (isset($_SESSION['User'])) {
    header("Location: hello.php");
    exit();
}

$link = mysqli_connect('127.0.0.1', 'root', 'Test123', 'db_first');

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($link, $_POST['login']);
    $pass = mysqli_real_escape_string($link, $_POST['password']);

    if (!$username || !$pass) {
        die("Пожалуйста введите все значения!");
    }

    $sql = "SELECT * FROM users WHERE username='$username' AND pass='$pass'";

    $result = mysqli_query($link, $sql);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['User'] = $username;
        header('Location: hello.php');
        exit();
    } else {
        echo "не правильное имя или пароль";
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Толмачев В.В. </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="container">
        <div class="row">
                <div class="col-12 ">
                    <h1> Авторизируйтесь </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12 ">
                    <form method='POST' action="login.php">
                        <div class="row form__reg"><input class="form" type="text" name="login" placeholder="Login"></div>
                        <div class="row form__reg"><input class="form" type="password" name="password" placeholder="Password"></div>
                        <button type="submit" class="btn_red btn__reg" name="submit">Продолжить</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
