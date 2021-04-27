<?php
session_start();
$host = 'localhost';
$user = 'base_user';
$password = '123';
$dbName = 'test';

$link = mysqli_connect($host, $user, $password,$dbName);
$result = mysqli_query($link, "SET NAMES 'utf8'");

// 36. Страницы на сайте. Каждая страница может быть поредактирована в админке при этом старая версия не удаляется, а хранится как 'предыдущая версия'. При необходимости страницу можно откатить к предыдущей версии. Нужно хранить не более 5-ти предыдущих версий каждой страницы (то есть 6-тую уже не храним).

if(!empty($_POST['mail']) AND !empty($_POST['password'])) {
    $mail = $_POST['mail'];
    $password = $_POST['password'];
    $query = "
    SELECT * 
    FROM users
    WHERE mail='$mail' AND password='$password'";

    $result = mysqli_query($link, $query) or die(mysqli_error($link));

    $user = mysqli_fetch_assoc($result);

    if($user) {
	    $_SESSION['user_id'] = $user['id'];
	}
}
if(isset($_SESSION['user_id'])) {
	echo $_SESSION['user_id'];
    ?>
    <form method="POST" action="">
	<input name="url"><br><br>
	<input name="title"><br><br>
        <textarea name="text"></textarea><br><br>
        <input type="submit">
        <input type="submit" name="log_out" value="log_out">
    </form>
    <?php
} else {
    ?>
    <form method="POST" action="">
        mail<br>
        <input name="mail"><br>
        password<br>
        <input name="password" type="password"><br>
        <input name="log_in" type="submit" value="log_in">
        <input type="submit" name="log_out" value="log_out">
    </form>
    <?php
}
if(isset($_POST['log_out'])){
    session_destroy();
   // header('Location: /');

}
$query = "SELECT * FROM pages";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
for($data=[]; $row=mysqli_fetch_assoc($result); $data[]=$row);
//var_dump($pages);
$table = "<table border=1>
	<tr>
		<td>id</td>
		<td>url</td>
		<td>title</td>
		<td>text</td>
		<td>edit</td>
	</tr>";
foreach($data as $page){
	$table .= "<tr>
		<td>".$page['id']."</td>
		<td>".$page['url']."</td>
		<td>".$page['title']."</td>
		<td>".$page['text']."</td>
		<td><a href=\"\">edit</td>
		</tr>";
}
$table .= "</table>";
echo $table;
