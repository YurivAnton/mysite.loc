<?php
session_start();

include 'connect_db.php';

if(isset($_SESSION['message']['login'])){
    echo $_SESSION['message']['login'];
    unset($_SESSION['message']['login']);
}

if(isset($_POST['login'])){
    $login = $_POST['login'];

    $query = "
    SELECT *, statuses.name as status, user.id as id
    FROM user 
    LEFT JOIN statuses ON user.status_id=statuses.id
    WHERE login='$login'
    ";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));

    $user = mysqli_fetch_assoc($result);
    if(!empty($user)){
        $hash = $user['password'];

        if(password_verify($_POST['password'], $hash)){
            if($user['banned'] != 1) {
                $_SESSION['id'] = $user['id'];
                $_SESSION['message']['login'] = 'Ви успішно авторизувались!';
                $_SESSION['auth'] = true;
                $_SESSION['status'] = $user['status'];
                $_SESSION['login'] = $login;
                header("Location: /");
            }else{
                $_SESSION['message']['login'] = 'Вас було забанено!';
            }
        }else{
            $_SESSION['message']['login'] = 'неправильний логін або пароль';

            header("Location: /login.php");
        }
    }else{
        $_SESSION['message']['login'] = 'неправильний логін або пароль';

        header("Location: /login.php");
    }
}

?>
<form action="" method="POST">
    <input name="login">
    <input name="password" type="password">
    <input type="submit">
</form>

