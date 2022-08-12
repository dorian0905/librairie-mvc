<form action="?controller=fournisseur&action=traitement_modifier_fournisseur" method="POST">
    <div>
        <label for="code">Code</label>
        <input required type="text" name="code" id="code" value="<?= $oneFournisseurData[1] ?>">
    </div>
    <div>
        <label for="rsociale">Raison Sociale</label>
        <input required type="text" name="rsociale" id="rsociale" value="<?= $oneFournisseurData[2] ?>">
    </div>
    <div>
        <label for="rue">Rue</label>
        <input required type="text" name="rue" id="rue" value="<?= $oneFournisseurData[3] ?>">
    </div>
    <div>
        <label for="codePostal">Code postal</label>
        <input required type="text" name="codePostal" id="codePostal" value="<?= $oneFournisseurData[4] ?>">
    </div>
    <div>
        <label for="localite">Localite</label>
        <input required type="text" name="localite" id="localite" value="<?= $oneFournisseurData[5] ?>">
    </div>
    <div>
        <label for="pays">Pays</label>
        <input required type="text" name="pays" id="pays" value="<?= $oneFournisseurData[6] ?>">
    </div>
    <div>
        <label for="tel">Telephone</label>
        <input required type="text" name="tel" id="tel" value="<?= $oneFournisseurData[7] ?>">
    </div>
    <div>
        <label for="url">URL</label>
        <input required type="text" name="url" id="url" value="<?= $oneFournisseurData[8] ?>">
    </div>
    <div>
        <label for="mail">Email</label>
        <input required type="text" name="mail" id="mail" value="<?= $oneFournisseurData[9] ?>">
    </div>
    <div>
        <label for="fax">Fax</label>
        <input required type="text" name="fax" id="fax" value="<?= $oneFournisseurData[10] ?>">
    </div>
    <input required type="hidden" name="id" id="id" value="<?= $oneFournisseurData[0] ?>">
    <input type="submit" value="Modifier">
</form>