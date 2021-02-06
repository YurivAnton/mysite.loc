<!--45.23 Добавляем сессию при авторизации
-->
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css?v=4">
    <title><?= $title ?></title>
</head>
<body>
<div id="wrapper">
    <header>
        <a href="/admin/">Home</a><br><br>
        <a href="/admin/add.php">Add new page</a><br><br>
        <a href="/admin/logout.php">Logout</a><br><br>
    </header>
    <main>
        <?php include 'elems/info.php'; ?>
        <?= $content ?>
    </main>
    <footer>
        footer
    </footer>
</div>
</body>
</html>