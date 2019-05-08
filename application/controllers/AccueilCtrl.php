<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AccueilCtrl extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function accueil() {
        $this->load->view('template/navbar');
        $data['title'] = 'Accueil';
        $this->load->view('template/header', $data);
        $this->load->view('home');
        $this->load->view('template/footer');
    }

    
    public function liste_event(){
        $data['title'] = 'Prochains événements';
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');
        $this->load->model('event');
        $data['event'] = $this->event->selectAll();
        $this->load->view('liste_event', $data);
    }

}
