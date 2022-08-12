<form action="?controller=livre&action=get_livre_from_editeur" method="POST">
    <select name="editeur">
        <?php foreach($editeurs as $e): ?>
            <option value="<?= $e->editeur; ?>"><?= $e->editeur; ?></option>
        <?php endforeach; ?>
    </select>
    <input type="submit" value="Chercher">
</form>