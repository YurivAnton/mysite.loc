<?php
//45.22 Защищаем админку паролем

    include '../elems/init.php';
    include 'elems/log_pass.php';

    if(!empty($_SESSION['auth'])) {
        function getPage()
        {

            if (isset($_POST['title']) and
                isset($_POST['url']) and
                isset($_POST['text']) and
                isset($_REQUEST['date'])) {

                $title = $_POST['title'];
                $url = $_POST['url'];
                $text = $_POST['text'];
                $date = $_REQUEST['date'];

            } else {
                $title = '';
                $url = '';
                $text = '';
                $date = '';
            }

            ob_start();
            include 'elems/form.php';
            $content = ob_get_clean();

            $title = 'admin add new page';

            include 'elems/layout.php';
        }

        function addPage($link)
        {
            if (isset($_POST['title']) and isset($_POST['url']) and isset($_POST['text'])) {
                $title = mysqli_real_escape_string($link, $_POST['title']);
                $url = mysqli_real_escape_string($link, $_POST['url']);
                $text = mysqli_real_escape_string($link, $_POST['text']);
                $date = $_REQUEST['date'];

                $query = "SELECT COUNT(*) as count FROM pages WHERE url = '$url'";
                $result = mysqli_query($link, $query) or die(mysqli_error($link));
                $isPage = mysqli_fetch_assoc($result)['count'];

                if ($isPage) {
                    $_SESSION['message'] = [
                        'text' => 'Page with this url exists',
                        'status' => 'error'
                    ];
                } else {
                    $query = "INSERT INTO pages (title, url, text, date) VALUES ('$title', '$url', '$text', '$date')";
                    $result = mysqli_query($link, $query) or die(mysqli_error($link));
                    $_SESSION['message'] = [
                        'text' => 'Page added successfully',
                        'status' => 'success'
                    ];
                    header('Location: /admin/');
                    die();
                }
            } else {
                return '';
            }
        }

        addPage($link);
        getPage();
    } else {
        header('Location: /admin/auth.php'); die();
    }