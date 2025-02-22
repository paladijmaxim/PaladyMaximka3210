<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
    <?php
            if (isset($_GET['name']) || isset($_GET['age'])) {
                $name = $_GET['name'];
                $age = $_GET['age'];

            }else {
                $name = NULL;
                $age = NULL;
            }

            if(!empty($_POST)) {
                echo 'Hello! I am '. $_POST['name'].', age - '. $_POST['age'];
            }
        ?>
        <a href = 'index.php?name=Maxim&age=18'>link</a>
        <div>
            <form action = 'index.php' method=POST>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">NAme</label>
                    <input class="form-control" id="exampleInputEmail1" value = "<?=$name;?>" name="name">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Age</label>
                    <input  class="form-control" id="exampleInputPassword1" value = "<?=$age;?>" name='age'>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>  
    </main>
</body>
</html>