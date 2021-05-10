<?php
session_start();
include 'connect_db.php';
//Регистрация
// Задача: 1-7



if(!empty($_POST['login']) AND !empty($_POST['password'])
    AND !empty($_POST['confirm']) AND !empty($_POST['birth'])
    AND !empty($_POST['email'])){
    $login = $_POST['login'];
    $password = $_POST['password'];
    $birth = $_POST['birth'];
    $email = $_POST['email'];
    $registration_date = date('Y-m_d');

    if($_POST['password'] == $_POST['confirm']) {
        $query = "SELECT * FROM user WHERE login='$login'";
        $user = mysqli_fetch_assoc(mysqli_query($link, $query));

        if(empty($user)) {
            $query = "INSERT INTO user 
                        SET login='$login', password='$password',
                        birth='$birth', email='$email', 
                        registration_date='$registration_date'";
            mysqli_query($link, $query) or die(mysqli_error($link));

            $_SESSION['auth'] = true;

            $id = mysqli_insert_id($link);
            $_SESSION['id'] = $id;
        }else{
            $_SESSION['message'] = 'такий логін вже існує!';
        }
    }else{
        $_SESSION['message'] = 'пароль на зпівпадає з підтвердженням';
    }

    if(isset($_SESSION['message'])){
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}
?>
<form action="" method="POST">
    login<br>
    <input name="login" type="text"><br>
    password<br>
    <input name="password" type="password"><br>
    confirm<br>
    <input name="confirm" type="password"><br>
    date of birth<br>
    <input name="birth" type="text" placeholder="yyyy-mm-dd"><br>
    email<br>
    <input name="email" type="text"><br>
    <input name="submit" type="submit">
</form>
