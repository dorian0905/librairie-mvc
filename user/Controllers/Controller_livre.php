<?php

class Controller_livre extends Controller
{
	public function action_default() {
		$this->action_home();
	}

	public function action_home() {
		$this->render("home");
	}

    public function action_all_livre() {
        $m=Model::get_model();
        $data=["livres"=>$m->get_all_livre()];
        $this->render("all_livre", $data);
    }

	public function action_all_titre() {
		$m=Model::get_model();
        $data=["titles"=>$m->get_all_titres()];
        $this->render("livre_titre_form", $data);
	}

	public function action_get_livre_from_title() {
		if(isset($_POST['title']) && !empty($_POST['title'])) {
			$titre=$this->validateData($_POST['title']);
			$m=Model::get_model();
			$data=["livres"=>$m->get_livre_from_title($titre)];
			$this->render("all_livre", $data);
		} else {
			$this->action_all_titre();
		}
	}

	public function action_all_auteur() {
		$m=Model::get_model();
        $data=["auteurs"=>$m->get_all_auteurs()];
        $this->render("livre_auteur_form", $data);
	}

	public function action_get_livre_from_auteur() {
		if(isset($_POST['auteur']) && !empty($_POST['auteur'])) {
			$auteur = explode("_", $this->validateData($_POST['auteur']));
			$nomAuteur = $auteur[0];
			$prenomAuteur = $auteur[1];
			$m=Model::get_model();
			$data=["livres"=>$m->get_livre_from_auteur($nomAuteur, $prenomAuteur)];
			$this->render("all_livre", $data);
		} else {
			$this->action_all_auteur();
		}
	}

	public function action_all_editeur() {
		$m=Model::get_model();
        $data=["editeurs"=>$m->get_all_editeurs()];
        $this->render("livre_editeur_form", $data);
	}

	public function action_get_livre_from_editeur() {
		if(isset($_POST['editeur']) && !empty($_POST['editeur'])) {
			$editeur=$this->validateData($_POST['editeur']);
			$m=Model::get_model();
			$data=["livres"=>$m->get_livre_from_editeur($editeur)];
			$this->render("all_livre", $data);
		} else {
			$this->action_all_editeur();
		}
	}
}