<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../style.css?v=111">
</head>
<body>
    <header>
        <?php include 'header.php'; ?>
    </header>
    <main>
        <?= $content ?>
    </main>
    <footer>
        <a href="/pages/login.php">login</a>
        <a href="/pages/logout.php">logout</a>
        <a href="/pages/register.php">registration</a>
    </footer>
</body>
</html>