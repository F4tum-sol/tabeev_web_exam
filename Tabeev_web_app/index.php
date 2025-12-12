<?php
$host = 'db';
$user = 'root';
$password = '0000';
$dbname = 'tabeev_db';

if (!isset($_COOKIE['User'])) {
    header("Location: login.php");
    exit;
}
$username = $_COOKIE['User'];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="profile-card mx-auto">
            <div class="profile-header">
                <h2>Добро пожаловать!</h2>
            </div>
            <div class="profile-body text-center">
                <h1>Привет, <?= $username ?>!</h1>
                <p>Вы успешно авторизовались в системе</p>
                <a href="login.php?logout=1" class="logout-btn">Выйти из аккаунта</a>
            </div>
        </div>
    </div>
</body>
</html>