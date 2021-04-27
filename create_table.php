<?php
$host = 'localhost';
$user = 'base_user';
$password = '123';
$dbName = 'test';

$link = mysqli_connect($host, $user, $password,$dbName);
$result = mysqli_query($link, "SET NAMES utf8");
/* 
$query = "CREATE TABLE users( 
	id INT NOT NULL AUTO_INCREMENT, 
	mail VARCHAR(100) NULL, 
	password VARCHAR(100) NULL,
	status INT NULL, 
	PRIMARY KEY (id))";
*/
/*
$query = "CREATE TABLE pages(
	id INT NOT NULL AUTO_INCREMENT,
	url VARCHAR(100) NULL,
	title VARCHAR(100) NULL,
	text TEXT NULL,
	PRIMARY KEY (id))";
 */
/*
$query = "
INSERT INTO users
SET mail ='asd', password='qwe', status=1";
*/

//$query = "SELECT * FROM users";
$result = mysqli_query($link, $query);
//$a = mysqli_fetch_assoc($result);
//var_dump($a);

echo 'yes';
