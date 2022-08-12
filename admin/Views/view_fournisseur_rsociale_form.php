<form action="?controller=fournisseur&action=get_fournisseur_from_rsociale" method="POST">
    <select name="rsociale">
        <?php foreach($rsociales as $r): ?>
            <option value="<?= $r->raison_sociale; ?>"><?= $r->raison_sociale; ?></option>
        <?php endforeach; ?>
    </select>
    <input type="submit" value="Chercher">
</form>