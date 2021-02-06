<form method="POST">
    <label>title:<br>
        <input name="title" value="<?= $title ?>" placeholder="type title"><br><br>
    </label>
    <label>url:<br>
        <input name="url" value="<?= $url ?>" placeholder="type url"><br><br>
    </label>
    <label>text:<br>
        <textarea name="text" placeholder="type text"><?= $text ?></textarea><br><br>
    </label>
    <input type="hidden" name="date" value="<?php echo date('Y.m.d H:i:s', time());?>">
    <input type="submit">
</form>