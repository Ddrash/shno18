<?php
require_once('conn.php');

if (isset($_SESSION['admin_logged_in'])) {
    header('Location: admin.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $username = $mysqli->real_escape_string($_POST['username']);
    $password = $_POST['password'];
    
    if ($username === 'admin' && $password === 'admin123') {
        $_SESSION['admin_logged_in'] = true;
        header('Location: admin.php');
        exit;
    } else {
        $error = 'Неверные учетные данные';
    }
    if ($username === 'user' && $password === 'user123') {
        $_SESSION['admin_logged_in'] = true;
        header('Location: index.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/login.css" rel="stylesheet">
    <title>Вход в админ-панель | МБОУ СОШ № 18</title>
</head>
<body>
    <div class="login-container">
        <div class="back">
        <a href="index.php"><button>Назад</button></a> 
    </div>
        <div class="logo">
            <img src="img/header-logo.png">
            <h2>Вход в админ-панель</h2>
        </div>
        
        <?php if (isset($error)): ?>
            <div class="alert error"><?= $error ?></div>
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
            <button type="submit" name="login">Войти</button>
        </form>
    </div>
</body>
</html>