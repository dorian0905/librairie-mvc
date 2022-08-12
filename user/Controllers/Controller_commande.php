<?php

class Controller_commande extends Controller
{
	public function action_default() {
		$this->action_home();
	}

	public function action_home() {
		$this->render("home");
	}

    public function action_all_commande() {
        $m=Model::get_model();
        $data=["commandes"=>$m->get_all_commande()];
        $this->render("all_commande", $data);
    }
	
	public function action_all_editeur() {
		$m=Model::get_model();
        $data=["editeurs"=>$m->get_all_editeurs()];
        $this->render("commande_editeur_form", $data);
	}
	
	public function action_get_commande_from_editeur() {
		if(isset($_POST['editeur']) && !empty($_POST['editeur'])) {
			$editeur = $this->validateData($_POST['editeur']);
			$m=Model::get_model();
			$data=["commandes"=>$m->get_commande_from_editeur($editeur)];
			$this->render("all_commande", $data);
		} else {
			$this->action_all_editeur();
		}
	}
	
	public function action_all_rsociale() {
		$m=Model::get_model();
		$data=["rsociales"=>$m->get_all_rsociales()];
		$this->render("commande_fournisseur_form", $data);
	}

	public function action_get_commande_from_fournisseur() {
		if(isset($_POST['fournisseur']) && !empty($_POST['fournisseur'])) {
			$fournisseur=$this->validateData($_POST['fournisseur']);
			$m=Model::get_model();
			$data=["commandes"=>$m->get_commande_from_fournisseur($fournisseur)];
			$this->render("all_commande", $data);
		} else {
			$this->action_all_rsociale();
		}
	}
	
	public function action_all_date() {
        $this->render("commande_date_form");
	}

	public function action_get_commande_from_date() {
		if(isset($_POST['date']) && !empty($_POST['date'])) {
			$date=$this->validateData($_POST['date']);
			$m=Model::get_model();
			$data=["commandes"=>$m->get_commande_from_date($date)];
			$this->render("all_commande", $data);
		} else {
			$this->action_all_date();
		}
	}
}