<?php
session_start();

// пагинация

include '../elems/connect_db.php';

if(!empty($_POST['joke'])){
    $joke = $_POST['joke'];
    $category = $_POST['category'];
    $user_id = $_SESSION['id'];
    $date = $_POST['date'];
    $query = "INSERT INTO jokes 
            SET joke='$joke', user_id='$user_id', date='$date', 
            category='$category', status=0";
    mysqli_query($link, $query) or die(mysqli_error($link));
}

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$notesOnPage = 3;
$from = ($page - 1) * $notesOnPage;

if (isset($_GET['category'])) {
    $category = $_GET['category'];
    $where = "WHERE category='$category'";
    $partPath = "&category=$category";
} else {
    $where = '';
    $partPath = '';
}

$query = "SELECT *, user.login as user_name
            FROM jokes
            LEFT JOIN user ON user.id=jokes.user_id
            $where
            ORDER BY date DESC
            LIMIT $from,$notesOnPage";

$result = mysqli_query($link, $query) or die(mysqli_error($link));

for($data=[]; $row=mysqli_fetch_assoc($result); $data[]=$row);
$content = '';

foreach($data as $joke){
    if($joke['status']){
        $content .= '<h4>'.$joke['user_name'].' '.$joke['date'].'</h4>';
        $content .= '<p>'.$joke['category'].'<br>'.$joke['joke'].'</p>';
    }
}

$query = "SELECT COUNT(*) AS count FROM jokes $where";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
$count = mysqli_fetch_assoc($result)['count'];
$pagesCount = ceil($count / $notesOnPage);

if ($page != 1) {
    $prev = $page - 1;
    $content .= "<a href=\"?page=$prev$partPath\"><<</a>";
}

for ($i=1; $i<=$pagesCount; $i++) {
    if ($page == $i) {
        $class = ' class="active"';
    } else {
        $class = '';
    }
    $content .= "<a href=\"?page=$i$partPath\"$class>$i</a> ";
}

if ($page != $pagesCount) {
    $prev = $page + 1;
    $content .= "<a href=\"?page=$prev$partPath\">>></a>";
}

if(isset($_SESSION['auth'])){
    $content .= '<form action="" method="POST">
                    Категорія<br>
                    <select name="category">
                        <option>111111</option>
                        <option>222222</option>
                        <option>333333</option>
                    </select><br>
                    <input name="date" type="hidden" value="'.date('Y:m:d H:i:s').'">
                    <textarea name="joke"></textarea><br>
                    <input type="submit">
                </form>';
}

include "../elems/layout.php";