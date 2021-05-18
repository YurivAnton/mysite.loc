<?php
session_start();
include 'pages/connect_db.php';
if(isset($_GET['changeStatus'])){
    $status = $_GET['changeStatus'];
    $id = $_GET['id'];

    $query = "UPDATE user SET status='$status' WHERE id='$id'";
    mysqli_query($link, $query) or die(mysqli_error($link));

    header('Location: /admin.php');
}

if(!empty($_SESSION['auth']) AND $_SESSION['status'] == 'admin'){
    $query = "SELECT * FROM user";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    for($data=[]; $row=mysqli_fetch_assoc($result); $data[]=$row);

    $content = 'Hello '.$_SESSION['login'];
    $content .= '<br>';
    $content .= '<table border="1">
        <tr>
            <th>login</th>
            <th>status</th>
            <th></th>
        </tr>';
        foreach($data as $user){
            if($user['status'] == 'admin'){
                $statusColor = 'admin';
                $changeStatus = '<a href="/admin.php?changeStatus=user&id='.$user['id'].'">Зробити його юзером</a>';
            }else{
                $statusColor = 'user';
                $changeStatus = '<a href="/admin.php?changeStatus=admin&id='.$user['id'].'">Зробити його адміном</a>';
            }
            $content .= '<tr class="'.$statusColor.'">
                <td>'.$user['login'].'</td>
                <td>'.$user['status'].'</td>
                <td><a href="deleteProfile.php?deleteId='.$user['id'].'">delete</a></td>
                <td>'.$changeStatus.'</td>
                </tr>';
        }
    $content .= '</table>';
}else{
    $_SESSION['message']['login'] = 'Ви не адмін!!!!';
    header('Location: /');
}

include 'pages/layout.php';