<?php
//45.21 Показ флеш-сообщений с помощью сессий

if(isset($_SESSION['message'])){
    $status = $_SESSION['message']['status'];
    $text = $_SESSION['message']['text'];
    echo "<p class=\"$status\">$text</p>";

    unset($_SESSION['message']);
}