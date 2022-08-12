<form action="?controller=log&action=traitement_inscription" method="POST">
    <p>Entrez vos informations pour vous inscrire :</p>
    <?= (isset($message)) ? "<p>$message</p>" : "" ?>
    <div>
        <label for="mail">Adresse mail</label>
        <input type="mail" name="mail" id="mail">
    </div>
    <div>
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z]).{6,}" title="Votre mot de passe doit contenir au minimum une lettre, 1 chiffre et 6 caratères" required>
    </div>
    <div>
        <label for="password-confirm">Confirmation mot de passe</label>
        <input type="password" name="password-confirm" id="password-confirm" required pattern="(?=.*\d)(?=.*[a-z]).{6,}" title="Votre mot de passe doit contenir au minimum une lettre, 1 chiffre et 6 caratères">
    </div>
    <div>
        <label for="radio-admin">Administrateur</label>
        <input type="radio" name="rank" id="radio-admin" value=2 required>
        <label for="radio-user">Utilisateur</label>
        <input type="radio" name="rank" id="radio-user" value=1 required>
    </div>
    <div>
        <input type="submit" value="S'inscrire">
    </div>
    <div>
        <a href="?controller=log&action=home">Connectez-vous</a>
    </div>
</form>