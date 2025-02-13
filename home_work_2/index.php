<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class = 'header__contanier'>
            <img class  = 'header__logo' src = 'logo.png' alt = 'Логтоип МосПолитеха'>
            <h1 class = 'header__text'>Паладий Максим 241-3210</h1>   
        </div> 
    </header> 
    <main>
        <section class = 'section_form'>
            <div class="contanier_form">
                <h1 class = 'section_form--title'>Регистрация</h1>
                <form action="https://httpbin.org/post"  method="post" class="foorm">
                    <fieldset class = 'border_form'>
                        <p><label>Имя пользовтаеля<input class = 'input-style' name = 'name' type="text" placeholder="Иван" id = 'name'></label></p>
                        <p><label>Дата рождения <input class = 'input-style' name = 'date' type = 'date' id = 'date'></label></p>
                        <p><label>Пароль <input class = 'input-style' name = 'password' type = 'password' placeholder="Введите пароль" id = 'password'></label></p>  
                        <p><label>Телефон <input class = 'input-style' name = 'tel' type = 'tel' placeholder="+7-ХХХ-ХХХ-ХХ-ХХ" id = 'tel'></label></p>
                        <p><label>Email <input class = 'input-style' name = 'email' type = 'email' placeholder="ivanivanov@yandex.ru" id = 'email'></label></p>
                        <p><label>Тип обращения <select class = 'select_interval' name = 'interval'></p>
                            <option value="1" selected>жалоба</option>
                            <option value="2">предложение</option>
                            <option value="3">блаагодарность</option>
                        </select></label></p>
                        <p><label>Текст обращения <input class = 'input-style' name = 'text' type = 'text' placeholder="Введите текст обращения" id = 'text'></label></p>
                    </fieldset>
                        <button  class = 'button' type="submit">
                            Отправить
                        </button>
                    <a class = 'button' href = 'res.php'>следующая страница</a>
                </form>
            </div>
        </section>
    </main>
    <footer>
        <p class = 'footer__text'>Собрать сайт из двух страниц. 1 страница: Сверстать форму обратной связи. Отправку формы осуществить на URL: https://httpbin.org/post. Добавить кнопку для перехода на 2 страницу.
        2 страница: вывести на страницу результат работы функции get_headers. Загрузить код в удаленный репозиторий. Залить на хостинг.</p>
    </footer>
</body>