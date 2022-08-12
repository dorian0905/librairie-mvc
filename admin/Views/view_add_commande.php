<form action="?controller=commande&action=traitement_add_commande" method="POST">
    <div>
        <label for="titreLivre">Titre Livre</label>
        <select name="idLivre" id="titreLivre">
            <?php foreach($livres as $l): ?>
                <option value="<?= $l->id_livre; ?>"><?= $l->titre_livre; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label for="fournisseur">Fournisseur</label>
        <select name="idFournisseur" id="fournisseur">
            <?php foreach($fournisseurs as $f): ?>
                <option value="<?= $f->Id_fournisseur; ?>"><?= $f->Raison_sociale; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label for="date">Date</label>
        <input required type="date" name="date" id="date">
    </div>
    <div>
        <label for="prix">Prix</label>
        <input required type="text" name="prix" id="prix">
    </div>
    <div>
        <label for="nombre">Nombre d'exemplaires</label>
        <input required type="text" name="nombre" id="nombre">
    </div>
    <input type="submit" value="Ajouter">
</form>