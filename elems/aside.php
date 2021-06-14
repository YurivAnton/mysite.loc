<?php
include 'connect_db.php';

if(!empty($_SESSION['auth'])) {
    echo '<a href="../pages/users.php">Список всіх користувачів</a><br>';
}

echo '<a href="../pages/forum.php">Forum</a>';

$query = "SELECT DISTINCT(category) FROM jokes";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
for($data=[]; $row=mysqli_fetch_assoc($result); $data[]=$row);

$li = '';
foreach ($data as $category){
    $li .= '<li><a href="../pages/joke.php?category='.$category['category'].'">'.$category['category'].'</a></li>';
}
echo '<ul>
        <a href="../pages/joke.php">Анекдоти</a>'.$li.'</ul>';

echo '<ul>
        <a href="../pages/bulletin_board.php">Дошка оголошень</a>
        <li><a href="?topic=aaaaa">aaaaa</a></li>
        <li><a href="?topic=bbbbb">bbbbb</a></li>
        <li><a href="?topic=ccccc">ccccc</a></li>
    </ul>';
