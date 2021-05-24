<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../style.css?v=1112134567">
</head>
<body>
    <div id="wrapper">
        <header>
            <?php include 'header.php'; ?>
        </header>
        <aside>
            <?php include 'aside.php'; ?>
        </aside>
        <main>
            <?= $content ?>
        </main>
        <footer>
            <a href="/pages/login.php">login</a>
            <a href="/pages/logout.php">logout</a>
            <a href="/pages/register.php">registration</a>
        </footer>
    </div>
</body>
</html>