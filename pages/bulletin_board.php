<?php
session_start();

include '../elems/connect_db.php';

if(!empty($_POST['advertisement'])){
    $advertisement = $_POST['advertisement'];
    $topic = $_POST['topic'];
    $name = $_POST['name'];
    $date = $_POST['date'];
    $query = "INSERT INTO bulletinBoard 
            SET advertisement='$advertisement', name='$name', date='$date', 
            topic='$topic'";
    mysqli_query($link, $query) or die(mysqli_error($link));
}

if (isset($_GET['get_up'])) {
    $id = $_GET['get_up'];
    $date = date('Y-m-d H:i:s');
    $path = preg_replace('#&get_up=.+#', '', $_SERVER['REQUEST_URI']);

    $query = "UPDATE bulletinBoard SET date='$date' WHERE id='$id'";
    mysqli_query($link, $query);

    header("Location: $path");
}

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$notesOnPage = 3;
$from = ($page - 1) * $notesOnPage;

if (isset($_GET['topic'])) {
    $topic = $_GET['topic'];
    $where = "WHERE topic='$topic'";
    $partPath = "&topic=$topic";
} else {
    $where = '';
    $partPath = '';
}

$query = "SELECT *, date + INTERVAL 24 HOUR AS newDate
            FROM bulletinBoard
            $where
            ORDER BY date DESC
            LIMIT $from,$notesOnPage";

$result = mysqli_query($link, $query) or die(mysqli_error($link));

for($data=[]; $row=mysqli_fetch_assoc($result); $data[]=$row);
$content = '';

foreach($data as $advertisement){
    $getUp = '';
    if (date('Y-m-d H:i:s') > $advertisement['newDate']) {
        $id = $advertisement['id'];
        $getUpPath = $_SERVER['REQUEST_URI'].'&get_up='.$id;
        $getUp = "<a href=\"$getUpPath\">GET UP</a>";
    }
    $content .= '<h4>'.$advertisement['name'].' '.$advertisement['date'].'</h4>';
    $content .= '<p>'.$advertisement['topic'].'<br>'.$advertisement['advertisement'].'</p>';
    $content .= $getUp.'<br>';
}

$query = "SELECT COUNT(*) AS count FROM bulletinBoard $where";
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

$content .= '<form action="" method="POST">
                Your name<br>
                <input name="name"><br>
                Категорія<br>
                <select name="topic">
                    <option>aaaaa</option>
                    <option>bbbbb</option>
                    <option>ccccc</option>
                </select><br>
                <input name="date" type="hidden" value="'.date('Y:m:d H:i:s').'">
                <textarea name="advertisement"></textarea><br>
                <input type="submit">
            </form>';


include "../elems/layout.php";