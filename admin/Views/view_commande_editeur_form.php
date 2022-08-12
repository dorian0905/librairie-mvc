<form action="?controller=commande&action=get_commande_from_editeur" method="POST">
    <select name="editeur">
        <?php foreach($editeurs as $e): ?>
            <option value="<?= $e->editeur; ?>"><?= $e->editeur; ?></option>
        <?php endforeach; ?>
    </select>
    <input type="submit" value="Chercher">
</form>