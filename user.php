<?php
session_start();
include 'connect_db.php';

$query = " SELECT id, login FROM user";
$result = mysqli_query($link, $query) or die(mysqli_error($link));

for($data=[]; $row=mysqli_fetch_assoc($result); $data[]=$row);
//var_dump($data);
$table ='
	<table border="1">
	<tr>
		<th>id</th>
		<th>login</>
		<th>profile</th>
	</tr>
	';

foreach($data as $user){
	$table .=
		'<tr>
		<td>'.$user['id'].'</td>
		<td>'.$user['login'].'</td>
		<td><a href="profile.php?id='.$user['id'].'">show</a></td>
		</tr>';
}
$table .= '</table>';
echo '<a href="/">HOME</a>';
echo $table;
