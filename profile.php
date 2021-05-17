<?php
session_start();
include 'connect_db.php';

$id = $_GET['id'];
$query = "
SELECT login, birth, country
FROM user 
WHERE id='$id'";


$result = mysqli_query($link, $query) or die(mysqli_error($link));
$user = mysqli_fetch_assoc($result);

$age = strtotime(date('Y-m-d'))-strtotime($user['birth']);
$age = floor($age / 3600 / 24 / 365);

echo '<a href="/">HOME</a>  <a href="users.php">Назад</a><br>';
echo 'Ваш логін - '. $user['login'].'<br>';
echo 'Вам - '.$age.'<br>';
echo 'Ваша країна - '.$user['country'];
