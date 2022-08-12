<form action="?controller=livre&action=get_livre_from_auteur" method="POST">
    <select name="auteur">
        <?php foreach($auteurs as $a): ?>
            <option value="<?= $a->nom_auteur; ?>_<?= $a->prenom_auteur; ?>"><?= strtoupper($a->nom_auteur); ?> <?= $a->prenom_auteur; ?></option>
        <?php endforeach; ?>
    </select>
    <input type="submit" value="Chercher">
</form>