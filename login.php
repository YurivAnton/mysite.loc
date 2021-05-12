<?php
session_start();
//53 Хеширование

include 'connect_db.php';

if(isset($_SESSION['message'])){
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}

if(isset($_POST['login'])){
    $login = $_POST['login'];

    $query = "
    SELECT * FROM user WHERE login='$login'
    ";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));

    $user = mysqli_fetch_assoc($result);
    if(!empty($user)){
        $hash = $user['password'];

        if(password_verify($_POST['password'], $hash)){
            $_SESSION['message'] = 'ви пройшли!';
            $_SESSION['auth'] = true;
            $_SESSION['login'] = $login;
            header("Location: /");
        }else{
            $_SESSION['message'] = 'неправильний логін або пароль';

            header("Location: /login.php");

        }
    }

}

?>
<form action="" method="POST">
    <input name="login">
    <input name="password" type="password">
    <input type="submit">
</form>

