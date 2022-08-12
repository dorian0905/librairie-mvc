<?php


// On considère que l'administrateur n'est pas hackeur


class Controller_commande extends Controller
{
	public function action_default() {
		$this->action_home();
	}

	public function action_home() {
		$this->render("home");
	}

    public function action_all_commande($notification=false, $success=false) {
        $m=Model::get_model();
        $data=["commandes"=>$m->get_all_commande()];
		if($notification) {
			$data['success']=$success;
		}
        $this->render("all_commande", $data);
    }
	
	public function action_all_editeur() {
		$m=Model::get_model();
        $data=["editeurs"=>$m->get_all_editeurs()];
        $this->render("commande_editeur_form", $data);
	}
	
	public function action_get_commande_from_editeur() {
		$editeur = $this->validateData($_POST['editeur']);
		$m=Model::get_model();
        $data=["commandes"=>$m->get_commande_from_editeur($editeur)];
        $this->render("all_commande", $data);
	}
	
	public function action_all_rsociale() {
		$m=Model::get_model();
		$data=["rsociales"=>$m->get_all_rsociales()];
		$this->render("commande_fournisseur_form", $data);
	}

	public function action_get_commande_from_fournisseur() {
		$fournisseur=$this->validateData($_POST['fournisseur']);
		$m=Model::get_model();
		$data=["commandes"=>$m->get_commande_from_fournisseur($fournisseur)];
		$this->render("all_commande", $data);
	}
	
	public function action_all_date() {
        $this->render("commande_date_form");
	}

	public function action_get_commande_from_date() {
		$date=$this->validateData($_POST['date']);
		$m=Model::get_model();
        $data=["commandes"=>$m->get_commande_from_date($date)];
        $this->render("all_commande", $data);
	}


	/**
	 * AJOUTER COMMANDE
	 */
	public function action_add_commande() {
		$m=Model::get_model();
        $data=[
			"livres"=>$m->get_all_titres(),
			"fournisseurs"=>$m->get_all_fournisseur()
		];
		$this->render("add_commande", $data);
	}

	public function action_traitement_add_commande() {
		$dataCommande = [
			$this->validateData($_POST['idLivre']),
			$this->validateData($_POST['idFournisseur']),
			$this->validateData($_POST['date']),
			$this->validateData($_POST['prix']),
			$this->validateData($_POST['nombre']),
		];
		$m=Model::get_model();
        $added = $m->add_commande($dataCommande);
		$this->action_all_commande(true, $added);
	}

	/**
	 * MODIFIER COMMANDE
	 */
	public function action_modifier_commande() {
		$id=$_GET['id'];
		$m=Model::get_model();
		$data=[
			"oneCommandeData"=>$m->get_commande_from_id($id),
			"fournisseurs"=>$m->get_all_rsociales(),
			"titres"=>$m->get_all_titres(),
		];
		$this->render("modify_commande", $data);
	}

	public function action_traitement_modifier_commande() {
		$dataCommande = [
			$this->validateData($_POST['idLivre']),
			$this->validateData($_POST['idFournisseur']),
			$this->validateData($_POST['date']),
			$this->validateData($_POST['prix']),
			$this->validateData($_POST['nombre']),
			$this->validateData($_POST['id']),
		];
		$m=Model::get_model();
		$modified = $m->modify_commande($dataCommande);
		$this->action_all_commande(true, $modified);
	}

	/**
	 * SUPPRIMER COMMANDE
	 */
	public function action_supprimer_commande() {
		$id=$_GET['id'];
		$m=Model::get_model();
        $deleted = $m->delete_commande($id);
		$this->action_all_commande(true, $deleted);
	}
}