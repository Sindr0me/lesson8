<?php

$test_dir = "./tests/test";
$test_id = $test_dir.$_GET["id"].".json";
$json_file = file_get_contents($test_id);
$json_array = json_decode($json_file, true);
$i = 0;
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

<?php
// echo "<pre>";
// var_dump($json_array);
?>

<form action="" method="POST">
    <?php
    echo "<pre>";
    $i = 0;
    foreach ($json_array as $questions) {
        echo "<fieldset><legend>".$questions["question"]."</legend>";
        foreach ($questions["answers"] as $answer) {
            echo "<label><input  value='".$answer."' type='radio' name='$i' required>".$answer."</label>";
        }
        echo "</fieldset>";
        $i++;
    }
    ?>
    <input class="button" type="submit" name="my_button" value="Отправить">
</form>

<?php

if(isset($_POST['my_button'])){
    $count_q = 0;
    $true = 0;
    $nottrue = 0;
    foreach ($json_array as $questions) {
        if ($_POST[$count_q] == $questions["correct_answer"]){
            $true++;
            echo "Правильный ответ: " .$questions['correct_answer']. "<br>";
        }

        if ($_POST[$count_q] !== $questions["correct_answer"]){
            $nottrue++;
            echo "Правильный ответ: " .$questions['correct_answer']. "<br>";
        }


        $count_q++;
    }
    echo "<br>";
    echo "Вы выбрали ".$true." правильных ответов из ".$count_q;
}
?>
</body>
</html>