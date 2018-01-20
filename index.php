<?php
require_once 'functions.php';
$errors = [];
if (isPost()) {
    if (login(getParamPost ('login'), getParamPost('password'))){
        redirect('list');
    }
        $errors[] = 'неверный логин или пароль';
}


    // if (getParamPost ('guest-name')){
    //     // redirect('list');
    //     setcookie('user_cookie', getParamPost ('guest-name'), time() + 60*15);
    //     if (!empty($_COOKIE['user_cookie'])) {
    //         echo $_COOKIE['user_cookie'];
    //     }
    // }


    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>Авторизация</h1>
<br>
<?php
foreach ($errors as $error) {
    echo "$error";
}
?>

    <form method="POST"  id="login-form">
        <div class>
            <label for="lg" class="sr-only">Логин</label>
            <input type="text" name="login" id="lg" class="form-control" placeholder="Логин">
        </div>
        <div class>
            <label for="key" class="sr-only">Пароль</label>
            <input type="text" name="password" id="key" class="form-control" placeholder="Пароль">
        </div>

        <input id="btn_login" class="btn btn-custom btn-lg btn-block" type="submit" value="Отправить" name="name">
    </form>
</br>
<p>Авторизируйтесь выше или войдите как гость:</p>
    <form method="POST"  id="guest-form" action="list.php">
        <div class>
            <label for="lg" class="sr-only">Введите имя</label>
            <input type="text" name="guest-name" id="lg" class="form-control" placeholder="Имя">
        </div>

        <input id="btn_login" class="btn btn-custom btn-lg btn-block" type="submit" value="Отправить" name="submit">
    </form>
<?php


?>
</body>
</html>
