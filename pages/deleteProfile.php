<?php
session_start();
include '../elems/connect_db.php';
if(!empty($_SESSION['auth'])) {
    $id = $_SESSION['id'];
    $query = "SELECT * FROM user WHERE id='$id'";
    $user = mysqli_fetch_assoc(mysqli_query($link, $query));

    $hash = $user['password'];
    if (!empty($_POST['password'])) {
        if (password_verify($_POST['password'], $hash)) {
            if(isset($_GET['deleteId']) AND isset($_GET['admin'])){
                $id = $_GET['deleteId'];
                $query = "DELETE FROM user WHERE id='$id'";

            }else{
                $query = "DELETE FROM user WHERE id='$id'";
            }
            mysqli_query($link, $query) or die(mysqli_error($link));
            if(isset($_GET['admin'])){
                header('Location: /admin.php');
            } else {
                $_SESSION['auth'] = null;
                header('Location: /');
            }
        } else {
            $_SESSION['message']['password'] = 'Неправильний пароль!';
        }
    }
    if(isset($_SESSION['message']['password'])){
        echo $_SESSION['message']['password'];
        unset($_SESSION['message']['password']);
    }
}
echo '<a href="/">HOME</a>  <a href="users.php">Назад</a><br>';
?>
<form action="" method="POST">
    Enter Your password<br>
    <input name="password" type="password"><br>
    <input type="submit" value="Видалити профіль">
</form>
