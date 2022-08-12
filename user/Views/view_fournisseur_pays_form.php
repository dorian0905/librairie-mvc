<form action="?controller=fournisseur&action=get_fournisseur_from_pays" method="POST">
    <select name="pays">
        <?php foreach($pays as $p): ?>
            <option value="<?= $p->pays; ?>"><?= $p->pays; ?></option>
        <?php endforeach; ?>
    </select>
    <input type="submit" value="Chercher">
</form>