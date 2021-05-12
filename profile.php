<?php
session_start();
include 'connect_db.php';

$id = 38;
$query = "
SELECT login, birth, country
FROM user 
WHERE id='$id'";

$result = mysqli_query($link, $query) or die(mysqli_error($link));
$user = mysqli_fetch_assoc($result);

echo 'Ваш логін - '. $user['login'].'<br>';
echo 'Вам - '.(date('Y-m-d')-$user['birth']).'<br>';
echo 'Ваша країна - '.$user['country'];
