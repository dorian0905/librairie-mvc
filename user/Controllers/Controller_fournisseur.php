<?php

class Controller_fournisseur extends Controller
{
	public function action_default() {
		$this->action_home();
	}

	public function action_home() {
		$this->render("home");
	}

    public function action_all_fournisseur() {
        $m=Model::get_model();
        $data=["fournisseurs"=>$m->get_all_fournisseur()];
        $this->render("all_fournisseur", $data);
    }

	public function action_all_rsociale() {
		$m=Model::get_model();
        $data=["rsociales"=>$m->get_all_rsociales()];
        $this->render("fournisseur_rsociale_form", $data);
	}

	public function action_get_fournisseur_from_rsociale() {
		if(isset($_POST['rsociale']) && !empty($_POST['rsociale'])) {
			$rsociale=$this->validateData($_POST['rsociale']);
			$m=Model::get_model();
			$data=["fournisseurs"=>$m->get_fournisseur_from_rsociale($rsociale)];
			$this->render("all_fournisseur", $data);
		} else {
			$this->action_all_rsociale();
		}
	}

	public function action_all_localite() {
		$m=Model::get_model();
        $data=["localites"=>$m->get_all_localites()];
        $this->render("fournisseur_localite_form", $data);
	}

	public function action_get_fournisseur_from_localite() {
		if(isset($_POST['localite']) && !empty($_POST['localite'])) {
			$localite = $this->validateData($_POST['localite']);
			$m=Model::get_model();
			$data=["fournisseurs"=>$m->get_fournisseur_from_localite($localite)];
			$this->render("all_fournisseur", $data);
		} else {
			$this->action_all_localite();
		}
	}

	public function action_all_pays() {
		$m=Model::get_model();
        $data=["pays"=>$m->get_all_pays()];
        $this->render("fournisseur_pays_form", $data);
	}

	public function action_get_fournisseur_from_pays() {
		if(isset($_POST['pays']) && !empty($_POST['pays'])) {
			$pays=$this->validateData($_POST['pays']);
			$m=Model::get_model();
			$data=["fournisseurs"=>$m->get_fournisseur_from_pays($pays)];
			$this->render("all_fournisseur", $data);
		} else {
			$this->action_all_pays();
		}
	}
}