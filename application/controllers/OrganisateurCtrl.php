<?php

class OrganisateurCtrl extends CI_Controller {
    
    public function connection(){
        $data['title']='connexion';
        $this->load->view('template/header',$data);
        $this->load->view('template/navbar');
        $this->load->view('connexion/connexionOrga');
        $this->load->view('template/footer');
    }
    
    public function inscription(){
        
    }
}

