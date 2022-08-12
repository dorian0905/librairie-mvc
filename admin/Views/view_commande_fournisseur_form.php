<form action="?controller=commande&action=get_commande_from_fournisseur" method="POST">
    <select name="fournisseur">
        <?php foreach($rsociales as $f): ?>
            <option value="<?= $f->raison_sociale; ?>"><?= $f->raison_sociale; ?></option>
        <?php endforeach; ?>
    </select>
    <input type="submit" value="Chercher">
</form>