<?php
//45.21 Показ флеш-сообщений с помощью сессий
error_reporting(E_ALL);
ini_set('display_errors', 'on');

session_start();

$host = 'localhost';
$user = 'root';
$password = '123';
$dbName = 'test';

$link = mysqli_connect($host, $user, $password, $dbName);
$result = mysqli_query($link, "SET NAMES 'utf8'");