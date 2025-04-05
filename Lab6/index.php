<?php

// session_start();
//  num 1
// if (!isset($_SESSION['session'])) {
//     $_SESSION['session'] = 'texttext';
// } else echo $_SESSION['session'];

// num 2

// if (!isset($_SESSION['counter'])) {
//     $_SESSION['counter'] = 0;
//     echo 'Страница не обновлялась';
// } else {
//     $_SESSION['counter'] = $_SESSION['counter'] + 1;
//     echo 'Вы обновили эту страницу '.$_SESSION['counter'].' раз!';
// }

// num 3

// if (!isset($_COOKIE['test'])) {
//     setcookie('test', '123');
// } else echo $_COOKIE['test'];

// num 4

// setcookie('test', '', time()); 

//  num 5
// session_start();

// $_SESSION['text'] = 'hello!';
// echo "Перейти на <a href='test.php'>test.php</a>";

// num 6

session_start();

// Обработка отправки формы
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['country'])) {
    $_SESSION['user_country'] = htmlspecialchars($_POST['country']);
    header('Location: test.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
</head>
<body>
    <?php if (!isset($_SESSION['user_country'])): ?>
        <form method="POST" action="index.php">
            <label for = 'country'>Страна</label>
            <input type = 'text' name = 'country'>
            <button type="submit">Submit</button>
        </form>
</body>
</html>
