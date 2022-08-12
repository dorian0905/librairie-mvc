<?php


// On considère que l'administrateur n'est pas hackeur


class Controller_fournisseur extends Controller
{
	public function action_default() {
		$this->action_home();
	}

	public function action_home() {
		$this->render("home");
	}

    public function action_all_fournisseur($notification=false, $success=false) {
        $m=Model::get_model();
        $data=["fournisseurs"=>$m->get_all_fournisseur()];
		if($notification) {
			$data['success']=$success;
		}
        $this->render("all_fournisseur", $data);
    }

	public function action_all_rsociale() {
		$m=Model::get_model();
        $data=["rsociales"=>$m->get_all_rsociales()];
        $this->render("fournisseur_rsociale_form", $data);
	}

	public function action_get_fournisseur_from_rsociale() {
		$rsociale=htmlspecialchars($_POST['rsociale']);
		$m=Model::get_model();
        $data=["fournisseurs"=>$m->get_fournisseur_from_rsociale($rsociale)];
        $this->render("all_fournisseur", $data);
	}

	public function action_all_localite() {
		$m=Model::get_model();
        $data=["localites"=>$m->get_all_localites()];
        $this->render("fournisseur_localite_form", $data);
	}

	public function action_get_fournisseur_from_localite() {
		$localite = htmlspecialchars($_POST['localite']);
		$m=Model::get_model();
        $data=["fournisseurs"=>$m->get_fournisseur_from_localite($localite)];
        $this->render("all_fournisseur", $data);
	}

	public function action_all_pays() {
		$m=Model::get_model();
        $data=["pays"=>$m->get_all_pays()];
        $this->render("fournisseur_pays_form", $data);
	}

	public function action_get_fournisseur_from_pays() {
		$pays=htmlspecialchars($_POST['pays']);
		$m=Model::get_model();
        $data=["fournisseurs"=>$m->get_fournisseur_from_pays($pays)];
        $this->render("all_fournisseur", $data);
	}

	/**
	 * AJOUTER FOURNISSEUR
	 */
	public function action_add_fournisseur() {
		$this->render("add_fournisseur");
	}

	public function action_traitement_add_fournisseur() {
		$dataFournisseur = [
			$this->validateData($_POST['code']),
			$this->validateData($_POST['rsociale']),
			$this->validateData($_POST['rue']),
			$this->validateData($_POST['codePostal']),
			$this->validateData($_POST['localite']),
			$this->validateData($_POST['pays']),
			$this->validateData($_POST['tel']),
			$this->validateData($_POST['url']),
			$this->validateData($_POST['mail']),
			$this->validateData($_POST['fax']),
		];
		$m=Model::get_model();
        $added = $m->add_fournisseur($dataFournisseur);
		$this->action_all_fournisseur(true, $added);
	}


	/**
	 * MODIFIER FOURNISSEUR
	 */
	public function action_modifier_fournisseur() {
		$id=$_GET['id'];
		$m=Model::get_model();
        $data=["oneFournisseurData"=>$m->get_fournisseur_from_id($id)];
		$this->render("modify_fournisseur", $data);
	}

	public function action_traitement_modifier_fournisseur() {
		$dataFournisseur = [
			$this->validateData($_POST['code']),
			$this->validateData($_POST['rsociale']),
			$this->validateData($_POST['rue']),
			$this->validateData($_POST['codePostal']),
			$this->validateData($_POST['localite']),
			$this->validateData($_POST['pays']),
			$this->validateData($_POST['tel']),
			$this->validateData($_POST['url']),
			$this->validateData($_POST['mail']),
			$this->validateData($_POST['fax']),
			$this->validateData($_POST['id'])
		];
		$m=Model::get_model();
        $modified = $m->modify_fournisseur($dataFournisseur);
		$this->action_all_fournisseur(true, $modified);
	}

	/**
	 * SUPPRIMER FOURNISSEUR
	 */
	public function action_supprimer_fournisseur() {
		$id=$_GET['id'];
		$m=Model::get_model();
        $deleted = $m->delete_fournisseur($id);
		$this->action_all_fournisseur(true, $deleted);
	}
}