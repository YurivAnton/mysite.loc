<?php
session_start();
include '../elems/connect_db.php';
if(!empty($_SESSION['auth'])) {
    $id = $_SESSION['id'];
    $query = "SELECT * FROM user WHERE id='$id'";
    $user = mysqli_fetch_assoc(mysqli_query($link, $query));

    $hash = $user['password'];
    if (!empty($_POST['oldPassword'])) {
        if (password_verify($_POST['oldPassword'], $hash)) {
            if ($_POST['newPassword'] === $_POST['confirmNewPassword']) {
                $newPasswordHash = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);

                $query = "UPDATE user SET password='$newPasswordHash' WHERE id='$id'";
                mysqli_query($link, $query) or die(mysqli_error($link));
            } else {
                $_SESSION['message']['newPassword'] = 'Новий пароль не відповідає підтвердженню!';
            }
        } else {
            $_SESSION['message']['oldPassword'] = 'Неправильний старий пароль!';
        }
    }
    if(isset($_SESSION['message']['newPassword'])){
        echo $_SESSION['message']['newPassword'];
        unset($_SESSION['message']['newPassword']);
    }elseif(isset($_SESSION['message']['oldPassword'])){
        echo $_SESSION['message']['oldPassword'];
        unset($_SESSION['message']['oldPassword']);
    }
}
echo '<a href="/">HOME</a>  <a href="personalArea.php">Назад</a><br>';
?>
<form action="" method="POST">
    Your old password<br>
    <input name="oldPassword" type="password"><br>
    New password<br>
    <input name="newPassword" type="password"><br>
    Confirm new password<br>
    <input name="confirmNewPassword" type="password"><br>
    <input type="submit">
</form>
