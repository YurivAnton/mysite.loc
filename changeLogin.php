<?php
session_start();
include 'connect_db.php';
if(!empty($_SESSION['auth'])) {
    $id = $_SESSION['id'];
    $query = "SELECT * FROM user WHERE id='$id'";
    $user = mysqli_fetch_assoc(mysqli_query($link, $query));

    $hash = $user['password'];
    if (!empty($_POST['password'])) {
        if (password_verify($_POST['password'], $hash)) {
            $newLogin = $_POST['newLogin'];

            $query = "UPDATE user SET login='$newLogin' WHERE id='$id'";
            mysqli_query($link, $query) or die(mysqli_error($link));

        } else {
            $_SESSION['message']['password'] = 'Неправильний пароль!';
        }
    }
    if(isset($_SESSION['message']['password'])){
        echo $_SESSION['message']['password'];
        unset($_SESSION['message']['password']);
    }
}
echo '<a href="/">HOME</a>  <a href="personalArea.php">Назад</a><br>';
?>
<form action="" method="POST">
    Your old login<br>
    <input name="oldLogin" value="<?= $user['login']?>"><br>
    New login<br>
    <input name="newLogin"><br>
    Your password<br>
    <input name="password" type="password"><br>
    <input type="submit">
</form>
