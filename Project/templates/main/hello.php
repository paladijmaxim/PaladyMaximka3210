<?php
$uri_tek=$_SERVER['REQUEST_URI']; // тек.путь
if (strpos($uri_tek, '/hello/') !== false) { // Проверка на наличие в пути /hello/
    require dirname(__DIR__) . '/main/new_header.php';
} else {
    require dirname(__DIR__) . '/header.php';
}
?>
<h5>Hello, <?= htmlspecialchars($name); ?>!</h5>
<?php require dirname(__DIR__) . '/footer.php'; ?>