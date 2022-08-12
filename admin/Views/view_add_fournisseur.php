<form action="?controller=fournisseur&action=traitement_add_fournisseur" method="POST">
    <div>
        <label for="code">Code</label>
        <input required type="text" name="code" id="code">
    </div>
    <div>
        <label for="rsociale">Raison Sociale</label>
        <input required type="text" name="rsociale" id="rsociale">
    </div>
    <div>
        <label for="rue">Rue</label>
        <input required type="text" name="rue" id="rue">
    </div>
    <div>
        <label for="codePostal">Code postal</label>
        <input required type="text" name="codePostal" id="codePostal">
    </div>
    <div>
        <label for="localite">Localite</label>
        <input required type="text" name="localite" id="localite">
    </div>
    <div>
        <label for="pays">Pays</label>
        <input required type="text" name="pays" id="pays">
    </div>
    <div>
        <label for="tel">Telephone</label>
        <input required type="text" name="tel" id="tel">
    </div>
    <div>
        <label for="url">URL</label>
        <input required type="text" name="url" id="url">
    </div>
    <div>
        <label for="mail">Email</label>
        <input required type="text" name="mail" id="mail">
    </div>
    <div>
        <label for="fax">Fax</label>
        <input required type="text" name="fax" id="fax">
    </div>
    <input type="submit" value="Ajouter">
</form>