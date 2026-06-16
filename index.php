<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/index.css" rel="stylesheet">
    <title>МБОУ СОШ № 18</title>
</head>
<body> 
    <header>
        <div class="logo">
            <img src="img/header-logo.png"> 
            <a>ШНО <br>МБОУ СОШ № 18</a> 
        </div>
        <nav class="menu">
            <a href="#about">О НАС</a>
            <a href="article.php">СТАТЬИ</a>
            <a href="#contacts">КОНТАКТЫ</a>
            <a href="login.php">
                <img src="img/settings.png">
            </a>
        </nav>
    </header>

    <div class="slider-container">
        <div class="slider">
          <img src="img/banner1.png">
          <img src="img/banner2.jpg">
          <img src="img/banner4.jpg">
          <img src="img/banner5.jpg">
        </div>
        <button class="prev-button">&lt;</button>
        <button class="next-button">&gt</button>
    </div>

    <!---------------------ЗАГОЛОВОК------------------------->
    <div class="about-section">
        <a id="about">НЕМНОГО</a>
            <span>О НАС</span>
    </div>
    <!------------------------------------------------------->
    <div class="us">
        <div class="teacher">
            <img src="img/teacher.png">
            <p>42</p> 
            <span>педагога</span>
        </div>
        <div class="student">
            <img src="img/student.png">
            <p>495</p>
            <span>обучающихся</span>
        </div>
        <div class="article">
            <img src="img/article.png">
            <p>713</p>
            <span>статей</span> 
        </div>
    </div>
    <!---------------------ЗАГОЛОВОК------------------------->
    <div class="about-section">
        <a>ИЗУЧАЕМЫЕ</a><span>ПРЕДМЕТЫ</span>
    </div>
    <!------------------------------------------------------->
    <div class="item">
        <div class="card">
            <img src="img/maths.png">
                <div class="text">
                    <span>Математика</span>
                </div>
        </div>
        <div class="card">
            <img src="img/russ.png"> 
                <div class="text">
                    <span>Русский язык</span>
                </div>
        </div>
        <div class="card">
            <img src="img/litters.png">
                <div class="text">
                    <span>Литература</span>
                </div>
        </div>
        <div class="card">
            <img src="img/biology.png">
                <div class="text">
                    <span>Биология</span>
                </div>
        </div>
        <div class="card">
            <img src="img/physics.png">
                <div class="text">
                    <span>Физика</span>
                </div>
        </div>
           <div class="card">
            <img src="img/chemisty.png">
                <div class="text">
                    <span>Химия</span>
                </div>
        </div>
    </div>
    <!---------------------ЗАГОЛОВОК------------------------->
    <div class="about-section">
        <a id="contacts">НАШИ</a><span>КОНТАКТЫ</span>
    </div>
    <!------------------------------------------------------->
    <div class="contacts">
        <div class="info">
            <div class="adres">
                <span>Адрес</span>
                <p>Переулок Индустриальный, д.1
                    <br>
                    Режим работы 8.00-18.00 / пн-пт
                </p>
            </div>
            <div class="tel">
                <span>Телефон</span>
            <p>3-21-81</p>
            </div>
            <div class="pochta">
                <span>Почта</span>
                <p>tecnic18@mail.ru</p>
            </div>
        </div>
        <div class="school">
            <img src="img/school.png">
        </div>
    </div>

    <footer>
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
            <script>

                //---------------------слайдер---------------------//
                const slider = document.querySelector('.slider');
                const prevButton = document.querySelector('.prev-button');
                const nextButton = document.querySelector('.next-button');
                const slides = Array.from(slider.querySelectorAll('img'));
                const slideCount = slides.length;
                let slideIndex = 0;
                
                prevButton.addEventListener('click', showPreviousSlide);
                nextButton.addEventListener('click', showNextSlide);
                function showPreviousSlide() {
                    slideIndex = (slideIndex - 1 + slideCount) % slideCount;
                    updateSlider();
                }
                function showNextSlide() {
                    slideIndex = (slideIndex + 1) % slideCount;
                    updateSlider();
                }
                function updateSlider() {
                  slides.forEach((slide, index) => {
                    if (index === slideIndex) {
                      slide.style.display = 'block';
                    } else {
                      slide.style.display = 'none';
                    }
                  });
                }
                updateSlider();
                
                //---------------------кнопка снизу вверх---------------------//
                    let mybutton = document.getElementById("topBtn");
                        mybutton.onclick = function() {
                        window.scrollTo({
                        top: 0,
                        behavior: "smooth"
                            });
                        };
            </script>
    </footer>
</body>
</html>