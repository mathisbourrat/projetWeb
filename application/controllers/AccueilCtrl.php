<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AccueilCtrl extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function accueil() {
        $this->load->helper('date');
        $data['typeEvent'] = $this->Typeevent->selectAll();
        $this->load->view('template/navbar', $data);
        $data['title'] = 'Accueil';
        $data['event'] = $this->Event->select3byDate();
        $this->load->view('template/header', $data);
        $this->load->view('home', $data);
        $this->load->view('template/footer');
    }

    public function connexion_benevole() {
        $idLogged = $this->CookieBenModel->isLoggedIn();
        if ((isset($idLogged))) {
            redirect('BenevoleCtrl/index');
        }
        $data['title'] = "connexion bénévole";
        $data['typeEvent'] = $this->Typeevent->selectAll();
        $this->load->view('template/navbar', $data);
        $this->load->view('template/header', $data);
        $this->load->view('benevole/connexion');
        $this->load->view('template/footer');
    }

    public function inscription_benevole() {
        $idLogged = $this->CookieBenModel->isLoggedIn();
        if ((isset($idLogged))) {
            redirect('BenevoleCtrl/index');
        }
        $data['title'] = "inscription bénévole";
        $this->load->view('template/header', $data);
        $data['typeEvent'] = $this->Typeevent->selectAll();
        $this->load->view('template/navbar', $data);
        $this->load->view('benevole/inscription');
        $this->load->view('template/footer');
    }

    public function connexion_organisateur() {
        $idLogged = $this->CookieOrgaModel->isLoggedIn();
        if ((isset($idLogged))) {
            redirect('OrganisateurCtrl/index');
        }
        $data['title'] = "connexion organisateur";
        $this->load->view('template/header', $data);
        $data['typeEvent'] = $this->Typeevent->selectAll();
        $this->load->view('template/navbar', $data);
        $this->load->view('organisateur/connexion');
        $this->load->view('template/footer');
    }

    public function inscription_organisateur() {
        $idLogged = $this->CookieOrgaModel->isLoggedIn();
        if ((isset($idLogged))) {
            redirect('OrganisateurCtrl/index');
        }
        $data['title'] = "inscription Organisateur";
        $this->load->view('template/header', $data);
        $data['typeEvent'] = $this->Typeevent->selectAll();
        $this->load->view('template/navbar', $data);
        $this->load->view('organisateur/inscription');
        $this->load->view('template/footer');
    }

    public function liste_prochain_event() {
        $this->load->library('pagination');
        $this->load->library('table');
        $this->db->select('nomEvent, dateDebut, dateFin, lieu');
        $data['typeEvent'] = $this->Typeevent->selectAll();
        $data['base_url'] = base_url('index.php/AccueilCtrl/liste_prochain_event');
        $data['total_rows'] = $this->db->get('event')->num_rows();
        $data['per_page'] = 5;
        $data['num_links'] = 3;
        $data['records'] = $this->db->select('nomEvent, dateDebut, dateFin, lieu')
                ->get('event',$data['per_page'],$this->uri->segment(3));
        
        $this->pagination->initialize($data);

        $data['title'] = 'Prochains événements';
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('test', $data);
        $this->load->view('template/footer');
    }

    public function liste_type_event($idT) {
        $data['title'] = 'Voici les événements correspondant à votre recherche';
        $this->load->view('template/header', $data);
        $data['typeEvent'] = $this->Typeevent->selectAll();
        $this->load->view('template/navbar', $data);
        $data['event'] = $this->Event->selectByType($idT);
        $this->load->view('liste_event', $data);
        $this->load->view('template/footer');
    }

    public function search_event() {
        $name = $this->input->post('title');
        $data['event'] = $this->Event->search($name);
        $data['title'] = "résultat";
        $this->load->view('template/header', $data);
        $data['typeEvent'] = $this->Typeevent->selectAll();
        $this->load->view('template/navbar', $data);

        $this->load->view('liste_event', $data);
        $this->load->view('template/footer');
    }

    public function afficher_event($id) {
        $this->load->helper('form', 'url');
        $this->load->library('form_validation');
        if ($this->Event->selectById($id) != Null) {
            $data['event'] = $this->Event->selectById($id);
            $data['title'] = "event";
            $this->load->view('template/header', $data);
            $data['typeEvent'] = $this->Typeevent->selectAll();
            $this->load->view('template/navbar', $data);
            $this->load->view('affichage_event', $data);
            $this->load->view('template/footer');
        } else {
            //ereur le produit n'existe pas
            $this->liste_prochain_event();
        }
    }

}
