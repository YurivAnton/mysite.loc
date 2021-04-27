<?php
session_start();
$host = 'localhost';
$user = 'root';
$password = '123';
$dbName = 'test1';

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

    if(isset($_GET['show_page'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM pages_old WHERE page_id='$id'";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        for($data=[]; $row=mysqli_fetch_assoc($result); $data[]=$row);

        $table = "<table border=1>
        <tr>
            <td>id</td>
            <td>url</td>
            <td>title</td>
            <td>text</td>
            <td>editing date</td>
            <td>delete page</td>
        </tr>";
        foreach($data as $page){
            $table .= "<tr>
            <td>".$page['id']."</td>
            <td>".$page['url']."</td>
            <td>".$page['title']."</td>
            <td>".$page['text']."</td>
            <td>".$page['date']."</td>
            <td><a href=\"?delete_page&id=".$page['id']."\">delete page</a></td>
            </tr>";
        }
        $table .= "</table>";
        echo $table;
    } else {

        $query = "SELECT * FROM pages";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row) ;

        $table = "<table border=1>
	<tr>
		<td>id</td>
		<td>url</td>
		<td>title</td>
		<td>text</td>
		<td>edit</td>
		<td>show edited page</td>
	</tr>";
        foreach ($data as $page) {
            $table .= "<tr>
		<td>" . $page['id'] . "</td>
		<td>" . $page['url'] . "</td>
		<td>" . $page['title'] . "</td>
		<td>" . $page['text'] . "</td>
		<td><a href=\"?edit_page&id=" . $page['id'] . "&url=" . $page['url'] . "&title=" . $page['title'] . "&text=" . $page['text'] . "\">edit</td>
		<td><a href=\"?show_page&id=" . $page['id'] . "\">show edited page</a></td>
		</tr>";
        }
        $table .= "</table>";
        echo $table;
    }
    if(isset($_GET['edit_page'])){
    ?>
    <form method="POST" action="">
        url<br>
	<input name="url" placeholder="<?php echo $_GET['url']; ?>"><br><br>
        title<br>
	<input name="title" placeholder="<?php echo $_GET['title']; ?>"><br><br>
        text<br>
    <textarea name="text" placeholder="<?php echo $_GET['text']; ?>"></textarea><br><br>
    <input type="hidden" name="date" value="<?php echo date('Y-m-d H:i:s'); ?>">
    <input type="submit" name="update" value="update">
    <input type="submit" name="log_out" value="log_out">
    </form>
    <?php
    }
    if(isset($_POST['update'])){
        //var_dump($_POST);
        $id = $_GET['id'];
        $url = $_GET['url'];
        $title = $_GET['title'];
        $text = $_GET['text'];
        $date = $_POST['date'];

        $query = "SELECT COUNT(page_id) as page_id FROM pages_old WHERE page_id='$id'";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        $count = mysqli_fetch_assoc($result);
        //var_dump($count);
        if($count['page_id'] < 5) {
            if (!empty($_POST['url'])) {
                $url = $_POST['url'];
                $query = "UPDATE pages SET url='$url' WHERE id='$id'";
                $result = mysqli_query($link, $query) or die(mysqli_error($link));
            }
            if (!empty($_POST['title'])) {
                $title = $_POST['title'];
                $query = "UPDATE pages SET title='$title' WHERE id='$id'";
                $result = mysqli_query($link, $query) or die(mysqli_error($link));
            }
            if (!empty($_POST['text'])) {
                $text = $_POST['text'];
                $query = "UPDATE pages SET text='$text' WHERE id='$id'";
                $result = mysqli_query($link, $query) or die(mysqli_error($link));
            }
            $query = "INSERT INTO pages_old 
                    SET url='$url', title='$title', text='$text', 
                        page_id='$id', date='$date'";
            $result = mysqli_query($link, $query) or die(mysqli_error($link));
            //header('Location: /');
        }
    }
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
    header('Location: /');

}

