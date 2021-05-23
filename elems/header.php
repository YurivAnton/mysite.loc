<?php
echo '<a href="/">HOME</a><br>';
if(!empty($_SESSION['auth'])) {
   /* if($_SERVER['REQUEST_URI'] != '/' AND $_SERVER['REQUEST_URI'] != '/pages/users.php'){
        echo '<a href="/pages/users.php">Назад</a><br>';
    }*/

    echo "Ви зайшли як " . $_SESSION['login'] . " - статус " . $_SESSION['status'] . "<br>";

    if ($_SESSION['status'] == 'admin') {
        echo "<a href=\"/admin.php\">адмінка</a><br>";
    }
}