<?php


$json = "json";
$file_dir = './tests';  


if (is_dir("tests")) {
}else {
    mkdir("tests", 0700);
}





if (isset($_FILES['myfile']['name']) && !empty($_FILES['myfile']['name'])) {
    $file_name = $_FILES['myfile']['name'];
    $explode = explode(".", $file_name);


    if ($explode[1] !== $json) {
        echo "<script>alert(\"Можно загружать только файлы с разрешением json.\");</script>";} 
    else{ //ессли имеет формат json то:

            $file = file_get_contents($_FILES['myfile']['tmp_name']);
            $decode = json_decode($file);
            $check_keys = ['question', 'answers', 'correct_answer'];

            foreach ($decode as $arr){} 
            foreach ($check_keys as $key){}      

                if(array_key_exists($key, $arr)) {
                        
                    ($_FILES['myfile']['error'] == UPLOAD_ERR_OK && move_uploaded_file($_FILES['myfile']['tmp_name'], "$file_dir/$file_name"));
                    echo "<script>alert(\"Файл с тестами успешно загружен\");</script>";}

                else{
                echo "<script>alert(\"Не удалось загрузить файл с тестами. Структура не подходит\");</script>";}
            
            
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
        <li><a href="list.php">Список тестов</a></li>
        <li><a href="admin.php">Загрузить тест</a></li>
    </ul>
</nav>
<form enctype="multipart/form-data" action="#" method="POST">
    Тест в формате json: <input name="myfile" type="file"/>
    <br/>
    <input class="button" type="submit" value="Отправить" name="otpravit">
</form>
</body>
</html>