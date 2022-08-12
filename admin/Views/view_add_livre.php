<form action="?controller=livre&action=traitement_add_livre" method="POST">
    <div>
        <label for="isbn">ISBN</label>
        <input required type="text" name="isbn" id="isbn">
    </div>
    <div>
        <label for="titreLivre">Titre</label>
        <input required type="text" name="titre" id="titreLivre">
    </div>
    <div>
        <label for="theme">Theme</label>
        <input required type="text" name="theme" id="theme">
    </div>
    <div>
        <label for="pages">Nb pages</label>
        <input required type="text" name="pages" id="pages">
    </div>
    <div>
        <label for="format">Format</label>
        <input required type="text" name="format" id="format">
    </div>
    <div>
        <label for="nom-auteur">Nom auteur</label>
        <input required type="text" name="nom-auteur" id="nom-auteur">
    </div>
    <div>
        <label for="prenom-auteur">Prenom auteur</label>
        <input required type="text" name="prenom-auteur" id="prenom-auteur">
    </div>
    <div>
        <label for="editeur">Editeur</label>
        <input required type="text" name="editeur" id="editeur">
    </div>
    <div>
        <label for="annee">Année édition</label>
        <input required type="text" name="annee" id="annee">
    </div>
    <div>
        <label for="prix">Prix</label>
        <input required type="text" name="prix" id="prix">
    </div>
    <div>
        <label for="langue">Langue</label>
        <input required type="text" name="langue" id="langue">
    </div>
    <input type="submit" value="Ajouter">
</form>