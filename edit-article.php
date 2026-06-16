<?php
require_once('conn.php');

if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit;
}

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: admin.php');
    exit;
}

$id = (int)$_GET['id'];

//---------------------Получение данных статьи---------------------//
$query = "SELECT * FROM articles WHERE article_id = $id";
$result = $mysqli->query($query);
$article = $result->fetch_assoc();

if (!$article) {
    header('Location: admin.php');
    exit;
}

//---------------------Обновление статьи---------------------//
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_article'])) {
    $type_id = (int)$_POST['article-type_id'];
    $name = $mysqli->real_escape_string($_POST['article_name']);
    $desc = $mysqli->real_escape_string($_POST['article_desc']);
    
    $query = "UPDATE articles SET `article-type_id` = $type_id, `article_name` = '$name', `article_desc` = '$desc' WHERE article_id = $id";
    if ($mysqli->query($query)) {
        $_SESSION['message'] = 'Статья успешно обновлена!';
        header('Location: admin.php');
        exit;
    } else {
        $error = 'Ошибка при обновлении статьи: ' . $mysqli->error;
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/admin.css" rel="stylesheet">
    <title>Редактирование статьи | МБОУ СОШ № 18</title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="img/header-logo.png"> 
            <p>ШНО <br>МБОУ СОШ № 18</p> 
        </div>
        <nav class="menu">
            <a href="admin.php">Назад</a>
            <a href="logout.php">Выйти</a>
        </nav>
    </header>

    <div class="admin-container">
        <h1>Редактирование статьи</h1>
        
        <?php if (isset($error)): ?>
            <div class="alert error"><?= $error ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="form-group">
                <label>Предмет:</label>
                <select name="article-type_id" required>
                    <option value="1" <?= $article['article-type_id'] == 1 ? 'selected' : '' ?>>Математика</option>
                    <option value="2" <?= $article['article-type_id'] == 2 ? 'selected' : '' ?>>Русский язык</option>
                    <option value="3" <?= $article['article-type_id'] == 3 ? 'selected' : '' ?>>Литература</option>
                    <option value="4" <?= $article['article-type_id'] == 4 ? 'selected' : '' ?>>Биология</option>
                    <option value="5" <?= $article['article-type_id'] == 5 ? 'selected' : '' ?>>Физика</option>
                    <option value="6" <?= $article['article-type_id'] == 6 ? 'selected' : '' ?>>Химия</option>
                </select>
            </div>
            <div class="form-group">
                <label>Название статьи:</label>
                <input type="text" name="article_name" value="<?= htmlspecialchars($article['article_name']) ?>" required>
            </div>
            <div class="form-group">
                <label>Текст статьи:</label>
                <textarea name="article_desc" rows="10" required><?= htmlspecialchars($article['article_desc']) ?></textarea>
            </div>
            <button type="submit" name="update_article">Сохранить</button>
        </form>
    </div>
</body>
</html>