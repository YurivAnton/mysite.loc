<?php
$host = 'localhost';
$user = 'root';
$password = '123';
$dbName = 'test1';

$link = mysqli_connect($host, $user, $password,$dbName);
$result = mysqli_query($link, "SET NAMES 'utf8'");