<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>PaladyMaxim_home-work_1</title>
</head>
<body> 
    <header>
        <div class = 'header__contanier'>
            <img class  = 'header__logo' src = 'images/logo.png' alt = 'Логтоип МосПолитеха'>
            <h1 class = 'header__text'>Hello, world!</h1>   
        </div> 
    </header> 
    <main>
        <p class = 'main__text'> Ваше счастливое число: 
            <?php
            $numb = rand(1, 100);
            echo $numb?>
        </p>
        <?php
            $img = ["images/photo12.jpg", "images/photo13.jpg", "images/photo14.jpg", "images/photo15.jpg", "images/photo16.jpg"];
            $rand_img = $img[array_rand($img)];
            echo "<img class = 'main__img' src='$rand_img'width='250'>";
        ?>
    </main>
    <footer>
        <p class = 'footer__text'>Создать веб-страницу с динамическим контентом. Загрузить код в удаленный репозиторий.</p>
    </footer>
</body>
</html>