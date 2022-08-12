<?php

class Controller_livre extends Controller
{
	public function action_default() {
		$this->action_home();
	}

	public function action_home() {
		$this->render("home");
	}

    public function action_all_livre($notification=false, $success=false) {
        $m=Model::get_model();
        $data=["livres"=>$m->get_all_livre()];
		if($notification) {
			$data['success']=$success;
		}
        $this->render("all_livre", $data);
    }

	public function action_all_titre() {
		$m=Model::get_model();
        $data=["titles"=>$m->get_all_titres()];
        $this->render("livre_titre_form", $data);
	}

	public function action_get_livre_from_title() {
		$titre=htmlspecialchars($_POST['title']);
		$m=Model::get_model();
        $data=["livres"=>$m->get_livre_from_title($titre)];
        $this->render("all_livre", $data);
	}

	public function action_all_auteur() {
		$m=Model::get_model();
        $data=["auteurs"=>$m->get_all_auteurs()];
        $this->render("livre_auteur_form", $data);
	}

	public function action_get_livre_from_auteur() {
		$auteur = explode("_", htmlspecialchars($_POST['auteur']));
		$nomAuteur = $auteur[0];
		$prenomAuteur = $auteur[1];
		$m=Model::get_model();
        $data=["livres"=>$m->get_livre_from_auteur($nomAuteur, $prenomAuteur)];
        $this->render("all_livre", $data);
	}

	public function action_all_editeur() {
		$m=Model::get_model();
        $data=["editeurs"=>$m->get_all_editeurs()];
        $this->render("livre_editeur_form", $data);
	}

	public function action_get_livre_from_editeur() {
		$editeur=htmlspecialchars($_POST['editeur']);
		$m=Model::get_model();
        $data=["livres"=>$m->get_livre_from_editeur($editeur)];
        $this->render("all_livre", $data);
	}


	/**
	 * AJOUTER LIVRE
	 */
	public function action_add_livre() {
		$this->render("add_livre");
	}

	public function action_traitement_add_livre() {
		$dataLivre = [
			$this->validateData($_POST['isbn']),
			$this->validateData($_POST['titre']),
			$this->validateData($_POST['theme']),
			$this->validateData($_POST['pages']),
			$this->validateData($_POST['format']),
			$this->validateData($_POST['nom-auteur']),
			$this->validateData($_POST['prenom-auteur']),
			$this->validateData($_POST['editeur']),
			$this->validateData($_POST['annee']),
			$this->validateData($_POST['prix']),
			$this->validateData($_POST['langue'])
		];
		$m=Model::get_model();
        $added = $m->add_livre($dataLivre);
		$this->action_all_livre(true, $added);
	}


	/**
	 * MODIFIER LIVRE
	 */
	public function action_modifier_livre() {
		$id=$_GET['id'];
		$m=Model::get_model();
        $data=["oneLivreData"=>$m->get_livre_from_id($id)];
		$this->render("modify_livre", $data);
	}

	public function action_traitement_modifier_livre() {
		$dataLivre = [
			$this->validateData($_POST['isbn']),
			$this->validateData($_POST['titre']),
			$this->validateData($_POST['theme']),
			$this->validateData($_POST['pages']),
			$this->validateData($_POST['format']),
			$this->validateData($_POST['nom-auteur']),
			$this->validateData($_POST['prenom-auteur']),
			$this->validateData($_POST['editeur']),
			$this->validateData($_POST['annee']),
			$this->validateData($_POST['prix']),
			$this->validateData($_POST['langue']),
			$this->validateData($_POST['id'])
		];
		$m=Model::get_model();
        $modified = $m->modify_livre($dataLivre);
		$this->action_all_livre(true, $modified);
	}


	/**
	 * SUPPRIMER LIVRE
	 */
	public function action_supprimer_livre() {
		$id=$_GET['id'];
		$m=Model::get_model();
        $deleted = $m->delete_livre($id);
		$this->action_all_livre(true, $deleted);
	}
}