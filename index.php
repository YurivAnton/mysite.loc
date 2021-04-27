<?php
session_start();
//47 Задачи на правильную организацию баз данных

error_reporting(E_ALL);
ini_set('display_errors', 'on');

$host = 'localhost';
$user = 'root';
$password = '123';
$dbName = 'test1';

$link = mysqli_connect($host, $user, $password, $dbName);
$result = mysqli_query($link, "SET NAMES 'utf8'");

// 35. Есть сайт с платным доступом на вебинары. Когда участник
// (ему не надо регистрироваться на сайте) покупает доступ — он получает
// специальный код (пример: dk85Fj,_865gklg) и по этому коду может зайти
// на вебинар. Доступ может быть разовым (1 человек на 1 любой вебинар,
// второй человек зайти по этому коду уже не сможет) или многоразовым
// (например, 10 вебинаров). При этом по многоразовому доступу не могут
// зайти два человека на 1 вебинар.


?>
<form method="POST" action="">
    <input name="discount_code">
    <input name="log_in" type="submit" value="log_in">
    <input name="log_out" type="submit" value="log_out">
</form>
<?php
if(isset($_POST['log_in'])){
    $discount_code = $_POST['discount_code'];
    $query = "
    SELECT *
    FROM discount
    WHERE discount_code='$discount_code'";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    $exist_discount_code = mysqli_fetch_assoc($result);
    var_dump($exist_discount_code);
    if($exist_discount_code['amount'] > $exist_discount_code['status']){
        $id = $exist_discount_code['id'];
        $status = $exist_discount_code['status']+1;
        $query = "UPDATE discount SET status='$status'
        WHERE id='$id'";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        echo 'log in is successful. enjoy the webinar';
    } else {
        echo 'login denied the discount code has already been used';
    }
}

if(isset($_POST['log_out'])){
    header('Location: /');
}