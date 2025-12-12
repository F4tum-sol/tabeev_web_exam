<?php require 'db.php'; 
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($user && password_verify($password, $user['password'])) {
        setcookie('username', $username, time() + 3600, '/', '', false, true);
        header('Location: welcome.php');
        exit;
    } else {
        $error = 'Неверный логин или пароль';
    }
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
        <h2>Вход</h2>
        <?php if($error): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>
        
        <form method="POST">
            <div class="form-group">
                <label>Логин:</label>
                <input type="text" name="username" required>
            </div>
            <div class="form-group">
                <label>Пароль:</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Войти</button>
        </form>
        <p><a href="register.php">Нет аккаунта? Регистрация</a></p>
    </div>
</body>
</html>
