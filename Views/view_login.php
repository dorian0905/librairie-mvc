<form action="?controller=log&action=traitement_login" method="POST">
    <p>Entrez vos identifiants pour vous connecter :</p>
    <?= (isset($message)) ? "<p>$message</p>" : "" ?>
    <div>
        <label for="mail">Adresse mail</label>
        <input type="mail" name="mail" id="mail" required>
    </div>
    <div>
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" required pattern="(?=.*\d)(?=.*[a-z]).{6,}">
    </div>
    <div>
        <input type="submit" value="Se connecter">
    </div>
    <div>
        <a href="?controller=log&action=inscription">Inscrivez-vous</a>
    </div>
</form>

