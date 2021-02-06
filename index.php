<?php
//45.29 Разбор URL средствами PHP при ЧПУ

include 'elems/init.php';

    $uri = trim(preg_replace('#(\?.*)?#', '', $_SERVER['REQUEST_URI']), '/');

    //var_dump($uri);
    if(empty($uri)){
        $uri = '/';
    }

    $query = "SELECT * FROM pages WHERE url='$uri'";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    $page = mysqli_fetch_assoc($result);

    if(!$page){
        $query = "SELECT * FROM pages WHERE url='404'";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        $page = mysqli_fetch_assoc($result);
        header("HTTP/1.0 404 Not Found");
    }

    $title = $page['title'];
    $date = $page['date'];
    $content = $page['text'];

    include 'elems/layout.php';