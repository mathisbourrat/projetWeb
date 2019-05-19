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
        if (isset($idlogged)) {
                $this->load->view("benevole/navbarB", $data);
            } else {
                $idlogged = $this->CookieOrgaModel->isLoggedIn();
                if (isset($idlogged)) {
                    $this->load->view("organisateur/navbarO", $data);
                } else {
                    $this->load->view("template/navbar", $data);
                }
            }
        $this->load->view('organisateur/inscription');
        $this->load->view('template/footer');
    }

    
    public function next_events($offset=0){
        $data_ev=$this->db->get('event');
        $data['typeEvent'] = $this->Typeevent->selectAll();
        $config['total_rows']=$data_ev->num_rows();
        $config['base_url']=base_url("index.php/AccueilCtrl/next_events");
        $config['per_page']=8;
        //configuration class bootstrap
        $config['full_tag_open']="<ul class='pagination pagination-sm' >";
        $config['full_tag_close']="</ul>";
        $config['num_tag_open']="<li>";
        $config['num_tag_close']="</li>";
        $config['cur_tag_open']="<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close']="<span class='sr-only'></span></a></li>";
        $config['next_tag_open']="<li>";
        $config['next_tag_close']="</li>";
        $config['prev_tag_open']="<li>";
        $config['prev_tag_close']="</li>";
        $config['first_tag_open']="<li>";
        $config['first_tag_close']="</li>";
        $config['last_tag_open']="<li>";
        $config['last_tag_close']="</li>";
        
        $this->pagination->initialize($config);
        $data['halaman']=$this->pagination->create_links();
        $data['offset']=$offset;
        
        $data['data']=$this->Event->ordo_event($config['per_page'], $offset);
        $data['title']="événements par date";
        $this->load->view('template/header',$data);
        $idlogged = $this->CookieBenModel->isLoggedIn();
            if (isset($idlogged)) {
                $this->load->view("benevole/navbarB", $data);
            } else {
                $idlogged = $this->CookieOrgaModel->isLoggedIn();
                if (isset($idlogged)) {
                    $this->load->view("organisateur/navbarO", $data);
                } else {
                    $this->load->view("template/navbar", $data);
                }
            }
        $this->load->view('next_events',$data);
        $this->load->view('template/footer');    
    }

    public function categorie_event($idT,$offset=0) {
        
        $data_ev=$this->db->get('event');
        $data['typeEvent'] = $this->Typeevent->selectAll();
        $config['total_rows']=$data_ev->num_rows();
        $config['base_url']=base_url("index.php/AccueilCtrl/categorie_event");
        $config['per_page']=8;
        //configuration class bootstrap
        $config['full_tag_open']="<ul class='pagination pagination-sm' >";
        $config['full_tag_close']="</ul>";
        $config['num_tag_open']="<li>";
        $config['num_tag_close']="</li>";
        $config['cur_tag_open']="<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close']="<span class='sr-only'></span></a></li>";
        $config['next_tag_open']="<li>";
        $config['next_tag_close']="</li>";
        $config['prev_tag_open']="<li>";
        $config['prev_tag_close']="</li>";
        $config['first_tag_open']="<li>";
        $config['first_tag_close']="</li>";
        $config['last_tag_open']="<li>";
        $config['last_tag_close']="</li>";
        
        $this->pagination->initialize($config);
        $data['halaman']=$this->pagination->create_links();
        $data['offset']=$offset;
        $data['cat']=$idT;
        
        $data['data']=$this->Event->selectByType($idT,$config['per_page'], $offset);
        $data['title'] = 'Voici les événements correspondant à votre recherche';
        $this->load->view('template/header', $data);
        $idlogged = $this->CookieBenModel->isLoggedIn();
            if (isset($idlogged)) {
                $this->load->view("benevole/navbarB", $data);
            } else {
                $idlogged = $this->CookieOrgaModel->isLoggedIn();
                if (isset($idlogged)) {
                    $this->load->view("organisateur/navbarO", $data);
                } else {
                    $this->load->view("template/navbar", $data);
                }
            }
        $this->load->view('liste_event', $data);
        $this->load->view('template/footer');
    }

    public function search_event() {
        $name = $this->input->post('title');
        $data['event'] = $this->Event->search($name);
        $data['title'] = "résultat";
        $data['name']=$name;
        $this->load->view('template/header', $data);
        $data['typeEvent'] = $this->Typeevent->selectAll();
        $idlogged = $this->CookieBenModel->isLoggedIn();
        if (isset($idlogged)) {
            $this->load->view("benevole/navbarB", $data);
        } else {
            $this->load->view('template/navbar', $data);
        }
        $this->load->view('research', $data);
        $this->load->view('template/footer');
    }
    

    public function event($id) {
        $this->load->helper('form', 'url');
        $this->load->library('form_validation');
        if ($this->Event->selectById($id) != Null) {
            $data['event'] = $this->Event->selectById($id);
            $idOrga=$data['event'][0]->idOrga;
            $data['organisateur']=$this->Organisateur->selectById($idOrga);
            $data['title'] = "event";
            $this->load->view('template/header', $data);
            $data['typeEvent'] = $this->Typeevent->selectAll();
            $idlogged = $this->CookieBenModel->isLoggedIn();
            if (isset($idlogged)) {
                $this->load->view("benevole/navbarB", $data);
            } else {
                $idlogged = $this->CookieOrgaModel->isLoggedIn();
                if (isset($idlogged)) {
                    $this->load->view("organisateur/navbarO", $data);
                } else {
                    $this->load->view("template/navbar", $data);
                }
            }
            $this->load->view('event', $data);
            $this->load->view('template/footer');
        } else
            redirect();
    }

}
