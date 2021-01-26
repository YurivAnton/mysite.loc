<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

//45.1
/*echo 'asd';
include 'file.php';
echo 'qqwe';*/

//45.2
/*$pages = ['1.php', '2.php', '3.php'];
foreach($pages as $page){
    include $page;
}*/

//45.3
/*$page = $_GET['page'];
include "pages/$page";*/

//45.4
/*$page = $_GET['page'];
include "pages/$page.php";*/

//45.5
/*$page = $_GET['page'];
include "dir/$page.php";*/

//45.6
/*$page = $_GET['page'];
$path = "dir/$page.php";

if(file_exists($path)){
    include $path;
} else {
    echo 'file not found';
}*/

//45.7
?>
<!--<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <title>index</title>
    </head>
    <body id="wrapper">
        <header>
            <?php /*include 'elems/header.php'; */?>
        </header>
        <main>
            <?php /*include 'elems/content.php'; */?>
        </main>
        <footer>
            <?php /*include 'elems/footer.php'; */?>
        </footer>
    </body>
</html>-->

<!--45.8-->
<!--<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <title>index</title>
    </head>
    <body id="wrapper">
        <header>
            <?php /*include 'elems/header.php'; */?>
        </header>
        <main>
            <?php
/*                $page = $_GET['page'];
                $path = "pages/$page.php";

                if(file_exists($path)){
                    include $path;
                } else {
                    echo 'file not found';
                }
            */?>
        </main>
        <footer>
            <?php /*include 'elems/footer.php'; */?>
        </footer>
    </body>
</html>-->

<!--45.9-->
<?php
    /*$page = $_GET['page'];
    $path = "pages/$page.php";

    if(file_exists($path)){
        $content = file_get_contents($path);
        $reg = '#\{\{title: (.*?)\}\}#';
        if(preg_match($reg, $content, $match)){
            $title = $match[1];
            $content = trim(preg_replace($reg, '', $page));
        }else {
            $title = '';
        }
        $reg = '#\{\{desc: (.*?)\}\}#';
        if(preg_match($reg, $content, $match)){
            $desc = $match[1];
            $content = trim(preg_replace($reg, '', $page));
        }else {
            $desc = '';
        }
    } else {
        $title = 'file not found';
        $content =  'file not found';
    }*/
?>
<!--<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <title><?/*= $title */?></title>
    </head>
    <body>
        <div id="wrapper">
            <?/*= $desc */?>
            <header>
                <?php /*include 'elems/header.php'; */?>
            </header>
            <main>
                <?/*= $content */?>
            </main>
            <footer>
                <?php /*include 'elems/footer.php'; */?>
            </footer>
        </div>
    </body>
</html>-->
<?php
//45.10
    /*$page = $_GET['page'];
    $path = "pages/$page.php";

    if(file_exists($path)){
        $content = file_get_contents($path);
        $reg = '#\{\{title: (.*?)\}\}#';
        if(preg_match($reg, $content, $match)){
            $title = $match[1];
            $content = trim(preg_replace($reg, '', $page));
        }else {
            $title = '';
        }
        $reg = '#\{\{desc: (.*?)\}\}#';
        if(preg_match($reg, $content, $match)){
            $desc = $match[1];
            $content = trim(preg_replace($reg, '', $page));
        }else {
            $desc = '';
        }
    } else {
        $title = 'file not found';
        $content =  'file not found';
    }
    include 'layout.php';*/

//45.11
    /*if(isset($_GET['page'])){
        $page = $_GET['page'];
    } else {
        $page = 'index';
    }

    $path = "pages/$page.php";

    if(file_exists($path)){
        $content = file_get_contents($path);
    } else {
        $content = file_get_contents("pages/404.php");
        header("HTTP/1.0 404 Not Found");
    }

    $reg = '#\{\{title: (.*?)\}\}#';
    if(preg_match($reg, $content, $match)){
        $title = $match[1];
        $content = trim(preg_replace($reg, '', $content));
    }else {
        $title = '';
    }
    $reg = '#\{\{desc: (.*?)\}\}#';
    if(preg_match($reg, $content, $match)){
        $desc = $match[1];
        $content = trim(preg_replace($reg, '', $content));
    }else {
        $desc = '';
    }

    include 'layout.php';*/

//45.12
    /*$host = 'localhost';
    $user = 'root';
    $password = '123';
    $dbName = 'test';

    $link = mysqli_connect($host, $user, $password, $dbName);
    $result = mysqli_query($link, "SET NAMES 'utf8'");

    if(isset($_GET['page'])){
        $page = $_GET['page'];
    } else {
        $page = 'index';
    }

    $query = "SELECT * FROM pages WHERE url='$page'";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    $page = mysqli_fetch_assoc($result);

    if(!$page){
        $query = "SELECT * FROM pages WHERE url='404'";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        $page = mysqli_fetch_assoc($result);
        header("HTTP/1.0 404 Not Found");
    }

    $title = $page['title'];
    $content = $page['text'];

    include 'layout.php';*/

//45.13
    /*$host = 'localhost';
    $user = 'root';
    $password = '123';
    $dbName = 'test';

    $link = mysqli_connect($host, $user, $password, $dbName);
    $result = mysqli_query($link, "SET NAMES 'utf8'");

    if(isset($_GET['page'])){
        $page = $_GET['page'];
    } else {
        $page = 'index';
    }

    $query = "SELECT * FROM pages WHERE url='$page'";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    $page = mysqli_fetch_assoc($result);

    if(!$page){
        $query = "SELECT * FROM pages WHERE url='404'";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        $page = mysqli_fetch_assoc($result);
        header("HTTP/1.0 404 Not Found");
    }

    $title = $page['title'];
    $content = $page['text'];

    include 'layout.php';*/
//45.14
