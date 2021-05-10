<?php
session_start();

//Добавляем сессию
// Задача: 5
include 'connect_db.php';
?>
<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <p>aaaaaaaaaaaaaaaaa</p>
        <?php
            if(isset($_SESSION['message'])){
                echo $_SESSION['message'].'<br>';
                unset($_SESSION['message']);
            }
            if(!empty($_SESSION['auth'])){

                echo 'Ви зайшли як '.$_SESSION['login'].' !<br>';
                $a="<a href=\"1.php\">1.php</a><br>
                    <a href=\"2.php\">2.php</a><br>
                    <a href=\"3.php\">3.php</a><br>
                ";
                echo $a;
            }


            ?>
        <p>bbbbbbbbbbbbbbbbbb</p>
        <a href="login.php">login</a>
        <a href="logout.php">logout</a>
        <a href="register.php">registration</a>
    </body>
</html>