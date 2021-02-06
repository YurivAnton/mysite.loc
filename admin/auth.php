<?php
//45.24 Добавляем хеширование пароля с помощью функции md5

    include '../elems/init.php';
    include 'elems/log_pass.php';

    if(isset($_POST['login']) AND $_POST['login'] == $login AND
        isset($_POST['password']) AND md5($_POST['password']) == $password) {

        $_SESSION['auth'] = true;

        $_SESSION['message'] = [
            'text' => 'You login successfully',
            'status' => 'success'
        ];

        header('Location: /admin/'); die();

    } else {
        include 'elems/form_login_admin.php';
    }