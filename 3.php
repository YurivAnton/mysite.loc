<?php
session_start();

//Добавляем сессию
// Задача: 3
if(!empty($_SESSION['auth'])){
    echo 'Ви зайшли як '.$_SESSION['login'].' !<br>';
    $a="<a href=\"1.php\">1.php</a><br>
        <a href=\"2.php\">2.php</a><br>
        <a href=\"/\">HOME</a><br>
    ";
    echo $a;
}