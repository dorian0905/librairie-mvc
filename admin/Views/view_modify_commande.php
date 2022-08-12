<form action="?controller=commande&action=traitement_modifier_commande" method="POST">
    <div>
        <label for="titreLivre">Titre Livre</label>
        <select name="idLivre" id="titreLivre">
            <?php foreach($titres as $t): ?>
                <option value="<?= $t->id_livre; ?>" <?= ($t->id_livre == $oneCommandeData->Id_Livre)?"selected":""?>><?= $t->titre_livre; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label for="fournisseur">Fournisseur</label>
        <select name="idFournisseur" id="fournisseur">
            <?php foreach($fournisseurs as $f): ?>
                <option value="<?= $f->id_fournisseur; ?>" <?= ($f->id_fournisseur == $oneCommandeData->Id_fournisseur)?"selected":""?>><?= $f->raison_sociale; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label for="date">Date</label>
        <input required type="date" name="date" id="date" value="<?= $oneCommandeData->Date_achat ?>">
    </div>
    <div>
        <label for="prix">Prix</label>
        <input required type="text" name="prix" id="prix" value="<?= $oneCommandeData->Prix_achat ?>">
    </div>
    <div>
        <label for="nombre">Nombre d'exemplaires</label>
        <input required type="text" name="nombre" id="nombre" value="<?= $oneCommandeData->Nbr_exemplaires ?>">
    </div>
    <input required type="hidden" name="id" id="id" value="<?= $oneCommandeData->Id_commande ?>">
    <input type="submit" value="Modifier">
</form>