<?php
session_start();
include 'connect_db.php';

// 37. На сайте есть общая рассылка на email. Рассылка делается
// автоматически после каждого добавления новой статьи на сайт. Но есть
// проблема: на хостингах бывает ограничение на время выполнение скрипта.
// Поэтому необходимо рассылать не по всей базе пользователей, а порциями,
// например, по 20 штук, и кроном запускать скрипт рассылки каждые N минут.
// Как это реализовать?

$query = "SELECT * FROM pages";
$result = mysqli_query($link, $query) or die(mysqli_error($link));

for($data=[]; $row=mysqli_fetch_assoc($result); $data[]=$row);

var_dump($data);

$to = '';
$subject = 'Registration on website mysite.loc';
$message = "<html>
                        <body>
                        complete the registration on the site mysite.loc, please follow the link 
                        <a href='mysite.loc?userMail=''&id='''>www.mysite.loc?userMail=''&id=''</a>
                        </body>
                        </html>";
$headers = 'From: mysite.loc' . "\r\n";
$headers .= 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
//mail($to, $subject, $message, $headers);