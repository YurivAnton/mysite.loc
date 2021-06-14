<?php
session_start();

include '../elems/connect_db.php';

if (!empty($_POST['text'])) {
    $topic = $_POST['topic'];
    $text = $_POST['text'];
    $user_id = $_SESSION['id'];
    $date = $_POST['date'];

    $query = "INSERT INTO forum 
            SET topic='$topic', text='$text', user_id='$user_id', date='$date'";
    mysqli_query($link, $query) or die(mysqli_error($link));
}

if (!empty($_POST['answer'])) {
    $answer = $_POST['answer'];
    $topic_id = $_POST['topic_id'];
    $answer_user_id = $_SESSION['id'];
    $date = $_POST['date'];

    $query = "INSERT INTO forumAnswer 
            SET answer='$answer', topic_id='$topic_id', answer_user_id='$answer_user_id', date='$date'";
    mysqli_query($link, $query) or die(mysqli_error($link));
}

$query = "SELECT * FROM forum";
$result = mysqli_query($link, $query) or die(mysqli_error($link));

for($data=[]; $row=mysqli_fetch_assoc($result); $data[]=$row);

$listOfTopic = '<ul>';
foreach ($data as $elem) {
    $listOfTopic .= '<li><a href="?topic='.$elem['topic'].'">'.$elem['topic'].'</a></li>';
}
$listOfTopic .= '</ul>';

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$notesOnPage = 2;
$from = ($page - 1) * $notesOnPage;

if (isset($_GET['topic'])) {
    $topic = $_GET['topic'];
    $where = "WHERE topic='$topic'";
    $partPath = "&topic=$topic";
    $query = "SELECT COUNT(*) AS count 
            FROM forum
            LEFT JOIN forumAnswer ON forumAnswer.topic_id=forum.id 
            $where";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    $count = mysqli_fetch_assoc($result)['count'];

    //$where = $_GET['topic'];
    $query = "SELECT user.login AS topicUser,
                    forum.id AS topic_id,
                    forum.topic AS topic,
                    forum.text AS topicText,
                    forum.date AS topicDate,
                    statuses.name AS topicUserStatus,
                    user.registration_date AS topicUserReg_date,
                    userAnswer.login AS answerUser,
                    forumAnswer.answer AS answer,
                    forumAnswer.date AS answerDate,                    
                    statusAnswer.name AS answerUserStatus,  
                    userAnswer.registration_date AS answerUserReg_date
            FROM forum
            LEFT JOIN forumAnswer ON forumAnswer.topic_id=forum.id
            LEFT JOIN user ON user.id=forum.user_id
            LEFT JOIN statuses ON user.status_id=statuses.id
            LEFT JOIN user AS userAnswer ON userAnswer.id=forumAnswer.answer_user_id
            LEFT JOIN statuses AS statusAnswer ON userAnswer.status_id=statusAnswer.id
            $where
            LIMIT $from,$notesOnPage
            ";

    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    for ($data=[]; $row=mysqli_fetch_assoc($result); $data[]=$row);

    $content = '<div class="forum">'.$data[0]['topic'].'</div>
                <div class="userName">'.$data[0]['topicUser'].'</div>
                <div class="dateOfPost">'.$data[0]['topicDate'].'</div>
                <div class="userInfo">'.$data[0]['topicUserStatus'].' '.$data[0]['topicUserReg_date'].'</div>
                <div class="userName">'.$data[0]['topicText'].'</div>';
    foreach ($data as $answer) {
        $content .= '<div class="forum"></div>
                <div class="userName">'.$answer['answerUser'].'</div>
                <div class="dateOfPost">'.$answer['answerDate'].'</div>
                <div class="userInfo">'.$answer['answerUserStatus'].' '.$data[0]['answerUserReg_date'].'</div>
                <div class="userName">'.$answer['answer'].'</div>';

        $topic_id = $answer['topic_id'];
        $topic_name = $data[0]['topic'];
    }


} else {
    $where = '';
    $partPath = '';
    $query = "SELECT COUNT(*) AS count FROM forum $where";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    $count = mysqli_fetch_assoc($result)['count'];

    $content = $listOfTopic;
}

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

if ($page != $pagesCount AND $pagesCount != 0) {
    $next = $page + 1;
    $content .= "<a href=\"?page=$next$partPath\">>></a>";
}

if (isset($_SESSION['auth'])){

    if (!isset($_GET['topic'])) {
        $content .= '<form action="" method="POST">
                        Категорія<br>
                        forum<input name="topic"><br>
                        <textarea name="text"></textarea><br>
                        <input name="date" type="hidden" value="'.date('Y:m:d H:i:s').'">
                        <input type="submit">
                    </form>';
    } else {
        $content .= '<form action="" method="POST">
                        Категорія<br>
                        answer<input readonly placeholder="'.$topic_name.'"><br>
                        <input type="hidden" value="'.$topic_id.'" name="topic_id">
                        <textarea name="answer"></textarea><br>
                        <input name="date" type="hidden" value="'.date('Y:m:d H:i:s').'">
                        <input type="submit">
                    </form>';
    }
}

include "../elems/layout.php";