<!-- 26 -->

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php
    if (isset($_GET['number'])) {
        $number = $_GET['number'];
        echo 'Введено число: '. $_GET['number'];
    }else {
        $number = NULL;
    }
    ?>
    <a href = 'index.php?number=20'>link</a>
    <form action = 'index.php' method=GET>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Число</label>
            <input class="form-control" id="exampleInputEmail1" value = "<?=$number;?>" name="number">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>
</html> -->

<!-- 27 -->

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
    if (isset($_GET['number'])) {
        $number = $_GET['number'];
        if ($number == 1) {
            echo 'Привет';
        } elseif ($number == 2) {
            echo 'Пока';
        }
    }
    ?>
    <a href = 'index.php?number=1'>link</a>
    <form action = 'index.php' method=GET>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Число</label>
            <input type = 'number' class="form-control" id="exampleInputEmail1" value = "<?=$number;?>" name="number">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>
</html> -->

<!-- 28 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
    if (isset($_GET['number1']) && isset($_GET['number2'])) {
        $number1 = $_GET['number1'];
        $number2 = $_GET['number2'];
        $sum = $number1 + $number2;
        echo $sum;
    }
    ?>
    <form action = 'index.php' method=GET>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Число 1</label>
            <input type = 'number' class="form-control" id="exampleInputEmail1" value = "<?=$number1;?>" name="number1">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Число 2</label>
            <input type = 'number' class="form-control" id="exampleInputEmail1" value = "<?=$number;?>" name="number2">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>
</html>