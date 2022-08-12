<?php

class Model {
    private $db;
    private static $instance = null;

    private function __construct() {
        $dsn = "mysql:host=localhost;dbname=librairie";
        $login = "root";
        $password = "";

        $this->db = new PDO($dsn, $login, $password);
        $this->db->query("SET NAMES 'utf8'");
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function get_model() {
        if(is_null(self::$instance)) {
            self::$instance = new Model();
        }
        return self::$instance;
    }

    /**
     * LIVRES
     */
    public function get_all_livre() {
        $r = $this->db->prepare("SELECT * FROM livre ORDER BY titre_livre");
        $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    // From titles
    public function get_all_titres() {
        $r = $this->db->prepare("SELECT DISTINCT id_livre, titre_livre FROM livre ORDER BY titre_livre");
        $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_livre_from_title($titre) {
        $r = $this->db->prepare("SELECT * FROM livre WHERE titre_livre = :titre");
        $r->bindValue(':titre', $titre, PDO::PARAM_STR);
        $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    // From auteurs
    public function get_all_auteurs() {
        $r = $this->db->prepare("SELECT DISTINCT nom_auteur, prenom_auteur FROM livre ORDER BY Nom_auteur");
        $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_livre_from_auteur($nomAuteur, $prenomAuteur) {
        $r = $this->db->prepare("SELECT * FROM livre WHERE Nom_auteur = :nomAuteur AND Prenom_auteur = :prenomAuteur");
        $r->bindValue(':nomAuteur', $nomAuteur, PDO::PARAM_STR);
        $r->bindValue(':prenomAuteur', $prenomAuteur, PDO::PARAM_STR);
        $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    // From editeur
    public function get_all_editeurs() {
        $r = $this->db->prepare("SELECT DISTINCT editeur FROM livre ORDER BY editeur");
        $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_livre_from_editeur($editeur) {
        $r = $this->db->prepare("SELECT * FROM livre WHERE Editeur = :editeur");
        $r->bindValue(':editeur', $editeur, PDO::PARAM_STR);
        $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);
    }


    // ADD LIVRE
    public function add_livre($livreData) {
        $reqSlq = "INSERT INTO livre(ISBN, Titre_livre, Theme_livre, Nbr_pages_livre, Format_livre, Nom_auteur, Prenom_auteur, Editeur, Annee_edition, Prix_vente, Langue_livre)
        VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $r = $this->db->prepare($reqSlq);
        return $r->execute($livreData);
    }

    // MODIFY LIVRE
    public function get_livre_from_id($id) {
        $reqSlq = "SELECT * FROM livre WHERE id_livre = :id";
        $r = $this->db->prepare($reqSlq);
        $r->bindValue(':id', $id, PDO::PARAM_INT);
        $r->execute();
        return $r->fetch(PDO::FETCH_NUM);
    }

    public function modify_livre($livreData) {
        $reqSlq = "UPDATE livre SET ISBN = ?, Titre_livre = ?, Theme_livre = ?, Nbr_pages_livre = ?, Format_livre = ?, Nom_auteur = ?, Prenom_auteur = ?, Editeur = ?, Annee_edition = ?, Prix_vente = ?, Langue_livre = ?
        WHERE Id_Livre = ?";
        $r = $this->db->prepare($reqSlq);
        return $r->execute($livreData);
    }

    // DELETE LIVRE
    public function delete_livre($id) {
        $reqSlq = "DELETE FROM livre WHERE id_livre = :id";
        $r = $this->db->prepare($reqSlq);
        $r->bindValue(':id', $id, PDO::PARAM_INT);
        return $r->execute();
    }
    

    /**
     * FOURNISSEURS
     */
    public function get_all_fournisseur() {
        $r = $this->db->prepare("SELECT * FROM fournisseur ORDER BY raison_sociale");
        $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    // From rsociale
    public function get_all_rsociales() {
        $r = $this->db->prepare("SELECT DISTINCT id_fournisseur, raison_sociale FROM fournisseur ORDER BY raison_sociale");
        $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_fournisseur_from_rsociale($rsociale) {
        $r = $this->db->prepare("SELECT * FROM fournisseur WHERE raison_sociale = :rsociale");
        $r->bindValue(':rsociale', $rsociale, PDO::PARAM_STR);
        $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    // From localite
    public function get_all_localites() {
        $r = $this->db->prepare("SELECT DISTINCT localite FROM fournisseur ORDER BY localite");
        $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_fournisseur_from_localite($localite) {
        $r = $this->db->prepare("SELECT * FROM fournisseur WHERE localite = :localite");
        $r->bindValue(':localite', $localite, PDO::PARAM_STR);
        $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    // From pays
    public function get_all_pays() {
        $r = $this->db->prepare("SELECT DISTINCT pays FROM fournisseur ORDER BY pays");
        $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_fournisseur_from_pays($pays) {
        $r = $this->db->prepare("SELECT * FROM fournisseur WHERE pays = :pays");
        $r->bindValue(':pays', $pays, PDO::PARAM_STR);
        $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);
    }


    // ADD FOURNISSEUR
    public function add_fournisseur($fournisseurData) {
        $reqSlq = "INSERT INTO fournisseur(Code_fournisseur, Raison_sociale, Rue_fournisseur, Code_postal, Localite, Pays, Tel_fournisseur, Url_fournisseur, Email_fournisseur, Fax_fournisseur)
        VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $r = $this->db->prepare($reqSlq);
        return $r->execute($fournisseurData);
    }


    // MODIFY FOURNISSEUR
    public function get_fournisseur_from_id($id) {
        $reqSlq = "SELECT * FROM fournisseur WHERE id_fournisseur = :id";
        $r = $this->db->prepare($reqSlq);
        $r->bindValue(':id', $id, PDO::PARAM_INT);
        $r->execute();
        return $r->fetch(PDO::FETCH_NUM);
    }

    public function modify_fournisseur($fournisseurData) {
        $reqSlq = "UPDATE fournisseur SET Code_fournisseur = ?, Raison_sociale = ?, Rue_fournisseur = ?, Code_postal = ?, Localite = ?, Pays = ?, Tel_fournisseur = ?, Url_fournisseur = ?, Email_fournisseur = ?, Fax_fournisseur = ?
        WHERE Id_fournisseur = ?";
        $r = $this->db->prepare($reqSlq);
        return $r->execute($fournisseurData);
    }

    // DELETE FOURNISSEUR
    public function delete_fournisseur($id) {
        $reqSlq = "DELETE FROM fournisseur WHERE id_fournisseur = :id";
        $r = $this->db->prepare($reqSlq);
        $r->bindValue(':id', $id, PDO::PARAM_INT);
        return $r->execute();
    }


    /**
     * COMMANDES
     */
    public function get_all_commande() {
        $r = $this->db->prepare("SELECT * FROM commander C
                                    INNER JOIN fournisseur F ON C.id_fournisseur = F.id_fournisseur
                                    INNER JOIN livre L ON L.id_livre = C.id_livre");
        $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    // From editeur
    public function get_commande_from_editeur($editeur) {
        $r = $this->db->prepare("SELECT * FROM commander C
                                    INNER JOIN fournisseur F ON C.id_fournisseur = F.id_fournisseur
                                    INNER JOIN livre L ON L.id_livre = C.id_livre
                                WHERE L.editeur = :editeur");
        $r->bindValue(':editeur', $editeur, PDO::PARAM_STR);
        $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    // From fournisseur (rsociale)
    public function get_commande_from_fournisseur($rsociale) {
        $r = $this->db->prepare("SELECT * FROM commander C
                                    INNER JOIN fournisseur F ON C.id_fournisseur = F.id_fournisseur
                                    INNER JOIN livre L ON L.id_livre = C.id_livre
                                WHERE F.raison_sociale = :rsociale");
        $r->bindValue(':rsociale', $rsociale, PDO::PARAM_STR);
        $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    // From date
    public function get_commande_from_date($date) {
        $r = $this->db->prepare("SELECT * FROM commander C
                                    INNER JOIN fournisseur F ON C.id_fournisseur = F.id_fournisseur
                                    INNER JOIN livre L ON L.id_livre = C.id_livre
                                WHERE C.date_achat = :date");
        $r->bindValue(':date', $date, PDO::PARAM_STR);
        $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    // ADD COMMANDE
    public function add_commande($commandeData) {
        $reqSlq = "INSERT INTO commander(id_livre, id_fournisseur, date_achat, prix_achat, nbr_exemplaires)
        VALUES(?, ?, ?, ?, ?)";
        $r = $this->db->prepare($reqSlq);
        return $r->execute($commandeData);
    }

    // MODIFY COMMANDE
    public function get_commande_from_id($id) {
        $reqSlq = "SELECT * FROM commander C
                    WHERE id_commande = :id";
        $r = $this->db->prepare($reqSlq);
        $r->bindValue(':id', $id, PDO::PARAM_INT);
        $r->execute();
        return $r->fetch(PDO::FETCH_OBJ);
    }

    public function modify_commande($commandeData) {
        $reqSlq = "UPDATE commander SET id_livre = ?, id_fournisseur = ?, date_achat = ?, prix_achat = ?, nbr_exemplaires = ?
        WHERE Id_commande = ?";
        $r = $this->db->prepare($reqSlq);
        return $r->execute($commandeData);
    }

    // DELETE COMMANDE
    public function delete_commande($id) {
        $reqSlq = "DELETE FROM commander WHERE id_commande = :id";
        $r = $this->db->prepare($reqSlq);
        $r->bindValue(':id', $id, PDO::PARAM_INT);
        return $r->execute();
    }
}