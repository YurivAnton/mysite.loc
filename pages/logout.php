<?php
session_start();

$_SESSION['auth'] = null;

$_SESSION['message']['login'] = 'Ви перестали бути авторизованним';

header("Location: /");