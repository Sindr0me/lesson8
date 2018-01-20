<?php
require_once 'functions.php';

    if (!empty($_POST["guest-name"])) {
        echo "Добро пожаловать, ", $_POST["guest-name"];
    } else {
            if (!isAuthorized()){
            redirect('index');}else{ echo "Добро пожаловать, ", $_SESSION['user']["username"];}
    }

$json = "json";
$files_dir = "./tests";
$files_list = scandir($files_dir);
$jsn_files = [];

for ($i = 0; $i < count($files_list); $i++){
    $explode = explode(".", $files_list[$i]);
    if ($explode[1] === $json){
        array_push($jsn_files, $files_list[$i]);
    }
}
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
        <?php
        for ($i = -1; $i < count($jsn_files); $i++) {
            echo "<li><a href='test.php?id=".$i."'>Тест №".$i."</a>  <a href=''>Удалить тест №".$i."</a></li>";
            }
            // if (is_file($filename) && is_wirtable($filename)){
            //     unlink($filename);} else {echo "не удален.";}
            
        ?>
    </ul>
</div>
</body>
</html>
