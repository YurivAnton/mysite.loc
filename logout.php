<?php
session_start();

//Добавляем сессию
// Задача: 5

$_SESSION['auth'] = null;

$_SESSION['message'] = 'Ви перестали бути авторизованним';

header("Location: /");