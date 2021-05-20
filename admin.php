<?php
session_start();
include 'pages/connect_db.php';

if(isset($_GET['changeStatus'])){
    $status = $_GET['changeStatus'];
    $id = $_GET['id'];

    $query = "UPDATE user SET status_id='$status' WHERE id='$id'";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));

    header('Location: /admin.php');
}
if(isset($_GET['ban_id'])){
    $id = $_GET['ban_id'];
    $query = "UPDATE user SET banned='1' WHERE id='$id'";
    mysqli_query($link, $query) or die(mysqli_error($link));
}
if(isset($_GET['unban_id'])){
    $id = $_GET['unban_id'];
    $query = "UPDATE user SET banned='0' WHERE id='$id'";
    mysqli_query($link, $query) or die(mysqli_error($link));
}

if(!empty($_SESSION['auth']) AND $_SESSION['status'] == 'admin'){
    $query = "SELECT *, statuses.name as status, user.id as id 
            FROM user
            LEFT JOIN statuses ON statuses.id=user.status_id";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));

    for($data=[]; $row=mysqli_fetch_assoc($result); $data[]=$row);
    //var_dump($data);
    $content = 'Hello '.$_SESSION['login'];
    $content .= '<br>';
    $content .= '<table border="1">
        <tr>
            <th>login</th>
            <th>status</th>
            <th>delete</th>
            <th>change status</th>
            <th>ban</th>
            <th>ban status</th>
        </tr>';
        foreach($data as $user){
            if($user['status'] == 'admin'){
                $statusColor = 'admin';
                $changeStatus = '<a href="/admin.php?changeStatus=2&id='.$user['id'].'">Зробити юзером</a>';
            }else{
                $statusColor = 'user';
                $changeStatus = '<a href="/admin.php?changeStatus=1&id='.$user['id'].'">Зробити адміном</a>';
            }
            if($user['banned'] == 0) {
                $ban = '<a href="/admin.php?ban_id=' . $user['id'] . '">Забанити</a>';
            }elseif($user['banned'] == 1){
                $ban = '<a href="/admin.php?unban_id=' . $user['id'] . '">Розбанити</a>';
            }
            $content .= '<tr class="'.$statusColor.'">
                <td>'.$user['login'].'</td>
                <td>'.$user['status'].'</td>
                <td><a href="pages/deleteProfile.php?deleteId='.$user['id'].'&admin=on">delete</a></td>
                <td>'.$changeStatus.'</td>
                <td>'.$ban.'</td>
                <td>'.$user['banned'].'</td>
                </tr>';
        }
    $content .= '</table>';
}else{
    $_SESSION['message']['login'] = 'Ви не адмін!!!!';
    header('Location: /');
}

include 'pages/layout.php';