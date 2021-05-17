<?php
session_start();
include 'connect_db.php';
//53 Хеширование


$login = '';
$password = '';
$birth = '';
$email = '';
$_SESSION['message']['login'] = '';
$_SESSION['message']['password'] = '';
$_SESSION['message']['email'] ='';
$_SESSION['message']['birth'] = '';

if(!empty($_POST['login']) AND !empty($_POST['password'])
    AND !empty($_POST['country']) AND !empty($_POST['birth'])
    AND !empty($_POST['email'])){
    $login = $_POST['login'];
    $password = $_POST['password'];
    $birth = $_POST['birth'];
    $email = $_POST['email'];
    $registration_date = date('Y-m-d');
    $country = $_POST['country'];

    $login_confirm = preg_replace('#\w+#', '', $login);
    $login_length = strlen($login);
    $password_length = strlen($password);
    $email_confirm = preg_match('#^[a-z0-9_.-]+@[a-z_.-]+\.[a-z]{2,}$#', $email);
    $birth_confirm = preg_match('#\d{4}-\d{2}-\d{2}#', $birth);

    if($login_length<4){
        $_SESSION['message']['login'] = 'Логін занадто короткий<br>';
    }elseif($login_length>10){
        $_SESSION['message']['login'] = 'Логін занадто довгий<br>';
    }elseif($_POST['password'] != $_POST['confirm'] OR empty($_POST['confirm'])){
        $_SESSION['message']['password'] = 'Пароль на співпадає з підтвердженням<br>';
    }elseif(!empty($login_confirm)) {
        $_SESSION['message']['login'] = 'Ви ввели недопустимий логін, виберіть інший!<br>';
    }elseif($password_length<6 OR $password_length>12){
        $_SESSION['message']['password'] = 'Ви ввели задовгий або закороткий пароль!<br>';
    }elseif($email_confirm == 0){
        $_SESSION['message']['email'] = 'Не коректний email!<br>';
    }elseif($birth_confirm == 0){
        $_SESSION['message']['birth'] = 'Не коректна дата!<br>';
    }else{
        $query = "SELECT * FROM user WHERE login='$login'";
        $user = mysqli_fetch_assoc(mysqli_query($link, $query));

        if (empty($user)) {
		$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $query = "INSERT INTO user 
                        SET login='$login', password='$password',
                        birth='$birth', email='$email', country='$country', 
                        registration_date='$registration_date'
                        ";
            mysqli_query($link, $query) or die(mysqli_error($link));

            //$_SESSION['auth'] = true;
            header('Location: /');
            $id = mysqli_insert_id($link);
            $_SESSION['id'] = $id;
        } else {
            $_SESSION['message']['login'] = 'такий логін вже існує!<br>';
        }
    }
}
?>
<form action="" method="POST">
    <?= $_SESSION['message']['login'] ?>
    login<br>
    <input name="login" type="text" value="<?= $login ?>"><br>
    <?= $_SESSION['message']['password'] ?>
    password<br>
    <input name="password" type="password" value="<?= $password ?>"><br>
    confirm<br>
    <input name="confirm" type="password"><br>
    <?= $_SESSION['message']['birth'] ?>
    date of birth<br>
    <input name="birth" type="text" placeholder="yyyy-mm-dd" value="<?= $birth ?>"><br>
    <?= $_SESSION['message']['email'] ?>
    email<br>
    <input name="email" type="text" value="<?= $email ?>"><br>
    <select name="country">
        <option>ukrajina</option>
        <option>Білорусія</option>
        <option>Словаччина</option>
    </select><br>
    <input name="submit" type="submit">
</form>
<?php

