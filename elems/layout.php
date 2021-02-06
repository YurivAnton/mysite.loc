<!--45.29 Разбор URL средствами PHP при ЧПУ-->

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="/assets/css/bootstrap/css/bootstrap.css?v=4">
    <link rel="stylesheet" href="/assets/css/styles.css?v=9">
</head>
<body>
<div id="wrapper">
    <header>
        <?php include 'elems/header.php'; ?>
    </header>
    <main>
        <h1>Гостевая книга</h1>
        <div class="note">
            <p>
                <span class="date"><?php echo $date; ?></span>
                <span class="name"><?php echo $title; ?></span>
            </p>
            <p>
                <?php echo $content; ?>
            </p>
        </div>

    </main>
    <footer>
        <a href="/admin/">admin</a><br>
        <?php include 'elems/footer.php'; ?>
    </footer>
</div>
</body>
</html>