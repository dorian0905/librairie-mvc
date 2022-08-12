<form action="?controller=livre&action=get_livre_from_title" method="POST">
    <select name="title">
        <?php foreach($titles as $t): ?>
            <option value="<?= $t->titre_livre; ?>"><?= $t->titre_livre; ?></option>
        <?php endforeach; ?>
    </select>
    <input type="submit" value="Chercher">
</form>