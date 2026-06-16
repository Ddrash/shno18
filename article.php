<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <link href="css/article.css" rel="stylesheet">
    <title>МБОУ СОШ № 18</title>
</head>
<body>

<?php
    require_once('conn.php');
?>

<header>
    <div class="logo">
        <img src="img/header-logo.png"> 
        <a>ШНО <br>МБОУ СОШ № 18</a> 
    </div>
    <nav class="menu">
        <a href="index.php">О НАС</a>
        <a>СТАТЬИ</a>
        <a href="index.php#contacts">КОНТАКТЫ</a>
    </nav>
</header>

<div class="items">
    <div class="item">
        <img src="img/maths.png">
        <a href="#maths">Математика</a>
    </div>
    <div class="item">
        <img src="img/russ.png">
        <a href="#russ">Русский язык</a>
    </div>
    <div class="item">
        <img src="img/litters.png">
        <a href="#litters">Литература</a>
    </div>
    <div class="item">
        <img src="img/biology.png">
        <a href="#biology">Биология</a>
    </div>
    <div class="item">
        <img src="img/physics.png">
        <a href="#physics">Физика</a>
    </div>
    <div class="item">
        <img src="img/chemisty.png">
        <a href="#chemisty">Химия</a>
    </div> 
</div>

<!-- МАТЕМАТИКА -->
<div class="about-section">
    <a id="maths">МАТЕМАТИКА</a>
</div>
<div class="themes">
    <div class="theme">
        <?php
            $query = "SELECT * FROM articles where `article-type_id` = 1";
            $result = $mysqli->query($query);
            while ($row = $result->fetch_assoc()) {
        ?>
        <span>►</span><a href="report.php?num=<?php echo $row['article_id']; ?>">
            <?php echo $row['article_name']; ?></a><br>
        <?php
            }
        ?>    
    </div>
</div>

<!-- РУССКИЙ ЯЗЫК -->
<div class="about-section">
    <a id="russ">РУССКИЙ ЯЗЫК</a>
</div>
<div class="themes">
    <div class="theme">
        <?php
            $query = "SELECT * FROM articles where `article-type_id` = 2";
            $result = $mysqli->query($query);
            while ($row = $result->fetch_assoc()) {
        ?>
        <span>►</span><a href="report.php?num=<?php echo $row['article_id']; ?>"><?php echo $row['article_name']; ?></a><br>
        <?php
            }
        ?> 
    </div>
</div>

<!-- ЛИТЕРАТУРА -->
<div class="about-section">
    <a id="litters">ЛИТЕРАТУРА</a>
</div>
<div class="themes">
    <div class="theme">
        <?php
            $query = "SELECT * FROM articles where `article-type_id` = 3";
            $result = $mysqli->query($query);
            while ($row = $result->fetch_assoc()) {
        ?>
        <span>►</span><a href="report.php?num=<?php echo $row['article_id']; ?>"><?php echo $row['article_name']; ?></a><br>
        <?php
            }
        ?> 
    </div>
</div>

<!-- БИОЛОГИЯ -->
<div class="about-section">
    <a id="biology">БИОЛОГИЯ</a>
</div>
<div class="themes">
    <div class="theme">
        <?php
            $query = "SELECT * FROM articles where `article-type_id` = 4";
            $result = $mysqli->query($query);
            while ($row = $result->fetch_assoc()) {
        ?>
        <span>►</span><a href="report.php?num=<?php echo $row['article_id']; ?>"><?php echo $row['article_name']; ?></a><br>
        <?php
            }
        ?> 
    </div>
</div>

<!-- ФИЗИКА -->
<div class="about-section">
    <a id="physics">ФИЗИКА</a>
</div>
<div class="themes">
    <div class="theme">
        <?php
            $query = "SELECT * FROM articles where `article-type_id` = 5";
            $result = $mysqli->query($query);
            while ($row = $result->fetch_assoc()) {
        ?>
        <span>►</span><a href="report.php?num=<?php echo $row['article_id']; ?>"><?php echo $row['article_name']; ?></a><br>
        <?php
            }
        ?> 
    </div>
</div>

<!-- ХИМИЯ -->
<div class="about-section">
    <a id="chemisty">ХИМИЯ</a>
</div>
<div class="themes">
    <div class="theme">
        <?php
            $query = "SELECT * FROM articles where `article-type_id` = 6";
            $result = $mysqli->query($query);
            while ($row = $result->fetch_assoc()) {
        ?>
        <span>►</span><a href="report.php?num=<?php echo $row['article_id']; ?>"><?php echo $row['article_name']; ?></a><br>
        <?php
            }
        ?> 
    </div>
</div>

<br><br><br><br>

<footer id="contacts">
    <div class="snoska">
        <img src="img/footer-logo.png">
        <p>МБОУ СОШ №18 ©2026</p>
    </div>
    <div class="network">
        <div class="network-info">
            <img src="img/vk.png">
            <a href="https://vk.com/rdhnasvyazi">rdhnasvyazi</a>
        </div>
        <div class="network-info">
            <img src="img/pochta.png">
            <a>tecnic18@mail.ru</a>
        </div>
        <div class="network-info">
            <img src="img/karta.png">
            <a href="https://2gis.ru/kansk/geo/70030076219664887">п.Индустриальный, д.1</a>
        </div>
    </div>
    <button id="topBtn" title="Наверх">
        <img src="img/top.png">
    </button>
</footer>

<script>
    // кнопка снизу вверх
    let mybutton = document.getElementById("topBtn");
    mybutton.onclick = function() {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    };
</script>

</body>
</html>