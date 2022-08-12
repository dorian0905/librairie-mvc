<form action="?controller=fournisseur&action=get_fournisseur_from_localite" method="POST">
    <select name="localite">
        <?php foreach($localites as $l): ?>
            <option value="<?= $l->localite; ?>"><?= $l->localite; ?></option>
        <?php endforeach; ?>
    </select>
    <input type="submit" value="Chercher">
</form>