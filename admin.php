<?php
require_once('conn.php');

//---------------------Проверка авторизации-------------------------//
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit;
}

//---------------------Добавление статьи-------------------------//
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_article'])) {
    $type_id = (int)$_POST['article-type_id'];
    $name = $mysqli->real_escape_string($_POST['article_name']);
    $desc = $mysqli->real_escape_string($_POST['article_desc']);
    
    $query = "INSERT INTO articles (`article-type_id`, `article_name`, `article_desc`) VALUES ($type_id, '$name', '$desc')";
    if ($mysqli->query($query)) {
        $_SESSION['message'] = 'Статья успешно добавлена!';
    } else {
        $_SESSION['error'] = 'Ошибка при добавлении статьи: ' . $mysqli->error;
    }
    header('Location: admin.php');
    exit;
}

//---------------------Удаление статьи---------------------//
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $query = "DELETE FROM articles WHERE article_id = $id";
    if ($mysqli->query($query)) {
        $_SESSION['message'] = 'Статья успешно удалена!';
    } else {
        $_SESSION['error'] = 'Ошибка при удалении статьи: ' . $mysqli->error;
    }
    header('Location: admin.php');
    exit;
}

//---------------------Список статей из БД---------------------//
$articles = [];
$query = "SELECT * FROM articles ORDER BY `article-type_id`, article_name";
$result = $mysqli->query($query);
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $articles[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/admin.css" rel="stylesheet">
    <title>Админ-панель | МБОУ СОШ № 18</title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="img/header-logo.png"> 
            <p>ШНО <br>МБОУ СОШ № 18</p> 
        </div>
        <nav class="menu">
            <a href="logout.php">Выйти</a>
        </nav>
    </header>

    <div class="admin-container">
        <h1>Админ-панель</h1>
        
        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert success"><?= $_SESSION['message'] ?></div>
            <?php unset($_SESSION['message']); ?>
        <?php endif; ?>
        
        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert error"><?= $_SESSION['error'] ?></div>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>

        <div class="admin-sections">
            <section class="add-article">
                <h2>Добавить статью</h2>
                <form method="POST">
                    <div class="form-group">
                        <label>Предмет:</label>
                        <select name="article-type_id" required>
                            <option value="1">Математика</option>
                            <option value="2">Русский язык</option>
                            <option value="3">Литература</option>
                            <option value="4">Биология</option>
                            <option value="5">Физика</option>
                            <option value="6">Химия</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Название статьи:</label>
                        <input type="text" name="article_name" required>
                    </div>
                    <div class="form-group">
                        <label>Текст статьи:</label>
                        <textarea name="article_desc" rows="10" required></textarea>
                    </div>
                    <button type="submit" name="add_article">Добавить</button>
                </form>
            </section>

            <section class="articles-list">
                <h2>Список статей</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Название</th>
                            <th>Предмет</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($articles as $article): ?>
                            <tr>
                                <td><?= $article['article_id'] ?></td>
                                <td><?= htmlspecialchars($article['article_name']) ?></td>
                                <td>
                                    <?php 
                                    $subjects = [
                                        1 => 'Математика',
                                        2 => 'Русский язык',
                                        3 => 'Литература',
                                        4 => 'Биология',
                                        5 => 'Физика',
                                        6 => 'Химия'
                                    ];
                                    echo $subjects[$article['article-type_id']] ?? 'Неизвестно';
                                    ?>
                                </td>
                                <td>
                                    <a href="report.php?num=<?= $article['article_id'] ?>" target="_blank">Просмотр</a>
                                    <a href="edit-article.php?id=<?= $article['article_id'] ?>">Редактировать</a>
                                    <a href="admin.php?delete=<?= $article['article_id'] ?>" onclick="return confirm('Удалить эту статью?')">Удалить</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </section>
        </div>
    </div>
</body>
</html>