<?php
require_once 'functions.php';

    if (!empty($_POST["guest-name"])) {
        echo "Добро пожаловать, ", $_POST["guest-name"];
    } else {
            if (!isAuthorized()){
            redirect('index');}else{ echo "Добро пожаловать, ", $_SESSION['user']["username"];}
    }

$validFileExtension = "json";
$filesDir = "./tests";

if (!empty($_GET['delete'])){
    $wayToFile = $filesDir.'/'.$_GET['delete'];

    if (file_exists($wayToFile)){
        unlink($wayToFile);
    }
}

$filesList = is_dir($filesDir) ? scandir($filesDir) : array();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<nav>
    <ul>
        <li><a href="admin.php">Загрузить тест</a></li>
    </ul>
</nav>
<div class="list">
    <ul>

        <?php if (empty($_POST["guest-name"])){
        foreach ($filesList as $fileName):?>
            <?php if( pathinfo($filesDir.'/'.$fileName, PATHINFO_EXTENSION) == $validFileExtension):?>
                <li><a href='test.php?id=<?=$fileName?>'><?=$fileName?></a><a href='<?=$_SERVER['SCRIPT_NAME']?>?delete=<?=$fileName?>'>Удалить <?=$fileName?></a></li>
        <?php endif;
        endforeach;
        }

        else { ?>
        <?php foreach ($filesList as $fileName):?>
        <?php if( pathinfo($filesDir.'/'.$fileName, PATHINFO_EXTENSION) == $validFileExtension):?>
        <li><a href='test.php?id=<?=$fileName?>'>
        <?=$fileName?></a></li>  
        <?php endif;
        endforeach;
        }?>
    

    </ul>
</div>
</body>
</html>
