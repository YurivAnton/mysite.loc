<?php
include 'connect_db.php';

if(!empty($_SESSION['auth'])) {
    echo '<a href="../pages/users.php">Список всіх користувачів</a><br>';
}
$query = "SELECT DISTINCT(category) FROM jokes";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
for($data=[]; $row=mysqli_fetch_assoc($result); $data[]=$row);
//var_dump($data);

$li = '';
foreach ($data as $category){
    $li .= '<li><a href="../pages/joke.php?category='.$category['category'].'">'.$category['category'].'</a></li>';
}
$ul = '<ul>
    <a href="../pages/joke.php">Анекдоти</a>';
$ul .= $li.'</ul>';
echo $ul;
