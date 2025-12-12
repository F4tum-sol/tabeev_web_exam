<?php require 'db.php'; 

$username = $_COOKIE['username'] ?? null;

if (!$username) {
    header('Location: login.php');
    exit;
}

$stmt = $pdo->prepare("SELECT username FROM users WHERE username = ?");
$stmt->execute([$username]);
if (!$stmt->fetch()) {
    setcookie('username', '', time() - 3600, '/');
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Tabeev</title>
</head>
<body>
    <div class="container">
        <h2>Привет, <?= htmlspecialchars($username) ?>!</h2>
        <p class="welcome-text">Вы успешно авторизованы.</p>
    </div>
</body>
</html>
