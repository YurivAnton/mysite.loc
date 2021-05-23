<?php
session_start();

include 'elems/connect_db.php';

    if(isset($_SESSION['message']['login'])){
        echo $_SESSION['message']['login'].'<br>';
        unset($_SESSION['message']['login']);
    }
    if(!empty($_SESSION['auth'])){
        $content ="<br>";
    }else{
        $content = '';
    }
include 'elems/layout.php';
