<?php
session_start();
include '../elems/connect_db.php';

if(!empty($_SESSION['auth'])){
	$id = $_SESSION['id'];
	$query = "SELECT birth, email, country FROM user WHERE id='$id'";
	$user = mysqli_fetch_assoc(mysqli_query($link, $query));
    //echo '<a href="/">HOME</a>  <a href="users.php">Назад</a><br>';

$content = "<form action=\"\" method=\"POST\">
                <input name=\"newBirth\" value=\"".$user['birth']."\"><br>
                <input name=\"newEmail\" value=\"".$user['email']."\"><br>
                <input name=\"newCountry\" value=\"".$user['country']."\"><br>
                <input type=\"submit\">
            </form>";

    if(isset($_POST['newBirth']) AND isset($_POST['newEmail']) AND isset($_POST['newCountry'])){
        $newBirth = $_POST['newBirth'];
        $newEmail = $_POST['newEmail'];
        $newCountry = $_POST['newCountry'];

        $query = "UPDATE user SET birth='$newBirth', email='$newEmail', country='$newCountry' WHERE id='$id'";
        mysqli_query($link, $query) or die(mysqli_error($link));
    }
    $content .= '<a href="changePassword.php">ЗМІНИТИ ПАРОЛЬ</a><br>';
    $content .= '<a href="changeLogin.php">ЗМІНИТИ ЛОГІН</a>';
}else{
    echo 'Ви не авторизувались!!!!<br>';
    echo '<a href="/">HOME</a>';
}

include '../elems/layout.php';