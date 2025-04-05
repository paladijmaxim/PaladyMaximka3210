<?php

session_start();
// for num 5
// if (isset($_SESSION['text'])) {
//     echo "Текст страинцы index.php: " . $_SESSION['text'];
// } 

// for num 6

if (!isset($_SESSION['user_country'])) {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ваша страна</title>
</head>
<body>
    <h2>Информация о вашей стране</h2>
    <p>Вы указали страну: <strong><?= $_SESSION['user_country'] ?></strong></p>
    <p><a href="index.php">Вернуться на главную</a></p>
</body>
</html>