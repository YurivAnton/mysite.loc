<?php
session_start();

include 'pages/connect_db.php';

    if(isset($_SESSION['message']['login'])){
        echo $_SESSION['message']['login'].'<br>';
        unset($_SESSION['message']['login']);
    }
    if(!empty($_SESSION['auth'])){
        $content ="<a href=\"pages/users.php\">Список всіх користувачів</a><br>";
    }else{
        $content = '';
    }
include 'pages/layout.php';
