<?php require 'db.php'; 
$error = $success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    

    $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->execute([$username, $password]);
    $success = 'Регистрация успешна! <a href="login.php">Перейти к входу</a>';

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
        <h2>Регистрация</h2>
        <?php if($error): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>
        <?php if($success): ?>
            <div class="alert alert-success"><?= $success ?></div>
        <?php endif; ?>
        
        <form method="POST">
            <div class="form-group">
                <label>Логин:</label>
                <input type="text" name="username">
            </div>
            <div class="form-group">
                <label>Пароль:</label>
                <input type="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
        </form>
        <p><a href="login.php">Уже есть аккаунт? Войти</a></p>
    </div>
</body>
</html>
