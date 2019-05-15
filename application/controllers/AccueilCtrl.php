<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AccueilCtrl extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function accueil() {
        $data['typeEvent']=$this->typeevent->selectAll();
        $this->load->view('template/navbar',$data);
        $data['title'] = 'Accueil';
        $data['event']= $this->event->select3byDate();   
        $this->load->view('template/header', $data);
        $this->load->view('home', $data);
        $this->load->view('template/footer');
    }

    public function connexion_benevole() {
        $this->load->model('benevole');
        $data['title'] = "connexion bénévole";
        $this->load->view('template/navbar');
        $this->load->view('template/header', $data);
        $this->load->view('benevole/connexion');
        $this->load->view('template/footer');
    }

    public function inscription_benevole() {
        $this->load->model('benevole');
        $data = "inscription bénévole";
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');
        $this->load->view('benevole/inscription');
        $this->load->view('template/footer');
    }

    public function connexion_organisateur() {
        $this->load->model('benevole');
        $data = "connexion organisateur";
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');
        $this->load->view('organisateur/connexion');
        $this->load->view('template/footer');
    }

    public function inscription_organisateur() {
        $this->load->model('benevole');
        $data = "inscription Organisateur";
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');
        $this->load->view('organisateur/inscription');
        $this->load->view('template/footer');
    }

    public function liste_prochain_event() {
        $data['title'] = 'Prochains événements';
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');
        $data['event'] = $this->event->selectAllByDate();
        $this->load->view('liste_event', $data);
        $this->load->view('template/footer');
        
    }
    
    public function liste_type_event($idT){
        $data['title'] = 'Voici les événements correspondant à votre recherche';
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');
        $data['event'] = $this->event->selectByType($idT);
        $this->load->view('liste_event', $data);
        $this->load->view('template/footer');
        }

    public function search_event() {
        $this->load->model('event');
        $name = $this->input->post('title');
        $data['events'] = $this->event->selectByName($name);
        $this->load->view('recherche', $data);
    }

    public function afficher_event($id) {
        $this->load->model('event');
        $this->load->helper('form', 'url');
        $this->load->library('form_validation');
        if ($this->event->selectById($id) != Null) {
            $data['event'] = $this->event->selectById($id);
            $data['title'] = "event";
            $this->load->view('template/header', $data);
            $this->load->view('template/navbar');
            $this->load->view('affichage_event', $data);
            $this->load->view('template/footer');
        } else {
            //ereur le produit n'existe pas
            $this->liste_prochain_event();
        }
    }

}
