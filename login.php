<?php
session_start();
//Добавляем сессию
// Задача: 5

include 'connect_db.php';

if(isset($_SESSION['message'])){
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}

if(isset($_POST['login']) AND isset($_POST['password'])){
    $login = $_POST['login'];
    $password = $_POST['password'];

    $query = "
    SELECT * FROM user WHERE login='$login' AND password='$password'
    ";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));

    $user = mysqli_fetch_assoc($result);
    if(!empty($user)){
        $_SESSION['message'] = 'ви пройшли!';
        $_SESSION['auth'] = true;
        $_SESSION['login'] = $login;
        header("Location: /");
    }else{
        $_SESSION['message'] = 'неправильний логін або пароль';

        //header("Location: /login.php");
    }

}

?>
<form action="" method="POST">
    <input name="login">
    <input name="password" type="password">
    <input type="submit">
</form>

