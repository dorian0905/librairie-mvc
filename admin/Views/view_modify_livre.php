<form action="?controller=livre&action=traitement_modifier_livre" method="POST">
    <div>
        <label for="isbn">ISBN</label>
        <input required type="text" name="isbn" id="isbn" value="<?= $oneLivreData[1] ?>">
    </div>
    <div>
        <label for="titreLivre">Titre</label>
        <input required type="text" name="titre" id="titreLivre" value="<?= $oneLivreData[2] ?>">
    </div>
    <div>
        <label for="theme">Theme</label>
        <input required type="text" name="theme" id="theme" value="<?= $oneLivreData[3] ?>">
    </div>
    <div>
        <label for="pages">Nb pages</label>
        <input required type="text" name="pages" id="pages" value="<?= $oneLivreData[4] ?>">
    </div>
    <div>
        <label for="format">Format</label>
        <input required type="text" name="format" id="format" value="<?= $oneLivreData[5] ?>">
    </div>
    <div>
        <label for="nom-auteur">Nom auteur</label>
        <input required type="text" name="nom-auteur" id="nom-auteur" value="<?= $oneLivreData[6] ?>">
    </div>
    <div>
        <label for="prenom-auteur">Prenom auteur</label>
        <input required type="text" name="prenom-auteur" id="prenom-auteur" value="<?= $oneLivreData[7] ?>">
    </div>
    <div>
        <label for="editeur">Editeur</label>
        <input required type="text" name="editeur" id="editeur" value="<?= $oneLivreData[8] ?>">
    </div>
    <div>
        <label for="annee">Année édition</label>
        <input required type="text" name="annee" id="annee" value="<?= $oneLivreData[9] ?>">
    </div>
    <div>
        <label for="prix">Prix</label>
        <input required type="text" name="prix" id="prix" value="<?= $oneLivreData[10] ?>">
    </div>
    <div>
        <label for="langue">Langue</label>
        <input required type="text" name="langue" id="langue" value="<?= $oneLivreData[11] ?>">
    </div>
    <input required type="hidden" name="id" id="id" value="<?= $oneLivreData[0] ?>">
    <input type="submit" value="Modifier">
</form>