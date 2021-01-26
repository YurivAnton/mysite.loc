<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css?v=2">
    <title><?= $title ?></title>
</head>
<body>
<div id="wrapper">
    <header>
        <?php include 'elems/header.php'; ?>
    </header>
    <main>
        <?= $content ?>
    </main>
    <footer>
        <?php include 'elems/footer.php'; ?>
    </footer>
</div>
</body>
</html>