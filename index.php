<?php
session_start();
$host = 'localhost';
$user = 'base_user';
$password = '123';
$dbName = 'test';

$link = mysqli_connect($host, $user, $password,$dbName);
$result = mysqli_query($link, "SET NAMES 'utf8'");
/*
for($i=0; $i<=50; $i++)
{
	$query = "
	INSERT INTO pages
	SET url='$i', title='$i', text='$i'";
	$result = mysqli_query($link, $query) or die(mysqli_error($link));
}
phpinfo();
 */
$query = "SELECT * FROM pages";
$result = mysqli_query($link, $query) or die(mysqli_error($link));

for($data=[]; $row=mysqli_fetch_assoc($result); $data[]=$row);

for($i=0; $i<count($data); $i+=20){
	$arr = array_slice($data, $i, 20);
	var_dump($arr);
	echo '<br><br>';
}
//$arr1 = array_splice($data, 0, 5);
//var_dump($arr1);
//var_dump($data);
//aassss
