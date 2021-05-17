<?php
session_start();
include 'connect_db.php';

$query = " SELECT id, login, birth FROM user";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
$id = $_SESSION['id'];
for($data=[]; $row=mysqli_fetch_assoc($result); $data[]=$row);
//var_dump($data);
$table ='
	<table border="1">
	<tr>
		<th>id</th>
		<th>login</th>
		<th colspan="3">profile</th>
	</tr>
	';

foreach($data as $user){
	$table .=
		'<tr>
		<td>'.$user['id'].'</td>
		<td>'.$user['login'].'</td>
        <td><a href="profile.php?id='.$user['id'].'">show</a></td>';
	if($id == $user['id']){
	    $table .= '<td><a href="personalArea.php">edit</a></td>';
	    $table .= '<td><a href="deleteProfile.php">delete</a></td>';
    }/*else{
	    $table .= '<td></td>';
	    $table .= '<td></td>';
    }*/
	$table .= '</tr>';
}
$table .= '</table>';
echo '<a href="/">HOME</a>';
echo $table;
